<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass=SensibiliteRepository::class)
 * 
 * 
 */
class Sensibilite
{
	 /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=1)
     */
    private $contact;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $adherent;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $soutiens;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $remerciesoutiens ;

    /**
     * @ORM\Column(type="string", length=4)
     *
     */
    private $sympathisant;

    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $questionnaire;

    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $remerciequestionnaire;
    
     /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $electeur;

    /**
     *  @ORM\Column(type="string", length=2)
     */
    private $bureau;

    /**
     *  @ORM\Column(type="string", length=1)
     */
    private $degressympathieVJ;

    /**
     *  @ORM\Column(type="string", length=1)
     */
    private $degressympathieump;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $CS2014;

    /**
     *  @ORM\Column(type="string", length=7)
     */
    private $adhesionpbl2015;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $adhesionpbl2016;
    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $adhesionpbl2017;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $adhesionpbl2018;
   /**
     * @ORM\Column(type="string", length=4)
     */

    private $adhesionpbl2019 ;

    /**
     * @ORM\Column(type="string", length=4)
     *
     */
    private $adhesionpbl2020;

    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $adhesionpbl2021;

    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
	private $adhesionpbl2022;

    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $CS2020;
    
     /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    private $CSdep2015;

    /**
     *  @ORM\Column(type="string", length=2)
     */
    private $remerciedep2015;

    /**
     *  @ORM\Column(type="string", length=1)
     */
    private $questionnairedep2015;

    /**
     *  @ORM\Column(type="string", length=1)
     */
    private $CSdep2021;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $soutienregionale2015;

    /**
     *  @ORM\Column(type="string", length=7)
     */
    private $remerciereg2015;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $soutienBLM;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $blackliste;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $decede;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $maisonretraite;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $habiteplusacetteadresse;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $habitepluslhay;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $petitiontransport;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $petitionseve0616;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $petitionredressementville;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $atimbrer;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $consultationcoeurdeville;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $consultationlocarno;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $consultationpaulhochard;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $neplusappeler;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $tenuebureau;

    /**
     *  @ORM\Column(type="string", length=4)
     */
    private $inscriptionreunion;

	function getId() { 
		return $this->id; 
   } 

   function setId($id) {  
	   $this->id = $id; 
   }

	function getContact() { 
 		return $this->contact; 
	} 

	function setContact($contact) {  
		$this->contact = $contact; 
	} 

	function getAdherents() { 
		return $this->adherent; 
   } 

   function setAdherent($adherent) {  
	   $this->adherent = $adherent; 
   } 

	function getSoutiens() { 
 		return $this->soutiens; 
	} 

	function setSoutiens($soutiens) {  
		$this->soutiens = $soutiens; 
	} 

	function getRemerciesoutiens() { 
 		return $this->remerciesoutiens; 
	} 

	function setRemerciesoutiens($remerciesoutiens) {  
		$this->remerciesoutiens = $remerciesoutiens; 
	} 

	function getSympathisant() { 
 		return $this->sympathisant; 
	} 

	function setSympathisant($sympathisant) {  
		$this->sympathisant = $sympathisant; 
	} 



	function getQuestionnaire() { 
 		return $this->questionnaire; 
	} 

	function setQuestionnaire($questionnaire) {  
		$this->questionnaire = $questionnaire; 
	} 

	function getRemerciequestionnaire() { 
 		return $this->remerciequestionnaire; 
	} 

	function setRemerciequestionnaire($remerciequestionnaire) {  
		$this->remerciequestionnaire = $remerciequestionnaire; 
	} 

	function getElecteur() { 
 		return $this->electeur; 
	} 

	function setElecteur($electeur) {  
		$this->electeur = $electeur; 
	} 

	function getBureau() { 
 		return $this->bureau; 
	} 

	function setBureau($bureau) {  
		$this->bureau = $bureau; 
	} 

	function getDegressympathieVJ() { 
 		return $this->degressympathieVJ; 
	} 

	function setDegressympathieVJ($degressympathieVJ) {  
		$this->degressympathieVJ = $degressympathieVJ; 
	} 

	function getDegressympathieump() { 
 		return $this->degressympathieump; 
	} 

	function setDegressympathieump($degressympathieump) {  
		$this->degressympathieump = $degressympathieump; 
	} 


	function getCS2014() { 
 		return $this->CS2014; 
	} 

	function setCS2014($CS2014) {  
		$this->CS2014 = $CS2014; 
	} 

	function getAdhesionpbl2015() { 
 		return $this->adhesionpbl2015; 
	} 

	function setAdhesionpbl2015($adhesionpbl2015) {  
		$this->adhesionpbl2015 = $adhesionpbl2015; 
	} 

	function getAdhesionpbl2016() { 
		return $this->adhesionpbl2016; 
   } 

   function setAdhesionpbl2016($adhesionpbl2016) {  
	   $this->adhesionpbl2016 = $adhesionpbl2016; 
   } 
   
	function getAdhesionpbl2017() { 
		return $this->adhesionpbl2017; 
   } 

   function setAdhesionpbl2017($adhesionpbl2017) {  
	   $this->adhesionpbl2017 = $adhesionpbl2017; 
   } 
   
	function getAdhesionpbl2018() { 
		return $this->adhesionpbl2018; 
   } 

   function setAdhesionpbl2018($adhesionpbl2018) {  
	   $this->adhesionpbl2018 = $adhesionpbl2018; 
   } 
   
	function getAdhesionpbl2019() { 
		return $this->adhesionpbl2019; 
   } 

   function setAdhesionpbl2019($adhesionpbl2019) {  
	   $this->adhesionpbl2019 = $adhesionpbl2019; 
   } 
   
	function getAdhesionpbl2020() { 
		return $this->adhesionpbl2020; 
   } 

   function setAdhesionpbl2020($adhesionpbl2020) {  
	   $this->adhesionpbl2020 = $adhesionpbl2020; 
   } 
   
	function getAdhesionpbl2021() { 
		return $this->adhesionpbl2021; 
   } 

   function setAdhesionpbl2021($adhesionpbl2021) {  
	   $this->adhesionpbl2021 = $adhesionpbl2021; 
   } 
      
	function getAdhesionpbl2022() { 
		return $this->adhesionpbl2022; 
   } 

   function setAdhesionpbl2022($adhesionpbl2022) {  
	   $this->adhesionpbl2022 = $adhesionpbl2022; 
   } 

	function getCS2020() { 
 		return $this->CS2020; 
	} 

	function setCS2020($CS2020) {  
		$this->CS2020 = $CS2020; 
	} 

	function getCSdep2015() { 
 		return $this->CSdep2015; 
	} 

	function setCSdep2015($CSdep2015) {  
		$this->CSdep2015 = $CSdep2015; 
	} 

	function getRemerciedep2015() { 
 		return $this->remerciedep2015; 
	} 

	function setRemerciedep2015($remerciedep2015) {  
		$this->remerciedep2015 = $remerciedep2015; 
	} 

	function getQuestionnairedep2015() { 
 		return $this->questionnairedep2015; 
	} 

	function setQuestionnairedep2015($questionnairedep2015) {  
		$this->questionnairedep2015 = $questionnairedep2015; 
	} 

	function getCSdep2021() { 
 		return $this->CSdep2021; 
	} 

	function setCSdep2021($CSdep2021) {  
		$this->CSdep2021 = $CSdep2021; 
	} 

	function getSoutienregionale2015() { 
 		return $this->soutienregionale2015; 
	} 

	function setSoutienregionale2015($soutienregionale2015) {  
		$this->soutienregionale2015 = $soutienregionale2015; 
	} 

	function getRemerciereg2015() { 
 		return $this->remerciereg2015; 
	} 

	function setRemerciereg2015($remerciereg2015) {  
		$this->remerciereg2015 = $remerciereg2015; 
	} 

	function getSoutienBLM() { 
 		return $this->soutienBLM; 
	} 

	function setSoutienBLM($soutienBLM) {  
		$this->soutienBLM = $soutienBLM; 
	} 

	function getBlackliste() { 
 		return $this->blackliste; 
	} 

	function setBlackliste($blackliste) {  
		$this->blackliste = $blackliste; 
	} 

	function getDecede() { 
 		return $this->decede; 
	} 

	function setDecede($decede) {  
		$this->decede = $decede; 
	} 

	function getMaisonretraite() { 
 		return $this->maisonretraite; 
	} 

	function setMaisonretraite($maisonretraite) {  
		$this->maisonretraite = $maisonretraite; 
	} 

	function getHabiteplusacetteadresse() { 
 		return $this->habiteplusacetteadresse; 
	} 

	function setHabiteplusacetteadresse($habiteplusacetteadresse) {  
		$this->habiteplusacetteadresse = $habiteplusacetteadresse; 
	} 

	function getHabitepluslhay() { 
 		return $this->habitepluslhay; 
	} 

	function setHabitepluslhay($habitepluslhay) {  
		$this->habitepluslhay = $habitepluslhay; 
	} 

	function getPetitiontransport() { 
 		return $this->petitiontransport; 
	} 

	function setPetitiontransport($petitiontransport) {  
		$this->petitiontransport = $petitiontransport; 
	} 

	function getPetitionseve0616() { 
 		return $this->petitionseve0616; 
	} 

	function setPetitionseve0616($petitionseve0616) {  
		$this->petitionseve0616 = $petitionseve0616; 
	} 

	function getPetitionredressementville() { 
 		return $this->petitionredressementville; 
	} 

	function setPetitionredressementville($petitionredressementville) {  
		$this->petitionredressementville = $petitionredressementville; 
	} 

	function getAtimbrer() { 
 		return $this->atimbrer; 
	} 

	function setAtimbrer($atimbrer) {  
		$this->atimbrer = $atimbrer; 
	} 

	function getConsultationcoeurdeville() { 
 		return $this->consultationcoeurdeville; 
	} 

	function setConsultationcoeurdeville($consultationcoeurdeville) {  
		$this->consultationcoeurdeville = $consultationcoeurdeville; 
	} 

	function getConsultationlocarno() { 
 		return $this->consultationlocarno; 
	} 

	function setConsultationlocarno($consultationlocarno) {  
		$this->consultationlocarno = $consultationlocarno; 
	} 

	function getConsultationpaulhochard() { 
 		return $this->consultationpaulhochard; 
	} 

	function setConsultationpaulhochard($consultationpaulhochard) {  
		$this->consultationpaulhochard = $consultationpaulhochard; 
	} 

	function getNeplusappeler() { 
 		return $this->neplusappeler; 
	} 

	function setNeplusappeler($neplusappeler) {  
		$this->neplusappeler = $neplusappeler; 
	} 

	function getTenuebureau() { 
 		return $this->tenuebureau; 
	} 

	function setTenuebureau($tenuebureau) {  
		$this->tenuebureau = $tenuebureau; 
	} 

	function getInscriptionreunion() { 
 		return $this->inscriptionreunion; 
	} 

	function setInscriptionreunion($inscriptionreunion) {  
		$this->inscriptionreunion = $inscriptionreunion; 
	} 
}