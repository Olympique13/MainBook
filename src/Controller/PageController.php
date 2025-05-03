<?php

namespace App\Controller;

use App\Form\FiltreProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

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


        $client = HttpClient::create();
        $response = $client->request('GET', 'https://emojihub.yurace.pro/api/all');
        $emojis = $response->toArray();

        $top = null;
        $mid = null;
        $low = null;
        foreach ($emojis as $emoji) {
            if ($emoji['name'] === 'heavy black heart ≊ red heart') {
                $top = $emoji['htmlCode'][0] ?? null;
            }
            if ($emoji['name'] === 'thinking face') {
                $mid = $emoji['htmlCode'][0] ?? null;
            }
            if ($emoji['name'] === 'thumbs down sign ≊ thumbs down') {
                $low = $emoji['htmlCode'][0] ?? null;
            }
        }

        dump($low); // Vérifiez si $low est bien défini

        return $this->render('page/accueil.html.twig', [
            'produits' => $produits,
            'form' => $form,
            'top' => $top,
            'mid' => $mid,
            'low' => $low
        ]);
    }
}
