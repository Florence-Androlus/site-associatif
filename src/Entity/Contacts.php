<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ContactsRepository::class)
 * 
 * 
 */
class Contacts
{
	const QUARTIER = [
        0 => 'Tous les quartiers',
		1 => 'blondeaux',
        2 => 'Centre',
		3 => 'Petit Robinson',
        4 => 'Vallée au renard',
		5 => 'Jardin parisien',
		6 => 'Jardin parisien castor',
        7 => 'Lallier paul hochard'
    ];

	 /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $Numbd;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numcontact;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $IDle2017;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $IDle2015;

    /**
     * @ORM\Column(type="string", length=12)
     *
     */
    private $Civilite;

    /**
     * @ORM\Column(type="string", length=40)
     * 
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=40)
     * 
     */
    private $NomDusage;
    
     /**
     * @ORM\Column(type="string", length=60)
     * 
     */
    private $Prenoms;

    /**
     *  @ORM\Column(type="string", length=10)
     */
    private $DateDeNaissance;

    /**
     *  @ORM\Column(type="string", length=18)
     */
    private $logements;

    /**
     *  @ORM\Column(type="string", length=22)
     */
    private $codeimmeuble;

    /**
     *  @ORM\Column(type="string", length=2)
     */
    private $Bureau;

    /**
     *  @ORM\Column(type="string", length=18)
     */
    private $ComplementDeLocalisation1;

    /**
     *  @ORM\Column(type="string", length=10)
     */
    private $ComplementDeLocalisation2;
    /**
     *  @ORM\Column(type="string", length=12)
     */
    private $NumeroVoie;

    /**
     *  @ORM\Column(type="string", length=9)
     */
    private $TypeVoie;


    /**
     * @ORM\Column(type="string", length=40)
     */
    private $rue;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $LieuDit;

    /**
     * @ORM\Column(type="string", length=6)
     * @Assert\Regex("/^[0-9]{5}$/")
     */
    private $CodePostal;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $VilleLocalite;

    /**
     * @ORM\Column(type="string", length=22)
     */
    private $quartier;
    
    /**
     * @ORM\Column(type="string", length=31)
     */
    private $tel;
    
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $mobile;
    
    /**
     * @ORM\Column(type="string", length=41)
     */
    private $email;
    
    /**
     * @ORM\Column(type="string", length=1)
     */
    private $desinscrit;
    
    /**
     * @ORM\Column(type="string", length=8)
     */
    private $reseausociaux;
    
    /**
     * @ORM\Column(type="string", length=13)
     */
    private $taillefoyer;
    
    /**
     * @ORM\Column(type="string", length=3)
     */
    private $anciennete;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

	function getId() { 
		return $this->id; 
   } 

   function setId($id) {  
	   $this->id = $id; 
   }

	function getNumbd() { 
 		return $this->Numbd; 
	} 

	function setNumbd($Numbd) {  
		$this->Numbd = $Numbd; 
	} 

	function getNumcontact() { 
 		return $this->Numcontact; 
	} 

	function setNumcontact($Numcontact) {  
		$this->Numcontact = $Numcontact; 
	} 

	function getIDle2017() { 
 		return $this->IDle2017; 
	} 

	function setIDle2017($IDle) {  
		$this->IDle2017 = $IDle; 
	} 

	function getIDle2015() { 
 		return $this->IDle2015; 
	} 

	function setIDle2015($IDle) {  
		$this->IDle2015 = $IDle; 
	} 

	function getCivilite() { 
 		return $this->Civilite; 
	} 

	function setCivilite($Civilite) {  
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

	function getLogements() { 
 		return $this->logements; 
	} 

	function setLogements($logements) {  
		$this->logements = $logements; 
	} 

	function getCodeimmeuble() { 
 		return $this->codeimmeuble; 
	} 

	function setCodeimmeuble($codeimmeuble) {  
		$this->codeimmeuble = $codeimmeuble; 
	} 

	function getBureau() { 
 		return $this->Bureau; 
	} 

	function setBureau($Bureau) {  
		$this->Bureau = $Bureau; 
	} 

	function getComplementDeLocalisation1() { 
 		return $this->ComplementDeLocalisation1; 
	} 

	function setComplementDeLocalisation1($ComplementDeLocalisation1) {  
		$this->ComplementDeLocalisation1 = $ComplementDeLocalisation1; 
	} 

	function getComplementDeLocalisation2() { 
 		return $this->ComplementDeLocalisation2; 
	} 

	function setComplementDeLocalisation($ComplementDeLocalisation2) {  
		$this->ComplementDeLocalisation2 = $ComplementDeLocalisation2; 
	} 

	function getNumeroVoie() { 
 		return $this->NumeroVoie; 
	} 

	function setNumeroVoie($NumeroVoie) {  
		$this->NumeroVoie = $NumeroVoie; 
	} 

	function getTypeVoie() { 
 		return $this->TypeVoie; 
	} 

	function setTypeVoie($TypeVoie) {  
		$this->TypeVoie = $TypeVoie; 
	} 

	function getRue() { 
 		return $this->rue; 
	} 

	function setRue($rue) {  
		$this->rue = $rue; 
	} 

	function getLieuDit() { 
 		return $this->LieuDit; 
	} 

	function setLieuDit($LieuDit) {  
		$this->LieuDit = $LieuDit; 
	} 

	function getCodePostal() { 
 		return $this->CodePostal; 
	} 

	function setCodePostal($CodePostal) {  
		$this->CodePostal = $CodePostal; 
	} 

	function getVilleLocalite() { 
 		return $this->VilleLocalite; 
	} 

	function setVilleLocalite($VilleLocalite) {  
		$this->VilleLocalite = $VilleLocalite; 
	} 

	function getQuartier() { 
 		return $this->quartier; 
	} 

	function setQuartier($quartier) {  
		$this->quartier = $quartier; 
	} 

    public function getQuartierType(): ?string
    {
        return self::QUARTIER[$this->quartier];
    }

	function getTel() { 
 		return $this->tel; 
	} 

	function setTel($tel) {  
		$this->tel = $tel; 
	} 

	function getMobile() { 
 		return $this->mobile; 
	} 

	function setMobile($mobile) {  
		$this->mobile = $mobile; 
	} 

	function getEmail() { 
 		return $this->email; 
	} 

	function setEmail($email) {  
		$this->email = $email; 
	} 

	function getDesinscrit() { 
 		return $this->desinscrit; 
	} 

	function setDesinscrit($desinscrit) {  
		$this->desinscrit = $desinscrit; 
	} 

	function getReseausociaux() { 
 		return $this->reseausociaux; 
	} 

	function setReseausociaux($reseausociaux) {  
		$this->reseausociaux = $reseausociaux; 
	} 

	function getTaillefoyer() { 
 		return $this->taillefoyer; 
	} 

	function setTaillefoyer($taillefoyer) {  
		$this->taillefoyer = $taillefoyer; 
	} 

	function getAnciennete() { 
 		return $this->anciennete; 
	} 

	function setAnciennete($anciennete) {  
		$this->anciennete = $anciennete; 
	} 

	function getCommentaire() { 
 		return $this->commentaire; 
	} 

	function setCommentaire($commentaire) {  
		$this->commentaire = $commentaire; 
	} 
 
}