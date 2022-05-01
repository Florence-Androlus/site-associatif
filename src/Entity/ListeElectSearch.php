<?php

namespace App\Entity;

Class ListeElectSearch
{
    /**
     * @var string
     */
    private $bureau;

    /**
     * @var string
     */
    private $Nom;

    /**
     * @var string
     */
    private $rue;


    public function getBureau()
    {
        return $this->bureau;
    }

    public function setBureau($bureau): ListeElectSearch
    {
        $this->bureau = $bureau;

        return $this;
    }

    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom($Nom): ListeElectSearch
    {
        $this->Nom = $Nom;
        return $this;
    }

    public function getRue()
    { 
        return $this->rue; 
    } 

    public function setRue($rue): ListeElectSearch
    {  
        $this->rue = $rue; 

        return $this;
    } 


}