<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', null, [
                'attr' => ['class' => 'form-control form-enable'],
                'label' => 'Email'
            ])
            ->add('firstname', null, [
                'attr' => ['class' => 'form-control form-enable'],
                'label' => 'Prenoms'
            ])
            ->add('lastname', null, [
                'attr' => ['class' => 'form-control form-enable'],
                'label' => 'Nom'
            ])
            ->add('description', null, [
                'attr' => ['class' => 'form-control form-enable'],
                'label' => 'Description'
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
