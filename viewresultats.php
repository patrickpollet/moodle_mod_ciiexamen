<?php


// $Id: viewresultats.php 416 2010-10-04 11:03:16Z ppollet $

/**
 * This page prints a particular instance of ciiexamen
 *
 * @author  Your Name <pp@patrickpollet.net>
 * @version $Id: viewresultats.php 416 2010-10-04 11:03:16Z ppollet $
 * @package mod/ciiexamen
 */

/// (Replace ciiexamen with the name of your module and remove this line)

require_once (dirname(dirname(dirname(__FILE__))) . '/config.php');

require_once (dirname(__FILE__) . '/lib.php');
require_once (dirname(__FILE__) . '/locallib.php');

require_once ($CFG->libdir . '/tablelib.php');

define('USER_SMALL_CLASS', 20); // Below this is considered small
define('USER_LARGE_CLASS', 200); // Above this is considered large
//define('DEFAULT_PAGE_SIZE', 20);
define('DEFAULT_PAGE_SIZE', 99); //PP
define('SHOW_ALL_PAGE_SIZE', 5000);

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$a = optional_param('a', 0, PARAM_INT); // ciiexamen instance ID
$groupid = optional_param('group', -1, PARAM_INT); // choose the current group
$currenttab = optional_param("ct", "resultats", PARAM_TEXT);

$page = optional_param('spage', 0, PARAM_INT); // which page to show
$perpage = optional_param('perpage', DEFAULT_PAGE_SIZE, PARAM_INT); // how many per page

$download = optional_param('download', '', PARAM_ALPHA);

if ($id) {
    if (!$cm = get_coursemodule_from_id('ciiexamen', $id)) {
        print_error('invalidcoursemodule');
    }
    if (!$course = $DB->get_record('course', array('id' => $cm->course))) {
        print_error('coursemisconf');
    }
 if (! $ciiexamen = $DB->get_record("ciiexamen", array("id" => $cm->instance))) {
            print_error('invalidciiexamenid', 'ciiexamen');
        }
    
} else {
    if (!$ciiexamen = $DB->get_record('ciiexamen', array('id' => $a))) {
        print_error('invalidquizid', 'quiz');
    }
    if (!$course = $DB->get_record('course', array('id' => $ciiexamen->course))) {
        print_error('invalidcourseid');
    }
    if (!$cm = get_coursemodule_from_instance("ciiexamen", $ciiexamen->id, $course->id)) {
        print_error('invalidcoursemodule');
    }
}

require_login($course, true, $cm);

//$context = get_context_instance(CONTEXT_MODULE, $cm->id);
$context = context_module::instance($cm->id);
require_capability('mod/quiz:viewreports', $context);

//accès web service pour récuperer les détails de l'examen '
if (!$ciidetails = c2i_getexamen($ciiexamen->id_examen))
    print_error('err_examunknown', 'ciiexamen');

add_to_log($course->id, "ciiexamen", "view", "viewresultats.php?id=$cm->id", "$ciiexamen->id");

$groupmode = groups_get_activity_groupmode($cm);
if ($groupmode)
    $currentgroup = groups_get_activity_group($cm, true); //true = mise à jour !
else
    $currentgroup = false; // rev 415

$res = c2i_getresultats($ciiexamen->id_examen);
//print ("res=".print_r($res,true));
//aucun inscrit
if (count($res) == 1 && $res[0]->error)
    $res = array ();
;
$nbtotal = count($res);

$res2 = filtre_donnees($res, $context, $cm, $currentgroup);

$nbfiltres = count($res2);

