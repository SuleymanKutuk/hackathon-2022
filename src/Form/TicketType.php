<?php

namespace App\Form;

use App\Entity\Ticket;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('task')
            ->add('predictedTime')
            ->add('description')
            ->add('createdIn')
            ->add('workSpace', null,['choice_label' => 'name'])
            ->add('label', null, ['choice_label' => 'label'])
            ->add('status', null, ['choice_label' => 'status'])
            ->add('user',  EntityType::class, [
                "class" => User::class,
                "choice_label" => "email",
                "attr" => [
                    "class" => "form-control"
                    
                ]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
