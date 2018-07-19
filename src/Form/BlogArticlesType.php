<?php

namespace App\Form;

use App\Entity\BlogArticles;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class BlogArticlesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('article_title', TextType::class, array(
                'label'=> 'Titre de l\'article'
            ))
            ->add('article', TextType::class, array(
                'label'=> 'Article'
            ))
            ->add('publication_date', TextType::class, array(
                'label'=> 'Date de publication'
            ))
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BlogArticles::class,
        ]);
    }
}
