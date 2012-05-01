<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class noteRecord {
	/** 
	* @var  int
	*/
	public $date;
	/** 
	* @var  string
	*/
	public $ip;
	/** 
	* @var  string
	*/
	public $login;
	/** 
	* @var  string
	*/
	public $numetudiant;
	/** 
	* @var  string
	*/
	public $origine;
	/** 
	* @var  float
	*/
	public $score;
	/* full constructor */
	 public function noteRecord($date=0,$ip='',$login='',$numetudiant='',$origine='',$score=0.0){
		 $this->date=$date   ;
		 $this->ip=$ip   ;
		 $this->login=$login   ;
		 $this->numetudiant=$numetudiant   ;
		 $this->origine=$origine   ;
		 $this->score=$score   ;
	}
	/* get accessors */
	public function getDate(){
		 return $this->date;
	}

	public function getIp(){
		 return $this->ip;
	}

	public function getLogin(){
		 return $this->login;
	}

	public function getNumetudiant(){
		 return $this->numetudiant;
	}

	public function getOrigine(){
		 return $this->origine;
	}

	public function getScore(){
		 return $this->score;
	}

	/*set accessors */
	public function setDate($date){
		$this->date=$date;
	}

	public function setIp($ip){
		$this->ip=$ip;
	}

	public function setLogin($login){
		$this->login=$login;
	}

	public function setNumetudiant($numetudiant){
		$this->numetudiant=$numetudiant;
	}

	public function setOrigine($origine){
		$this->origine=$origine;
	}

	public function setScore($score){
		$this->score=$score;
	}

}

?>
