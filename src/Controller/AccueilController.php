<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{

    /**
     * @Route("/accueil", name="app_accueil")
     */
    public function index(CallApiService $callApiService): Response
    {
        // dd($callApiService->getFilmData());
        return $this->render('accueil/index.html.twig', [
            'categories' => $callApiService->getFilmCatData(),

        ]);
    }

}
