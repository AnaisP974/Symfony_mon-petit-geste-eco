<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;

use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('isUser', CheckboxType::class, [
                "label"=>"J'ai un compte utilisateur", 
                "row_attr"=>["class"=>"form-switch"],
                "required" => false,
            ])
            ->add('firstname', TextType::class, ["required"=>true, "label"=>"Prénom"])
            ->add('lastname', TextType::class, ["required"=>true, "label"=>"Nom"])
            ->add('email', EmailType::class, [
                "required"=>true,
                'constraints' => [
                    new Regex([
                        'pattern' => "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/i",
                        'message' => 'Merci de saisir un email valide.'
                    ])
                ],
            ])
            ->add('phoneNumber', TelType::class, [
                "required"=>false, 
                "label"=> "Numéro de téléphone",
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le numéro de téléphone doit avoir un minimum de 10 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 15,
                    ]),
                    new Regex([
                        'pattern' => "/\+?\d{1,4}?[-.\s]?\(?\d{1,3}?\)?[-.\s]?\d{1,4}[-.\s]?\d{1,4}[-.\s]?\d{1,9}/",
                        'message' => 'Numéro de téléphone invalide.'
                    ])
                ],
            ])
            ->add('object', TextType::class, ["required"=>true, "label"=>"Objet de la demande"])
            ->add('message', CKEditorType::class, ['config' => ['toolbar'=> 'basic']])
            ->remove('date', DateTimeType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
