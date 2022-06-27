<?php

namespace App\Controller;

use App\Entity\Langue;
use App\Form\LangueType;
use App\Repository\LangueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/langue', name: 'langue_')]
class LangueController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(LangueRepository $langueRepository): Response
    {
        return $this->render('langue/index.html.twig', [
            'langues' => $langueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, LangueRepository $langueRepository): Response
    {
        $langue = new Langue();
        $form = $this->createForm(LangueType::class, $langue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $langueRepository->add($langue, true);

            return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('langue/new.html.twig', [
            'langue' => $langue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Langue $langue): Response
    {
        return $this->render('langue/show.html.twig', [
            'langue' => $langue,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Langue $langue, LangueRepository $langueRepository): Response
    {
        $form = $this->createForm(LangueType::class, $langue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $langueRepository->add($langue, true);

            return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('langue/edit.html.twig', [
            'langue' => $langue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Langue $langue, LangueRepository $langueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$langue->getId(), $request->request->get('_token'))) {
            $langueRepository->remove($langue, true);
        }

        return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
    }
}
