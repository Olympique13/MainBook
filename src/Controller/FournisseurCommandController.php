<?php

namespace App\Controller;

use App\Entity\Fournisseur;
use App\Form\FournisseurCmdType;
use App\Repository\FournisseurRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class FournisseurCommandController extends AbstractController
{
    #[Route('/fournisseur/command', name: 'app_fournisseur_command', methods: ['GET', 'POST'])]
    public function index(Request $request, FournisseurRepository $fournisseurRepository, ProductRepository $productRepository, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FournisseurCmdType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fournisseur = $form->getData();
            $quantity = $form->get('frs_stock')->getData();
            $product = $productRepository->find($fournisseur->getFrsProduct()->getId());

            if ($product && $quantity <= $fournisseur->getFrsStock()) {
                $fournisseur->setFrsStock($fournisseur->getFrsStock() - $quantity);
                $entityManager->persist($fournisseur);

                $product->setStock($product->getStock() + $quantity);
                $entityManager->persist($product);

                $entityManager->flush();
             }
        }

        return $this->render('fournisseur_command/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
