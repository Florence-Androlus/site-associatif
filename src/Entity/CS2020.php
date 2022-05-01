<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=CS2020Repository::class)
 * 
 * 
 */
class CS2020
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
    private $Numcontact;

    /**
     * @ORM\Column(type="integer")
     */
    private $_1erdons;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $types1erdons;

    /**
     * @ORM\Column(type="date")
     */
    private $Date1erdons;

    /**
     * @ORM\Column(type="string", length=9)
     *
     */
    private $Mois1erdons;

    /**
     * @ORM\Column(type="string", length=3)
     * 
     */
    private $_2edons;

    /**
     * @ORM\Column(type="string", length=6)
     * 
     */
    private $types2edons;
    
     /**
     * @ORM\Column(type="string", length=10)
     * 
     */
    private $Date2emedons;

    /**
     *  @ORM\Column(type="string", length=9)
     */
    private $Mois2emedons;

    /**
     *  @ORM\Column(type="string", length=2)
     */
    private $_3edons;

    /**
     *  @ORM\Column(type="string", length=6)
     */
    private $types3edons;

    /**
     *  @ORM\Column(type="string", length=10)
     */
    private $Date3emedons;

    /**
     *  @ORM\Column(type="string", length=7)
     */
    private $Mois3emedons;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $Nouvadherent;
    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $remerciement;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $doleance;



	function getId() { 
		return $this->id; 
   } 

   function setId($id) {  
	   $this->id = $id; 
   }

	function getNumcontact() { 
 		return $this->Numcontact; 
	} 

	function setNumcontact($Numcontact) {  
		$this->Numcontact = $Numcontact; 
	} 

	function getcs1erdons() { 
		return $this->_1erdons; 
   } 

   function setcs1erdons($_1erdons) {  
	   $this->_1erdons = $_1erdons; 
   } 

	function getTypes1erdons() { 
 		return $this->types1erdons; 
	} 

	function setTypes1erdons($types1erdons) {  
		$this->types1erdons = $types1erdons; 
	} 

	function getDate1erdons() { 
 		return $this->Date1erdons; 
	} 

	function setDate1erdons($Date1erdons) {  
		$this->Date1erdons = $Date1erdons; 
	} 

	function getMois1erdons() { 
 		return $this->Mois1erdons; 
	} 

	function setMois1erdons($Mois1erdons) {  
		$this->Mois1erdons = $Mois1erdons; 
	} 

	function get_2edons() { 
 		return $this->_2edons; 
	} 

	function set_2edons($_2edons) {  
		$this->_2edons = $_2edons; 
	} 

	function getTypes2edons() { 
 		return $this->types2edons; 
	} 

	function setTypes2edons($types2edons) {  
		$this->types2edons = $types2edons; 
	} 

	function getDate2emedons() { 
 		return $this->Date2emedons; 
	} 

	function setDate2emedons($Date2emedons) {  
		$this->Date2emedons = $Date2emedons; 
	} 

	function getMois2emedons() { 
 		return $this->Mois2emedons; 
	} 

	function setMois2emedons($Mois2emedons) {  
		$this->Mois2emedons = $Mois2emedons; 
	} 

	function get3edons() { 
 		return $this->_3edons; 
	} 

	function set3edons($_3edons) {  
		$this->_3edons = $_3edons; 
	} 

	function getTypes3edons() { 
 		return $this->types3edons; 
	} 

	function setTypes3edons($types3edons) {  
		$this->types3edons = $types3edons; 
	} 

	function getDate3emedons() { 
 		return $this->Date3emedons; 
	} 

	function setDate3emedons($Date3emedons) {  
		$this->Date3emedons = $Date3emedons; 
	} 

	function getMois3emedons() { 
 		return $this->Mois3emedons; 
	} 

	function setMois3emedons($Mois3emedons) {  
		$this->Mois3emedons = $Mois3emedons; 
	} 

	function getNouvadherent() { 
 		return $this->Nouvadherent; 
	} 

	function setNouvadherent($Nouvadherent) {  
		$this->Nouvadherent = $Nouvadherent; 
	} 

	function getRemerciement() { 
 		return $this->remerciement; 
	} 

	function setRemerciement($remerciement) {  
		$this->remerciement = $remerciement; 
	} 

	function getDoleance() { 
 		return $this->doleance; 
	} 

	function setDoleance($doleance) {  
		$this->doleance = $doleance; 
	} 
 
}