<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class documentInputRecord {
	/** 
	* @var  integer
	*/
	public $id;
	/** 
	* @var  integer
	*/
	public $id_etab;
	/** 
	* @var  string
	*/
	public $id_doc;
	/** 
	* @var  string
	*/
	public $extension;
	/** 
	* @var  string
	*/
	public $description;
	/** 
	* @var  string
	*/
	public $base64;
	/* full constructor */
	 public function documentInputRecord($id=0,$id_etab=0,$id_doc='',$extension='',$description='',$base64=''){
		 $this->id=$id   ;
		 $this->id_etab=$id_etab   ;
		 $this->id_doc=$id_doc   ;
		 $this->extension=$extension   ;
		 $this->description=$description   ;
		 $this->base64=$base64   ;
	}
	/* get accessors */
	public function getId(){
		 return $this->id;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getId_doc(){
		 return $this->id_doc;
	}

	public function getExtension(){
		 return $this->extension;
	}

	public function getDescription(){
		 return $this->description;
	}

	public function getBase64(){
		 return $this->base64;
	}

	/*set accessors */
	public function setId($id){
		$this->id=$id;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setId_doc($id_doc){
		$this->id_doc=$id_doc;
	}

	public function setExtension($extension){
		$this->extension=$extension;
	}

	public function setDescription($description){
		$this->description=$description;
	}

	public function setBase64($base64){
		$this->base64=$base64;
	}

}

?>
