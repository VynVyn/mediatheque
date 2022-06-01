<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\DocumentRepository;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
