<?php

namespace App\Form;


use App\Entity\ListeElectSearch;
use App\Repository\LE2020Repository;
use Symfony\Component\Form\AbstractType;
use App\Repository\ListeElectoraleRepository;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ListeElectSearchType extends AbstractType
{
     /**
     * @var ListeElectoraleRepository
     * @var LE2020Repository
     */
    private $repository;
    private $repository2020;

    public function __construct(ListeElectoraleRepository $repository,LE2020Repository $repository2020)
    {

         $this->repository = $repository;
         $this->repository2020 = $repository2020;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class,['required'=>false])
            ->add('Bureau', ChoiceType::class, [
                    'choices' => $this->getChoicesBureau()
            ])
            ->add('Rue', ChoiceType::class, [
                'choices' => $this->getChoicesRue($options),
                'data'  => 'Toutes les rues',
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ListeElectSearch::class,
            'data_class' => null,
            'method'=>'get',
            'csrf_protection'=>false,
            'allow_extra_fields' => true  // autorise les champs submit supplementaire
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

    private function getChoicesBureau(){
        for ($i=1; $i <20 ; $i++) { 
            $choices[$i]='Bureau : '.$i;
        }
        $output =[];
        $output["Tous les bureaux"] = "Tous les bureaux" ;
        foreach($choices as $k => $v){
            $output[$v] = $k;
        }
        return $output;
    }
    private function getChoicesRue($options){

        $choices = $this->repository2020->findByRueField($options['data'][1],$options['data'][2]);
        if($options['data'][2]==2021){
        $choices = $this->repository->findByRueField($options['data'][1],$options['data'][2]);
        }
        $output =[];
        $output["Toutes les rues"] = "Toutes les rues" ;
        foreach($choices as $v){
            $output[$v['Rue']] = $v['Rue'];
         /*   $tabRue=$v->getRue();
            $output[$tabRue] = $tabRue;*/
        }
        return $output;
    }
}
