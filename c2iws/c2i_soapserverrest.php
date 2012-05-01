<?php
/**
 * c2i_soapserverrest class file
 *
 * @author    Patrick Pollet :<patrick.pollet@insa-lyon.fr>
 * @copyright (c) P.Pollet 2007 under GPL
 * @package   MoodleWS
 */

define('DEBUG',true);
/**
 * bilanDetailleRecord class
 */
require_once 'bilanDetailleRecord.php';
/**
 * scoreRecord class
 */
require_once 'scoreRecord.php';
/**
 * inscritInputRecord class
 */
require_once 'inscritInputRecord.php';
/**
 * inscritRecord class
 */
require_once 'inscritRecord.php';
/**
 * examenInputRecord class
 */
require_once 'examenInputRecord.php';
/**
 * examenRecord class
 */
require_once 'examenRecord.php';
/**
 * personnelInputRecord class
 */
require_once 'personnelInputRecord.php';
/**
 * personnelRecord class
 */
require_once 'personnelRecord.php';
/**
 * stringRecord class
 */
require_once 'stringRecord.php';
/**
 * resultatExamenInputRecord class
 */
require_once 'resultatExamenInputRecord.php';
/**
 * resultatDetailleInputRecord class
 */
require_once 'resultatDetailleInputRecord.php';
/**
 * questionInputRecord class
 */
require_once 'questionInputRecord.php';
/**
 * questionRecord class
 */
require_once 'questionRecord.php';
/**
 * alineaRecord class
 */
require_once 'alineaRecord.php';
/**
 * documentRecord class
 */
require_once 'documentRecord.php';
/**
 * etablissementRecord class
 */
require_once 'etablissementRecord.php';
/**
 * familleRecord class
 */
require_once 'familleRecord.php';
/**
 * lienRecord class
 */
require_once 'lienRecord.php';
/**
 * noteRecord class
 */
require_once 'noteRecord.php';
/**
 * notionRecord class
 */
require_once 'notionRecord.php';
/**
 * qcmRecord class
 */
require_once 'qcmRecord.php';
/**
 * qcmItemRecord class
 */
require_once 'qcmItemRecord.php';
/**
 * reponseRecord class
 */
require_once 'reponseRecord.php';
/**
 * referentielRecord class
 */
require_once 'referentielRecord.php';
/**
 * loginReturn class
 */
require_once 'loginReturn.php';

/**
 * c2i_soapserverrest class
		* the two attributes are made public for debugging purpose
		* i.e. accessing $client->client->__getLast* methods
		 *
 *
 *
 * @author    Patrick Pollet :<patrick.pollet@insa-lyon.fr>
 * @copyright (c) P.Pollet 2007 under GPL
 * @package   MoodleWS
 */
class c2i_soapserverrest {

	    private $serviceurl='';
		private $formatout='php';
	    private $verbose=false;
	    private $postdata='';
	    public $requestResponse='';


		/**
		 * Constructor method
		 * @param string $wsdl URL of the WSDL
		 * @param string $uri
		 * @param string[] $options  Soap Client options array (see PHP5 documentation)
		 * @return c2i_soapserverrest
		 */
		  public function c2i_soapserverrest($serviceurl = "http://prope.insa-lyon.fr/c2i/V1.5/ws/service.php", $options = array()) {
     $this->serviceurl=$serviceurl;
      $this->verbose=! empty($options['trace']);
 		if (!empty($options['formatout']))
     			$this->setFormatout($options['formatout']);
  }


      private function castTo($className,$res){
        	if ($this->formatout==='php') return $res;
            if (class_exists($className)) {
                $aux= new $className();
                foreach ($res as $key=>$value)
                    $aux->$key=$value;
                return $aux;
             } else
                return $res;
        }



