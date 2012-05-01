<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class questionInputRecord {
	/** 
	* @var  int
	*/
	public $alinea;
	/** 
	* @var  int
	*/
	public $alineaV2;
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
	public $etat;
	/** 
	* @var  int
	*/
	public $id;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  int
	*/
	public $id_famille_proposee;
	/** 
	* @var  string
	*/
	public $langue;
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
	public $referentielc2iV2;
	/** 
	* @var  string
	*/
	public $tags;
	/** 
	* @var  string
	*/
	public $titre;
	/** 
	* @var  int
	*/
	public $ts_datecreation;
	/** 
	* @var  int
	*/
	public $ts_datemodification;
	/** 
	* @var  int
	*/
	public $ts_dateutilisation;
	/* full constructor */
	 public function questionInputRecord($alinea=0,$alineaV2=0,$auteur='',$auteur_mail='',$certification='',$etat='',$id=0,$id_etab=0,$id_famille_proposee=0,$langue='',$positionnement='',$referentielc2i='',$referentielc2iV2='',$tags='',$titre='',$ts_datecreation=0,$ts_datemodification=0,$ts_dateutilisation=0){
		 $this->alinea=$alinea   ;
		 $this->alineaV2=$alineaV2   ;
		 $this->auteur=$auteur   ;
		 $this->auteur_mail=$auteur_mail   ;
		 $this->certification=$certification   ;
		 $this->etat=$etat   ;
		 $this->id=$id   ;
		 $this->id_etab=$id_etab   ;
		 $this->id_famille_proposee=$id_famille_proposee   ;
		 $this->langue=$langue   ;
		 $this->positionnement=$positionnement   ;
		 $this->referentielc2i=$referentielc2i   ;
		 $this->referentielc2iV2=$referentielc2iV2   ;
		 $this->tags=$tags   ;
		 $this->titre=$titre   ;
		 $this->ts_datecreation=$ts_datecreation   ;
		 $this->ts_datemodification=$ts_datemodification   ;
		 $this->ts_dateutilisation=$ts_dateutilisation   ;
	}
	/* get accessors */
	public function getAlinea(){
		 return $this->alinea;
	}

	public function getAlineaV2(){
		 return $this->alineaV2;
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

	public function getEtat(){
		 return $this->etat;
	}

	public function getId(){
		 return $this->id;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getId_famille_proposee(){
		 return $this->id_famille_proposee;
	}

	public function getLangue(){
		 return $this->langue;
	}

	public function getPositionnement(){
		 return $this->positionnement;
	}

	public function getReferentielc2i(){
		 return $this->referentielc2i;
	}

	public function getReferentielc2iV2(){
		 return $this->referentielc2iV2;
	}

	public function getTags(){
		 return $this->tags;
	}

	public function getTitre(){
		 return $this->titre;
	}

	public function getTs_datecreation(){
		 return $this->ts_datecreation;
	}

	public function getTs_datemodification(){
		 return $this->ts_datemodification;
	}

	public function getTs_dateutilisation(){
		 return $this->ts_dateutilisation;
	}

	/*set accessors */
	public function setAlinea($alinea){
		$this->alinea=$alinea;
	}

	public function setAlineaV2($alineaV2){
		$this->alineaV2=$alineaV2;
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

	public function setEtat($etat){
		$this->etat=$etat;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setId_famille_proposee($id_famille_proposee){
		$this->id_famille_proposee=$id_famille_proposee;
	}

	public function setLangue($langue){
		$this->langue=$langue;
	}

	public function setPositionnement($positionnement){
		$this->positionnement=$positionnement;
	}

	public function setReferentielc2i($referentielc2i){
		$this->referentielc2i=$referentielc2i;
	}

	public function setReferentielc2iV2($referentielc2iV2){
		$this->referentielc2iV2=$referentielc2iV2;
	}

	public function setTags($tags){
		$this->tags=$tags;
	}

	public function setTitre($titre){
		$this->titre=$titre;
	}

	public function setTs_datecreation($ts_datecreation){
		$this->ts_datecreation=$ts_datecreation;
	}

	public function setTs_datemodification($ts_datemodification){
		$this->ts_datemodification=$ts_datemodification;
	}

	public function setTs_dateutilisation($ts_dateutilisation){
		$this->ts_dateutilisation=$ts_dateutilisation;
	}

}

?>
