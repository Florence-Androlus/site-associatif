<?php

namespace App\Form;

use App\Entity\User;
use App\Repository\RoleRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class UserType extends AbstractType
{
     /**
     * @var RoleRepository
     * 
     */
    private $repository;

    public function __construct(RoleRepository $repository)
    {
         $this->repository = $repository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('username')
        ->add('firstname')
        ->add('email')
        ->add('roles', ChoiceType::class, [
              'choices' => $this->getChoices(),
              'expanded' => true,
              'multiple' => true,
              'label' => 'Rôles' 
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'translation_domain'=>'forms'
        ]);
    }

    private function getChoices(){
        $choices = $this->repository->findAll();
        $output =[];
        foreach($choices as $v){
            $output[$v->getDefinition()] = $v->getName();
        }
        return $output;
    }
}
