<?php

namespace App\Form;

use DateTimeInterface;
use App\Entity\Contacts;
use App\Entity\ContactsSearch;
use App\Repository\ContactsRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ContactsSearchType extends AbstractType
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
            ->add('bureau', ChoiceType::class, [
                'choices' => $this->getChoicesBureau()
            ])
            ->add('rue', ChoiceType::class, [
                'choices' => $this->getChoicesRue($options),
                'data'  => 'Toutes les rues',
            ])
            ->add('VilleLocalite', ChoiceType::class, [

                'choices' => $this->getChoicesVille(),
                'data'  => 'Toutes les villes',
            ])
            ->add('quartier', ChoiceType::class, [
                'choices' => $this->getChoicesQuartier()
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ContactsSearch::class,
            'data_class' => null,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

    private function getChoicesQuartier(){
        $choices = Contacts::QUARTIER;
        $output =[];
        foreach($choices as $v){
            $output[$v] = $v;
        }
        return $output;
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
       // var_dump($options['data'][3]);
        $choices = $this->repository->findByRueField($options['data'][1],$options['data'][2],$options['data'][3]);
        $output =[];
        $output["Toutes les rues"] = "Toutes les rues" ;
        foreach($choices as $v){
            $output[$v->getRue()] = $v->getRue();
        }
        return $output;
    }

    private function getChoicesVille(){
        $choices = $this->repository->findByVilleField();
        $output =[];
        $output["Toutes les villes"] = "Toutes les villes" ;
        foreach($choices as $v){
            $output[$v['VilleLocalite']] = $v['VilleLocalite'];
            //$output[$v] = $v;
        }
        return $output;
    }
   
}