	/**
	 * @param string
	 */
	function __call ($methodname, $params) {
		$params['wsformatout']=$this->formatout;
		$params['wsfunction']=$methodname;
		$this->postdata = http_build_query($params,'','&');

		//print_r($this);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->serviceurl);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->postdata);
		if ($this->verbose)
			curl_setopt($ch, CURLOPT_VERBOSE, true);
		$this->requestResponse = curl_exec($ch);
		//print_r("retour curl".$this->requestResponse);
		curl_close($ch);
		if ($methodname==='login') return $this->deserialize($this->requestResponse,'php');
		else return $this->deserialize($this->requestResponse);

	}



	function deserialize ($data,$formatout='') {
		$formatout=$formatout?$formatout:$this->formatout;
       // $data=utf8_encode($data);
		switch ($formatout) {
			case 'xml':break;
			case 'json':break;
			case 'php':$data=unserialize($data); break;
			case 'dump':break;
		}
		return $data;
	}

	function getFormatout() {
		return $this->formatout;
	}

	function setFormatout($formatout='php') {
		if (empty($formatout)) $formatout='php';
		$this->formatout=$formatout;
	}

	function getPostdata() {
		return $this->postdata;
	}

	function getRequestResponse() {
		return $this->requestResponse;
	}


	  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $id_examen
   * @return boolean
   */
  public function a_passe_examen($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->__call('a_passe_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $idcandidat
   * @param string $idfield
   * @param string $idexamen
   * @param string $listequestions
   * @param string[] $listereponses
   * @return bilanDetailleRecord[]
   */
  public function corrige_examen($client, $sesskey, $idcandidat, $idfield, $idexamen, $listequestions, $listereponses) {
    $res= $this->__call('corrige_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'idcandidat'=>$idcandidat,
            'idfield'=>$idfield,
            'idexamen'=>$idexamen,
            'listequestions'=>$listequestions,
            'listereponses'=>$listereponses
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param inscritInputRecord $candidat
   * @return inscritRecord
   */
  public function cree_candidat($client, $sesskey, inscritInputRecord $candidat) {
    $res= $this->__call('cree_candidat', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'candidat'=>$candidat
      ));
  return $this->castTo ('inscritRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param inscritInputRecord[] $candidats
   * @return inscritRecord[]
   */
  public function cree_candidats($client, $sesskey, $candidats) {
    $res= $this->__call('cree_candidats', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'candidats'=>$candidats
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param examenInputRecord $examen
   * @param int $id_etab
   * @return examenRecord
   */
  public function cree_examen($client, $sesskey, examenInputRecord $examen, $id_etab) {
    $res= $this->__call('cree_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'examen'=>$examen,
            'id_etab'=>$id_etab
      ));
  return $this->castTo ('examenRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param personnelInputRecord $personnel
   * @return personnelRecord
   */
  public function cree_personnel($client, $sesskey, personnelInputRecord $personnel) {
    $res= $this->__call('cree_personnel', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'personnel'=>$personnel
      ));
  return $this->castTo ('personnelRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param string[] $candidats
   * @param string $idfield
   * @return stringRecord[]
   */
  public function desinscrit_examen($client, $sesskey, $id_examen, $candidats, $idfield) {
    $res= $this->__call('desinscrit_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen,
            'candidats'=>$candidats,
            'idfield'=>$idfield
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return boolean
   */
  public function deverouille_examen($client, $sesskey, $id_examen) {
    $res= $this->__call('deverouille_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param string $type_pf
   * @param resultatExamenInputRecord[] $copies
   * @param resultatDetailleInputRecord[] $details
   * @return boolean
   */
  public function envoi_examen($client, $sesskey, $id_examen, $type_pf, $copies, $details) {
    $res= $this->__call('envoi_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen,
            'type_pf'=>$type_pf,
            'copies'=>$copies,
            'details'=>$details
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param questionInputRecord[] $questions
   * @return questionRecord[]
   */
  public function envoi_questions($client, $sesskey, $questions) {
    $res= $this->__call('envoi_questions', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'questions'=>$questions
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $id_examen
   * @return boolean
   */
  public function est_inscrit_examen($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->__call('est_inscrit_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_ref
   * @return alineaRecord[]
   */
  public function get_alineas($client, $sesskey, $id_ref) {
    $res= $this->__call('get_alineas', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_ref'=>$id_ref
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param int $type
   * @return bilanDetailleRecord[]
   */
  public function get_bilans_detailles_examen($client, $sesskey, $id_examen, $type) {
    $res= $this->__call('get_bilans_detailles_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen,
            'type'=>$type
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return bilanDetailleRecord[]
   */
  public function get_bilans_examen($client, $sesskey, $id_examen) {
    $res= $this->__call('get_bilans_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $id_examen
   * @return string
   */
  public function get_corrige_examen_html($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->__call('get_corrige_examen_html', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_question
   * @return documentRecord[]
   */
  public function get_documents($client, $sesskey, $id_question) {
    $res= $this->__call('get_documents', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_question'=>$id_question
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id
   * @return etablissementRecord
   */
  public function get_etablissement($client, $sesskey, $id) {
    $res= $this->__call('get_etablissement', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id'=>$id
      ));
  return $this->castTo ('etablissementRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param int $id_pere
   * @return etablissementRecord[]
   */
  public function get_etablissements($client, $sesskey, $id_pere) {
    $res= $this->__call('get_etablissements', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_pere'=>$id_pere
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id
   * @return examenRecord
   */
  public function get_examen($client, $sesskey, $id) {
    $res= $this->__call('get_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id'=>$id
      ));
  return $this->castTo ('examenRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @param string $id_etab
   * @return examenRecord[]
   */
  public function get_examens($client, $sesskey, $typep, $id_etab) {
    $res= $this->__call('get_examens', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'typep'=>$typep,
            'id_etab'=>$id_etab
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return examenRecord[]
   */
  public function get_examens_bytags($client, $sesskey, $tags) {
    $res= $this->__call('get_examens_bytags', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'tags'=>$tags
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $typep
   * @return examenRecord[]
   */
  public function get_examens_inscrit($client, $sesskey, $userid, $idfield, $typep) {
    $res= $this->__call('get_examens_inscrit', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'typep'=>$typep
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return familleRecord[]
   */
  public function get_familles($client, $sesskey) {
    $res= $this->__call('get_familles', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @return inscritRecord
   */
  public function get_inscrit($client, $sesskey, $userid, $idfield) {
    $res= $this->__call('get_inscrit', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield
      ));
  return $this->castTo ('inscritRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return inscritRecord[]
   */
  public function get_inscrits($client, $sesskey, $id_examen) {
    $res= $this->__call('get_inscrits', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return inscritRecord[]
   */
  public function get_inscrits_bytags($client, $sesskey, $tags) {
    $res= $this->__call('get_inscrits_bytags', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'tags'=>$tags
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param int $id_notion
   * @return lienRecord[]
   */
  public function get_liens($client, $sesskey, $id_notion) {
    $res= $this->__call('get_liens', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_notion'=>$id_notion
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return noteRecord[]
   */
  public function get_notes_examen($client, $sesskey, $id_examen) {
    $res= $this->__call('get_notes_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return notionRecord[]
   */
  public function get_notions($client, $sesskey) {
    $res= $this->__call('get_notions', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $id_examen
   * @return string
   */
  public function get_parcours_examen_html($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->__call('get_parcours_examen_html', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param int $timestart
   * @return noteRecord[]
   */
  public function get_passages_recents($client, $sesskey, $id_examen, $timestart) {
    $res= $this->__call('get_passages_recents', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen,
            'timestart'=>$timestart
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @return personnelRecord
   */
  public function get_personnel($client, $sesskey, $userid, $idfield) {
    $res= $this->__call('get_personnel', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield
      ));
  return $this->castTo ('personnelRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return qcmRecord
   */
  public function get_qcm($client, $sesskey, $id_examen) {
    $res= $this->__call('get_qcm', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
  return $this->castTo ('qcmRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id
   * @return questionRecord
   */
  public function get_question($client, $sesskey, $id) {
    $res= $this->__call('get_question', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id'=>$id
      ));
  return $this->castTo ('questionRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return questionRecord[]
   */
  public function get_questions($client, $sesskey, $id_examen) {
    $res= $this->__call('get_questions', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return questionRecord[]
   */
  public function get_questions_bytags($client, $sesskey, $tags) {
    $res= $this->__call('get_questions_bytags', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'tags'=>$tags
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return questionRecord[]
   */
  public function get_questions_obsoletes($client, $sesskey, $typep) {
    $res= $this->__call('get_questions_obsoletes', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'typep'=>$typep
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return referentielRecord[]
   */
  public function get_referentiels($client, $sesskey) {
    $res= $this->__call('get_referentiels', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_question
   * @return reponseRecord[]
   */
  public function get_reponses($client, $sesskey, $id_question) {
    $res= $this->__call('get_reponses', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_question'=>$id_question
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $userid
   * @param string $idfield
   * @param string $id_examen
   * @return string
   */
  public function get_resultats_examen_html($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->__call('get_resultats_examen_html', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'userid'=>$userid,
            'idfield'=>$idfield,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $idcandidat
   * @param string $idfield
   * @param string $idexamen
   * @return bilanDetailleRecord[]
   */
  public function get_score_candidat($client, $sesskey, $idcandidat, $idfield, $idexamen) {
    $res= $this->__call('get_score_candidat', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'idcandidat'=>$idcandidat,
            'idfield'=>$idfield,
            'idexamen'=>$idexamen
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $idcandidat
   * @param string $idfield
   * @param string $typep
   * @param int $consolid
   * @return bilanDetailleRecord[]
   */
  public function get_scores_candidat($client, $sesskey, $idcandidat, $idfield, $typep, $consolid) {
    $res= $this->__call('get_scores_candidat', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'idcandidat'=>$idcandidat,
            'idfield'=>$idfield,
            'typep'=>$typep,
            'consolid'=>$consolid
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return string
   */
  public function get_themeurl($client, $sesskey) {
    $res= $this->__call('get_themeurl', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return questionRecord[]
   */
  public function get_toutes_questions($client, $sesskey, $typep) {
    $res= $this->__call('get_toutes_questions', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'typep'=>$typep
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return qcmItemRecord[]
   */
  public function get_toutes_questions_et_reponses($client, $sesskey, $typep) {
    $res= $this->__call('get_toutes_questions_et_reponses', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'typep'=>$typep
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return personnelRecord[]
   */
  public function get_utilisateurs_bytags($client, $sesskey, $tags) {
    $res= $this->__call('get_utilisateurs_bytags', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'tags'=>$tags
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return string
   */
  public function get_version($client, $sesskey) {
    $res= $this->__call('get_version', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param string[] $candidats
   * @param string $idfield
   * @param string $tags
   * @return stringRecord[]
   */
  public function inscrit_examen($client, $sesskey, $id_examen, $candidats, $idfield, $tags) {
    $res= $this->__call('inscrit_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen,
            'candidats'=>$candidats,
            'idfield'=>$idfield,
            'tags'=>$tags
      ));
   return $res;
  }

  /**
   *
   *
   * @param string $username
   * @param string $password
   * @return loginReturn
   */
  public function login($username, $password) {
    $res= $this->__call('login', array(
            'username'=>$username,
            'password'=>$password
      ));
  return $this->castTo ('loginReturn',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return boolean
   */
  public function logout($client, $sesskey) {
    $res= $this->__call('logout', array(
            'client'=>$client,
            'sesskey'=>$sesskey
      ));
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $idexamen
   * @param examenInputRecord $examen
   * @return examenRecord
   */
  public function modifie_examen($client, $sesskey, $idexamen, examenInputRecord $examen) {
    $res= $this->__call('modifie_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'idexamen'=>$idexamen,
            'examen'=>$examen
      ));
  return $this->castTo ('examenRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return boolean
   */
  public function verouille_examen($client, $sesskey, $id_examen) {
    $res= $this->__call('verouille_examen', array(
            'client'=>$client,
            'sesskey'=>$sesskey,
            'id_examen'=>$id_examen
      ));
   return $res;
  }

}

?>
