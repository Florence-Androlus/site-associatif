<?php

namespace App\Form;

use App\Entity\Sensibilite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class SensibiliteSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('annee', ChoiceType::class, [
                'choices' => $this->getChoices(),
          ])
          ->getForm(); ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sensibilite::class,
            'data_class' => null,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }


    private function getChoices(){
        $output =[];
        for ($i=2015; $i <2023 ; $i++) { 
            $output[$i] = $i;
        }
        return $output;
    }
}
