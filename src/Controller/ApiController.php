<?php

namespace App\Controller;

use App\Entity\XmlDataResult;
use App\Repository\XmlDataResultRepository;
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

    public function __construct( private EntityManagerInterface $entityManager, private XmlDataResultRepository $xmlDataResultRepository)
    {
        $this->entityManager = $entityManager;
        $this->xmlDataResultRepository = $xmlDataResultRepository;
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
        $repo = $this->entityManager->getRepository(XmlDataResult::class);
        $dane = $repo->findAll();

        return $this->render('Project/homepage.html.twig', [
            'dane' => $dane,
        ]);
    }
}