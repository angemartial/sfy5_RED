<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('firstname',
                TextType::class, [
                    'disabled' => true,
                    'label' => 'Votre prénom',
                    'attr' => [
                        'placeholder' => 'Entrez votre prenom'
                    ]
                ])
            ->add('lastname',
                TextType::class, [
                    'disabled' => true,
                    'label' => 'Votre Nom',
                    'attr' => [
                        'placeholder' => 'Entrez votre nom'
                    ]
                ])

            ->add('old_password',
                PasswordType::class, [
                    'mapped' => false,
                    'label' => 'Mot de passe actuel',
                    'required' => true,
                    'attr' => [
                        'placeholder' => 'Mot de passe actuel'
                    ]
                ])
            ->add('new_password',
                RepeatedType::class, [
                    'mapped' => false,
                    'type' => PasswordType::class,
                    'invalid_message' => 'Mot de passe non identique',
                    'label' => 'Nouveau mot de passe',
                    'required' => true,
                    'first_options' => ['label' => 'Nouveau mot de passe'],
                    'second_options' => ['label' => 'Confirmez mot de passe']
                ])

            ->add('submit',
                SubmitType::class,[
                    'label' => "Mettre à jour !",

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
