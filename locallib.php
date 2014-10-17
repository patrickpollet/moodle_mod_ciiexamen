<?php
/**
 * @author Patrick Pollet
 * @version $Id: locallib.php 417 2010-10-08 16:43:56Z ppollet $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package ciiexamen
 */

 /**
     *  log all DB errors specific to new Moodle 2.0 API
     */

    function ws_error_log($ex) {
        global $CFG;
        if (is_object($ex)) {
            $info = $ex->getMessage() . '\n' . $ex->getTraceAsString();
        } else
            $info = $ex;
        error_log($info, 3, $CFG->dataroot . '/wspp_db_errors.log');
    }


/** ajoute un slash au bout d'une url s'il n'y en a pas  et q'url n'est pas vide*/
function add_slash_url($url){
    $url = trim($url);
    if ($url=="") return $url;
    return substr($url, -1, 1)=='/'?$url:$url.'/';
}

/**
 * fonction ajoutée rev 311
 * s'occupe de toute la tripaille web service '->
 */
function __connect_to_plateforme_soap() {
    global $CFG;
    require_once('c2iws/c2i_soapserver.php');
    // en cas d'oubli du slash de fin dans la configuration
    $CFG->adresse_plateforme=add_slash_url($CFG->adresse_plateforme);
    $wsdl=$CFG->adresse_plateforme."ws/wsdl.php";
    $uri=$CFG->adresse_plateforme."ws/wsdl";

    $optionssoap=array('encoding'=>'UTF8'); // important with Moodle 
//rev 311 ajout parametres optionels proxy définis dans Moodle
    if (!empty($CFG->proxyhost)) $optionssoap['proxy_host' ]=$CFG->proxyhost;
    if (!empty($CFG->proxyport)) $optionssoap['proxy_port' ]=(int) ($CFG->proxyport);
    if (!empty($CFG->proxyuser)) $optionssoap['proxy_login' ]=$CFG->proxyuser;
    if (!empty($CFG->proxypassword)) $optionssoap['proxy_password' ]=$CFG->proxypassword;

    
    $c2i=new c2i_soapserver($wsdl,$uri,$optionssoap); //important
    return $c2i;
}


function __connect_to_plateforme_rest() {
    global $CFG;
    require_once('c2iws/c2i_soapserverrest.php');
    // en cas d'oubli du slash de fin dans la configuration
    $CFG->adresse_plateforme=add_slash_url($CFG->adresse_plateforme);
    $uri=$CFG->adresse_plateforme."ws/service.php";

    $optionsrest=array('encoding'=>'UTF8','formatout'=>'php','trace'=>0);
//TODO pour curl ????
  //  if (!empty($CFG->proxyhost)) $optionsrest['proxy_host' ]=$CFG->proxyhost;
  //  if (!empty($CFG->proxyport)) $optionsrest['proxy_port' ]=$CFG->proxyport;
  //  if (!empty($CFG->proxyuser)) $optionsrest['proxy_login' ]=$CFG->proxyuser;
  //  if (!empty($CFG->proxypassword)) $optionsrest['proxy_password' ]=$CFG->proxypassword;

    $c2i=new c2i_soapserverrest($uri,$optionsrest); //important
    return $c2i;
}



function connect_to_plateforme() {
    global $CFG;
    /* REST protocol is not supported until C2I plateforme use UTF8 as default 
    if ($CFG->ciiexamen_use_protocol==WS_PROTOCOL_REST)
        return __connect_to_plateforme_rest();
    else
        return __connect_to_plateforme_soap();
    */
     return __connect_to_plateforme_soap();    
}




function fixtheme ($res) {
	global $CFG;
   // return $res;
	if (empty($CFG->theme_plateforme)) {
		$c2i=connect_to_plateforme();
		$CFG->theme_plateforme=$c2i->get_themeurl('','');

	}
	$res=str_replace('..//themes/v14/',$CFG->theme_plateforme .'/',$res);
	$res=str_replace('../themes/v15/',$CFG->theme_plateforme .'/',$res);
	return $res;
}

function c2i_getversion() {
	global $CFG;
	try{
		 $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_version($lr->getClient(),$lr->getSessionKey());
		$c2i->logout($lr->getClient(),$lr->getSessionKey());

		return $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		return false;
	}
}

function c2i_getexamens($typep='positionnement') {

	global $CFG;
	try{
	    $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		//$res=$c2i->get_examens($lr->getClient(),$lr->getSessionKey(),$typep);

		$res=$c2i->get_examens($lr->getClient(),$lr->getSessionKey(),'positionnement',0); // rev 979
		//ws_error_log(print_r($res,true));
		if ($CFG->inclure_certification) {
    	       	$res2=$c2i->get_examens($lr->getClient(),$lr->getSessionKey(),'certification',0); // rev 979
    	      	//ws_error_log(print_r($res2,true));
    	       	$res=array_merge($res,$res2);
		}
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		$ret=array();
		foreach ($res as $examen) {
		//	if ($examen->type_tirage=='passage') //pas géré car pas de résultats ni de corrigé
		//		continue;
		// important pas les membres d'un pool '
		// argh info pas renvoyée par le web service
		//if ($examen->pool_pere <>0) continue;

			$cle=$examen->id_etab.".".$examen->id_examen;
			$ret[$cle]=$cle." ".$examen->nom_examen;

		}
		return $ret;
	} catch (Exception $e) {
		debugging($e->getMessage());
		return false;
	}

}


