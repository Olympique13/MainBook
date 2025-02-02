<?php

namespace App\Controller;

use App\Form\FiltreProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\CartItem;
use App\Form\AddToCartType;
use Doctrine\ORM\EntityManagerInterface;

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
    public function slugProduct(string $slug, ProductRepository $productRepository, Request $request, EntityManagerInterface $em): Response
    {
        $product = $productRepository->findOneBy(['slug' => $slug]);
        $cartItem = new CartItem();
        $cartItem->setProduct($product);
        $cartItem->setUser($this->getUser());
        $addToCartForm = $this->createForm(AddToCartType::class, $cartItem);
        $addToCartForm->handleRequest($request);

        if ($addToCartForm->isSubmitted() && $addToCartForm->isValid()) {
            $em->persist($cartItem);
            $em->flush();

            return $this->redirectToRoute('app_panier');
        }

        return $this->render('product/productDetail.html.twig', [
            'product' => $product,
            'addToCartForm' => $addToCartForm->createView(),
        ]);
    }
}
