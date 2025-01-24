<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\SearchType;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function page(Request $request, ArticleRepository $articleRepository): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        $articles = [];

        
         if ($form->isSubmitted() && $form->isValid()) {
             $searchData = $form->getData();

             $articles = $articleRepository->findByTitle($searchData['recherche']);
         } else {
            $articles = $articleRepository->findAll();
         }

        if ($request->query->get('preview')) {
            return $this->render('article/afficherArticle.html.twig', [
            'articles' => $articles,
            'searchForm' => $form->createView(),
        ]);
        }

        return $this->render('article/afficherArticle.html.twig', [
            'articles' => $articles,
            'searchForm' => $form->createView(),
        ]);
}

    #[Route('/tailwind', name: 'tailwind')]
    public function search(Request $request, ArticleRepository $articleRepository): Response
    {
        // page de test tailwind
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        $articles = [];

        return $this->render('article/tailwind.html.twig', [
            'articles' => $articles,
            'searchForm' => $form->createView(),
        ]);
    }

    #[Route('/article/{slug}', name: 'article_info')]
    public function info(ArticleRepository $articleRepository, string $slug): Response
    {

        $articleInfo = $articleRepository->findOneBy(['slug' => $slug]);

        return $this->render('article/afficherInfoArticle.html.twig', [
            'article' => $articleInfo,
        ]);
    }

    #[Route('/add-article', name: 'add_article')]
    public function articleAdd(Request $request, EntityManagerInterface $entityManager): Response
    {

        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($article);
            $entityManager->flush();
        }

        return $this->render('article/ajouterArticle.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
