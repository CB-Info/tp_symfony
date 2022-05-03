<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FilmController extends AbstractController
{
    /**
     * @Route("/film/{idFilm}", name="app_film")
     */
    public function index(string $idFilm, CallApiService $callApiService): Response
    {
        return $this->render('film/index.html.twig', [
            'film' => $callApiService->getFilmData($idFilm),
        ]);
    }

    /**
     * @Route("/film", name="app_listfilm")
     */
    public function list(CallApiService $callApiService): Response
    {
        return $this->render('film/populaire.html.twig', [
            'populaires' => $callApiService->getFilmPopuData(),
        ]);
    }
}
