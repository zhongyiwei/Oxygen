<?php
class Update_goal extends CI_Controller{
    function Update_goal(){
        parent::__construct();
    }
    
    function update(){
        $this->load->model('goal_setting');
        $query=$this->goal_setting->update_goal();
        if($query){
            redirect('home/holistic');
        }elseif($query==NULL){
            $this->load->view('subpage/update_goal_error');
        }else{
            $this->load->view('subpage/wrong_update');
        }
    }
}

?>
