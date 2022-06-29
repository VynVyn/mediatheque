<?php

namespace App\Controller;

use App\Entity\Document;
use App\Entity\Categorie;
use Pagerfanta\Pagerfanta;
use App\Repository\BookRepository;
use App\Repository\FilmRepository;
use App\Repository\DocumentRepository;
use App\Event\CounterReadDocumentEvent;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function __construct(private EventDispatcherInterface $dispatcher){

    }
    #[Route('/', name: 'app_index')]
    public function index(DocumentRepository $documents, Request $request): Response
    {

        $querybuilder = $documents->getQueryBuilderForList();

        $pagerfanta = new Pagerfanta(new QueryAdapter($querybuilder));
        $pagerfanta->setMaxPerPage(10);
        $pagerfanta->setCurrentPage($request->query->get('page', 1));

        if($this->isGranted('ROLE_ADMIN'))
        {
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('index/index.html.twig', [
            'pager' => $pagerfanta,
        ]);
    }

    #[Route('/document/{id}', name: 'show_document')]
    public function showDocument($id, DocumentRepository $documents)
    {
        // crée un evenemnt et le displatché
        // crée une class de subsripter
        // et incrémenter un nombre qui va determiner combien de fois ce document est affiché
        
        $document = $documents->find($id);
        
        $event = new CounterReadDocumentEvent($document);

        $this->dispatcher->dispatch($event, CounterReadDocumentEvent::NAME);

        return $this->render('document/document.html.twig', [
            'document' => $document,
        ]);

    }

    #[Route('/documents/reference/{id}', name: 'documents_categorie')]
    public function showDocumentByCategorie(DocumentRepository $documents, Document $document)
    {
        // $document = $documents->findBy(['id' => $id]);
        $documents = $documents->getSimilarDocuments($document);
        return $this->render('document/reference/index.html.twig', [
            'documents' => $documents,
        ]);
    }

}
