<?php
class Link_db_model extends CI_Model{

function activity_sa(){
    $new_activity = array(

);
  $insert = $this->db->insert('user'/*table name*/,$new_activity);
  return $insert;
}


function input_activity(){
    $new_activity=array(
        'start_date'=>$this->input->post('start_date'),
        'end_date'=>$this->input->post('end_date'),
        'activity_name'=>$this->input->post('activity_name'),
        'activity_desc'=>$this->input->post('activity_desc'),
        //'seeker_goal_id'=>$this->input->post('goal_type_id'),
        'activity_status'=>$this->input->post('activity_status'),
        //'goal_cat_id'=>$this->input->post('goal_type_id'),
        //'seeker_id'=>$this->input->post('id_seeker'),
        'seeker_goal_id'=>$this->input->post('seeker_goal_id')
        
    );
    $insert = $this->db->insert('activity',$new_activity);
    return $insert;

}

function update_activity(){
$update_activity=array(
        'start_date'=>$this->input->post('start_date'),
        'end_date'=>$this->input->post('end_date'),
        'activity_name'=>$this->input->post('activity_name'),
        'activity_desc'=>$this->input->post('activity_desc'),
        'activity_status'=>$this->input->post('activity_status'),
        //'goal_cat_id'=>$this->input->post('goal_type_id'),
        //'seeker_id'=>$this->input->post('id_seeker'),

    );
//$this->db->where('seeker_id', $this->session->userdata('seeker_id'));
$this->db->where('activity_id', $this->input->post('activity_id'));
    //$this->db->update('mission', $update_ms);
    $update= $this->db->update('activity',$update_activity);
    return $update;

}


function get_activity(){
    //echo "here";
    parse_str($_SERVER['QUERY_STRING'],$_GET); //converts query string into global GET
    //$sql = "SELECT * FROM activity WHERE seeker_id=? AND activity_id=?";
    $sql = "SELECT * FROM activity WHERE activity_id=?";
    //$q = $this->db->query($sql, array($this->session->userdata('seeker_id'), $_GET['activity_id']));
    $q = $this->db->query($sql, array($_GET['activity_id']));

    //$q = $this->db->query($sql);
    if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
    }
   /* else{

    }*/
}



//Start of Mission relevant model

function input_mission(){
    $new=array(
            'mission_statement'=>$this->input->post('mission'),
            'seeker_id'=>$this->input->post('id_seeker')
        );
        $insert = $this->db->insert('mission',$new);
        return $insert;
}

function update_mission(){
   
   $update_ms = array(
           'mission_statement' => $this->input->post('mission_update'),
    );

    $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
    //$this->db->update('mission', $update_ms);
    $update= $this->db->update('mission',$update_ms);
    return $update;
}



function get_mission(){
    $query="SELECT mission_statement FROM mission WHERE seeker_id=?";
    $record=  $this->db->query($query,array($this->session->userdata('seeker_id')));
    return $record;

}


function input_reminder(){
    $new=array(
            'reminder_frequency'=>$this->input->post('radio_frequency'),
            'reminder_email'=>$this->input->post('email'),
            'reminder_sms'=>$this->input->post('SMS'),
            'seeker_id'=>$this->input->post('id_seeker'),
        );
        $insert = $this->db->insert('reminder',$new);
        return $insert;
}

function update_reminder(){
    $new=array(
            'reminder_frequency'=>$this->input->post('radio_frequency'),
            'reminder_email'=>$this->input->post('email'),
            'reminder_sms'=>$this->input->post('SMS'),
           // 'seeker_id'=>$this->input->post('id_seeker'),
        );
        $this->db->where('seeker_id', $this->input->post('id_seeker'));
        $update = $this->db->update('reminder',$new);
        return $update;
}


function get_reminder(){
    $sql = "SELECT * FROM reminder WHERE seeker_id=?";
    $q = $this->db->query($sql, array($this->session->userdata('seeker_id')));

    return $q;
}
   




