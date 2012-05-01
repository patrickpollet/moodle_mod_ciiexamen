/**
 * @author Patrick Pollet
 * @version $Id: styles.php 305 2009-12-01 15:07:57Z ppollet $
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package c2ipf
 */

/**
* styles spécifiques
*/




#titre {
	display:block;
	height :45px;
	background-image: url("images/ordi00.gif") ;
	background-repeat:no-repeat;
	padding :0px 40px;
	font-size: 12px;
	/**/
	color: #000000;
	font-weight: bold;
	}

#etiquette {
	background-image: url("images/ii_config.gif") ;
	background-repeat:no-repeat;
	padding :0px 0px 0px 30px;
	text-align: left;
	}


/**
* div renseigné par ajax
*/
#apercu {
	padding : 20px 20px;
	background-color: #FFFFC0;
	border-width: 1px;
	border-style:solid;
	border-color:black;
	/*display:none;*/
}

/**
* table qui contient les images assemblées de la page de login
* dans l'attente de tout remplacer par des div !
*/
#logo td {
	margin :0;
	padding :0;
	}


#liste {
	width : 100%;
	border-width: 1px;
	border-style:solid;
	border-color:#C0C0C0;
	border-collapse: collapse;
	}

#liste td , .listing td{
	border-width: 1px;
	border-style:solid;
	border-color:#C0C0C0;
	}

#multipagination_haut,#multipagination {
	margin: auto 0;
	}


td#corps {
	 vertical-align: top;
	 text-align : center;
	/* margin :0 auto;*/

	}

#contenu_popup {
	height:auto;
	width:800px;
	margin: 0 auto;
	}

#contenu_principale {
	width:801px;
	margin: 0 auto;
	}

#contenu_minipopup {
	height:auto;
	width:400px;
	margin: 0 auto;
	}




table.sansbordure {
	padding :3px;
	border:none;
	}


table.fiche {
	border: 1px solid #000000;
	padding :4px;
	margin: 0px 5%;
}

table.listing {
	border: 1px solid #000000;
	padding :0px;
	margin: 0px;
}





/**
* styles des fiches (examen, etudiant ...)
*/




td.erreur{
	background-color:#FFFFCC;
	padding : 20px 20px;
	text-align:center;
}



.information td,  span.information, div.information {
	padding : 20px 20px;
	text-align:center;
	background-color: #FFFFC0;
	border-width: 1px;
	border-style:solid;
	border-color:black;
}

.information_gauche{
	padding : 2px 2px;
	text-align:left;
	background-color: #FFFFC0;
	border-width: 1px;
	border-style:solid;
	border-color:black;
	}

th.bg ,th.bg_stats  {
	/*background-image: url("images/bgcontextm.gif") ; */
	/*background-image: url("images/fagnon_m5.gif") ;*/
	background-color: #009EE0;
	/*background-color: #7785B2;*/
	background-repeat:repeat-x ;
    vertical-align : top;
    color: white;
    padding : 0px 0px 0px 0px;
    margin :0px;
    text-align:left;
    font-weight: normal;
}



.fiche th.bg {
	text-align:center;
	color: black;


	}

.fiche tr{
	border-spacing: 0px;
	border-collapse: collapse;
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;

	}

.fiche th{
	background-color: #F0F0F0;
	text-align : right;
     margin: 2px;
       padding : 4px;
       width:35%;
       	border-color:black;
       	border-width: 1px;
	border-style:solid;

	}

.fiche td{
	background-color: #E9E9E9;
	text-align : left;
    padding : 4px;
    margin: 2px;
    	border-color:black;
    	border-width: 1px;
	border-style:solid;

	}

.fiche .sansbordure td {
	padding :3px;
	border-spacing: 0px;
	border-collapse: collapse;
	border:none;
	}

/**
*  resultats du qcm
*  TODO
*/

table.resultats {
}


/**
* histogramme
*/

