<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',
                TextType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Entrez votre Prénom'
                    ]
                ])
            ->add('lastname',
                TextType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Entrez votre Nom'
                    ]
                ])
            ->add('email',
                EmailType::class, [
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Entrez votre Email'
                    ]
                ])
            ->add('password',
                RepeatedType::class, [
                    'type' => PasswordType::class,
                    'invalid_message' => 'Mot de passe non identique',
                    'label' => false,
                    'required' => true,
                    'first_options' => ['label' => false,
                        'attr' => [
                            'placeholder' => 'Tapez votre mot de passe'
                        ]
                        ],
                    'second_options' => ['label' => false,
                        'attr' => [
                            'placeholder' => 'Confirmez votre mot de passe'
                        ]]
                ])

            ->add('description',
                TextareaType::class,[
                    'label' => false,
                    'attr' => [
                        'placeholder' => 'Parlez nous un peu de vous'
                    ]
                ])
            ->add('submit',
                SubmitType::class,[
                    'label' => "S'inscrire",

                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
