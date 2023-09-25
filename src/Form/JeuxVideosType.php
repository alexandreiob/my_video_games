<?php

namespace App\Form;

use App\Entity\Console;
use App\Entity\JeuxVideos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Url;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class JeuxVideosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('name', TextType::class, [
            'label' => 'Nom du jeu vidéo',
            'attr' => [
                'placeholder' => 'ex. Metal Gear Solid',
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255]),
            ],
        ])
        ->add('type', TextType::class, [
            'label' => 'Plateforme',
            'attr' => [
                'placeholder' => 'ex. Plateforme',
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
            'constraints' => [
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255]),
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
                new Date(),
            ],
        ])
        ->add('picture', TextType::class, [
            'label' => 'Lien vers l\'image',
            'attr' => [
                'placeholder' => 'Entrez le lien vers l\'image...',
                'class' => 'form-control',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer un lien vers l\'image.',
                ]),
                new Url([
                    'message' => 'Le lien n\'est pas valide. Assurez-vous qu\'il commence par http:// ou https://.',
                    'protocols' => ['http', 'https'],
                ]),
            ],
        ])
        ->add('console', EntityType::class, [
            'class' => Console::class,
            'label' => 'Console',
            'attr' => [
                'class' => 'form-control', // Ajoutez ici les classes Bootstrap
            ],
        ]);
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JeuxVideos::class,
        ]);
    }
}
