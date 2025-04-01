<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Fournisseur;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //

        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration du blog')
            ->setTextDirection('ltr');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Accueil');
        yield MenuItem::linkToRoute('Retour au site', 'fa fa-backward', 'app_accueil');
        yield MenuItem::linkToDashboard('Accueil', 'fa fa-home');

        yield MenuItem::section('Articles');
        yield MenuItem::linkToCrud('Produits', 'fas fa-newspaper', Product::class);
        yield MenuItem::linkToCrud('Catégorie', 'fas fa-layer-group', Category::class);

        yield MenuItem::section('Clients');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);

    }
}
