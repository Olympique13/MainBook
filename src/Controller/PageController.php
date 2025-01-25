<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Page à propos, cgv, cgu etc..
class PageController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(ProductRepository $productRepository): Response
    {
        $produits = $productRepository->findAll();

        return $this->render('page/accueil.html.twig', [
            'produits' => $produits
        ]);
    }
}
