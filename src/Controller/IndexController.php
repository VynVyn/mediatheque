<?php

namespace App\Controller;

use App\Repository\DocumentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(DocumentRepository $documents): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'documents' => $documents->findAll(),
        ]);
    }
}
