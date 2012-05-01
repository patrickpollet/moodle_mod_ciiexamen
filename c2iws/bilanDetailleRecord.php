<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class bilanDetailleRecord {
	/** 
	* @var  int
	*/
	public $date;
	/** 
	* @var  (scoreRecordArray) array of scoreRecord
	*/
	public $details;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $examen;
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
	 public function bilanDetailleRecord($date=0,$details=array(),$error='',$examen='',$ip='',$login='',$numetudiant='',$origine='',$score=0.0){
		 $this->date=$date   ;
		 $this->details=$details   ;
		 $this->error=$error   ;
		 $this->examen=$examen   ;
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

	public function getDetails(){
		 return $this->details;
	}

	public function getError(){
		 return $this->error;
	}

	public function getExamen(){
		 return $this->examen;
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

	public function setDetails($details){
		$this->details=$details;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setExamen($examen){
		$this->examen=$examen;
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
