<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class qcmRecord {
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  examenRecord
	*/
	public $examen;
	/** 
	* @var  (qcmItemRecordArray) array of qcmItemRecord
	*/
	public $questions;
	/* full constructor */
	 public function qcmRecord($error='',$examen=NULL,$questions=array()){
		 $this->error=$error   ;
		 $this->examen=$examen   ;
		 $this->questions=$questions   ;
	}
	/* get accessors */
	public function getError(){
		 return $this->error;
	}

	public function getExamen(){
		 return $this->examen;
	}

	public function getQuestions(){
		 return $this->questions;
	}

	/*set accessors */
	public function setError($error){
		$this->error=$error;
	}

	public function setExamen($examen){
		$this->examen=$examen;
	}

	public function setQuestions($questions){
		$this->questions=$questions;
	}

}

?>
