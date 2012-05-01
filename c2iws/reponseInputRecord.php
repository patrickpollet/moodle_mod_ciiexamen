<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class reponseInputRecord {
	/** 
	* @var  integer
	*/
	public $id;
	/** 
	* @var  integer
	*/
	public $id_etab;
	/** 
	* @var  integer
	*/
	public $num;
	/** 
	* @var  string
	*/
	public $reponse;
	/** 
	* @var  string
	*/
	public $bonne;
	/* full constructor */
	 public function reponseInputRecord($id=0,$id_etab=0,$num=0,$reponse='',$bonne=''){
		 $this->id=$id   ;
		 $this->id_etab=$id_etab   ;
		 $this->num=$num   ;
		 $this->reponse=$reponse   ;
		 $this->bonne=$bonne   ;
	}
	/* get accessors */
	public function getId(){
		 return $this->id;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getNum(){
		 return $this->num;
	}

	public function getReponse(){
		 return $this->reponse;
	}

	public function getBonne(){
		 return $this->bonne;
	}

	/*set accessors */
	public function setId($id){
		$this->id=$id;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setNum($num){
		$this->num=$num;
	}

	public function setReponse($reponse){
		$this->reponse=$reponse;
	}

	public function setBonne($bonne){
		$this->bonne=$bonne;
	}

}

?>
