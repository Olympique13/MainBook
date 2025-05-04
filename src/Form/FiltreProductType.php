<?php

namespace App\Form;

use App\Entity\Autor;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltreProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder' => 'Toutes les catégories',
                'required' => false,
                'label' => 'Catégorie',
            ])
            ->add('autor', EntityType::class, [
                'class' => Autor::class,
                'choice_label' => 'name',
                'placeholder' => 'Tous les auteurs',
                'required' => false,
                'label' => 'Auteur',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
