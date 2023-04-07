<?php

namespace App\Command;

use App\Api\ApiClient;
use App\Model\SingleUnitData;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

#[AsCommand(
    name: 'app:fetch-api',
    description: 'Creates a new user.',
    hidden: false
)]
class FetchApi extends Command
{

    public function __construct(private ApiClient $apiClient)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Adres URL do API z danymi w formacie XML
        $url = 'https://bdl.stat.gov.pl/api/v1/data/by-unit/000000000000?format=xml&var-id=217230&year=2021';
        // Tworzy zmienną $xmlData, która przechowuje dane pobrane z API za pomocą funkcji fetchDataFromApi() z klasy ApiClient.
        $xmlData = $this->apiClient->fetchDataFromApi($url);

        //Te argumenty konfigurują serializator do użycia ObjectNormalizera jako normalizatora danych wejściowych i XmlEncodera jako kodera danych wyjściowych.

        $encoders = [new XmlEncoder()];
        $normalizers = [
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null, new ReflectionExtractor())
        ];
        $serializer = new Serializer($normalizers, $encoders);

        /** @var $singleUnitData SingleUnitData */
        $singleUnitData = $serializer->deserialize($xmlData, SingleUnitData::class, 'xml');

        /*
         * todo
         *
         * - utworzyć encję, do której zapisane będą pobrane wartości
         *
         * - encja do pobierania
         * - id
         * - id encji do wynikow
         * - url
         * - ts_ostatniego_pobrania
         *
         * - encja do wyników:
         * - id
         * - rok
         * - opis
         * - wartosc
         *
         * 0. dodajesz do tabeli w encji do pobierania wszystkie importy
         * 1. pobierasz z DB rekordy, które mają ts_ostatniego_pobrania = null
         * 2. pobierasz jeden rekord (limit 1)
         * 3. pobierasz xml
         * 4. zapisujesz do encji wyników
         * 5. ustawiasz w encji do pobierania ts_ostatniego_importu na NOW()
         * 6. podpiąć cron po dockera
         * 7. ustawić w cronie żeby np. co 10 sekund odpalał komendę app:fetch-api
         *
         *
         * 0. pobieranie wartości z DB w kontrolerze
         * 1. wyliczanie zestawień
         * 2. przekazanie na front
         *

         */


        return Command::SUCCESS;
    }

}