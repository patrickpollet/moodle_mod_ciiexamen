<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class etablissementRecord {
	/** 
	* @var  int
	*/
	public $certification;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  int
	*/
	public $id_etab;
	/** 
	* @var  int
	*/
	public $locale;
	/** 
	* @var  int
	*/
	public $nationale;
	/** 
	* @var  string
	*/
	public $nom_etab;
	/** 
	* @var  int
	*/
	public $pere;
	/** 
	* @var  int
	*/
	public $positionnement;
	/* full constructor */
	 public function etablissementRecord($certification=0,$error='',$id_etab=0,$locale=0,$nationale=0,$nom_etab='',$pere=0,$positionnement=0){
		 $this->certification=$certification   ;
		 $this->error=$error   ;
		 $this->id_etab=$id_etab   ;
		 $this->locale=$locale   ;
		 $this->nationale=$nationale   ;
		 $this->nom_etab=$nom_etab   ;
		 $this->pere=$pere   ;
		 $this->positionnement=$positionnement   ;
	}
	/* get accessors */
	public function getCertification(){
		 return $this->certification;
	}

	public function getError(){
		 return $this->error;
	}

	public function getId_etab(){
		 return $this->id_etab;
	}

	public function getLocale(){
		 return $this->locale;
	}

	public function getNationale(){
		 return $this->nationale;
	}

	public function getNom_etab(){
		 return $this->nom_etab;
	}

	public function getPere(){
		 return $this->pere;
	}

	public function getPositionnement(){
		 return $this->positionnement;
	}

	/*set accessors */
	public function setCertification($certification){
		$this->certification=$certification;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setId_etab($id_etab){
		$this->id_etab=$id_etab;
	}

	public function setLocale($locale){
		$this->locale=$locale;
	}

	public function setNationale($nationale){
		$this->nationale=$nationale;
	}

	public function setNom_etab($nom_etab){
		$this->nom_etab=$nom_etab;
	}

	public function setPere($pere){
		$this->pere=$pere;
	}

	public function setPositionnement($positionnement){
		$this->positionnement=$positionnement;
	}

}

?>
