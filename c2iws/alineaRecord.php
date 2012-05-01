<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class alineaRecord {
	/** 
	* @var  int
	*/
	public $alinea;
	/** 
	* @var  string
	*/
	public $aptitude;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $id;
	/** 
	* @var  string
	*/
	public $referentielc2i;
	/* full constructor */
	 public function alineaRecord($alinea=0,$aptitude='',$error='',$id='',$referentielc2i=''){
		 $this->alinea=$alinea   ;
		 $this->aptitude=$aptitude   ;
		 $this->error=$error   ;
		 $this->id=$id   ;
		 $this->referentielc2i=$referentielc2i   ;
	}
	/* get accessors */
	public function getAlinea(){
		 return $this->alinea;
	}

	public function getAptitude(){
		 return $this->aptitude;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId(){
		 return $this->id;
	}

	public function getReferentielc2i(){
		 return $this->referentielc2i;
	}

	/*set accessors */
	public function setAlinea($alinea){
		$this->alinea=$alinea;
	}

	public function setAptitude($aptitude){
		$this->aptitude=$aptitude;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setReferentielc2i($referentielc2i){
		$this->referentielc2i=$referentielc2i;
	}

}

?>
