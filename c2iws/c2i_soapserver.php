<?php
/**
 * c2i_soapserver class file
 *
 * @author    Patrick Pollet :<patrick.pollet@insa-lyon.fr>
 * @copyright (c) P.Pollet 2007 under GPL
 * @package   MoodleWS
 */

define('DEBUG',true);
if (DEBUG) ini_set('soap.wsdl_cache_enabled', '0');  // no caching by php in debug mode

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
 * referentielRecord class
 */
require_once 'referentielRecord.php';
/**
 * loginReturn class
 */
require_once 'loginReturn.php';

/**
 * c2i_soapserver class
 *
 *
 *
 * @author    Patrick Pollet :<patrick.pollet@insa-lyon.fr>
 * @copyright (c) P.Pollet 2007 under GPL
 * @package   MoodleWS
 */
class c2i_soapserver {

  public $client;

  private $uri = 'http://prope.insa-lyon.fr/c2i/V1.5/ws/wsdl';

  public function c2i_soapserver($wsdl = "http://localhost/c2i/V1.5/ws/wsdl.php", $uri=null, $options = array('encoding'=>'UTF-8')) {
    if($uri != null) {
      $this->uri = $uri;
    };
    $this->client = new SoapClient($wsdl, $options);
  }

  function castTo($className,$res){
     if (class_exists($className)) {
        $aux= new $className();
        foreach ($res as $key=>$value)
             $aux->$key=$value;
        return $aux;
     } else
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
  public function a_passe_examen($client, $sesskey, $userid, $idfield, $id_examen) {
    $res= $this->client->__call('a_passe_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
   * @param (stringArray) array of string $listereponses
   * @return bilanDetailleRecordArray
   */
  public function corrige_examen($client, $sesskey, $idcandidat, $idfield, $idexamen, $listequestions, $listereponses) {
    $res= $this->client->__call('corrige_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($idcandidat, 'idcandidat'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($idexamen, 'idexamen'),
            new SoapParam($listequestions, 'listequestions'),
            new SoapParam($listereponses, 'listereponses')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('cree_candidat', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($candidat, 'candidat')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('inscritRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param (inscritInputRecordArray) array of inscritInputRecord $candidats
   * @return inscritRecordArray
   */
  public function cree_candidats($client, $sesskey, $candidats) {
    $res= $this->client->__call('cree_candidats', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($candidats, 'candidats')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('cree_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($examen, 'examen'),
            new SoapParam($id_etab, 'id_etab')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('cree_personnel', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($personnel, 'personnel')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('personnelRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param (stringArray) array of string $candidats
   * @param string $idfield
   * @return stringRecordArray
   */
  public function desinscrit_examen($client, $sesskey, $id_examen, $candidats, $idfield) {
    $res= $this->client->__call('desinscrit_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen'),
            new SoapParam($candidats, 'candidats'),
            new SoapParam($idfield, 'idfield')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('deverouille_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param string $type_pf
   * @param (resultatExamenInputRecordArray) array of resultatExamenInputRecord $copies
   * @param (resultatDetailleInputRecordArray) array of resultatDetailleInputRecord $details
   * @return boolean
   */
  public function envoi_examen($client, $sesskey, $id_examen, $type_pf, $copies, $details) {
    $res= $this->client->__call('envoi_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen'),
            new SoapParam($type_pf, 'type_pf'),
            new SoapParam($copies, 'copies'),
            new SoapParam($details, 'details')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param (questionInputRecordArray) array of questionInputRecord $questions
   * @return questionRecordArray
   */
  public function envoi_questions($client, $sesskey, $questions) {
    $res= $this->client->__call('envoi_questions', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($questions, 'questions')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('est_inscrit_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_ref
   * @return alineaRecordArray
   */
  public function get_alineas($client, $sesskey, $id_ref) {
    $res= $this->client->__call('get_alineas', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_ref, 'id_ref')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param int $type
   * @return bilanDetailleRecordArray
   */
  public function get_bilans_detailles_examen($client, $sesskey, $id_examen, $type) {
    $res= $this->client->__call('get_bilans_detailles_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen'),
            new SoapParam($type, 'type')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return bilanDetailleRecordArray
   */
  public function get_bilans_examen($client, $sesskey, $id_examen) {
    $res= $this->client->__call('get_bilans_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_corrige_examen_html', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_question
   * @return documentRecordArray
   */
  public function get_documents($client, $sesskey, $id_question) {
    $res= $this->client->__call('get_documents', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_question, 'id_question')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_etablissement', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id, 'id')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('etablissementRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param int $id_pere
   * @return etablissementRecordArray
   */
  public function get_etablissements($client, $sesskey, $id_pere) {
    $res= $this->client->__call('get_etablissements', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_pere, 'id_pere')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id, 'id')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('examenRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $email
   * @return qcmRecord
   */
  public function get_examen_anonyme($client, $sesskey, $email) {
    $res= $this->client->__call('get_examen_anonyme', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($email, 'email')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('qcmRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @param string $id_etab
   * @return examenRecordArray
   */
  public function get_examens($client, $sesskey, $typep, $id_etab) {
    $res= $this->client->__call('get_examens', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($typep, 'typep'),
            new SoapParam($id_etab, 'id_etab')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return examenRecordArray
   */
  public function get_examens_bytags($client, $sesskey, $tags) {
    $res= $this->client->__call('get_examens_bytags', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($tags, 'tags')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
   * @return examenRecordArray
   */
  public function get_examens_inscrit($client, $sesskey, $userid, $idfield, $typep) {
    $res= $this->client->__call('get_examens_inscrit', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($typep, 'typep')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return familleRecordArray
   */
  public function get_familles($client, $sesskey) {
    $res= $this->client->__call('get_familles', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_inscrit', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('inscritRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return inscritRecordArray
   */
  public function get_inscrits($client, $sesskey, $id_examen) {
    $res= $this->client->__call('get_inscrits', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return inscritRecordArray
   */
  public function get_inscrits_bytags($client, $sesskey, $tags) {
    $res= $this->client->__call('get_inscrits_bytags', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($tags, 'tags')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param int $id_notion
   * @return lienRecordArray
   */
  public function get_liens($client, $sesskey, $id_notion) {
    $res= $this->client->__call('get_liens', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_notion, 'id_notion')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return noteRecordArray
   */
  public function get_notes_examen($client, $sesskey, $id_examen) {
    $res= $this->client->__call('get_notes_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return notionRecordArray
   */
  public function get_notions($client, $sesskey) {
    $res= $this->client->__call('get_notions', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_parcours_examen_html', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param int $timestart
   * @return noteRecordArray
   */
  public function get_passages_recents($client, $sesskey, $id_examen, $timestart) {
    $res= $this->client->__call('get_passages_recents', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen'),
            new SoapParam($timestart, 'timestart')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_personnel', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_qcm', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_question', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id, 'id')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
  return $this->castTo ('questionRecord',$res);
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @return questionRecordArray
   */
  public function get_questions($client, $sesskey, $id_examen) {
    $res= $this->client->__call('get_questions', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return questionRecordArray
   */
  public function get_questions_bytags($client, $sesskey, $tags) {
    $res= $this->client->__call('get_questions_bytags', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($tags, 'tags')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return questionRecordArray
   */
  public function get_questions_obsoletes($client, $sesskey, $typep) {
    $res= $this->client->__call('get_questions_obsoletes', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($typep, 'typep')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @return referentielRecordArray
   */
  public function get_referentiels($client, $sesskey) {
    $res= $this->client->__call('get_referentiels', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_question
   * @return reponseRecordArray
   */
  public function get_reponses($client, $sesskey, $id_question) {
    $res= $this->client->__call('get_reponses', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_question, 'id_question')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_resultats_examen_html', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($userid, 'userid'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
   * @return bilanDetailleRecordArray
   */
  public function get_score_candidat($client, $sesskey, $idcandidat, $idfield, $idexamen) {
    $res= $this->client->__call('get_score_candidat', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($idcandidat, 'idcandidat'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($idexamen, 'idexamen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
   * @return bilanDetailleRecordArray
   */
  public function get_scores_candidat($client, $sesskey, $idcandidat, $idfield, $typep, $consolid) {
    $res= $this->client->__call('get_scores_candidat', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($idcandidat, 'idcandidat'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($typep, 'typep'),
            new SoapParam($consolid, 'consolid')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_themeurl', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return questionRecordArray
   */
  public function get_toutes_questions($client, $sesskey, $typep) {
    $res= $this->client->__call('get_toutes_questions', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($typep, 'typep')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $typep
   * @return qcmItemRecordArray
   */
  public function get_toutes_questions_et_reponses($client, $sesskey, $typep) {
    $res= $this->client->__call('get_toutes_questions_et_reponses', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($typep, 'typep')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $tags
   * @return personnelRecordArray
   */
  public function get_utilisateurs_bytags($client, $sesskey, $tags) {
    $res= $this->client->__call('get_utilisateurs_bytags', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($tags, 'tags')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('get_version', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

  /**
   *
   *
   * @param int $client
   * @param string $sesskey
   * @param string $id_examen
   * @param (stringArray) array of string $candidats
   * @param string $idfield
   * @param string $tags
   * @return stringRecordArray
   */
  public function inscrit_examen($client, $sesskey, $id_examen, $candidats, $idfield, $tags) {
    $res= $this->client->__call('inscrit_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen'),
            new SoapParam($candidats, 'candidats'),
            new SoapParam($idfield, 'idfield'),
            new SoapParam($tags, 'tags')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('login', array(
            new SoapParam($username, 'username'),
            new SoapParam($password, 'password')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('logout', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('modifie_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($idexamen, 'idexamen'),
            new SoapParam($examen, 'examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
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
    $res= $this->client->__call('verouille_examen', array(
            new SoapParam($client, 'client'),
            new SoapParam($sesskey, 'sesskey'),
            new SoapParam($id_examen, 'id_examen')
      ),
      array(
            'uri' => $this->uri ,
            'soapaction' => ''
           )
      );
   return $res;
  }

}

?>
