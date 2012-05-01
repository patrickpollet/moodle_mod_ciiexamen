<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class familleRecord {
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
	public $commentaires;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $famille;
	/** 
	* @var  int
	*/
	public $idf;
	/** 
	* @var  string
	*/
	public $mots_clesf;
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
	* @var  int
	*/
	public $ts_datecreation;
	/** 
	* @var  int
	*/
	public $ts_dateutilisation;
	/* full constructor */
	 public function familleRecord($alinea=0,$alineaV2=0,$auteur='',$auteur_mail='',$commentaires='',$error='',$famille='',$idf=0,$mots_clesf='',$referentielc2i='',$referentielc2iV2='',$tags='',$ts_datecreation=0,$ts_dateutilisation=0){
		 $this->alinea=$alinea   ;
		 $this->alineaV2=$alineaV2   ;
		 $this->auteur=$auteur   ;
		 $this->auteur_mail=$auteur_mail   ;
		 $this->commentaires=$commentaires   ;
		 $this->error=$error   ;
		 $this->famille=$famille   ;
		 $this->idf=$idf   ;
		 $this->mots_clesf=$mots_clesf   ;
		 $this->referentielc2i=$referentielc2i   ;
		 $this->referentielc2iV2=$referentielc2iV2   ;
		 $this->tags=$tags   ;
		 $this->ts_datecreation=$ts_datecreation   ;
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

	public function getCommentaires(){
		 return $this->commentaires;
	}

	public function getError(){
		 return $this->error;
	}

	public function getFamille(){
		 return $this->famille;
	}

	public function getIdf(){
		 return $this->idf;
	}

	public function getMots_clesf(){
		 return $this->mots_clesf;
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

	public function getTs_datecreation(){
		 return $this->ts_datecreation;
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

	public function setCommentaires($commentaires){
		$this->commentaires=$commentaires;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setFamille($famille){
		$this->famille=$famille;
	}

	public function setIdf($idf){
		$this->idf=$idf;
	}

	public function setMots_clesf($mots_clesf){
		$this->mots_clesf=$mots_clesf;
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

	public function setTs_datecreation($ts_datecreation){
		$this->ts_datecreation=$ts_datecreation;
	}

	public function setTs_dateutilisation($ts_dateutilisation){
		$this->ts_dateutilisation=$ts_dateutilisation;
	}

}

?>
