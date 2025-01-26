<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('category', 'Catégorie'),
            TextField::new('name', 'Titre du produit'),
            TextField::new('catchPhrase', 'Phrase d\'accroche'),
            TextEditorField::new('description', 'Description'),
            MoneyField::new('price', 'Prix (€)')->setCurrency('EUR')->setStoredAsCents(false),
            SlugField::new('slug', 'Slug')->setTargetFieldName('name')->hideOnIndex(),
            TextField::new('file', 'Fichier PDF')->setFormType(VichFileType::class)->onlyOnForms(),
            TextField::new('fileName', 'Fichier PDF')->formatValue(function ($value, $entity)
                {
                    return $value 
                        ? sprintf('<a href="/pdf/%s" target="_blank">%s</a>', $value, $value)
                        : 'Aucun fichier';
                })
                ->onlyOnIndex(),
            TextField::new('imageFile', 'Image')->setFormType(VichFileType::class)->onlyOnForms(),
            ImageField::new('imageName', 'Couverture')->setBasePath('images/products')->onlyOnIndex(),
        ];
    }
}
