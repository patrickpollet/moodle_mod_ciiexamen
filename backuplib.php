<?php //$Id: backuplib.php,v 1.4 2006/01/13 03:45:30 mjollnir_ Exp $
    //This php script contains all the stuff to backup/restore
    //ciiexamen mods

    //This is the "graphical" structure of the ciiexamen mod:  ????
    //
    //                       ciiexamen
    //                     (CL,pk->id)
    //
    // Meaning: pk->primary key field of the table
    //          fk->foreign key to link with parent
    //          nt->nested field (recursive data)
    //          CL->course level info
    //          UL->user level info
    //          files->table may have files)
    //
    //-----------------------------------------------------------

/**
 * PP cloné à partir de mod/label/backuplib.php qui semble le plus proche
 */

    //This function executes all the backup procedure about this mod
    function ciiexamen_backup_mods($bf,$preferences) {
        global $CFG;

        $status = true;

        ////Iterate over ciiexamen table
        if ($ciiexamens = get_records ("ciiexamen","course", $preferences->backup_course,"id")) {
            foreach ($ciiexamens as $ciiexamen) {
                if (backup_mod_selected($preferences,'ciiexamen',$ciiexamen->id)) {
                    $status = ciiexamen_backup_one_mod($bf,$preferences,$ciiexamen);
                }
            }
        }
        return $status;
    }

    function ciiexamen_backup_one_mod($bf,$preferences,$ciiexamen) {

        global $CFG;

        if (is_numeric($ciiexamen)) {  //peu probable ?
            $ciiexamen = get_record('ciiexamen','id',$ciiexamen);
        }

        $status = true;

        //Start mod
        fwrite ($bf,start_tag("MOD",3,true));
        //Print ciiexamen data
        fwrite ($bf,full_tag("ID",4,false,$ciiexamen->id));
        fwrite ($bf,full_tag("MODTYPE",4,false,"ciiexamen"));
        fwrite ($bf,full_tag("NAME",4,false,$ciiexamen->name));
        fwrite ($bf,full_tag("INTRO",4,false,$ciiexamen->intro));
        fwrite ($bf,full_tag("INTROFORMAT",4,false,$ciiexamen->introformat));
        fwrite ($bf,full_tag("TIMEOPEN",4,false,$ciiexamen->timeopen));
        fwrite ($bf,full_tag("TIMECLOSE",4,false,$ciiexamen->timeclose));
        fwrite ($bf,full_tag("ID_EXAMEN",4,false,$ciiexamen->id_examen));
        fwrite ($bf,full_tag("TYPE_EXAMEN",4,false,$ciiexamen->type_examen));
        fwrite ($bf,full_tag("AUTO_CREATION",4,false,$ciiexamen->auto_creation));
        fwrite ($bf,full_tag("SYNCHRO_GRADES",4,false,$ciiexamen->synchro_grades));
        fwrite ($bf,full_tag("GRADE",4,false,$ciiexamen->grade));
        fwrite ($bf,full_tag("TIMECREATED",4,false,$ciiexamen->timecreated));
        fwrite ($bf,full_tag("TIMEMODIFIED",4,false,$ciiexamen->timemodified));
        //End mod
        $status = fwrite ($bf,end_tag("MOD",3,true));
        // we do not save grades  since they will be synched again a the next cron if needed

        return $status;
    }

    ////Return an array of info (name,value)
    function ciiexamen_check_backup_mods($course,$user_data=false,$backup_unique_code,$instances=null) {
        if (!empty($instances) && is_array($instances) && count($instances)) {
            $info = array();
            foreach ($instances as $id => $instance) {
                $info += ciiexamen_check_backup_mods_instances($instance,$backup_unique_code);
            }
            return $info;
        }

         //First the course data
         $info[0][0] = get_string("modulenameplural","ciiexamen");
         $info[0][1] = count_records("ciiexamen", "course", "$course");
         return $info;
    }

    ////Return an array of info (name,value)
    function ciiexamen_check_backup_mods_instances($instance,$backup_unique_code) {
         //First the course data
        $info[$instance->id.'0'][0] = '<b>'.$instance->name.'</b>';
        $info[$instance->id.'0'][1] = '';
        return $info;
    }

?>
