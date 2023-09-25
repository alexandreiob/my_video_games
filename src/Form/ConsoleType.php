<?php

namespace App\Form;

use App\Entity\Console;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Date;

class ConsoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('name', TextType::class, [
            'label' => 'Nom de la Console',
            'attr' => [
                'placeholder' => 'ex. Playstation',
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 2, 'max' => 255]),
            ],
        ])
        ->add('brand', TextType::class, [
            'label' => 'Constructeur',
            'attr' => [
                'placeholder' => 'ex. Sony',
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 2, 'max' => 255]),
            ],
        ])
        ->add('released', DateType::class, [
            'label' => 'Date de sortie',
            'years' => range(date('Y') + 2, 1900),
            'attr' => [
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
            'constraints' => [
                new NotBlank(),
            ],
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Console::class,
        ]);
    }
}
