<?php

namespace App\Controller;

use App\Entity\GetXmlData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{

    public function __construct( private EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/command', name: 'command')]
    public function debug(KernelInterface $kernel): Response
    {
        $application = new Application($kernel);
        $application->setAutoExit(false);

        $input = new ArrayInput([
            'command' => 'app:fetch-api',
        ]);

        // You can use NullOutput() if you don't need the output
        $output = new BufferedOutput();
        $application->run($input, $output);

        // return the output, don't use if you used NullOutput()
        $content = $output->fetch();

        // return new Response(""), if you used NullOutput()
        return new Response($content);
    }

    #[Route('/api', name: 'api')]
    public function index(): Response
    {
        $repo = $this->entityManager->getRepository(GetXmlData::class);
        $dane = $repo->findAll();

        $groupedData = [];
        foreach ($dane as $row) {
            $year = $row->getYear();
            $groupedData[$year][$row->getDescription()] = $row;
        }

        // Grupowanie danych na potrzeby tabeli na frontendzie
        $tableData = [];
        $tableLabels = ['Rok'];
        $i = 0;
        foreach ($groupedData as $year => &$yearData) {
            $data = [];
            $data[] = (string) $year;

            ksort($yearData);
            foreach ($yearData as $description => $item) {
                if ($item->getDescription() == 'Inflacja') {
                    $data[] = (string) ($item->getDataValue() - 100.0);
                } else {
                    $data[] = $item->getDataValue();
                }

                // Pobieranie etykiet do tabeli z pierwszego elementu w tablicy
                if ($i == 0) {
                    $tableLabels[] = $item->getDescription();
                }
            }

            $tableData[] = $data;
            $i++;
        }
        unset($yearData);

        // Grupowanie danych na potrzeby wykresu
        $chartData1 = [];
        $chartData2 = [];
        $chartLabels1 = ['Rok'];
        $chartLabels2 = ['Rok'];
        $i = 0;
        ksort($groupedData);
        foreach ($groupedData as $year => &$yearData) {
            $data1 = [];
            $data2 = [];
            $data1[] = (string) $year;
            $data2[] = (string) $year;

            ksort($yearData);
            foreach ($yearData as $description => $item) {
                if (in_array($item->getDescription(), [
                    'Inflacja',
                    'PKB na 1 mieszkańca',
                ])) {
                    if ($item->getDescription() == 'Inflacja') {
                        $data1[] = (float) $item->getDataValue() - 100;
                    } else {
                        $data1[] = (float) $item->getDataValue();
                    }
                }

                if (in_array($item->getDescription(), [
                    'Przeciętne emerytura',
                    'Przeciętne miesięczne wynagrodzenia brutto',
                    'Minimalne wynagrodzenie',
                ])) {
                    $data2[] = (float) $item->getDataValue();
                }

                // Pobieranie etykiet do tabeli z pierwszego elementu w tablicy
                if ($i == 0) {
                    if (in_array($item->getDescription(), [
                        'Inflacja',
                        'PKB na 1 mieszkańca',
                    ])) {
                        $chartLabels1[] = $item->getDescription();
                    }

                    if (in_array($item->getDescription(), [
                        'Przeciętne emerytura',
                        'Przeciętne miesięczne wynagrodzenia brutto',
                        'Minimalne wynagrodzenie',
                    ])) {
                        $chartLabels2[] = $item->getDescription();
                    }
                }
            }

            $chartData1[] = $data1;
            $chartData2[] = $data2;
            $i++;
        }
        unset($yearData);



        /*
         *      ['Year', 'Sales', 'Expenses'],
                ['2004',  1000,      400],
                ['2005',  1170,      460],
                ['2006',  660,       1120],
                ['2007',  1030,      540]
         */

        $x = 1;
        return $this->render('Project/homepage.html.twig', [
            'dane' => $groupedData,
            'tableData' => $tableData,
            'tableLabels' => $tableLabels,
            'chartData1' => [
                $chartLabels1,
                ...$chartData1,
            ],
            'chartData2' => [
                $chartLabels2,
                ...$chartData2,
            ],
            //'dane_json' => json_encode($groupedData),
        ]);
    }
}