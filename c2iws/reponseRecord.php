<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class reponseRecord {
	/** 
	* @var  boolean
	*/
	public $bonne;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  int
	*/
	public $id;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  int
	*/
	public $num;
	/** 
	* @var  string
	*/
	public $qid;
	/** 
	* @var  string
	*/
	public $reponse;
	/* full constructor */
	 public function reponseRecord($bonne=false,$error='',$id=0,$id_etab=0,$num=0,$qid='',$reponse=''){
		 $this->bonne=$bonne   ;
		 $this->error=$error   ;
		 $this->id=$id   ;
		 $this->id_etab=$id_etab   ;
		 $this->num=$num   ;
		 $this->qid=$qid   ;
		 $this->reponse=$reponse   ;
	}
	/* get accessors */
	public function getBonne(){
		 return $this->bonne;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId(){
		 return $this->id;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getNum(){
		 return $this->num;
	}

	public function getQid(){
		 return $this->qid;
	}

	public function getReponse(){
		 return $this->reponse;
	}

	/*set accessors */
	public function setBonne($bonne){
		$this->bonne=$bonne;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setNum($num){
		$this->num=$num;
	}

	public function setQid($qid){
		$this->qid=$qid;
	}

	public function setReponse($reponse){
		$this->reponse=$reponse;
	}

}

?>
