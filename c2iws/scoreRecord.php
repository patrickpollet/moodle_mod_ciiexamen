<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class scoreRecord {
	/** 
	* @var  string
	*/
	public $competence;
	/** 
	* @var  float
	*/
	public $score;
	/* full constructor */
	 public function scoreRecord($competence='',$score=0.0){
		 $this->competence=$competence   ;
		 $this->score=$score   ;
	}
	/* get accessors */
	public function getCompetence(){
		 return $this->competence;
	}

	public function getScore(){
		 return $this->score;
	}

	/*set accessors */
	public function setCompetence($competence){
		$this->competence=$competence;
	}

	public function setScore($score){
		$this->score=$score;
	}

}

?>
