<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }
    
    public function configureFields(string $pageName): iterable
    {

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre')->setSortable(false),
            TextField::new('category.name', 'Catégorie')->hideOnForm(),
            AssociationField::new('category')->hideOnIndex(),
            SlugField::new('slug', 'Slug')->setTargetFieldName('title')->hideOnIndex(),
            TextField::new('fast_content', 'Courte description'),
            TextEditorField::new('content', 'Contenue')->hideOnIndex(),
        ];
    }
}