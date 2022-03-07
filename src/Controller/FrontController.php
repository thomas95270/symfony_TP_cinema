<?php

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();

        return $this->render('front/index.html.twig', [
            'films' => $films
        ]);
    }
    
    #[Route('/touslesfilms', name: 'liste_films')]
    public function listeTousLesFilms(FilmRepository $filmRepository): Response
    {
        $films = $filmRepository->findAll();

        return $this->render('front/liste_films.html.twig', [
            'films' => $films
        ]);
    }

}
