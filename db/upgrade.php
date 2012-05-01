<?php  //$Id: upgrade.php 282 2009-11-12 07:44:41Z ppollet $

// This file keeps track of upgrades to
// the ciiexamen module
//
// Sometimes, changes between versions involve
// alterations to database structures and other
// major things that may break installations.
//
// The upgrade function in this file will attempt
// to perform all the necessary actions to upgrade
// your older installtion to the current version.
//
// If there's something it cannot do itself, it
// will tell you what you need to do.
//
// The commands in here will all be database-neutral,
// using the functions defined in lib/ddllib.php

function xmldb_ciiexamen_upgrade($oldversion=0) {

    global $CFG, $THEME, $db;

    $result = true;

/// And upgrade begins here. For each one, you'll need one
/// block of code similar to the next one. Please, delete
/// this comment lines once this file start handling proper
/// upgrade code.

/// if ($result && $oldversion < YYYYMMDD00) { //New version in version.php
///     $result = result of "/lib/ddllib.php" function calls
/// }

/// Lines below (this included)  MUST BE DELETED once you get the first version
/// of your module ready to be installed. They are here only
/// for demonstrative purposes and to show how the ciiexamen
/// iself has been upgraded.

/// For each upgrade block, the file ciiexamen/version.php
/// needs to be updated . Such change allows Moodle to know
/// that this file has to be processed.

/// To know more about how to write correct DB upgrade scripts it's
/// highly recommended to read information available at:
///   http://docs.moodle.org/en/Development:XMLDB_Documentation
/// and to play with the XMLDB Editor (in the admin menu) and its
/// PHP generation posibilities.

/// First example, some fields were added to the module on 20070400
    if ($result && $oldversion <  2009071804) {

    /// Define field course to be added to ciiexamen
        $table = new XMLDBTable('ciiexamen');
        $field = new XMLDBField('synchro_grades');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '1', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, '1', 'auto_creation');
    /// Launch add field course
        $result = $result && add_field($table, $field);

   
    }
    
         if ($result && $oldversion <  2009071812) {

    /// Define field course to be added to ciiexamen
        $table = new XMLDBTable('ciiexamen');
        $field = new XMLDBField('grade');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', false, XMLDB_NOTNULL, null, null, null, '100', 'synchro_grades');
    /// Launch add field course
        $result = $result && add_field($table, $field);

   
    } 
    
           if ($result && $oldversion <  2009071813) {

    /// Define field course to be added to ciiexamen
        $table = new XMLDBTable('ciiexamen');
        $field = new XMLDBField('timeopen');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, 0, 'grade');
    /// Launch add field course
        $result = $result && add_field($table, $field);
            $field = new XMLDBField('timeclose');
        $field->setAttributes(XMLDB_TYPE_INTEGER, '10', XMLDB_UNSIGNED, XMLDB_NOTNULL, null, null, null, 0, 'timeopen');
    /// Launch add field course
        $result = $result && add_field($table, $field);

   
    } 
    

/// And that's all. Please, examine and understand the 3 example blocks above. Also
/// it's interesting to look how other modules are using this script. Remember that
/// the basic idea is to have "blocks" of code (each one being executed only once,
/// when the module version (version.php) is updated.

/// Lines above (this included) MUST BE DELETED once you get the first version of
/// yout module working. Each time you need to modify something in the module (DB
/// related, you'll raise the version and add one upgrade block here.

/// Final return of upgrade result (true/false) to Moodle. Must be
/// always the last line in the script
    return $result;
}

?>
