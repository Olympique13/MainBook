<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Page à propos, cgv, cgu etc..
class PageController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        $produits = [
            [
                'nom_produit' => 'Produit 1',
                'desc_produit' => 'Description du produit 1',
                'prix_produit' => 10,
            ],
        ];

        return $this->render('page/accueil.html.twig', [
            'produits' => $produits
        ]);
    }
}
