<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form-cntrol']
            ])
            ->add(
                'createdOn',
                DateType::class,
                [
                    'attr' => ['class' => 'form-cntrol']
                ]
            )
            ->add(
                'status',
                null,
                [
                    'choice_label' => 'status',
                    'attr' => ['class' => 'form-cntrol']
                ]
            )
            ->add('deadline', DateType::class, [
                'attr' => ['class' => 'date']
            ])
            ->add('agency', null, [
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control']
            ])
            ->add('projectType', null, [
                'choice_label' => 'type',
                'attr' => ['class' => 'form-control']
            ])
            ->add('workSpace', null, [
                'choice_label' => 'name',
                'attr' => ['class' => 'form-control']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
