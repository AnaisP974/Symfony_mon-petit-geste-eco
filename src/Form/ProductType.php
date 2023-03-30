<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ["label"=>"Nom"])
            ->add('description', CKEditorType::class, ['config' => ['toolbar'=> 'basic']])
            ->add('price', MoneyType::class, ["label" => "Prix (en €)"])
            ->add('isPromote', CheckboxType::class, ['label' => 'Mis en avant', 'required' => false, 'row_attr' => ['class' => 'form-switch']])
            ->remove('imageName')
            ->remove('updatedAt')
            ->add('descriptionImage', CKEditorType::class, ['config' => ['toolbar'=> 'basic'], "label"=>"Courte description"])
            ->add('slug')
            ->add('stock', NumberType::class)
            ->add('category', EntityType::class, ["class"=> Category::class, "label"=>"Catégorie"])
        ;
        if($options["new"])
        {
            $builder->add('imageFile', FileType::class, ["label"=> 'Choisir une image', "required"=>true]);
        } else
        {
            $builder->add('imageFile', FileType::class, ["label"=> 'Changer l\'image', "required"=>false]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
            'new' => false,
        ]);
    }
}
