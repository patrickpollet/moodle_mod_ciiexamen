<?php // $Id: index.php 282 2009-11-12 07:44:41Z ppollet $

/**
 * This page lists all the instances of ciiexamen in a particular course
 *
 * @author  Your Name <your@email.address>
 * @version $Id: index.php 282 2009-11-12 07:44:41Z ppollet $
 * @package mod/ciiexamen
 */

/// Replace ciiexamen with the name of your module and remove this line

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/locallib.php');

$id = required_param('id', PARAM_INT);   // course

if (! $course = get_record('course', 'id', $id)) {
    error('Course ID is incorrect');
}

require_course_login($course);

add_to_log($course->id, 'ciiexamen', 'view all', "index.php?id=$course->id", '');


/// Get all required stringsciiexamen

$strciiexamens = get_string('modulenameplural', 'ciiexamen');
$strciiexamen  = get_string('modulename', 'ciiexamen');


/// Print the header

$navlinks = array();
$navlinks[] = array('name' => $strciiexamens, 'link' => '', 'type' => 'activity');
$navigation = build_navigation($navlinks);

print_header_simple($strciiexamens, '', $navigation, '', '', true, '', navmenu($course));

/// Get all the appropriate data

if (! $ciiexamens = get_all_instances_in_course('ciiexamen', $course)) {
    notice('There are no instances of ciiexamen', "../../course/view.php?id=$course->id");
    die;
}

/// Print the list of instances (your module will probably extend this)

$timenow  = time();
$strname  = get_string('name');
$strweek  = get_string('week');
$strtopic = get_string('topic');

if ($course->format == 'weeks') {
    $table->head  = array ($strweek, $strname);
    $table->align = array ('center', 'left');
} else if ($course->format == 'topics') {
    $table->head  = array ($strtopic, $strname);
    $table->align = array ('center', 'left', 'left', 'left');
} else {
    $table->head  = array ($strname);
    $table->align = array ('left', 'left', 'left');
}

foreach ($ciiexamens as $ciiexamen) {
    if (!$ciiexamen->visible) {
        //Show dimmed if the mod is hidden
        $link = "<a class=\"dimmed\" href=\"view.php?id=$ciiexamen->coursemodule\">$ciiexamen->name</a>";
    } else {
        //Show normal if the mod is visible
        $link = "<a href=\"view.php?id=$ciiexamen->coursemodule\">$ciiexamen->name</a>";
    }

    if ($course->format == 'weeks' or $course->format == 'topics') {
        $table->data[] = array ($ciiexamen->section, $link);
    } else {
        $table->data[] = array ($link);
    }
}

print_heading($strciiexamens);
print_table($table);

/// Finish the page

print_footer($course);

?>
