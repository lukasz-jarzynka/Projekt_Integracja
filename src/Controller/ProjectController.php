<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/', name: "app_homepage")]
    public function homepage(): Response
    {

        return $this->render('Project/welcomePage.html.twig');
    }

    #[Route('/info', name: "app_info")]
    public function index(): Response
    {
        return $this->render('Project/projectInfo.html.twig');
    }

}