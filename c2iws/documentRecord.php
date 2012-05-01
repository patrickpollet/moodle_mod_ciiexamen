<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class documentRecord {
	/** 
	* @var  string
	*/
	public $base64;
	/** 
	* @var  string
	*/
	public $description;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $extension;
	/** 
	* @var  int
	*/
	public $id;
	/** 
	* @var  string
	*/
	public $id_doc;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  string
	*/
	public $qid;
	/* full constructor */
	 public function documentRecord($base64='',$description='',$error='',$extension='',$id=0,$id_doc='',$id_etab=0,$qid=''){
		 $this->base64=$base64   ;
		 $this->description=$description   ;
		 $this->error=$error   ;
		 $this->extension=$extension   ;
		 $this->id=$id   ;
		 $this->id_doc=$id_doc   ;
		 $this->id_etab=$id_etab   ;
		 $this->qid=$qid   ;
	}
	/* get accessors */
	public function getBase64(){
		 return $this->base64;
	}

	public function getDescription(){
		 return $this->description;
	}

	public function getError(){
		 return $this->error;
	}

	public function getExtension(){
		 return $this->extension;
	}

	public function getId(){
		 return $this->id;
	}

	public function getId_doc(){
		 return $this->id_doc;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getQid(){
		 return $this->qid;
	}

	/*set accessors */
	public function setBase64($base64){
		$this->base64=$base64;
	}

	public function setDescription($description){
		$this->description=$description;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setExtension($extension){
		$this->extension=$extension;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setId_doc($id_doc){
		$this->id_doc=$id_doc;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setQid($qid){
		$this->qid=$qid;
	}

}

?>
