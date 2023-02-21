<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'required' => true,
            'constraints' => [
                    new Assert\Length([
                    'min' => 2,
                    'max' => 100,
                    'minMessage' => 'Le champ Nom doit contenir au moins 2 caractères.',
                    'maxMessage' => 'Le champ Nom ne peut pas contenir plus de 50 caractères.',
                ]),
            ],
        ])
        
            ->add('capacite', IntegerType::class, [
                'label' => 'capacite',
                'required' => true,
                'constraints' => [
                    new Assert\Range([
                        'min' => 10,
                        'max' => 200,
                        'minMessage' => 'Le nombre des doses doit être supérieur ou égal à 10.',
                        'maxMessage' => 'Le nombre des doses doit être inférieur ou égal à 200',
                    ]),
                ],
            ])

            ->add('local', TextType::class, [
                'label' => 'local',
                'required' => true,
                'constraints' => [
                        new Assert\Length([
                        'min' => 2,
                        'max' => 100,
                        'minMessage' => 'Le champ local doit contenir au moins 2 caractères.',
                        'maxMessage' => 'Le champ local ne peut pas contenir plus de 50 caractères.',
                    ]),
                ],
            ])
            ->add('date')
            ->add('prix',TextType::class, [
                'label' => 'local',
                'required' => true,
                
            'constraints' => [
                new Assert\Range([
                    'min' => 0,
                    'max' => 200,
                    'minMessage' => 'Le prix doit être supérieur ou égal à 0.',
                    'maxMessage' => 'Le prix doit être inférieur ou égal à 200',
                ]),
            ],
        ])
            ->add('type')
            ->add('description', TextType::class, [
                'label' => 'description',
                'required' => true,
                'constraints' => [
                        new Assert\Length([
                        'min' => 100,
                        'max' => 200,
                        'minMessage' => 'Le champ decription doit contenir au moins 100 caractères.',
                        'maxMessage' => 'Le champ local ne peut pas contenir plus de 200 caractères.',
                        
                    ]),
                ],
            ])

            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
