<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/{idCat}", name="app_categorie")
     */
    public function index(string $idCat, CallApiService $callApiService): Response
    {
        return $this->render('categorie/index.html.twig', [
            'catFilms'=> $callApiService->getFilmByCat($idCat),
        ]);
    }
}
