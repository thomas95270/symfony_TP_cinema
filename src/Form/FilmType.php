<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Artiste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('dateSortie')
            ->add('affiche')
            ->add('description')
            ->add('artiste', EntityType::class,[
                'class' => Artiste::class,
                'choice_label' => 'nom',
                'multiple' =>true,
                'expanded' => true,
                'label' => 'artiste'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
