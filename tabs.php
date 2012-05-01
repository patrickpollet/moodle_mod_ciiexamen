<?php  // $Id: tabs.php 329 2010-02-15 12:04:26Z ppollet $
/**
 * Sets up the tabs used by the quiz pages based on the users capabilites.
 *
 * @author Tim Hunt and others.
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package quiz
 */

if (empty($ciiexamen) || empty($ciidetails) || empty($ciiresultats)) {
  //  error('You cannot call this script in that way');
}
if (!isset($currenttab)) {
    $currenttab = 'info';
}
if (!isset($cm)) {
    $cm = get_coursemodule_from_instance('ciiexamen', $ciiexamen->id);
}

if (!isset($context))
	$context = get_context_instance(CONTEXT_MODULE, $cm->id);


$tabs = array();
$row  = array();
$inactive = array();
$activated = array();
$tabcor=0;

if (has_capability('mod/quiz:view', $context)) {
	$row[] = new tabobject('info', "$CFG->wwwroot/mod/ciiexamen/view.php?id=$cm->id&ct=info", get_string('infos_examen', 'ciiexamen'));

    if( c2i_a_passe_examen($USER->username,$ciiexamen->id_examen)) {

		$row[] = new tabobject('score', "$CFG->wwwroot/mod/ciiexamen/view.php?id=$cm->id&ct=score", get_string('scores_examen', 'ciiexamen'));
		$row[] = new tabobject('parcours', "$CFG->wwwroot/mod/ciiexamen/view.php?id=$cm->id&ct=parcours", get_string('parcours_examen', 'ciiexamen'));
		if ($ciidetails->correction && $ciidetails->type_tirage!='passage') {
			$row[] = new tabobject('corrige', "$CFG->wwwroot/mod/ciiexamen/view.php?id=$cm->id&ct=corrige", get_string('corrige_examen', 'ciiexamen'));
			$tabcor=1;
		}
	}

}
if (has_capability('mod/quiz:viewreports', $context)) {
	if (!$tabcor)  //pas deux fois
      if ($ciidetails->type_tirage!='passage')
		$row[] = new tabobject('corrige', "$CFG->wwwroot/mod/ciiexamen/view.php?id=$cm->id&ct=corrige", get_string('corrige_examen', 'ciiexamen'));

     // if ($ciidetails->type_tirage!='passage')
        $row[] = new tabobject('resultats', "$CFG->wwwroot/mod/ciiexamen/viewresultats.php?id=$cm->id", get_string('resultats_examen', 'ciiexamen'));
}



if ($currenttab == 'info' && count($row) == 1) {
    // Don't show only an info tab (e.g. to students).
} else {
    $tabs[] = $row;
}



print_tabs($tabs, $currenttab, $inactive, $activated);

?>
