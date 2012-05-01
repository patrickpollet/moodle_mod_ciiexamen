<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class personnelRecord {
	/** 
	* @var  string
	*/
	public $auth;
	/** 
	* @var  string
	*/
	public $email;
	/** 
	* @var  string
	*/
	public $error;
	/** 
	* @var  int
	*/
	public $etablissement;
	/** 
	* @var  int
	*/
	public $id;
	/** 
	* @var  string
	*/
	public $login;
	/** 
	* @var  string
	*/
	public $nom;
	/** 
	* @var  string
	*/
	public $numetudiant;
	/** 
	* @var  string
	*/
	public $origine;
	/** 
	* @var  string
	*/
	public $prenom;
	/** 
	* @var  string
	*/
	public $profils;
	/** 
	* @var  string
	*/
	public $tags;
	/** 
	* @var  int
	*/
	public $ts_datecreation;
	/** 
	* @var  int
	*/
	public $ts_datemodification;
	/** 
	* @var  int
	*/
	public $ts_derniere_connexion;
	/* full constructor */
	 public function personnelRecord($auth='',$email='',$error='',$etablissement=0,$id=0,$login='',$nom='',$numetudiant='',$origine='',$prenom='',$profils='',$tags='',$ts_datecreation=0,$ts_datemodification=0,$ts_derniere_connexion=0){
		 $this->auth=$auth   ;
		 $this->email=$email   ;
		 $this->error=$error   ;
		 $this->etablissement=$etablissement   ;
		 $this->id=$id   ;
		 $this->login=$login   ;
		 $this->nom=$nom   ;
		 $this->numetudiant=$numetudiant   ;
		 $this->origine=$origine   ;
		 $this->prenom=$prenom   ;
		 $this->profils=$profils   ;
		 $this->tags=$tags   ;
		 $this->ts_datecreation=$ts_datecreation   ;
		 $this->ts_datemodification=$ts_datemodification   ;
		 $this->ts_derniere_connexion=$ts_derniere_connexion   ;
	}
	/* get accessors */
	public function getAuth(){
		 return $this->auth;
	}

	public function getEmail(){
		 return $this->email;
	}

	public function getError(){
		 return $this->error;
	}

	public function getEtablissement(){
		 return $this->etablissement;
	}

	public function getId(){
		 return $this->id;
	}

	public function getLogin(){
		 return $this->login;
	}

	public function getNom(){
		 return $this->nom;
	}

	public function getNumetudiant(){
		 return $this->numetudiant;
	}

	public function getOrigine(){
		 return $this->origine;
	}

	public function getPrenom(){
		 return $this->prenom;
	}

	public function getProfils(){
		 return $this->profils;
	}

	public function getTags(){
		 return $this->tags;
	}

	public function getTs_datecreation(){
		 return $this->ts_datecreation;
	}

	public function getTs_datemodification(){
		 return $this->ts_datemodification;
	}

	public function getTs_derniere_connexion(){
		 return $this->ts_derniere_connexion;
	}

	/*set accessors */
	public function setAuth($auth){
		$this->auth=$auth;
	}

	public function setEmail($email){
		$this->email=$email;
	}

	public function setError($error){
		$this->error=$error;
	}

	public function setEtablissement($etablissement){
		$this->etablissement=$etablissement;
	}

	public function setId($id){
		$this->id=$id;
	}

	public function setLogin($login){
		$this->login=$login;
	}

	public function setNom($nom){
		$this->nom=$nom;
	}

	public function setNumetudiant($numetudiant){
		$this->numetudiant=$numetudiant;
	}

	public function setOrigine($origine){
		$this->origine=$origine;
	}

	public function setPrenom($prenom){
		$this->prenom=$prenom;
	}

	public function setProfils($profils){
		$this->profils=$profils;
	}

	public function setTags($tags){
		$this->tags=$tags;
	}

	public function setTs_datecreation($ts_datecreation){
		$this->ts_datecreation=$ts_datecreation;
	}

	public function setTs_datemodification($ts_datemodification){
		$this->ts_datemodification=$ts_datemodification;
	}

	public function setTs_derniere_connexion($ts_derniere_connexion){
		$this->ts_derniere_connexion=$ts_derniere_connexion;
	}

}

?>
