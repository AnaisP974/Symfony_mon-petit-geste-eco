<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titleAddress', TextType::class, ["required"=>false, "label"=>"Adresse"])
            ->add('additionalAddress', TextType::class, ["required"=>false, "label"=>"Complément d'adresse"])
            ->add('postalCode', TextType::class, [
                "required"=>false, 
                "label"=>"Code postal",
                'constraints' => [
                    new NotBlank([
                        'message' => 'la saisie d\'un code postal est obligatoire',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Un code postal valide est obligatoire',
                        // max length allowed by Symfony for security reasons
                        'max' => 5,
                    ]),
                    new Regex([
                        'pattern' => "/^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B)) *([0-9]{3})?$/i",
                        'message' => 'Le mot de passe doit contenir au moins : un caractère spécial, un chiffre, une majuscule et une minuscule.'
                    ])
                ],
            ])
            ->add('city', TextType::class, ["required"=>false])
            ->add('country', CountryType::class, ["required"=>false])
            ->add('typeAddress', ChoiceType::class, [
                "choices" => [
                    "Livraison" => "Livraison",
                    "Facturation" => "Facturation",
                    "Livraison & Facturation" => "Livraison & Facturation",
                ],
            ])
            ->remove('user', EntityType::class, ["class"=>User::class, "by_reference"=>false, "label"=>"Utilisateur(s)", "multiple"=>true, "attr"=>["class"=>"select2"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
