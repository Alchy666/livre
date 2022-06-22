<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title_livre')
            ->add('auteur_livre')
            ->add('resume_livre')
            ->add('prix_livre')
            ->add('datesortie_livre')
            ->add('genre_livre')
            ->add('edition_livre')
            ->add('image_livre')
            ->add('isbn_livre')
            ->add('stock_livre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
