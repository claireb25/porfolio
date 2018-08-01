<?php

namespace App\Form;

use App\Entity\Projects;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Dates;
use App\Entity\Places;
use App\Entity\Skills;
use App\Entity\Images;

class ProjectsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project_name',TextType::class, array(
                'label' => 'Nom du projet ',
            ))
            ->add('project_year',EntityType::class, array(
                'class' => Dates::class,
                'label' => 'Année de réalisation ',
            ) )
            ->add('project_description',TextType::class, array(
                'label' => 'Description',
            ) )
            ->add('place',EntityType::class, array(
                'class' => Places::class,
                'label' => 'Entreprise/Ecole ',
            ) )
            ->add('skill', EntityType::class, [
                'class' => Skills::class,
                'multiple' => true,
                'label' => 'Compétences']
                )

            ->add('main_img',EntityType::class, array(
                'class' => Images::class,
                'label' => 'Image principale ',
            ))
            ->add('sec_img',EntityType::class, array(
                'class' => Images::class,
                'label' => 'Image secondaire ',
            ))
            ->add('link_to_project', TextType::class, array(
                'label' => 'Lien vers le projet ',
            ))
            ->add('github_link',TextType::class, array(
                'label' => 'Lien GitHub ',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projects::class,
        ]);
    }
}
