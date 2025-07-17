<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class SignalerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 mb-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'Votre prénom',
                ],
                'label' => 'Prénom',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
                'constraints' => [
                    new NotBlank(['message' => 'Le prénom est obligatoire'])
                ]
            ])

            ->add('lastname', TextType::class, [
                'attr' => [
                    'class' => 'mt-1 mb-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'Votre nom',
                ],
                'label' => 'Nom',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
                'constraints' => [
                    new NotBlank(['message' => 'Le nom est obligatoire'])
                ]
            ])

            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'mt-1 mb-4 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'placeholder' => 'votre@email.com',
                ],
                'label' => 'Email',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
                'constraints' => [
                    new NotBlank(['message' => 'L\'email est obligatoire']),
                    new Email(['message' => 'Veuillez entrer un email valide'])
                ]
            ])

            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500',
                    'rows' => 4,
                    'placeholder' => 'Votre message...'
                ],
                'label' => 'Message',
                'label_attr' => ['class' => 'block text-sm font-medium text-gray-700'],
                'constraints' => [
                    new NotBlank(['message' => 'Le message ne peut pas être vide'])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Désactive la liaison à une entité spécifique
            'data_class' => null,

            // Autorise la validation sans entité
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'csrf_token_id'   => 'signaler_form',
            'translation_domain' => false,
        ]);
    }
}