if ($download) {

    if ($res2)
        foreach ($res2[0]->details as $col) {
            $tablecolumns[] = $col->competence;
            $tableheaders[] = $col->competence;
            $tabledroite[] = $col->competence;
        }
    $strresponses = get_string("resultats_examen", "ciiexamen");

    if ($download == "ods" && has_capability('mod/choice:downloadresponses', $context)) {
        require_once ("$CFG->libdir/odslib.class.php");

        /// Calculate file name
        $filename = clean_filename("$course->shortname " . strip_tags(format_string($ciiexamen->name, true))) . '.ods';
        /// Creating a workbook
        $workbook = new MoodleODSWorkbook("-");
        /// Send HTTP headers
        $workbook->send($filename);
        /// Creating the first worksheet
        $myxls = & $workbook->add_worksheet($strresponses);

        /// Print names of all the fields
        $myxls->write_string(0, 0, get_string("lastname"));
        $myxls->write_string(0, 1, get_string("firstname"));
        $myxls->write_string(0, 2, get_string("idnumber"));
        $myxls->write_string(0, 3, get_string("group"));
        $myxls->write_string(0, 4, get_string("score_global", "ciiexamen"));
        $pos = 5;
        if ($res2) {
            foreach ($res2[0]->details as $col) {
                $myxls->write_string(0, $pos++, $col->competence);
            }
        }
        $myxls->write_string(0, $pos++, get_string("ip", "ciiexamen"));
        $myxls->write_string(0, $pos++, get_string("date_passage1", "ciiexamen"));
        $myxls->write_string(0, $pos++, get_string("date_passage", "ciiexamen"));

        $myxls->write_string(0, $pos++, get_string("origine", "ciiexamen"));
        /// generate the data for the body of the spreadsheet

        if ($res2) {
            $row = 1;
            foreach ($res2 as $ligne) {
                $pos = 0;
                $myxls->write_string($row, $pos++, $ligne->user->lastname);
                $myxls->write_string($row, $pos++, $ligne->user->firstname);
                $studentid = (!empty ($ligne->user->idnumber) ? $ligne->user->idnumber : " ");
                $myxls->write_string($row, $pos++, $studentid);
                $ug2 = '';
                if ($usergrps = groups_get_all_groups($course->id, $ligne->user->id)) {
                    foreach ($usergrps as $ug) {
                        $ug2 = $ug2 . $ug->name;
                    }
                }
                $myxls->write_string($row, $pos++, $ug2);
                $myxls->write_number($row, $pos++, $ligne->score);

                foreach ($ligne->details as $col) {
                    $myxls->write_number($row, $pos++, $col->score);
                }
                $myxls->write_string($row, $pos++, $ligne->ip);
                $myxls->write_string($row, $pos++, $ligne->date);
                $myxls->write_string($row, $pos++, userdate($ligne->date));
                $myxls->write_string($row, $pos++, $ligne->origine);
                $row++;

            }

        }
        /// Close the workbook
        $workbook->close();

        exit;
    }

    //print spreadsheet if one is asked for:
    if ($download == "xls" && has_capability('mod/choice:downloadresponses', $context)) {
        require_once ("$CFG->libdir/excellib.class.php");

        /// Calculate file name
        $filename = clean_filename("$course->shortname " . strip_tags(format_string($ciiexamen->name, true))) . '.xls';
        /// Creating a workbook
        $workbook = new MoodleExcelWorkbook("-");
        /// Send HTTP headers
        $workbook->send($filename);
        /// Creating the first worksheet
        $myxls = & $workbook->add_worksheet($strresponses);
        /// Print names of all the fields
        $myxls->write_string(0, 0, get_string("lastname"));
        $myxls->write_string(0, 1, get_string("firstname"));
        $myxls->write_string(0, 2, get_string("idnumber"));
        $myxls->write_string(0, 3, get_string("group"));
        $myxls->write_string(0, 4, get_string("score_global", "ciiexamen"));
        $pos = 5;
        if ($res2) {
            foreach ($res2[0]->details as $col) {
                $myxls->write_string(0, $pos++, $col->competence);
            }
        }
        $myxls->write_string(0, $pos++, get_string("ip", "ciiexamen"));
        $myxls->write_string(0, $pos++, get_string("date_passage1", "ciiexamen"));
        $myxls->write_string(0, $pos++, get_string("date_passage", "ciiexamen"));

        $myxls->write_string(0, $pos++, get_string("origine", "ciiexamen"));
        /// generate the data for the body of the spreadsheet

        if ($res2) {
            $row = 1;
            foreach ($res2 as $ligne) {
                $pos = 0;
                $myxls->write_string($row, $pos++, $ligne->user->lastname);
                $myxls->write_string($row, $pos++, $ligne->user->firstname);
                $studentid = (!empty ($ligne->user->idnumber) ? $ligne->user->idnumber : " ");
                $myxls->write_string($row, $pos++, $studentid);
                $ug2 = '';
                if ($usergrps = groups_get_all_groups($course->id, $ligne->user->id)) {
                    foreach ($usergrps as $ug) {
                        $ug2 = $ug2 . $ug->name;
                    }
                }
                $myxls->write_string($row, $pos++, $ug2);
                $myxls->write_number($row, $pos++, $ligne->score);

                foreach ($ligne->details as $col) {
                    $myxls->write_number($row, $pos++, $col->score);
                }
                $myxls->write_string($row, $pos++, $ligne->ip);
                $myxls->write_string($row, $pos++, $ligne->date);
                $myxls->write_string($row, $pos++, userdate($ligne->date));
                $myxls->write_string($row, $pos++, $ligne->origine);
                $row++;

            }

        }

        /// Close the workbook
        $workbook->close();
        exit;
    }
    // print text file
    if ($download == "txt" && has_capability('mod/choice:downloadresponses', $context)) {
        $filename = clean_filename("$course->shortname " . strip_tags(format_string($ciiexamen->name, true))) . '.txt';

        header("Content-Type: application/download\n");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate,post-check=0,pre-check=0");
        header("Pragma: public");

        /// Print names of all the fields
        echo get_string("lastname") . "\t";
        echo get_string("firstname") . "\t";
        echo get_string("idnumber") . "\t";
        echo get_string("group") . "\t";
        echo get_string("score_global", "ciiexamen") . "\t";
        if ($res2) {
            foreach ($res2[0]->details as $col) {
                echo $col->competence . "\t";
            }
        }
        echo get_string("ip", "ciiexamen") . "\t";
        echo get_string("date_passage1", "ciiexamen") . "\t";
        echo get_string("date_passage", "ciiexamen") . "\t";

        echo get_string("origine", "ciiexamen") . "\n";

        /// generate the data for the body of the spreadsheet
        if ($res2) {
            foreach ($res2 as $ligne) {
                echo $ligne->user->lastname . "\t";
                echo $ligne->user->firstname . "\t";
                $studentid = (!empty ($ligne->user->idnumber) ? $ligne->user->idnumber : " ");
                echo $studentid . "\t";
                $ug2 = '';
                if ($usergrps = groups_get_all_groups($course->id, $ligne->user->id)) {
                    foreach ($usergrps as $ug) {
                        $ug2 = $ug2 . $ug->name;
                    }
                }
                echo $ug2 . "\t";
                echo $ligne->score . "\t";

                foreach ($ligne->details as $col) {
                    echo $col->score . "\t";
                }
                echo $ligne->ip . "\t";
                echo $ligne->date . "\t";
                echo userdate($ligne->date) . "\t";
                echo $ligne->origine . "\n";

            }

        }
        exit;
    }
}


 $currenttab = 'resultats';
   $strciiexamens = get_string('modulenameplural', 'ciiexamen');
    $strciiexamen = get_string('modulename', 'ciiexamen');
    $strpreview = get_string('voir_details', 'ciiexamen');





    /// Initialize $PAGE, compute blocks
    $PAGE->set_url('/mod/ciiexamen/viewresultats.php', array (
        'id' => $cm->id
    ));
    $title =get_string('modulename','ciiexamen'). ' : ' . format_string($ciiexamen->name);
    $PAGE->set_context($context);

    $PAGE->set_title($title);
    $PAGE->set_heading($title);
    echo $OUTPUT->header();

     if ($groupmode) {
            groups_print_activity_menu($cm, $CFG->wwwroot . '/mod/ciiexamen/viewresultats.php?id='.$id);
        }

    /// Print the tabs


    include ('tabs.php');

      $returnurl = $CFG->wwwroot . '/mod/ciiexamen/viewresultats.php?a=' . $ciiexamen->id . '&amp;';

      $tabledroite = array ();
    /// Define a table showing a list of users in the current role selection

    $tablecolumns = array (
        'userpic',
        'fullname'
    );

    $tableheaders = array (
        '', //get_string('userpic'),
        get_string('fullname')
    );
   // $tablecolumns[] = 'username';
   // $tableheaders[] = ' Login';

    $tablecolumns[] = 'idnumber';
    $tableheaders[] = ' No Etudiant';

    $tablecolumns[] = 'score';
    $tableheaders[] = get_string('score_global', 'ciiexamen');

    $tabledroite[] = 'score';

    if ($res2)
        foreach ($res2[0]->details as $col) {
            $tablecolumns[] = $col->competence;
            $tableheaders[] = $col->competence;
            $tabledroite[] = $col->competence;
        }

    $tablecolumns[] = 'date';
    $tableheaders[] = get_string('date_passage', 'ciiexamen');

    $tablecolumns[] = 'ip';
    $tableheaders[] = get_string('ip', 'ciiexamen');
    $tablecolumns[] = 'origine';
    $tableheaders[] = get_string('origine', 'ciiexamen');

    $table = new flexible_table('ciiexamen-resultats-' . $course->id);

    $table->define_columns($tablecolumns);
    $table->define_headers($tableheaders);
    $table->define_baseurl($returnurl);

    $table->sortable(true, 'fullname', SORT_ASC);

    $table->set_attribute('cellspacing', '0');
    $table->set_attribute('id', 'participants');
    $table->set_attribute('class', 'generaltable generalbox');

    $table->set_attribute('width', '99%'); //PP

    $table->set_control_variables(array (
        TABLE_VAR_SORT => 'ssort',
        TABLE_VAR_HIDE => 'shide',
        TABLE_VAR_SHOW => 'sshow',
        TABLE_VAR_IFIRST => 'sifirst',
        TABLE_VAR_ILAST => 'silast',
        TABLE_VAR_PAGE => 'spage'
    ));

    $table->setup();

    //colonnes devant être alignées à droite
    foreach ($tabledroite as $num)
        $table->column_style($num, "text-align", "right");
    //print ($currentgroup);

    $table->pagesize($perpage, $nbfiltres);

    $min = $table->get_page_start(); //$page*$perpage;
    $max = $table->get_page_start() + $table->get_page_size(); // ($page+1)*$perpage;
    $i = -1;

    $arrondi = 1;

    unset ($res);
    $res = applique_tri($res2, $table->get_sql_sort());

    echo $OUTPUT->heading("$nbfiltres / $nbtotal " . get_string('nb_resultats', 'ciiexamen'));

    //print "$min $max";
    foreach ($res as $r) {

        $user = $r->user;
        if (!isset ($user->context)) {
            //$usercontext = get_context_instance(CONTEXT_USER, $user->id);
        	$usercontext =  context_user::instance($user->id);
        } else {
            $usercontext = $user->context;
        }
        if ($piclink = ($USER->id == $user->id || has_capability('moodle/user:viewdetails', $context) || has_capability('moodle/user:viewdetails', $usercontext))) {
            $profilelink = '<strong><a href="' . $CFG->wwwroot . '/user/view.php?id=' . $user->id . '&amp;course=' . $course->id . '">' . fullname($user) . '</a></strong>';
        } else {
            $profilelink = '<strong>' . fullname($user) . '</strong>';
        }

        $data = array (
            $OUTPUT->user_picture($user, array('courseid'=>$course->id)),
            $profilelink
        );

        $i++;
        if ($i < $min)
            continue;
        if ($i >= $max)
            break;

       // $data[] = $r->login;
        $data[] = $r->numetudiant ? $r->numetudiant : '';


      // Build the icon.
            $image = $OUTPUT->pix_icon('t/preview', $strpreview);
            $link = new moodle_url('/mod/ciiexamen/rapport.php', array (
                  'id' => $cm->id,'userid'=>$user->id));
            parse_str(CIIEXAMEN_POPUP_OPTIONS, $options);
            //print_r($options);
            $action = new popup_action('click', $link, 'questionpreview', $options);

            $link=$OUTPUT->action_link($link, $image, $action, array('title' => $strpreview));

        $data[] = $link . " " . sprintf("%.{$arrondi}f", $r->score) . "%";

        foreach ($r->details as $s)
            $data[] = sprintf("%.{$arrondi}f", $s->score) . "%";

        $data[] = userdate($r->date);
        $data[] = $r->ip;
        $data[] = $r->origine;

        $table->add_data($data);

    }
    $table->print_html();




       //now give links for downloading spreadsheets.

    if (!empty($res) && has_capability('mod/choice:downloadresponses',$context)) {
        $downloadoptions = array();
        $options = array();
        $options["id"] = "$cm->id";
        $options["download"] = "ods";
        $button =  $OUTPUT->single_button(new moodle_url("viewresultats.php", $options), get_string("downloadods"));
        $downloadoptions[] = html_writer::tag('li', $button, array('class'=>'reportoption'));

        $options["download"] = "xls";
        $button = $OUTPUT->single_button(new moodle_url("viewresultats.php", $options), get_string("downloadexcel"));
        $downloadoptions[] = html_writer::tag('li', $button, array('class'=>'reportoption'));

        $options["download"] = "txt";
        $button = $OUTPUT->single_button(new moodle_url("viewresultats.php", $options), get_string("downloadtext"));
        $downloadoptions[] = html_writer::tag('li', $button, array('class'=>'reportoption'));

        $downloadlist = html_writer::tag('ul', implode('', $downloadoptions));
        $downloadlist .= html_writer::tag('div', '', array('class'=>'clearfloat'));
        echo html_writer::tag('div',$downloadlist, array('class'=>'downloadreport'));
    }

    echo $OUTPUT->footer();



