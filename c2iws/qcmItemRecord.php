<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class qcmItemRecord {
	/** 
	* @var  (documentRecordArray) array of documentRecord
	*/
	public $documents;
	/** 
	* @var  questionRecord
	*/
	public $question;
	/** 
	* @var  (reponseRecordArray) array of reponseRecord
	*/
	public $reponses;
	/* full constructor */
	 public function qcmItemRecord($documents=array(),$question=NULL,$reponses=array()){
		 $this->documents=$documents   ;
		 $this->question=$question   ;
		 $this->reponses=$reponses   ;
	}
	/* get accessors */
	public function getDocuments(){
		 return $this->documents;
	}

	public function getQuestion(){
		 return $this->question;
	}

	public function getReponses(){
		 return $this->reponses;
	}

	/*set accessors */
	public function setDocuments($documents){
		$this->documents=$documents;
	}

	public function setQuestion($question){
		$this->question=$question;
	}

	public function setReponses($reponses){
		$this->reponses=$reponses;
	}

}

?>
