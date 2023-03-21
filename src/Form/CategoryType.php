<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["required"=>true, "label"=>"Nom"])
            ->remove('imageName')
            ->remove('updatedAt')
            ->add('description', CKEditorType::class, ['config' => ['toolbar'=> 'basic'], "required"=>false])
            ->add('imageDescription', CKEditorType::class, ['config' => ['toolbar'=> 'basic'], "label"=>"Description de l'image"])
            
            // ->add('imageFile', FileType::class, ["label"=> 'Choisir une image'])
        ;
        if($options["new"])
        {
            $builder->add('imageFile', FileType::class, ["label"=> 'Choisir une image', "required"=>true]);
        } else
        {
            $builder->add('imageFile', FileType::class, ["label"=> 'Choisir une image', "required"=>false]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
            'new' => false,
        ]);
    }
}