function filtre_donnees(& $res, $context, $cm, $currentgroup) {
    global $DB;
    $ret = array ();
    if (empty ($res))
        return $ret;
    //print_r($res);
    foreach ($res as $num => $r) {
       // if (is_array($r)) $r=(object)$r; // REST mode
        if (!empty($r->error) || empty ($r->login))
            continue;
        /*
         in Moodle 2.6 we must fetch all fields of table mdl_user since the renderers for fullname() and user_picture
         now check for required fields ; otherwise we get in debug developper mode errors like these for each user
         
         	You need to update your sql to include additional name fields in the user object.
			line 3570 of /lib/moodlelib.php: call to debugging()
			line 415 of /mod/ciiexamen/viewresultats.php: call to fullname()
			
			Missing firstnamephonetic property in $user object, this is a performance problem that needs to be fixed by a developer. Please use user_picture::fields() to get the full list of required fields.
			line 196 of /lib/outputcomponents.php: call to debugging()
			line 2254 of /lib/outputrenderers.php: call to user_picture->__construct()
			line 421 of /mod/ciiexamen/viewresultats.php: call to core_renderer->user_picture()
        */ 
        //if ($user = $DB->get_record('user', array('username'=>$r->login, 'deleted'=> 0), 'id,username,lastname,firstname,picture,idnumber,imagealt,email')) {
        if ($user = $DB->get_record('user', array('username'=>$r->login, 'deleted'=> 0), '*')) {

            //virer les non inscrits au cours
            if (!has_capability('mod/quiz:view', $context, $user->id)) {
                unset ($res[$num]); //save memory
                continue;
            }

            //if ($cm->groupmembersonly)
            //	if (!groups_has_membership($cm, $user->id)) {
            if (!groups_course_module_visible($cm, $user->id)) {
                unset ($res[$num]); //save memory
                continue;
            }
            if ($currentgroup) {
                if (!groups_is_member($currentgroup, $user->id)) {
                    unset ($res[$num]); //save memory
                    continue;
                }
            }
            $r->user = $user;
            $ret[] = $r;

        }
        //pas dans Moodle passer
        else
            unset ($res[$num]); //save memory
    }
    return $ret;
}

