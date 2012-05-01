<?php  // $Id: tabs.php 282 2009-11-12 07:44:41Z ppollet $
/**
 * Sets up the tabs used by the quiz pages based on the users capabilites.
 *
 * @author Tim Hunt and others.
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @package quiz
 */

if (empty($ciiexamen) || empty($ciidetails) || empty($ciiresultats) || empty($user)) {
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

require_capability('mod/quiz:viewreports', $context);

$tabs = array();
$row  = array();
$inactive = array();
$activated = array();
$tabcor=0;


if(!$ciiresultats->error) {  // c2i_a_passe_examen($USER->username,$ciiexamen->id_examen))

	$row[] = new tabobject('score', "$CFG->wwwroot/mod/ciiexamen/rapport.php?userid={$user->id}&id=$cm->id&ct=score", get_string('scores_examen', 'ciiexamen'));
	$row[] = new tabobject('parcours', "$CFG->wwwroot/mod/ciiexamen/rapport.php?userid={$user->id}&id=$cm->id&ct=parcours", get_string('parcours_examen', 'ciiexamen'));
	if ($ciidetails->correction) {
		$row[] = new tabobject('corrige', "$CFG->wwwroot/mod/ciiexamen/rapport.php?userid={$user->id}&id=$cm->id&ct=corrige", get_string('corrige_examen', 'ciiexamen'));
		$tabcor=1;
	}
}


if ($currenttab == 'score' && count($row) == 1) {
    // Don't show only an info tab (e.g. to students).
} else {
    $tabs[] = $row;
}



print_tabs($tabs, $currenttab, $inactive, $activated);

?>
