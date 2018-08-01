<?php

namespace App\Form;

use App\Entity\Experiences;
use App\Entity\Dates;
use App\Entity\Places;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ExperiencesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('exp_title', TextType::class, array(
                'label' => 'Intitulé du poste',
            ))
            ->add('exp_description', TextareaType::class, array(
                'label' => 'Missions',
            ))
            ->add('date_start', EntityType::class, array(
                'class' => Dates::class,
                'label' => 'Début',
            ))
            ->add('date_end', EntityType::class, array(
                'class' => Dates::class,
                'label' => 'Fin',
            ))
            ->add('place', EntityType::class, array(
                'class' => Places::class,
                'label' => 'Entreprise',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Experiences::class,
        ]);
    }
}
