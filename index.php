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

if (!$course = $DB->get_record('course', array('id'=>$id))) {
    print_error('invalidcourseid');
}

require_course_login($course);
$PAGE->set_pagelayout('incourse');
$PAGE->set_url('/mod/ciiexamen/index.php', array('id'=>$id));
//$context = get_context_instance(CONTEXT_COURSE, $course->id);
$context =  context_course::instance($course->id);

add_to_log($course->id, 'ciiexamen', 'view all', "index.php?id=$course->id", "");


/// Get all required stringsciiexamen

$strciiexamens = get_string('modulenameplural', 'ciiexamen');
$strciiexamen  = get_string('modulename', 'ciiexamen');
$strsectionname  = get_string('sectionname', 'format_'.$course->format);
$PAGE->set_title($strciiexamens);
$PAGE->set_heading($course->fullname);
$PAGE->navbar->add($strciiexamens);
echo $OUTPUT->header();



/// Get all the appropriate data

if (! $ciiexamens = get_all_instances_in_course('ciiexamen', $course)) {
    notice(get_string('thereareno', 'moodle', $strciiexamens), "../../course/view.php?id=$course->id");
    die();
}

/// Print the list of instances (your module will probably extend this)

$usesections = course_format_uses_sections($course->format);
if ($usesections) {
    $sections = get_all_sections($course->id);
}

/// Print the list of instances (your module will probably extend this)

$timenow = time();
$strsectionname  = get_string('sectionname', 'format_'.$course->format);
$strname  = get_string("name");
$strentries  = get_string("entries", "ciiexamen");

$table = new html_table();

if ($usesections) {
    $table->head  = array ($strsectionname, $strname, $strentries);
    $table->align = array ("CENTER", "LEFT", "CENTER");
} else {
    $table->head  = array ($strname, $strentries);
    $table->align = array ("LEFT", "CENTER");
}


$currentsection = "";

foreach ($ciiexamens as $ciiexamen) {
    if (!$ciiexamen->visible  && has_capability('moodle/course:viewhiddenactivities', $context)) {
        //Show dimmed if the mod is hidden
        $link = "<a class=\"dimmed\" href=\"view.php?id=$ciiexamen->coursemodule\">".format_string($ciiexamen->name,true)."</a>";
    } else if ($ciiexamen->visible) {
        // Show normal if the mod is visible.
        $link = "<a href=\"view.php?id=$ciiexamen->coursemodule\">".format_string($ciiexamen->name,true)."</a>";
    } else {
        // Don't show the glossary.
        continue;
    }
    $printsection = "";
    if ($usesections) {
        if ($ciiexamen->section !== $currentsection) {
            if ($ciiexamen->section) {
                $printsection = get_section_name($course, $sections[$ciiexamen->section]);
            }
            if ($currentsection !== "") {
                $table->data[] = 'hr';
            }
            $currentsection = $ciiexamen->section;
        }
    }

    // TODO: count only approved if not allowed to see them

    //$count = $DB->count_records_sql("SELECT COUNT(*) FROM {glossary_entries} WHERE (glossaryid = ? OR sourceglossaryid = ?)", array($glossary->id, $glossary->id));
    $count=0;


    if ($usesections) {
        $linedata = array ($printsection, $link, $count);
    } else {
        $linedata = array ($link, $count);
    }

    $table->data[] = $linedata;

}

echo "<br />";

echo html_writer::table($table);

/// Finish the page

echo $OUTPUT->footer();

?>