td.histogramme {
	/*background-color: #FFFFFF;*/
	vertical-align : bottom;
	text-align : center;
	height :50px;
}




tr.paire {
	background-color: #E8E8E8;
}




tr.impaire {
	background-color: #DFDFDF;
}
/**
* question changée en selection manuelle
*/
tr.changee {
	background-color: #00FFFF;
}



/**
*  styles requis par fabtabulous.js
*/
.panel {
	clear: both;
	display: none;
	border: 1px solid #CCC;
	padding: 1em;
}
.panel.active-tab-body {
	display: block;
}
#tabs {
	list-style: none;
}

#tabs li {
	float: left;
}

#tabs a {
	float: left;
	padding: 5px 8px;
	margin-left: 6px;
	background-color: #F2F2F2;
	text-decoration: none;
	color: #999999;
}

#tabs a.active-tab {
	background-color: #CCC;
	border-top: 3px solid #999;
	padding-top: 3px;
	color: #000;
}

/**
* styles des QCM
*
* elements à renseigner
*{p_i] vaut soit
*   rien pour un qcm normal
*    paire ou impaire pour un qcm en 2 colonnes
div id="qcm"
table class="qcm"
tr class="question_entete{p_i}
td class="question_entete"
tr class="question{p_i}
td class="question"

tr class="docs{p_i}
li  class="doc">{url_doc}</li>

tr class="reponses{p_i}"
ul class="reponses"
li class="reponse"
input type=checbox class=case
span class bonne
<span class=mauvaise
*/

table.qcm {
	width:100%;
	 padding:6;
	 /* cellSpacing=1*/
	 background-color:#CCCCCC;
}

#qcm .question_entete {
	background-color: #D7E8EC;
	}

#qcm ul.reponses, .docs ul{
		list-style :none;
	}

#qcm li.reponse {
	background-color:#EAF2F4;
}

#qcm li.doc {
	display :inline;
}

#qcm span.bonne {
	/*background: url("images/i_valide_a.gif") no-repeat;*/
	width:20px;
	padding :0px 4px;
	}

#qcm span.mauvaise {
	width:20px;
	padding :0px 10px;
	}



/**
* alignements
*/

.gauche {
   text-align : left;
}

.droite {
   text-align : right;
}

.centre {
   text-align : center;
}


.barree {
   text-decoration:line-through ;
}

.mailto {
	background: url("images/mail_icon.gif") no-repeat scroll 0px 1px;
    padding:1px 0px 1px 18px;
   /* font-size :10px;*/
}




/*icones */

/*centre l'icone dans la cellule tableau */
td.icone_action {

	padding:1px 0px 1px 25px;
}


ul.menu_niveau2 {
	padding : 5px;
}

li.menu_niveau2_item {
	display: inline;
	list-style :none;
}




/**
* fiches de saisie et validation
*/

.saisie {
	border: 1px solid #000000;
	color : #000;
	background-color:#FFFFFF;
	font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}


input.disabled {
	border: 1px solid #F2F2F2;
	background-color: #F2F2F2;
}

input.required, textarea.required {
	border: 1px solid #FF0000;
}
input.validation-failed, textarea.validation-failed {
	border: 1px solid #FF3300;
	color : #FF3300;
}
input.validation-passed, textarea.validation-passed {
	border: 1px solid #00CC00;
	color : #000;
}

.validation-advice {
	margin: 5px ;
	padding: 3px;

	background-color: #FF3300;
	color : #FFF;
	/*font-weight: bold;*/
}

.custom-advice {
	margin: 5px 0;
	padding: 5px;
	background-color: #C8AA00;
	color : #FFF;
	/*font-weight: bold;*/
}




/**
* div divers
*/


input[disabled] {
	border: 1px solid #999;
	background-color: #ddd;
}

.saisie_bouton {
	border: #000000 1pt solid;
	background-color: #FFCC00;
	color: #000000;
	cursor: pointer;
}



