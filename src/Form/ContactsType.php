<?php

namespace App\Form;

use App\Entity\Contacts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ContactsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Numbd')
            ->add('Numcontact')
            ->add('IDleleg')
            ->add('IDledep')
            ->add('Civilite')
            ->add('Nom')
            ->add('NomDusage')
            ->add('Prenoms')
            ->add('DateDeNaissance')
            ->add('logements')
            ->add('codeimmeuble')
            ->add('Bureau')
            ->add('ComplementDeLocalisation1')
            ->add('ComplementDeLocalisation2')
            ->add('NumeroVoie')
            ->add('TypeVoie')
            ->add('rue')
            ->add('LieuDit')
            ->add('CodePostal')
            ->add('ville')
            ->add('quartier')
            ->add('tel')
            ->add('mobile')
            ->add('email')
            ->add('desinscrit')
            ->add('reseausociaux')
            ->add('taillefoyer')
            ->add('anciennete')
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contacts::class,
            'data_class' => null,
        ]);
    }

}
