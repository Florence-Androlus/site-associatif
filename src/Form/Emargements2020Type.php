<?php

namespace App\Form;


use App\Entity\Emargements2020;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class Emargements2020Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Avote',CollectionType::class, [
                'entry_type'   => CheckboxType::class,
                // these options are passed to each "checkbox" type
                'entry_options'  => [
                    'attr'      => ['class' => 'check-box']
                ]
                ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Emargements2020::class,
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
