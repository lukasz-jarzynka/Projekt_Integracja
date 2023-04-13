<?php

namespace App\Command;

use App\Api\ApiClient;
use App\Model\SingleUnitData;
use App\Repository\GetXmlDataRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Psr\Log\LoggerInterface;

#[AsCommand(
    name: 'app:fetch-api',
    description: 'Creates a new data.',
    hidden: false
)]
class FetchApi extends Command
{
    public function __construct(private ApiClient $apiClient, private GetXmlDataRepository $getXmlDataRepository, private EntityManagerInterface $entityManager, private LoggerInterface $logger)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->performFetch();
        return Command::SUCCESS;
    }

    public function performFetch(): void
    {
        $getXmlData = $this->getXmlDataRepository->getForImportWhenNull();

        if (!$getXmlData) {
            $this->logger->info('There is no data to import.');
            return;
        }

        $this->logger->info('Starting import.');

        $url = $getXmlData->getUrl();
        // Pobierz dane z API
        $xmlData = $this->apiClient->fetchDataFromApi($url);

        // Ustaw nową wartość pola tsLastDownload obiektu GetXmlData na aktualny czas
        $getXmlData->setTsLastDownload(new \DateTime());

        // Zapisz zmiany w bazie danych
        $this->entityManager->flush();

        // Kontynuuj przetwarzanie danych
        $encoders = [new XmlEncoder()];
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor())
        ];
        $serializer = new Serializer($normalizers, $encoders);

        /** @var $singleUnitData SingleUnitData */
        $singleUnitData = $serializer->deserialize($xmlData, SingleUnitData::class, 'xml');

        // Wyciaganie danych z XMLa i przypisywanie ich do zmiennych :
        $year = $singleUnitData->getResults()["variableData"]["values"]["yearVal"]["year"];
        $value = $singleUnitData->getResults()["variableData"]["values"]["yearVal"]["val"];
        $id_gus = $singleUnitData->getResults()["variableData"]["id"];

        $getXmlData->setYear($year);
        $getXmlData->setDataValue($value);
        $getXmlData->setExternalId($id_gus);

        $this->entityManager->persist($getXmlData);
        $this->entityManager->flush();

        $this->logger->info('Data imported successfully.');
    }
}