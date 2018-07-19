<?php

namespace App\Form;

use App\Entity\Places;
use App\Entity\Cities;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PlacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('place_name' ,TextType::class, array(
                'label' => 'Nom de l\'entreprise/école ',
            ))
            ->add('city',EntityType::class, array(
                'class' => Cities::class,
                'label' => 'Ville ',
            ) )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Places::class,
        ]);
    }
}
