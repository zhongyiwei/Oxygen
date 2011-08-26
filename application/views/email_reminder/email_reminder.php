<?php

date_default_timezone_set('Asia/Singapore');
function firstOfMonth() {
    return date("Y-m-d", strtotime(date('m').'/01/'.date('Y').' 00:00:00'));
}

function lastOfMonth() {
    return date("Y-m-d", strtotime('-1 second',strtotime('+1 month',strtotime(date('m').'/01/'.date('Y').' 00:00:00'))));
}

$user_query = $this->db->query('SELECT DISTINCT s.seeker_id, s.name, s.email, r.reminder_frequency from activity a, goal g, goal_category c, seeker s, reminder r
WHERE g.goal_cat_id = c.goal_cat_id
AND r.seeker_id = s.seeker_id
AND s.seeker_id = g.seeker_id
AND g.seeker_goal_id = a.seeker_goal_id
AND r.reminder_email = 1
AND r.reminder_frequency != "NULL"
AND a.activity_status != "Completed"
ORDER BY c.goal_category');


$time = date('h:i A');
foreach ($user_query->result() as $row) {

    $id = $row->seeker_id;
    $name = $row->name;
    $to = $row->email;
    $reminder = $row->reminder_frequency;
    $subject = "Oxygen - Reminder";
    $from = "reminder@oxygen.com";
    $headers = "From: $from";
  

    //Daily reminder
  
    if ($reminder=="daily") {
                
            $date = date("Y-m-d");
            $query = $this->db->query('SELECT DISTINCT s.seeker_id, g.goal_completion_status, a.activity_id, a.end_date, a.activity_name, a.activity_status
                                       FROM goal g, goal_category c, seeker s, activity a
                                       WHERE g.goal_cat_id = c.goal_cat_id
                                       AND s.seeker_id = g.seeker_id
                                       AND g.goal_completion_status != "Completed"
                                       AND a.activity_status != "Completed"
                                       AND s.seeker_id = ' . $id . '
                                       AND a.end_date = "' . $date . '"
                                       ORDER BY c.goal_category');

            if ($query->num_rows != 0) {
                if ($time == "01:00 AM") {
                    $msg = "Hi ".$name.",";
                    $msg .= "\n\nFollowing are the activities that you have to complete today: ";
                    foreach ($query->result() as $arr) {
                        //$goal_set_date = $arr->goal_set_date;
                        $msg .= "\n\nActivity Name: ".$arr->activity_name;
                        $msg .= "\n";
                        $msg .= "Status: " . $arr->activity_status;
                        $msg .= "\n";
                        $msg .= "Target End Date: " . $arr->end_date;
                    }

                    $msg .= "\n\nTo update your progress, just click on the link below :";
                    $msg .= "\nhttp://sit.rp.edu.sg/91149/oxygen/index.php/home";
                    $msg .= "\n\n";
                    $msg .= "The Oxygen Team";
                    mail($to,$subject,$msg,$headers);

                } //if ($time == "00:00") {
            } //if ($query->num_rows != 0) {

    } //if ($reminder=="daily") {
    // END daily reminder

    //Weekly reminder
    
    else if ($reminder=="weekly") {
           
        if (date('l') == "Monday") {
          
            $date = date("Y-m-d");
            $newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
            $newdate = date ( 'Y-m-d' , $newdate );

            $query = $this->db->query('SELECT DISTINCT s.seeker_id, g.goal_completion_status, a.activity_id, a.end_date, a.activity_name, a.activity_status
                                       FROM goal g, goal_category c, seeker s, activity a
                                       WHERE g.goal_cat_id = c.goal_cat_id
                                       AND s.seeker_id = g.seeker_id
                                       AND g.goal_completion_status != "Completed"
                                       AND a.activity_status != "Completed"
                                       AND s.seeker_id = ' . $id . '
                                       AND a.end_date >= "' . $date . '"
                                       AND a.end_date <= "' . $newdate . '"
                                       ORDER BY c.goal_category');
          
            if ($query->num_rows != 0) {
                if ($time == "01:00 AM") {
                    $msg = "Hi ".$name.",";
                    $msg .= "\n\nFollowing are the activities that you have to complete in this week: ";
                    foreach ($query->result() as $arr) {
                        //$goal_set_date = $arr->goal_set_date;
                        $msg .= "\n\nActivity Name: ".$arr->activity_name;
                        $msg .= "\n";
                        $msg .= "Status: " . $arr->activity_status;
                        $msg .= "\n";
                        $msg .= "Target End Date: " . $arr->end_date;
                    }

                    $msg .= "\n\nTo update your progress, just click on the link below :";
                    $msg .= "\nhttp://sit.rp.edu.sg/91149/oxygen/index.php/home";
                    $msg .= "\n\n";
                    $msg .= "The Oxygen Team";
                    mail($to,$subject,$msg,$headers);
                    echo "Success";
                } //if ($time == "00:00") {
            } //if ($query->num_rows != 0) {

        } //if (date('l') == "Sunday") {
    } //if ($reminder=="weekly") {
    // END weekly reminder


    //Monthly reminder
    else if ($reminder=="monthly") {
        $date = date("Y-m-d");
        if ($date == firstOfMonth()) {
            //$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
            $newdate = lastOfMonth();

            $query = $this->db->query('SELECT DISTINCT s.seeker_id, a.activity_id, a.end_date, a.activity_name, a.activity_status
                                       FROM goal g, goal_category c, seeker s, activity a
                                       WHERE g.goal_cat_id = c.goal_cat_id
                                       AND s.seeker_id = g.seeker_id
                                       AND g.goal_completion_status != "Completed"
                                       AND a.activity_status != "Completed"
                                       AND s.seeker_id = ' . $id . '
                                       AND a.end_date >= "' . $date . '"
                                       AND a.end_date <= "' . $newdate . '"
                                       ORDER BY c.goal_category');

            if ($query->num_rows != 0) {
                if ($time == "01:00 AM") {
                    $msg = "Hi ".$name.",";
                    $msg .= "\n\nFollowing are the activities that you have to complete in this month: ";
                    foreach ($query->result() as $arr) {
                        //$goal_set_date = $arr->goal_set_date;
                        $msg .= "\n\nActivity Name: ".$arr->activity_name;
                        $msg .= "\n";
                        $msg .= "Status: " . $arr->activity_status;
                        $msg .= "\n";
                        $msg .= "Target End Date: " . $arr->end_date;
                    }

                    $msg .= "\n\nTo update your progress, just click on the link below :";
                    $msg .= "\nhttp://sit.rp.edu.sg/91149/oxygen/index.php/home";
                    $msg .= "\n\n";
                    $msg .= "The Oxygen Team";
                    mail($to,$subject,$msg,$headers);
                    
                } //if ($time == "00:00") {
            } //if ($query->num_rows != 0) {

        } //if ($date == firstOfMonth()) {
    } //if ($reminder=="monthly") {
    //END monthly reminder

//    $msg = "Hi ".$name.",";
//    $msg .= "\n\nThis is a reminder to track your progress of the goals that you have set: ";
//    foreach ($query->result() as $arr) {
//        $goal_set_date = $arr->goal_set_date;
//        $msg .= "\n\nGoal Description: ".$arr->goal_desc;
//        $msg .= "\n";
//        $msg .= "Status: " . $arr->goal_completion_status;
//
//    }
//    $msg .= "\n\nTo update your progress now, just click on the link below :";
//    $msg .= "\nhttp://sit.rp.edu.sg/91149/oxygen/index.php/home";
//    $msg .= "\n\n";
//    $msg .= "The Oxygen Team";
//    $from = "reminder@oxygen.com";
//    $headers = "From: $from";




//    $diff = abs(strtotime($date) - strtotime($goal_set_date));
//
//    $years = floor($diff / (365*60*60*24));
//    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
//    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
//
//    $total_days = $days + $months*30 + $years*365;

//    if ($reminder=="daily") {
//        if($time == "03:28") {
//            mail($to,$subject,$msg,$headers);
//        }
//    }
//    else if ($reminder == "weekly") {
//        if ($total_days%7==0) {
//            if($time == "10:00") {
//                mail($to,$subject,$msg,$headers);
//            }
//        }
//    }
//    else if ($reminder == "monthly") {
//        if ($total_days%30==0) {
//            if($time == "10:00") {
//                mail($to,$subject,$msg,$headers);
//            }
//        }
//    }



} //foreach ($user_query->result() as $row) {





?>
