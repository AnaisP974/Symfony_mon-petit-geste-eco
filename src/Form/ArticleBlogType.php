<?php

namespace App\Form;

use App\Entity\ArticleBlog;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ArticleBlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isActive', CheckboxType::class, [
                "label"=>"En première page", 
                "row_attr"=>["class"=>"form-switch"],
            ])
            ->add('title', TextType::class, ["label"=>"Titre"])
            ->add('subtitle', TextType::class, ["label"=>"Sous-titre", "required"=>false])
            ->add('description', CKEditorType::class, ['config' => ['toolbar'=> 'basic'], "required"=>false])
            ->remove('imageName')
            ->remove('updatedAt')
            ->add('signature', TextType::class)
            ->add('imageDescription', CKEditorType::class, ['config' => ['toolbar'=> 'basic']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ArticleBlog::class,
        ]);
    }
}
