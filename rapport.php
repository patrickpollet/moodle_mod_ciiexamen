<?php


// $Id: viewresultats.php 282 2009-11-12 07:44:41Z ppollet $

/**
 * This page prints a report for an user at a given examen in a popup window
 *
 * @author  Your Name <pp@patrickpollet.net>
 * @version $Id: viewresultats.php 282 2009-11-12 07:44:41Z ppollet $
 * @package mod/ciiexamen
 */

/// (Replace ciiexamen with the name of your module and remove this line)

require_once (dirname(dirname(dirname(__FILE__))) . '/config.php');
require_once (dirname(__FILE__) . '/lib.php');
require_once (dirname(__FILE__) . '/locallib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$a = optional_param('a', 0, PARAM_INT); // ciiexamen instance ID
$userid = required_param('userid', PARAM_INT); // choose the current group
$currenttab = optional_param("ct", "score", PARAM_TEXT);

if ($id) {
    if (!$cm = get_coursemodule_from_id('ciiexamen', $id)) {
        error('Course Module ID was incorrect');
    }

    if (!$course = ws_get_record('course', 'id', $cm->course)) {
        error('Course is misconfigured');
    }

    if (!$ciiexamen = ws_get_record('ciiexamen', 'id', $cm->instance)) {
        error('Course module is incorrect');
    }

} else
    if ($a) {
        if (!$ciiexamen = ws_get_record('ciiexamen', 'id', $a)) {
            error('Course module is incorrect');
        }
        if (!$course = ws_get_record('course', 'id', $ciiexamen->course)) {
            error('Course is misconfigured');
        }
        if (!$cm = get_coursemodule_from_instance('ciiexamen', $ciiexamen->id, $course->id)) {
            error('Course Module ID was incorrect');
        }

    } else {
        error('You must specify a course_module ID or an instance ID');
    }

require_login($course, true, $cm);

$context = get_context_instance(CONTEXT_MODULE, $cm->id);
require_capability('mod/quiz:viewreports', $context);

if (!$user = ws_get_record('user', 'id', $userid))
    error("No such user in this course");

//accès web service pour récuperer les détails de l'examen '
if (!$ciidetails = c2i_getexamen($ciiexamen->id_examen))
    print_error('err_examunknown', 'ciiexamen');

add_to_log($course->id, "ciiexamen", "view", "rapport.php?id=$cm->id", "$ciiexamen->id");

$ciiresultats = c2i_getscores($user->username, $ciiexamen->id_examen);

//Moodle 1.9
if (!$CFG->wspp_using_moodle20) {
    /// Print the page header
    $strciiexamens = get_string('modulenameplural', 'ciiexamen');
    $strciiexamen = get_string('modulename', 'ciiexamen');

    print_header_simple(format_string($ciiexamen->name));

    /// Print the main part of the page

    print_heading(format_string($ciiexamen->name));

    print_container_start();
    /// Check to see if groups are being used here

    $returnurl = 'rapport.php?a=' . $ciiexamen->id . '&amp;userid=' . $userid;

    print "<div class='clearer'> </div>";

    /// Print the tabs

    include ('tabs2.php');

    switch ($currenttab) {

        case 'score' :
            print_heading(get_string('score_examen_pour', 'ciiexamen', fullname($user)));
            if (!$ciiresultats->error)
                print (c2i_getresultats_examen_html($user->username, $ciiexamen->id_examen));
            break;
        case 'corrige' :
            print_heading(get_string('corrige_examen_pour', 'ciiexamen', fullname($user)));
            if ($ciidetails->correction || has_capability('mod/quiz:viewreports', $context))
                print (c2i_getcorrige_examen_html($user->username, $ciiexamen->id_examen));
            break;
        case 'parcours' :
            print_heading(get_string('parcours_examen_pour', 'ciiexamen', fullname($user)));
            print (c2i_getparcours_examen_html($user->username, $ciiexamen->id_examen));
            break;
    }
    echo '<div class="controls">';

    // Print the close window button
    echo '<input type="button" onclick="window.close()" value="' .
    get_string('closepreview', 'quiz') . "\" />";
    echo '</div>';

    print_container_end();

    print_footer($course);

//Moodle 2.0
} else {

    /// Initialize $PAGE, compute blocks
    $PAGE->set_url('/mod/ciiexamen/rapport.php', array (
        'id' => $cm->id,'userid'=>$userid
    ));
    $PAGE->set_pagelayout('popup');
    $title =get_string('modulename','ciiexamen'). ' : ' . format_string($ciiexamen->name);
   // $PAGE->set_context($context);  not needed with popup ... (so far)
    $PAGE->set_title($title);
    $PAGE->set_heading($title);

    echo $OUTPUT->header();


      // Print the close window button

    echo '<input type="button" onclick="window.close()" value="' .
     get_string('closewindow', 'ciiexamen') . "\" />";
    /// Print the tabs


    include ('tabs2.php');
    switch ($currenttab) {
       case 'score' :
            echo $OUTPUT->heading(get_string('score_examen_pour', 'ciiexamen', fullname($user)));
            if (!$ciiresultats->error)
                print (c2i_getresultats_examen_html($user->username, $ciiexamen->id_examen));
            break;
        case 'corrige' :
            echo $OUTPUT->heading(get_string('corrige_examen_pour', 'ciiexamen', fullname($user)));
            if ($ciidetails->correction || has_capability('mod/quiz:viewreports', $context))
                print (c2i_getcorrige_examen_html($user->username, $ciiexamen->id_examen));
            break;
        case 'parcours' :
            echo $OUTPUT->heading(get_string('parcours_examen_pour', 'ciiexamen', fullname($user)));
            print (c2i_getparcours_examen_html($user->username, $ciiexamen->id_examen));
            break;
    }

     // Print the close window button

    echo '<input type="button" onclick="window.close()" value="' .
     get_string('closewindow', 'ciiexamen') . "\" />";

    echo $OUTPUT->footer();

}
?>
