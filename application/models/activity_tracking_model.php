<?php
class Activity_tracking_model extends CI_Model{

    function retrieve_goal_cat(){

        $goal_cat_query = $this->db->query('SELECT * FROM goal_category');

        if($goal_cat_query->num_rows==1){
            $record = $goal_cat_query->result();
        }
        return $record;
    }

    function update_activity_status() {
        if($this->input->get('status')==1) {
            $status="New";
        }
        else if ($this->input->get('status')==2) {
            $status="In Progress";
        }
        else {
            $status="Completed";
        }

        $update_status=array(
            'activity_status'=>$status,
            //'activity_status'=>"Completed",
        );
        $activity_id = $this->input->get('activity_id');
        
        //$this->db->where('seeker_id', $this->session->userdata('seeker_id'));
        $this->db->where('activity_id', $activity_id);
        $update= $this->db->update('activity',$update_status);
        return $update;
    }

}

?>
