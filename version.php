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
//bumped for new capabilities (addinstance...) required in Moodle 2.3
$module->version  = 2014101701;
$module->requires  = 2014051200; // Moodle 2.7.0 is required. (no more add_to_log)
$module->component = 'mod_ciiexamen';       // Full name of the plugin (used for diagnostics)
$module->cron     = 60;           // Period for cron to check this module (secs)
$module->maturity = MATURITY_STABLE; // required for registering to Moodle's database of plugins 
$module->release = '2.7 (Build 20141017)';  // required for registering to Moodle's database of plugins


?>
