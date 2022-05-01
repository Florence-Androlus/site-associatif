<?php

namespace App\Entity;

Class CSSearch
{
    /**
     * @var string
     */
    private $Nom;

    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom($Nom): CSSearch
    {
        $this->Nom = $Nom;
        return $this;
    }

}