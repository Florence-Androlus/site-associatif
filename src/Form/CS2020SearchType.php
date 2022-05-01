<?php

namespace App\Form;

use App\Entity\CSSearch;
use App\Repository\ContactsRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CS2020SearchType extends AbstractType
{
    /**
     * @var ContactsRepository
     */
    private $repository;

    public function __construct(ContactsRepository $repository)
    {
         $this->repository = $repository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $builder
            ->add('Nom', TextType::class,['required'=>false])
            ->add('Mois', ChoiceType::class, [
                'choices' => $this->getChoicesMois()
                ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CSSearch::class,
            'data_class' => null,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

    private function getChoicesMois(){

        for ($i=1; $i <13 ; $i++) { 
            $liste_mois = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'];
            if ($i >= 1 AND $i <= 13){
                $choices[$i]=$liste_mois[$i - 1];
            }
        }
        $output =[];
        $output["Tous les mois"] = "Tous les mois" ;
        foreach($choices as $k => $v){
            $output[$v] = $v;
        }
        return $output;
    }
   
}
