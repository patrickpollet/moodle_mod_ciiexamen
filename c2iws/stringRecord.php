<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class stringRecord {
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  string
	*/
	public $value;
	/* full constructor */
	 public function stringRecord($error='',$value=''){
		 $this->error=$error   ;
		 $this->value=$value   ;
	}
	/* get accessors */
	public function getError(){
		 return $this->error;
	}

	public function getValue(){
		 return $this->value;
	}

	/*set accessors */
	public function setError($error){
		$this->error=$error;
	}

	public function setValue($value){
		$this->value=$value;
	}

}

?>
