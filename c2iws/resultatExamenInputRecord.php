<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class resultatExamenInputRecord {
	/** 
	* @var  int
	*/
	public $date;
	/** 
	* @var  string
	*/
	public $login;
	/** 
	* @var  float
	*/
	public $score;
	/* full constructor */
	 public function resultatExamenInputRecord($date=0,$login='',$score=0.0){
		 $this->date=$date   ;
		 $this->login=$login   ;
		 $this->score=$score   ;
	}
	/* get accessors */
	public function getDate(){
		 return $this->date;
	}

	public function getLogin(){
		 return $this->login;
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

	public function setScore($score){
		$this->score=$score;
	}

}

?>
