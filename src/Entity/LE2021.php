<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ListeElectoraleRepository::class)
 * @ORM\Table(name="LE2021")
 * 
 */
class LE2021
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Bureau;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numelect;
    /**
     * @ORM\Column(type="string", length=8)
     *
     */
    private $Civilite;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $NomDusage;
    
     /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $Prenoms;

    /**
     *  @ORM\Column(type="string", length=255)
     */
    private $DateDeNaissance;

    /**
     *  @ORM\Column(type="string", length=255)
     */
    private $NumRue;

    /**
     *  @ORM\Column(type="string", length=255)
     */
    private $BisTerQuater;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("/^[0-9]{5}$/")
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Commune;


    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    //créer un slug
  /*  public function getSlug(): string
    {
        return (new Slugify())->slugify($this->title); 
    }*/

	public function getBureau() { 
 		return $this->Bureau; 
	} 

	public function setBureau($Bureau) {  
		$this->Bureau = $Bureau; 
	} 

	public function getNumelect() { 
 		return $this->Numelect; 
	} 

	public function setNumelect($Numelect) {  
		$this->Numelect = $Numelect; 
	} 

	public function getCivilite() { 
 		return $this->Civilite; 
	} 

	public function setCivilite($Civilite) {  
		$this->Civilite = $Civilite; 
	} 

	function getNom() { 
 		return $this->Nom; 
	} 

	function setNom($Nom) {  
		$this->Nom = $Nom; 
	} 

	function getNomDusage() { 
 		return $this->NomDusage; 
	} 

	function setNomDusage($NomDusage) {  
		$this->NomDusage = $NomDusage; 
	} 

	function getPrenoms() { 
 		return $this->Prenoms; 
	} 

	function setPrenoms($Prenoms) {  
		$this->Prenoms = $Prenoms; 
	} 

	function getDateDeNaissance() { 
 		return $this->DateDeNaissance; 
	} 

	function setDateDeNaissance($DateDeNaissance) {  
		$this->DateDeNaissance = $DateDeNaissance; 
	} 

	function getNumRue() { 
 		return $this->NumRue; 
	} 

	function setNumRue($NumRue) {  
		$this->NumRue = $NumRue; 
	} 

	function getBisTerQuater() { 
 		return $this->BisTerQuater; 
	} 

	function setBisTerQuater($BisTerQuater) {  
		$this->BisTerQuater = $BisTerQuater; 
	} 

	function getRue() { 
 		return $this->Rue; 
	} 

	function setRue($Rue) {  
		$this->Rue = $Rue; 
	} 

	function getCodePostal() { 
 		return $this->CodePostal; 
	} 

	function setCodePostal($CodePostal) {  
		$this->CodePostal = $CodePostal; 
	} 

	function getCommune() { 
 		return $this->Commune; 
	} 

	function setCommune($Commune) {  
		$this->Commune = $Commune; 
	} 
}