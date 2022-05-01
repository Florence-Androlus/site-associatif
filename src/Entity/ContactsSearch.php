<?php

namespace App\Entity;

Class ContactsSearch
{
    /**
     * @var string
     */
    private $bureau;

    /**
     * @var string
     */
    private $rue;

     /**
     * @var string
     */
    private $VilleLocalite;

    /**
     * @var string
     */
    private $quartier;

    public function getBureau()
    {
        return $this->bureau;
    }

    public function setBureau($bureau): ContactsSearch
    {
        $this->bureau = $bureau;
        return $this;
    }

	public function getRue()
    { 
        return $this->rue; 
    } 

    public function setRue($rue): ContactsSearch
    {  
        $this->rue = $rue; 

        return $this;
    } 

	function getVilleLocalite() { 
        return $this->VilleLocalite; 
   } 

   function setVilleLocalite($VilleLocalite): ContactsSearch 
   {  
       $this->VilleLocalite = $VilleLocalite; 

       return $this;
   } 

	public function getQuartier()
    { 
        return $this->quartier; 
    } 

    public function setQuartier($quartier): ContactsSearch
    {  
        $this->quartier = $quartier; 

        return $this;
    } 

}