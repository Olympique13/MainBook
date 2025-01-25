<?php

namespace App\Controller;

use App\Form\FiltreProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function product(Request $request, ProductRepository $productRepository): Response
    {
        $form = $this->createForm(FiltreProductType::class);
        $form->handleRequest($request);

        $category = $form->get('category')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($category) {
                $products = $productRepository->findByCategory($category);
            } else {
                $products = $productRepository->findAll();
            }
        } else {
            $products = $productRepository->findAll();
        }

        return $this->render('product/allProduct.html.twig', [
            'produit' => $products,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/product/{slug}', name: 'product_detail')]
    public function slugProduct(string $slug, ProductRepository $productRepository): Response
    {
        $product = $productRepository->findOneBy(['slug' => $slug]);

        return $this->render('product/productDetail.html.twig', [
            'produit' => $product,
        ]);
    }
}
