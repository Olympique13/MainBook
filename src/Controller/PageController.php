<?php

namespace App\Controller;

use App\Form\FiltreProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Page à propos, cgv, cgu etc..
class PageController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(Request $request, ProductRepository $productRepository): Response
    {

        $form = $this->createForm(FiltreProductType::class);
        $form->handleRequest($request);

        $category = $form->get('category')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($category) {
                $produits = $productRepository->findByCategory($category);
            } else {
                $produits = $productRepository->findAll();
            }
        } else {
            $produits = $productRepository->findAll();
        }

        return $this->render('page/accueil.html.twig', [
            'produits' => $produits,
            'form' => $form
        ]);
    }
}
