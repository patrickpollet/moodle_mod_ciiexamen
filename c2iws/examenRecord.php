<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class examenRecord {
	/** 
	* @var  int
	*/
	public $affiche_chrono;
	/** 
	* @var  string
	*/
	public $auteur;
	/** 
	* @var  string
	*/
	public $auteur_mail;
	/** 
	* @var  string
	*/
	public $certification;
	/** 
	* @var  string
	*/
	public $correction;
	/** 
	* @var  string
	*/
	public $eid;
	/** 
	* @var  int
	*/
	public $envoi_resultat;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  int
	*/
	public $id_examen;
	/** 
	* @var  string
	*/
	public $langue;
	/** 
	* @var  string
	*/
	public $mot_de_passe;
	/** 
	* @var  int
	*/
	public $nbinscrits;
	/** 
	* @var  int
	*/
	public $nbpassages;
	/** 
	* @var  int
	*/
	public $nbquestions;
	/** 
	* @var  string
	*/
	public $nom_examen;
	/** 
	* @var  string
	*/
	public $ordre_q;
	/** 
	* @var  string
	*/
	public $ordre_r;
	/** 
	* @var  string
	*/
	public $positionnement;
	/** 
	* @var  string
	*/
	public $referentielc2i;
	/** 
	* @var  string
	*/
	public $resultat_mini;
	/** 
	* @var  string
	*/
	public $tags;
	/** 
	* @var  int
	*/
	public $ts_datecreation;
	/** 
	* @var  int
	*/
	public $ts_datedebut;
	/** 
	* @var  int
	*/
	public $ts_datefin;
	/** 
	* @var  int
	*/
	public $ts_datemodification;
	/** 
	* @var  int
	*/
	public $ts_dureelimitepassage;
	/** 
	* @var  string
	*/
	public $type_tirage;
	/** 
	* @var  int
	*/
	public $verouille;
	/** 
	* @var  int
	*/
	public $version_referentiel;
	/* full constructor */
	 public function examenRecord($affiche_chrono=0,$auteur='',$auteur_mail='',$certification='',$correction='',$eid='',$envoi_resultat=0,$error='',$id_etab=0,$id_examen=0,$langue='',$mot_de_passe='',$nbinscrits=0,$nbpassages=0,$nbquestions=0,$nom_examen='',$ordre_q='',$ordre_r='',$positionnement='',$referentielc2i='',$resultat_mini='',$tags='',$ts_datecreation=0,$ts_datedebut=0,$ts_datefin=0,$ts_datemodification=0,$ts_dureelimitepassage=0,$type_tirage='',$verouille=0,$version_referentiel=0){
		 $this->affiche_chrono=$affiche_chrono   ;
		 $this->auteur=$auteur   ;
		 $this->auteur_mail=$auteur_mail   ;
		 $this->certification=$certification   ;
		 $this->correction=$correction   ;
		 $this->eid=$eid   ;
		 $this->envoi_resultat=$envoi_resultat   ;
		 $this->error=$error   ;
		 $this->id_etab=$id_etab   ;
		 $this->id_examen=$id_examen   ;
		 $this->langue=$langue   ;
		 $this->mot_de_passe=$mot_de_passe   ;
		 $this->nbinscrits=$nbinscrits   ;
		 $this->nbpassages=$nbpassages   ;
		 $this->nbquestions=$nbquestions   ;
		 $this->nom_examen=$nom_examen   ;
		 $this->ordre_q=$ordre_q   ;
		 $this->ordre_r=$ordre_r   ;
		 $this->positionnement=$positionnement   ;
		 $this->referentielc2i=$referentielc2i   ;
		 $this->resultat_mini=$resultat_mini   ;
		 $this->tags=$tags   ;
		 $this->ts_datecreation=$ts_datecreation   ;
		 $this->ts_datedebut=$ts_datedebut   ;
		 $this->ts_datefin=$ts_datefin   ;
		 $this->ts_datemodification=$ts_datemodification   ;
		 $this->ts_dureelimitepassage=$ts_dureelimitepassage   ;
		 $this->type_tirage=$type_tirage   ;
		 $this->verouille=$verouille   ;
		 $this->version_referentiel=$version_referentiel   ;
	}
	/* get accessors */
	public function getAffiche_chrono(){
		 return $this->affiche_chrono;
	}

	public function getAuteur(){
		 return $this->auteur;
	}

	public function getAuteur_mail(){
		 return $this->auteur_mail;
	}

	public function getCertification(){
		 return $this->certification;
	}

	public function getCorrection(){
		 return $this->correction;
	}

	public function getEid(){
		 return $this->eid;
	}

	public function getEnvoi_resultat(){
		 return $this->envoi_resultat;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getId_examen(){
		 return $this->id_examen;
	}

	public function getLangue(){
		 return $this->langue;
	}

	public function getMot_de_passe(){
		 return $this->mot_de_passe;
	}

	public function getNbinscrits(){
		 return $this->nbinscrits;
	}

	public function getNbpassages(){
		 return $this->nbpassages;
	}

	public function getNbquestions(){
		 return $this->nbquestions;
	}

	public function getNom_examen(){
		 return $this->nom_examen;
	}

	public function getOrdre_q(){
		 return $this->ordre_q;
	}

	public function getOrdre_r(){
		 return $this->ordre_r;
	}

	public function getPositionnement(){
		 return $this->positionnement;
	}

	public function getReferentielc2i(){
		 return $this->referentielc2i;
	}

	public function getResultat_mini(){
		 return $this->resultat_mini;
	}

	public function getTags(){
		 return $this->tags;
	}

	public function getTs_datecreation(){
		 return $this->ts_datecreation;
	}

	public function getTs_datedebut(){
		 return $this->ts_datedebut;
	}

	public function getTs_datefin(){
		 return $this->ts_datefin;
	}

	public function getTs_datemodification(){
		 return $this->ts_datemodification;
	}

	public function getTs_dureelimitepassage(){
		 return $this->ts_dureelimitepassage;
	}

	public function getType_tirage(){
		 return $this->type_tirage;
	}

	public function getVerouille(){
		 return $this->verouille;
	}

	public function getVersion_referentiel(){
		 return $this->version_referentiel;
	}

	/*set accessors */
	public function setAffiche_chrono($affiche_chrono){
		$this->affiche_chrono=$affiche_chrono;
	}

	public function setAuteur($auteur){
		$this->auteur=$auteur;
	}

	public function setAuteur_mail($auteur_mail){
		$this->auteur_mail=$auteur_mail;
	}

	public function setCertification($certification){
		$this->certification=$certification;
	}

	public function setCorrection($correction){
		$this->correction=$correction;
	}

	public function setEid($eid){
		$this->eid=$eid;
	}

	public function setEnvoi_resultat($envoi_resultat){
		$this->envoi_resultat=$envoi_resultat;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setId_examen($id_examen){
		$this->id_examen=$id_examen;
	}

	public function setLangue($langue){
		$this->langue=$langue;
	}

	public function setMot_de_passe($mot_de_passe){
		$this->mot_de_passe=$mot_de_passe;
	}

	public function setNbinscrits($nbinscrits){
		$this->nbinscrits=$nbinscrits;
	}

	public function setNbpassages($nbpassages){
		$this->nbpassages=$nbpassages;
	}

	public function setNbquestions($nbquestions){
		$this->nbquestions=$nbquestions;
	}

	public function setNom_examen($nom_examen){
		$this->nom_examen=$nom_examen;
	}

	public function setOrdre_q($ordre_q){
		$this->ordre_q=$ordre_q;
	}

	public function setOrdre_r($ordre_r){
		$this->ordre_r=$ordre_r;
	}

	public function setPositionnement($positionnement){
		$this->positionnement=$positionnement;
	}

	public function setReferentielc2i($referentielc2i){
		$this->referentielc2i=$referentielc2i;
	}

	public function setResultat_mini($resultat_mini){
		$this->resultat_mini=$resultat_mini;
	}

	public function setTags($tags){
		$this->tags=$tags;
	}

	public function setTs_datecreation($ts_datecreation){
		$this->ts_datecreation=$ts_datecreation;
	}

	public function setTs_datedebut($ts_datedebut){
		$this->ts_datedebut=$ts_datedebut;
	}

	public function setTs_datefin($ts_datefin){
		$this->ts_datefin=$ts_datefin;
	}

	public function setTs_datemodification($ts_datemodification){
		$this->ts_datemodification=$ts_datemodification;
	}

	public function setTs_dureelimitepassage($ts_dureelimitepassage){
		$this->ts_dureelimitepassage=$ts_dureelimitepassage;
	}

	public function setType_tirage($type_tirage){
		$this->type_tirage=$type_tirage;
	}

	public function setVerouille($verouille){
		$this->verouille=$verouille;
	}

	public function setVersion_referentiel($version_referentiel){
		$this->version_referentiel=$version_referentiel;
	}

}

?>
