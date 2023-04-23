<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "required"=>true,
                'constraints' => [
                    new Regex([
                        'pattern' => "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/i",
                        'message' => 'Merci de saisir un email valide.'
                    ])
                ],                
            ])
            ->remove('roles')
            ->remove('password')
            ->add('firstname', TextType::class, ["required"=>false, "label"=> "Prénom"])
            ->add('lastname', TextType::class, ["required"=>false, "label"=> "Nom"])
            ->add('phoneNumber', TelType::class, [
                "required"=>false, 
                "label"=> "Numéro de téléphone",
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le numéro de téléphone doit avoir un minimum de 10 caractères',
                        // max mis en commentaire pour l'encodage des données
                        // 'max' => 15,
                    ]),
                    new Regex([
                        'pattern' => "/\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}/",
                        'message' => 'Numéro de téléphone invalide.'
                    ])
                ],
            ])
            
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
            ->add('address', TextType::class, ["required"=>false, "label"=>"Adresse"])
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
            ->add('city', TextType::class, ["required"=>false, "label"=>"Ville"])
            ->add('country', CountryType::class, ["required"=>false, "label"=>"Pays"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
