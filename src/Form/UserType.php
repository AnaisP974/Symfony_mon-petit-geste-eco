<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AddressType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, ["required"=>true])
            ->remove('roles')
            ->remove('password')
            ->add('firstname', TextType::class, ["required"=>false, "label"=> "Prénom"])
            ->add('lastname', TextType::class, ["required"=>false, "label"=> "Nom"])
            ->add('phoneNumber', TextType::class, ["required"=>false, "label"=> "Numéro de téléphone"])
            ->remove('isVerified')
            ->remove('secretIv')
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent être identiques',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => false,
                'first_options'  => ['label' => 'Nouveau mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe'],
            ])
            //FORMULAIRE INCLUS DYNAMIQUE :
            ->add('addAddress', ButtonType::class, ["label"=>"Ajouter une adresse", "attr"=>["class"=>"btn btn-secondary add_item_link", "data-collection-holder-class"=>"addaddress"]])
            ->add('newAddress', CollectionType::class, ["entry_type"=>AddressType::class, "allow_add"=>true, "allow_delete"=>true, "by_reference"=>false, "label"=>false, "mapped"=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