function input_coa(){
        $new_coa=array(
        'shield'=>$this->input->post('shield_coa'),
        'banner'=>$this->input->post('banner_coa'),
        'crest'=>$this->input->post('crest_coa'),
        'seeker_id'=>$this->input->post('id_seeker'),
    );
    $insert = $this->db->insert('coat_of_arm',$new_coa);
    return $insert;

}

function update_coa(){

   $update_coa = array(
            'shield'=>$this->input->post('shield_coa'),
            'banner'=>$this->input->post('banner_coa'),
            'crest'=>$this->input->post('crest_coa'),
    );

    $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
    //$this->db->update('mission', $update_ms);
    $update= $this->db->update('coat_of_arm',$update_coa);
    return $update;
}




function get_coa(){
    $sql = "SELECT * FROM coat_of_arm WHERE seeker_id=?";
    $q = $this->db->query($sql, array($this->session->userdata('seeker_id')));

    //$q = $this->db->query($sql);
    if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
    }
    //return $q;
}

function get_coa2(){
    $sql = "SELECT * FROM coat_of_arm WHERE seeker_id=?";
    $q = $this->db->query($sql, array($this->session->userdata('seeker_id')));

    return $q;
}

function get_value_symbol(){
    $sql = "SELECT value_symbol FROM value v, seeker_value sv WHERE v.value_id = sv.value_id AND seeker_id=?";
    $q = $this->db->query($sql, array($this->session->userdata('seeker_id')));
    if($q->num_rows() > 0){
    return $q;
    }
}


function input_motto(){
    $new=array(
            'motto'=>$this->input->post('motto_input'),
            'seeker_id'=>$this->input->post('id_seeker')
        );
        $insert = $this->db->insert('motto',$new);
        return $insert;
}

function update_motto(){

   $update_ms = array(
           'motto' => $this->input->post('motto_update'),
    );

    $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
    //$this->db->update('mission', $update_ms);
    $update= $this->db->update('motto',$update_ms);
    return $update;
}


function get_motto(){
    $query="SELECT motto FROM motto WHERE seeker_id=?";
    $record=  $this->db->query($query,array($this->session->userdata('seeker_id')));
    return $record;
}




function get_goal(){
    //$sql = "SELECT activity_name, activity_desc, start_date, end_date, goal_cat_id FROM activity WHERE seeker_id = 7 AND goal_cat_id = 1";
    //$sql = "SELECT * FROM activity WHERE seeker_id = 7 AND goal_cat_id = 1";
    //$sql = "SELECT * FROM goal WHERE seeker_id=? AND goal_cat_id=? AND goal_completion_status=?";
    //$q = $this->db->query($sql, array($this->session->userdata('seeker_id'), 50,"Preparing"));
    $this->db->select('*');
    $this->db->from('goal');
    $this->db->where('seeker_id',$this->session->userdata('seeker_id'));
    //$this->db->where('goal_cat',  $this->input->post('goal_type_id'));
    $this->db->where('seeker_goal_id',  $this->input->post('seeker_goal_id'));
    $this->db->where('goal_completion_status','Active');
    $this->db->join('goal_category','goal_category.goal_cat_id=goal.goal_cat_id');
    $q=$this->db->get();
    //$q = $this->db->query($sql);
    if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
    }
    /*
    else{
        echo 'no results';
    }*/
}

function get_portfolio_goal_activity(){
        $sql='SELECT * FROM goal g, goal_category gc
        WHERE g.goal_cat_id = gc.goal_cat_id
        AND g.goal_completion_status = "Completed"
        AND g.seeker_id = ?';
        $q = $this->db->query($sql, array($this->session->userdata('seeker_id')));

    if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                    $data[] = $row;
            }
            return $data;
    }
    //return $q;
}


function get_value(){
    //$query="SELECT motto FROM motto WHERE seeker_id=?";
    $query="SELECT v.value_name FROM seeker_value sv,value v WHERE sv.value_id=v.value_id AND seeker_id=?";
    $record=  $this->db->query($query,array($this->session->userdata('seeker_id')));
    return $record;
}



}
?>