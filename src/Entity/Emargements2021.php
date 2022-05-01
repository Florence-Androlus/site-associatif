<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmargementsRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=EmargementsRepository::class)
 * 
 * 
 */
class Emargements2021
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
    private $Avote;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $mandant_bureau;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $mandant_Numelect;
    
     /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $mandataire_bureau;

    /**
     *  @ORM\Column(type="string", length=255)
     */
    private $mandataire_Numelectr;

    public function getId(): ?int
    {
        return $this->id;
    }

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

	public function getAvote() { 
 		return $this->Avote; 
	} 

	public function setAvote($Avote) {  
		$this->Avote = $Avote; 
	} 

	function getMandantBureau() { 
 		return $this->mandant_bureau; 
	} 

	function setMandantBureau($mandant_bureau) {  
		$this->mandant_bureau = $mandant_bureau; 
	} 

	function getMandantNumelect() { 
 		return $this->mandant_Numelect; 
	} 

	function setMandantNumelect($mandant_Numelect) {  
		$this->mandant_Numelect = $mandant_Numelect; 
	} 

	function getMandataireBureau() { 
 		return $this->mandataire_bureau; 
	} 

	function setMandataireBureau($mandataire_bureau) {  
		$this->mandataire_bureau = $mandataire_bureau; 
	} 

	function getMandataireNumelectr() { 
 		return $this->mandataire_Numelectr; 
	} 

	function setMandataireNumelectr($mandataire_Numelectr) {  
		$this->mandataire_Numelectr = $mandataire_Numelectr; 
	} 

}