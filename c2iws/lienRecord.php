<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class lienRecord {
	/** 
	* @var  string
	*/
	public $URL;
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
	public $id_notion;
	/** 
	* @var  string
	*/
	public $origine;
	/* full constructor */
	 public function lienRecord($URL='',$error='',$id=0,$id_notion=0,$origine=''){
		 $this->URL=$URL   ;
		 $this->error=$error   ;
		 $this->id=$id   ;
		 $this->id_notion=$id_notion   ;
		 $this->origine=$origine   ;
	}
	/* get accessors */
	public function getURL(){
		 return $this->URL;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId(){
		 return $this->id;
	}

	public function getId_notion(){
		 return $this->id_notion;
	}

	public function getOrigine(){
		 return $this->origine;
	}

	/*set accessors */
	public function setURL($URL){
		$this->URL=$URL;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setId_notion($id_notion){
		$this->id_notion=$id_notion;
	}

	public function setOrigine($origine){
		$this->origine=$origine;
	}

}

?>
