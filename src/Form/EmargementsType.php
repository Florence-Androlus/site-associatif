<?php

namespace App\Form;


use App\Entity\Emargements2021;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class EmargementsType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Avote',CheckboxType::class)
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emargements2021::class,
            'data_class' => null,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}
