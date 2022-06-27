<?php

namespace App\Controller\admin;

use App\Entity\CategorieArtist;
use App\Form\CategorieArtistType;
use App\Repository\CategorieArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/categorie_artist', name: 'categorie_artist_')]
class CategorieArtistController extends AbstractController
{
    #[Route('/', name: 'index', methods: ['GET'])]
    public function index(CategorieArtistRepository $categorieArtistRepository): Response
    {
        return $this->render('admin/categorie_artist/index.html.twig', [
            'categorie_artists' => $categorieArtistRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategorieArtistRepository $categorieArtistRepository): Response
    {
        $categorieArtist = new CategorieArtist();
        $form = $this->createForm(CategorieArtistType::class, $categorieArtist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieArtistRepository->add($categorieArtist, true);

            return $this->redirectToRoute('categorie_artist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/categorie_artist/new.html.twig', [
            'categorie_artist' => $categorieArtist,
            'form' => $form,
        ]);
    }

    #[Route('/show/{id}', name: 'show', methods: ['GET'])]
    public function show(CategorieArtist $categorieArtist): Response
    {
        return $this->render('admin/categorie_artist/show.html.twig', [
            'categorie_artist' => $categorieArtist,
        ]);
    }

    #[Route('/edit/{id}', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieArtist $categorieArtist, CategorieArtistRepository $categorieArtistRepository): Response
    {
        $form = $this->createForm(CategorieArtistType::class, $categorieArtist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieArtistRepository->add($categorieArtist, true);

            return $this->redirectToRoute('categorie_artist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/categorie_artist/edit.html.twig', [
            'categorie_artist' => $categorieArtist,
            'form' => $form,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, CategorieArtist $categorieArtist, CategorieArtistRepository $categorieArtistRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieArtist->getId(), $request->request->get('_token'))) {
            $categorieArtistRepository->remove($categorieArtist, true);
        }

        return $this->redirectToRoute('categorie_artist_index', [], Response::HTTP_SEE_OTHER);
    }
}
