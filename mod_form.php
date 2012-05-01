<?php //$Id: mod_form.php 282 2009-11-12 07:44:41Z ppollet $

/**
 * This file defines the main ciiexamen configuration form
 * It uses the standard core Moodle (>1.8) formslib. For
 * more info about them, please visit:
 *
 * http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * The form must provide support for, at least these fields:
 *   - name: text element of 64cc max
 *
 * Also, it's usual to use these fields:
 *   - intro: one htmlarea element to describe the activity
 *            (will be showed in the list of activities of
 *             ciiexamen type (index.php) and in the header
 *             of the ciiexamen main page (view.php).
 *   - introformat: The format used to write the contents
 *             of the intro field. It automatically defaults
 *             to HTML when the htmleditor is used and can be
 *             manually selected if the htmleditor is not used
 *             (standard formats are: MOODLE, HTML, PLAIN, MARKDOWN)
 *             See lib/web();lib.php Constants and the format_text()
 *             function for more info
 */

require_once($CFG->dirroot.'/course/moodleform_mod.php');

require_once('locallib.php');


if($CFG->wspp_using_moodle20)
	require_once(dirname(__FILE__).'/mod_form_20.php');
else
	require_once(dirname(__FILE__).'/mod_form_19.php');
?>
