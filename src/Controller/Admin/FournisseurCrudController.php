<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseur;
use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FournisseurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fournisseur::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('frs_name', 'Fournisseur'),
            AssociationField::new('frs_product', 'Nom du livre vendu')->setCrudController(ProductCrudController::class),
            IntegerField::new('frs_stock', 'Stock fournisseur'),
        ];
    }
}