$critere = 'fullname';
$ordre = 'ASC';

function cii_resultat_cmp($a, $b) {
    global $critere, $ordre;
    $v1 = $v2 = '';
    switch ($critere) {
        case 'fullname' :
        case 'lastname' :
            $v1 = $a->user->lastname . " " . $a->user->firstname;
            $v2 = $b->user->lastname . " " . $b->user->firstname;
            break;
        case 'firstname' :
            $v1 = $a->user->firstname . " " . $a->user->lastname;
            $v2 = $b->user->firstname . " " . $b->user->lastname;
            break;
        case 'idnumber' :
        case 'username' :
            $v1 = $a->user-> $critere;
            $v2 = $b->user-> $critere;
            break;
        case 'score' :
        case 'date' :
        case 'ip' :
        case 'origine' :
            $v1 = $a-> $critere;
            $v2 = $b-> $critere;
            break;
        default :

            foreach ($a->details as $num => $comp) {
                if ($comp->competence == $critere) {
                    $v1 = $a->details[$num]->score;
                    $v2 = $b->details[$num]->score;
                    break;
                }
            }

            break;

    }

    //print "v1=".$v1." v2=".$v2;
    if (empty ($v1) || empty ($v2))
        return 0;
    if ($v1 == $v2) {
        return 0;
    }
    if ($ordre == 'ASC')
        return ($v1 < $v2) ? -1 : 1;
    else
        return ($v1 > $v2) ? -1 : 1;
}

function applique_tri($table, $sqlcritere) {
    global $critere, $ordre;
    //print $sqlcritere; //fullname ASC ou username ASC,fullname DESC
    $criteresql = explode(',', $sqlcritere); //la table accumule les critères
    list ($critere, $ordre) = explode(" ", $criteresql[0]);
    //print_r($table);

    usort($table, "cii_resultat_cmp");
    return $table;
}
?>
