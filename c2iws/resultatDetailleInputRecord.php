<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class resultatDetailleInputRecord {
	/** 
	* @var  int
	*/
	public $date;
	/** 
	* @var  string
	*/
	public $login;
	/** 
	* @var  string
	*/
	public $question;
	/** 
	* @var  float
	*/
	public $score;
	/* full constructor */
	 public function resultatDetailleInputRecord($date=0,$login='',$question='',$score=0.0){
		 $this->date=$date   ;
		 $this->login=$login   ;
		 $this->question=$question   ;
		 $this->score=$score   ;
	}
	/* get accessors */
	public function getDate(){
		 return $this->date;
	}

	public function getLogin(){
		 return $this->login;
	}

	public function getQuestion(){
		 return $this->question;
	}

	public function getScore(){
		 return $this->score;
	}

	/*set accessors */
	public function setDate($date){
		$this->date=$date;
	}

	public function setLogin($login){
		$this->login=$login;
	}

	public function setQuestion($question){
		$this->question=$question;
	}

	public function setScore($score){
		$this->score=$score;
	}

}

?>
