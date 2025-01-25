<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function product(ProductRepository $productRepository): Response
    {
        $product = $productRepository->findAll();

        return $this->render('product/allProduct.html.twig', [
            'produit' => $product,
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
