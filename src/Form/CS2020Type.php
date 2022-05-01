<?php

namespace App\Form;

use App\Entity\CS2020;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class CS2020Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Numcontact')
            ->add('cs1erdons')
            ->add('types1erdons')
            ->add('Date1erdons')
            ->add('Mois1erdons')
            ->add('_2edons')
            ->add('types2edons')
            ->add('Date2emedons')
            ->add('Mois2emedons')
            ->add('_3edons')
            ->add('types3edons')
            ->add('Date3emedons')
            ->add('Mois3emedons')
            ->add('Nouvadherent')
            ->add('remerciement')
            ->add('doleance')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CS2020::class,
            'data_class' => null,
        ]);
    }

}
