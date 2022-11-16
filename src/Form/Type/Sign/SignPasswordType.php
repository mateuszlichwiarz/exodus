<?php

namespace App\Form\Type\Sign;

use App\Entity\User;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

use Symfony\Component\Form\FormBuilderInterface;

class SignPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('password', PasswordType::class)
            ->add('continue',   SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}