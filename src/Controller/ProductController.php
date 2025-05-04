<?php

namespace App\Controller;

use App\Entity\Autor;
use App\Form\AvisType;
use App\Form\FiltreProductType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
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
        $autor = $form->get('autor')->getData();

        if ($form->isSubmitted() && $form->isValid()) {
            if ($category && $autor) {
                $products = $productRepository->findBy(['category' => $category, 'autor' => $autor]);
            } elseif ($category) {
                $products = $productRepository->findBy(['category' => $category]);
            } elseif ($autor) {
                $products = $productRepository->findBy(['autor' => $autor]);
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
        $autor = $product->getAutor();

        $avis = $product->getAvis();

        $avisForm = $this->createForm(AvisType::class);
        $avisForm->handleRequest($request);

        if ($avisForm->isSubmitted() && $avisForm->isValid()) {
            $avis = $avisForm->getData();
            $avis->setProduct($product);
            $avis->setUser($this->getUser());

            $em->persist($avis);
            $em->flush();

            return $this->redirectToRoute('product_detail', ['slug' => $slug]);
        }

        return $this->render('product/productDetail.html.twig', [
            'product' => $product,
            'autor' => $autor,
            'avisForm' => $avisForm->createView(),
            'avis' => $avis,
        ]);
    }
}
