<?php

namespace App\Form;

use App\Entity\School;
use App\Entity\Dates;
use App\Entity\Places;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SchoolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diploma_name', TextType::class, array(
                'label' => 'Nom du Diplôme '
            ))
            ->add('date_start',EntityType::class, array(
                'class' => Dates::class,
                'label' => 'Date de début ',
            ))
            ->add('date_end',EntityType::class, array(
                'class' => Dates::class,
                'label' => 'Date de fin ',
            ))
            ->add('place',EntityType::class, array(
                'class' => Places::class,
                'label' => 'Ecole/Université ',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => School::class,
        ]);
    }
}
