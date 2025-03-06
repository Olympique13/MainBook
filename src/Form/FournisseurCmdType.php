<?php

namespace App\Form;

use App\Entity\Fournisseur;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class FournisseurCmdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('frs_name', EntityType::class, [
                'class' => Fournisseur::class,
                'choice_label' => 'frs_name',
                'label' => 'Nom du Fournisseur'
            ])
            ->add('frs_product', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'name',
                'label' => 'Produit'
            ])
            ->add('frs_stock', IntegerType::class, [
                'label' => 'Quantité',
                'required' => true,
                'attr' => ['min' => 1]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fournisseur::class,
        ]);
    }
}
