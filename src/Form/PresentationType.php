<?php

namespace App\Form;

use App\Entity\Presentation;
use App\Entity\Places;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PresentationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class, array(
                'label' => 'Nom et prénom ',
            ))
            ->add('description' ,TextareaType::class, array(
                'label' => 'Déscription ',
            ))
            ->add('email_address',TextType::class, array(
                'label' => 'E-mail ',
            ))
            ->add('phone_number',TextType::class, array(
                'label' => 'Téléphone +33 ',
            ))
            ->add('linkedin_link',TextType::class, array(
                'label' => 'Linkedin ',
            ))
            ->add('github_link',TextType::class, array(
                'label' => 'GitHub ',
            ))
            ->add('cv',TextType::class, array(
                'label' => 'CV ',
            ))
            ->add('place', EntityType::class, array(
                'class' => Places::class,
                'label' => 'Entreprise'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Presentation::class,
        ]);
    }
}