function c2i_getexamen($idexamen) {
	global $CFG;
	try {
	    $c2i=connect_to_plateforme();
    	$lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_examen($lr->getClient(),$lr->getSessionKey(),$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		return $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		return false;
	}
}

function c2i_a_passe_examen($login,$idexamen){
        global $CFG;
    try {
         $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
        $res=$c2i->a_passe_examen($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
        $c2i->logout($lr->getClient(),$lr->getSessionKey());
        return $res;
    } catch (Exception $e) {
        debugging($e->getMessage());
        return false;
    }
}

function c2i_est_inscrit_examen($login,$idexamen){
          global $CFG;
    try {
         $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
        $res=$c2i->est_inscrit_examen($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
        $c2i->logout($lr->getClient(),$lr->getSessionKey());
        //print_r($res);
        return $res;
    } catch (Exception $e) {
        debugging($e->getMessage());
        return false;
    }
}



/**
 * renvoi les scores d'un login a un examen'
 */
function c2i_getscores($login,$idexamen) {
	global $CFG;
	try {
		 $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_score_candidat($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		return $res[0]; // on extrait le seul element du tableau
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}

}


function c2i_getinscrits($idexamen) {
	global $CFG;
	try {
        $c2i=connect_to_plateforme();
		$lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_inscrits($lr->getClient(),$lr->getSessionKey(),$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		return $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}

}


function c2i_getcorrige_examen_html($login,$idexamen) {
	global $CFG;
	try {
		$c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_corrige_examen_html($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());

		$res=fixtheme($res);
		return $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}

}

function c2i_getresultats_examen_html($login,$idexamen) {
	global $CFG;
	try {
		 $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_resultats_examen_html($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());

		$res=fixtheme($res);
		return  $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}

}


function c2i_getparcours_examen_html($login,$idexamen) {
	global $CFG;
	try {
		$c2i=connect_to_plateforme();
		$lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_parcours_examen_html($lr->getClient(),$lr->getSessionKey(),$login,'login',$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());

		$res=fixtheme($res);
		return  $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}

}



/**
 * renvoi tous les scores d'un examen '
 */
function c2i_getresultats($idexamen) {
	global $CFG;
	try {
	   $c2i=connect_to_plateforme();
       $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		$res=$c2i->get_bilans_examen($lr->getClient(),$lr->getSessionKey(),$idexamen);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		return  $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}
}



function c2i_creecandidats($candidats) {
		global $CFG;
	try {
		$res=array();
	    $c2i=connect_to_plateforme();
    	$lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
		//foreach($candidats as $candidat) {
		// 	$res[]=$c2i->cree_candidat($lr->getClient(),$lr->getSessionKey(),$candidat);
		//}
        $res=$c2i->cree_candidats($lr->getClient(),$lr->getSessionKey(),$candidats);
		$c2i->logout($lr->getClient(),$lr->getSessionKey());

		return  $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}




}

function c2i_inscritcandidats($candidats,$idexamen) {
			global $CFG;
	try {
		$res=array();
		 $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
	 	$res=$c2i->inscrit_examen($lr->getClient(),$lr->getSessionKey(),$idexamen,$candidats,'login','moodle synchro');
		$c2i->logout($lr->getClient(),$lr->getSessionKey());
		return  $res;
	} catch (Exception $e) {
		debugging($e->getMessage());
		//print($e->getMessage());
		return false;
	}
}


/**
 * introduit rev 283 pour rapport d'activités Moodle
 */
function c2i_get_passages_recents ($idexamen,$timestart) {
            global $CFG;
    try {
        $res=array();
        $c2i=connect_to_plateforme();
        $lr=$c2i->login($CFG->login_plateforme,$CFG->passe_plateforme);
            $res=$c2i->get_passages_recents($lr->getClient(),$lr->getSessionKey(),$idexamen,$timestart);
        $c2i->logout($lr->getClient(),$lr->getSessionKey());

        return  $res;
    } catch (Exception $e) {
        debugging($e->getMessage());
        //print($e->getMessage());
        return false;
    }


}


if (0) {
	require ('../../config.php');
//print_r(c2i_getexamens());
//print_r(c2i_getexamen('65.290'));
print_r(c2i_est_inscrit_examen('wsdemo1','65.312'));
print_r(c2i_getinscrits('65.312'));

}

?>
