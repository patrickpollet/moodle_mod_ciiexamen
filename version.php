<?php // $Id: version.php 313 2009-12-16 06:23:08Z ppollet $

/**
 * Code fragment to define the version of ciiexamen
 * This fragment is called by moodle_needs_upgrading() and /admin/index.php
 *
 * @author  Patrick Pollet <ppr@patrickpollet.net>
 * @version $Id: version.php 313 2009-12-16 06:23:08Z ppollet $
 * @package mod/ciiexamen
 */

//$module->version  = 2009071813;  // The current module version (Date: YYYYMMDDXX)
//bumped for new settings
$module->version  = 2012050100;
$module->requires  = 2011112900;        // Requires this Moodle version (Moodle 2.0 ) 
$module->cron     = 1;           // Period for cron to check this module (secs)

?>
