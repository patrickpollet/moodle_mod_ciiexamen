<?php
/**
 * 
 * 
 * @package	MoodleWS
 * @copyright	(c) P.Pollet 2007 under GPL
 */
class personnelInputRecord {
	/** 
	* @var  string
	*/
	public $auth;
	/** 
	* @var  string
	*/
	public $email;
	/** 
	* @var  int
	*/
	public $etablissement;
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
	public $password;
	/** 
	* @var  string
	*/
	public $prenom;
	/** 
	* @var  string
	*/
	public $tags;
	/* full constructor */
	 public function personnelInputRecord($auth='',$email='',$etablissement=0,$login='',$nom='',$numetudiant='',$origine='',$password='',$prenom='',$tags=''){
		 $this->auth=$auth   ;
		 $this->email=$email   ;
		 $this->etablissement=$etablissement   ;
		 $this->login=$login   ;
		 $this->nom=$nom   ;
		 $this->numetudiant=$numetudiant   ;
		 $this->origine=$origine   ;
		 $this->password=$password   ;
		 $this->prenom=$prenom   ;
		 $this->tags=$tags   ;
	}
	/* get accessors */
	public function getAuth(){
		 return $this->auth;
	}

	public function getEmail(){
		 return $this->email;
	}

	public function getEtablissement(){
		 return $this->etablissement;
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

	public function getPassword(){
		 return $this->password;
	}

	public function getPrenom(){
		 return $this->prenom;
	}

	public function getTags(){
		 return $this->tags;
	}

	/*set accessors */
	public function setAuth($auth){
		$this->auth=$auth;
	}

	public function setEmail($email){
		$this->email=$email;
	}

	public function setEtablissement($etablissement){
		$this->etablissement=$etablissement;
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

	public function setPassword($password){
		$this->password=$password;
	}

	public function setPrenom($prenom){
		$this->prenom=$prenom;
	}

	public function setTags($tags){
		$this->tags=$tags;
	}

}

?>
