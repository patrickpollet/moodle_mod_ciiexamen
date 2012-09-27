<?php

$string['ciiexamen'] = 'ciiexamen';
$string['modulename'] = 'Examen C2i';
$string['modulenameplural'] = 'Examens C2i';

// new Moodle 2.0
$string['pluginname'] = 'Examen C2i';
$string['pluginadministration'] = 'Administration de l\'examen C2I';

// new Moodle 2.3
 $string['ciiexamen:addinstance']='Ajouter un examen C2i';
 $string['ciiexamen:edit']='Modifier des examen C2i';
 $string['ciiexamen:manage']='Gérer les examens C2i';

//$string['ciiexamenfieldset'] = 'Custom example fieldset';
$string['ciiexamenintro'] = 'Description de l\'examen';$string['ciiexamenname'] = 'Nom de l\'examen';
$string['adresse_plateforme']='Adresse Internet de la plate-forme';
$string['configadresse_plateforme']='Adresse Internet de la plate-forme (valeur requise)';
$string['login_plateforme']='Login sur la plate-forme';
$string['configlogin_plateforme']='Login a utiliser pour se connecter au service Web de la plate-forme. <br/>'.
'Pour des raisons de sécurité, merci de relire les instructions sur le Wiki de la plate-forme C2I';
$string['passe_plateforme']='Mot de passe ';
$string['configpasse_plateforme']='Mot de passe associé. ';

$string['inclure_certification']='Inclure les examens de certification';
$string['config_inclure_certification']='Par défaut vous ne pouvez obtenir de la plate-forme que les examens de positionnement. ' .
        'En cochant cette case vous pourrez aussi traiter les examens de certification';

$string['ciiexamen_use_protocol']='Protocole de communication';
$string['configciiexamen_use_protocol']='Vous pouvez communiquer avec la plate-forme en utilisant le protocole SOAP (plus sécurisé) ou REST (plus rapide).' .
        'Dans le premier cas vous devez avoir installé php_soap et dans le second php_curl';

$string['id_examen_pf']='Identité de cet examen sur votre plate-forme';
$string['type_examen']='Type d\'examen';
$string['positionnement']='Positionnement';
$string['certification']='Certification';
$string['id_examen']='Identifiant national de l\'examen';
$string['cree_comptes_auto']='Inscrire automatiquement les nouveaux étudiants';
$string['synchro_grades']='Récuperer les scores dans le carnet de notes';
$string ['err_examunknown']='L\'examen {$a} n\'existe plus sur la plate-forme';
$string['err_examen_paspasse']='Vous n\'avez pas encore passé cet examen. ' .
        '  Cliquez sur ce lien <a href=\'#\' onclick=\'{$a}\' > pour le passer maintenant</a>';
//$string['err_examen_paspasse']='Vous n\'avez pas encore passé cet examen. ' .
//        ' Cliquez sur ce lien <a href="#" onclick="javascript:openpopup(\'{$a}\',\'passage\');" > pour le passer maintenant</a>';
$string['err_examen_pasdispo']='Cet examen n\'est pas disponible';
$string['err_examen_pasinscrit']='Vous n\'êtes pas encore inscrit à cet examen';
$string['err_examen_datedebut']='date de début : {$a}';
$string['err_examen_datefin']='date de fin : {$a}';
$string['err_connection_pf']='erreur de communication avec la plateforme c2I {$a}';
$string['scores_examen']='Vos résultats';
$string['corrige_examen']='Corrigé de l\'examen';
$string['parcours_examen']='Votre parcours';
$string['infos_examen']='Description';
$string['resultats_examen']='Résultats';
$string['nb_resultats']='Résultats trouvés';
$string['score_global']='score global';
$string['date_passage1']='date unix';
$string['date_passage']='date passage';
$string['ip']='ip';
$string['origine']='origine';
$string['passage']='passage';
$string['quizopen']='Ouvrir cet examen';
$string['quizclose']='Fermer cet examen';
//fiche
$string['id_examen']='Identifiant national';
$string['nom_examen']='Nom de l\'examen';
$string['datedebut_examen']='Date de début';
$string['datefin_examen']='Date de fin';
$string['datecreation_examen']='Date de création';
$string['datemodif_examen']='Date de modification';
$string['auteur_examen']='Auteur';
$string['etab_examen']='Université';
$string['ordreq_examen']='Ordre des questions';
$string['ordrer_examen']='Ordre des réponses';
$string['tirage_examen']='Tirage des questions';
$string['pos_examen']='Positionnement';
$string['cert_examen']='Certification';
$string['mail_examen']='Résultats par courriel';
$string['cor_examen']='Afficher la correction';
$string['mdp_examen']='Mot de passe';
$string['chrono_examen']='Afficher le temps restant';
$string['seuil_examen']='Seuil de validation';
$string['nbq_examen']='Nombre de questions';
$string['doms_examen']='Domaines traités';
//corrige
$string['voir_details']='Voir le détail';
$string['corrige_examen_pour']='Corrigé de l\'examen pour {$a}';
$string['score_examen_pour']='Scores à l\'examen pour {$a}';
$string['parcours_examen_pour']='Parcours généré par  l\'examen pour {$a}';

// help strings now required in Moodle 2.0

$string['id_examen_help']='Tout examen créé sur une plate-forme C2i est identifié par un code constitué du code de votre établissement et d\'un numéro  unique
spécifique à votre plate-forme, séparé par un point. Ainsi l\'examen 65.417 corresponds au 417eme examen créé par l\'établissement INSA de Lyon (65) \n
Vous devez renseigner correctement cette valeur qui peut être obtenue dans la premiere colonne de l\'écran Examens de votre plate-forme C2i.';


$string['cree_comptes_auto_help']='<p>Si vous activez cette option, toute personne s\'inscrivant à ce cours Moodle sera automatiquement inscrit
à l\'examen correspondant sur votre plate-forme C2i </p>

<p>Un compte lui sera automatiquement créé si nécessaire, soit de type \'manuel\' si cet utilisateur a un compte de ce type sur votre plate-forme Moodle,
soit de type \'ldap\' si votre Moodle et votre plate-forme C2i ont été configurés pour utiliser votre annuaire LDAP.</p>

<p>La création automatique du compte sur la plate-forme C2i se faisant par l\'intermédiaire du cron de Moodle, les comptes et inscriptions apparaitront
sur votre plate-forme C2i selon la fréquence programmée pour ce cron par l\'adminstrateur Moodle (en principe moins d\'une heure). </p>';

$string['synchro_grades_help']='<p>Si vous activez cette option, toute personne inscrite à ce cours Moodle et ayant passé son examen de positionnement
C2i verra son score global ajouté au carnet de notes de Moodle </p>


<p>La synchronisation des notes se faisant par l\'intermédiaire du cron de Moodle, les notes apparaitront
sur Moodle selon la fréquence programmée pour ce cron par l\'adminstrateur Moodle (en principe moins d\'une heure). </p>';


$string['closewindow']='Fermer cette fenêtre';

?>
