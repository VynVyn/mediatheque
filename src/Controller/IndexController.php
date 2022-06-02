<?php

namespace App\Controller;

use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use App\Repository\BookRepository;
use App\Repository\FilmRepository;
use App\Repository\DocumentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(DocumentRepository $documents, Request $request): Response
    {

        $querybuilder = $documents->getQueryBuilderForList();

        $pagerfanta = new Pagerfanta(new QueryAdapter($querybuilder));
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($request->query->get('page', 1));

        return $this->render('index/index.html.twig', [
            'pager' => $pagerfanta,
        ]);
    }

    #[Route('/document/{id}', name: 'show_document')]
    public function showDocument($id, DocumentRepository $documents)
    {
        // $document = $documents->findBy(['id' => $id]);
        $document = $documents->find($id);

        return $this->render('document/document.html.twig', [
            'document' => $document,
        ]);
    }

}
