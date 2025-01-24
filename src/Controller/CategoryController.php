<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategorieType;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/categorie', name: 'listeCategory')]
    public function page(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll([],);

        return $this->render('category/afficherCategory.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/add-category', name: 'add_category')]
    public function categoryAdd(Request $request, EntityManagerInterface $entityManager): Response
    {

        $category = new Category();
        $form = $this->createForm(CategorieType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($category);
            $entityManager->flush();
        }

        return $this->render('category/ajouterCategory.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
