<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Veuillez entrer votre nom.']),
                    new Assert\Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom doit comporter au moins {{ limit }} caractères.',
                    ]),
                ],
                'empty_data' => '',
                'label' => 'Votre nom',
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Veuillez entrer votre email.']),
                    new Assert\Email(['message' => 'Veuillez entrer un email valide.']),
                ],
                'empty_data' => '',
                'label' => 'Votre email',
            ])
            ->add('subject', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Veuillez entrer un objet pour votre message.']),
                ],
                'empty_data' => '',
                'label' => 'Objet du message',
            ])
            ->add('message', TextareaType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Veuillez entrer votre message.']),
                ],
                'empty_data' => '',
                'label' => 'Votre message',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