/**
* essai de mise en page de formulaire sans tableau
* d'après http://covertprestige.info/test/27-formulaires-sans-tableaux.html
*/

p.double {
	/* Empêcher le dépassement des flottants */
	overflow: hidden;
	/* Idem pour IE6 */
	width: 100%;
}

p.double label {
	float: left;
	text-align: right;
	font-weight: bold;
	cursor: pointer;
}
p.double label span.info {
	display: block;
	margin-top: .2em;
	font-size: .8em;
	font-weight: normal;
	cursor: default;
}

p.double select,
p.double input,
p.double textarea {
	margin-left: 12px;
	padding: 2px 4px;
}

p.double textarea {
	padding: 2px 0 0 4px;
	height: 6em;
}




/**
* formulaires de taille normale
*/

.normale p.double label {
	width: 150px;
}

/**
.normale p.double input,
.normale  p.double textarea {
	width: 350px;
}
**/

.normale p.simple {
	margin-left: 250px;
}

/**
* formulaires de taille reduite
*/

.mini p.double label {
	width: 80px;
}

/**
.mini  p.double input,
.mini  p.double textarea {
	width: 150px;
}
*/

.mini p.simple {
	margin-left: 100px;
}

.cache {
	display:none;
}

.visible {
	display:inline;
}

/**
* ancienne feuille de style valider au fur et a mesure
et remonter aus dessus
*/





.commentaire1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #666666;
	font-style: normal;

}
.commentaire2 {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #666666;
	font-style: italic;
}

.commentaire3 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #666666;
	font-style: italic;
}

.commentaire4 {
	font-size: 16px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #666666;
	font-style: italic;
}

.taille1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}

.taille2 {
	font-size: 12px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}

.taille3 {
	font-size: 14px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}

.taille4 {
	font-size: 16px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
}

.vert {
        color: #00FF00;
}

.rouge {
        color: #FF0000;
}

.orange {
       color: #FF960C;

}

.rouge1 {
	font-size: 10px;

	color: #FF0000;
}

.rouge2 {
	font-size: 12px;

	color: #FF0000;
}

.rouge3 {
	font-size: 14px;

	color: #FF0000;
}

.rouge4 {
	font-size: 16px;
	color: #FF0000;
}

.bordeau1 {
	font-size: 10px;

	color: #990000;
}

.bordeau2 {
	font-size: 12px;
	color: #990000;
}

.bordeau3 {
	font-size: 14px;
	color: #990000;
}

.bordeau4 {
	font-size: 16px;
	color: #990000;
}

.texte_blanc1 {
	font-size: 10px;

	color: #ffffff;
}

.texte_blanc2 {
	font-size: 12px;

	color: #ffffff;
}

.texte_login {
	font-size: 12px;

	color: #ffffff;
}


.texte_blanc3 {
	font-size: 14px;

	color: #ffffff;
}

.texte_blanc4 {
	font-size: 16px;

	color: #ffffff;
}

.titre_blanc1 {
	font-size: 10px;

	color: #ffffff;
}

.titre_blanc2 {
	font-size: 12px;

	color: #ffffff;
}

.titre_blanc3 {
	font-size: 14px;

	color: #ffffff;
}

.titre_blanc4 {
	font-size: 16px;

	color: #ffffff;
}




.titre {
	font-size: 14px;
	/**/
	color: #000000;
	font-weight: bold;
}

.titre1 {
	font-size: 12px;
	/**/
	color: #000000;
	font-weight: bold;
}

.titre_tab {
	font-size: 12px;

	color: #000066;
}

.lien1 {
	font-size: 10px;

}

.lien2 {
	font-size: 12px;

}

.lien3 {
	font-size: 14px;

}

.lien4 {
	font-size: 16px;

}

.acces {
	font-size: 14px;

	color: #ffffff;
}

.test_resultat {
	background:#FEFFCB;
	padding:15px
}