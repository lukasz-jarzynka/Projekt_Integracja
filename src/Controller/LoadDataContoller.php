<?php

namespace App\Controller;

use App\Service\FetchApiService;
use App\Service\LoadDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoadDataContoller extends AbstractController
{
    #[Route('/load-data', name: 'app_load_data')]
    public function loadData(LoadDataService $loadDataService): Response
    {
        $loadDataService->loadData();

        return $this->redirectToRoute('app_info');
    }

    #[Route('/load-api-data', name: 'app_load_api_data')]
    public function loadApiData(FetchApiService $fetchApiService): Response
    {
        $fetchApiService->fetchApiMultipleTimes();

        return $this->redirectToRoute('api');
    }

}