<?php

namespace App\Form;

use App\Entity\Signalement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;

class SignalerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'rows' => 4,
                    'placeholder' => 'Titre de votre signalement'
                ],
                'label' => 'Titre',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'Adresse postale'
                ],
                'label' => 'Adresse',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ])
            ->add('longitude', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'Longitude (ex : 2.3456)'
                ],
                'label' => 'Longitude',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ])
            ->add('latitude', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'Latitude (ex : 48.8566)'
                ],
                'label' => 'Latitude',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ])
            ->add('picture', TextType::class, [
                'required' => false,
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'URL de l’image (optionnelle)'
                ],
                'label' => 'Image (URL)',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ])
            ->add('commentaire', TextareaType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'rows' => 4,
                    'placeholder' => 'Votre commentaire...'
                ],
                'label' => 'Commentaire',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Désactive la liaison à une entité spécifique
            "data_class" => Signalement::class

            // Autorise la validation sans entité
            // 'csrf_protection' => true,
            // 'csrf_field_name' => '_token',
            // 'csrf_token_id'   => 'signaler_form',
            // 'translation_domain' => false,
        ]);
    }
}
