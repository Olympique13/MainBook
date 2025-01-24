<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Ajouter des infos en bdd
        $count = 1;
        // 20 articles & 5 categories
        for ($c = 0; $c < 5; $c++) {
            $category = new Category();
            $category->setName('category ' . $c);
            $category->setSlug(str_replace(' ', '-', $category->getName()));
            $manager->persist($category);

            for ($a = 0; $a < 4; $a++) {
                $article = new Article();
                $article->setTitle('article ' . $count);
                $article->setContent("Contenu de l'article " . $count);
                $article->setFastContent("Brève description de l'article " . $count);
                $article->setCreatedAt(new \DateTimeImmutable());
                $article->setCategory($category);
                $article->setSlug(str_replace(' ', '-', $article->getTitle()));
                $manager->persist($article);
                $count++;
            }
        }
        $manager->flush();
    }
}
