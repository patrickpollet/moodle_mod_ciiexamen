<?php //$Id: restorelib.php,v 1.13 2006/09/18 09:13:04 moodler Exp $
    //This php script contains all the stuff to backup/restore
    //ciiexamen mods

    //This is the "graphical" structure of the ciiexamen mod:
    //
    //                       ciiexamen
    //                    (CL,pk->id)
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

    //This function executes all the restore procedure about this mod
    function ciiexamen_restore_mods($mod,$restore) {

        global $CFG;

        $status = true;

        //Get record from backup_ids
        $data = backup_getid($restore->backup_unique_code,$mod->modtype,$mod->id);

        if ($data) {
            //Now get completed xmlized object
            $info = $data->info;

            //Now, build the ciiexamen record structure
            $ciiexamen->course = $restore->course_id;
            $ciiexamen->name = backup_todb($info['MOD']['#']['NAME']['0']['#']);
            $ciiexamen->intro = backup_todb($info['MOD']['#']['INTRO']['0']['#']);
            $ciiexamen->introformat = backup_todb($info['MOD']['#']['INTROFORMAT']['0']['#']);
            $ciiexamen->id_examen = backup_todb($info['MOD']['#']['ID_EXAMEN']['0']['#']);
            $ciiexamen->type_examen = backup_todb($info['MOD']['#']['TYPE_EXAMEN']['0']['#']);
            $ciiexamen->auto_creation = backup_todb($info['MOD']['#']['AUTO_CREATION']['0']['#']);
            $ciiexamen->synchro_grades = backup_todb($info['MOD']['#']['SYNCHRO_GRADES']['0']['#']);
            $ciiexamen->grade = backup_todb($info['MOD']['#']['GRADE']['0']['#']);
            $ciiexamen->timeopen = backup_todb($info['MOD']['#']['TIMEOPEN']['0']['#']);
            $ciiexamen->timeclose = backup_todb($info['MOD']['#']['TIMECLOSE']['0']['#']);


            $ciiexamen->timecreated = $info['MOD']['#']['TIMECREATED']['0']['#']; // not now ?
            $ciiexamen->timemodified = $info['MOD']['#']['TIMEMODIFIED']['0']['#'];  // 0 ????

            //The structure is equal to the db, so insert the ciiexamen
            $newid = insert_record ("ciiexamen",$ciiexamen);

            //Do some output
            if (!defined('RESTORE_SILENTLY')) {
                echo "<li>".get_string("modulename","ciiexamen")." \"".format_string(stripslashes($ciiexamen->name),true)."\"</li>";
            }
            backup_flush(300);

            if ($newid) {
                //We have the newid, update backup_ids
                backup_putid($restore->backup_unique_code,$mod->modtype,
                             $mod->id, $newid);

                // we did not backup anything else so done ...

            } else {
                $status = false;
            }
        } else {
            $status = false;
        }

        return $status;
    }


    /**
     * mise a jour de liens éventuels dans l'introduction
     */
    function ciiexamen_decode_content_links_caller($restore) {
        global $CFG;
        $status = true;

        if ($ciiexamens = get_records_sql ("SELECT l.id, l.intro
                                   FROM {$CFG->prefix}ciiexamen l
                                   WHERE l.course = $restore->course_id")) {
            $i = 0;   //Counter to send some output to the browser to avoid timeouts
            foreach ($ciiexamens as $ciiexamen) {
                //Increment counter
                $i++;
                $content = $ciiexamen->intro;
                $result = restore_decode_content_links_worker($content,$restore);

                if ($result != $content) {
                    //Update record
                    $ciiexamen->content = addslashes($result);
                    $status = update_record("ciiexamen", $ciiexamen);
                    if (debugging()) {
                        if (!defined('RESTORE_SILENTLY')) {
                            echo '<br /><hr />'.s($content).'<br />changed to<br />'.s($result).'<hr /><br />';
                        }
                    }
                }
                //Do some output
                if (($i+1) % 5 == 0) {
                    if (!defined('RESTORE_SILENTLY')) {
                        echo ".";
                        if (($i+1) % 100 == 0) {
                            echo "<br />";
                        }
                    }
                    backup_flush(300);
                }
            }
        }
        return $status;
    }

    //This function returns a log record with all the necessay transformations
    //done. It's used by restore_log_module() to restore modules log.
    function ciiexamen_restore_logs($restore,$log) {

        $status = false;

        //Depending of the action, we recode different things
        switch ($log->action) {
        case "add":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "view.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
            break;
        case "update":
            if ($log->cmid) {
                //Get the new_id of the module (to recode the info field)
                $mod = backup_getid($restore->backup_unique_code,$log->module,$log->info);
                if ($mod) {
                    $log->url = "view.php?id=".$log->cmid;
                    $log->info = $mod->new_id;
                    $status = true;
                }
            }
            break;

        // incomplet ???
        default:
            if (!defined('RESTORE_SILENTLY')) {
                echo "action (".$log->module."-".$log->action.") unknown. Not restored<br />";                 //Debug
            }
            break;
        }

        if ($status) {
            $status = $log;
        }
        return $status;
    }
?>
