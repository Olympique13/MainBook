<?php

namespace App\Controller;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiController extends AbstractController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    #[Route('/emoji', name: 'app_emoji')]
    public function emoji()
    {
        $client = HttpClient::create();
        $response = $client->request('GET', 'https://emojihub.yurace.pro/api/all/category/smileys-and-people');

        $emojiData = $response->toArray();

        return $this->render('api_product/index.html.twig', [
            'emoji' => $emojiData,
        ]);
    }
}


