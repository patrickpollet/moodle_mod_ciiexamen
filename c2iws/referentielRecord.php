<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class referentielRecord {
	/** 
	* @var  string
	*/
	public $domaine;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $referentielc2i;
	/* full constructor */
	 public function referentielRecord($domaine='',$error='',$referentielc2i=''){
		 $this->domaine=$domaine   ;
		 $this->error=$error   ;
		 $this->referentielc2i=$referentielc2i   ;
	}
	/* get accessors */
	public function getDomaine(){
		 return $this->domaine;
	}

	public function getError(){
		 return $this->error;
	}

	public function getReferentielc2i(){
		 return $this->referentielc2i;
	}

	/*set accessors */
	public function setDomaine($domaine){
		$this->domaine=$domaine;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setReferentielc2i($referentielc2i){
		$this->referentielc2i=$referentielc2i;
	}

}

?>
