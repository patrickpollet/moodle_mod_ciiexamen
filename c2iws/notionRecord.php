<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class notionRecord {
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
	public $error;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  int
	*/
	public $id_notion;
	/** 
	* @var  string
	*/
	public $libelle;
	/** 
	* @var  string
	*/
	public $nid;
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
	public $ts_datemodification;
	/* full constructor */
	 public function notionRecord($alinea=0,$alineaV2=0,$error='',$id_etab=0,$id_notion=0,$libelle='',$nid='',$referentielc2i='',$referentielc2iV2='',$tags='',$ts_datecreation=0,$ts_datemodification=0){
		 $this->alinea=$alinea   ;
		 $this->alineaV2=$alineaV2   ;
		 $this->error=$error   ;
		 $this->id_etab=$id_etab   ;
		 $this->id_notion=$id_notion   ;
		 $this->libelle=$libelle   ;
		 $this->nid=$nid   ;
		 $this->referentielc2i=$referentielc2i   ;
		 $this->referentielc2iV2=$referentielc2iV2   ;
		 $this->tags=$tags   ;
		 $this->ts_datecreation=$ts_datecreation   ;
		 $this->ts_datemodification=$ts_datemodification   ;
	}
	/* get accessors */
	public function getAlinea(){
		 return $this->alinea;
	}

	public function getAlineaV2(){
		 return $this->alineaV2;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getId_notion(){
		 return $this->id_notion;
	}

	public function getLibelle(){
		 return $this->libelle;
	}

	public function getNid(){
		 return $this->nid;
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

	public function getTs_datemodification(){
		 return $this->ts_datemodification;
	}

	/*set accessors */
	public function setAlinea($alinea){
		$this->alinea=$alinea;
	}

	public function setAlineaV2($alineaV2){
		$this->alineaV2=$alineaV2;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setId_notion($id_notion){
		$this->id_notion=$id_notion;
	}

	public function setLibelle($libelle){
		$this->libelle=$libelle;
	}

	public function setNid($nid){
		$this->nid=$nid;
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

	public function setTs_datemodification($ts_datemodification){
		$this->ts_datemodification=$ts_datemodification;
	}

}

?>
