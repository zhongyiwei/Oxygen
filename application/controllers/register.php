<?php
class Register extends CI_Controller{
    
    function Register(){
        parent::__construct();
        $this->is_logged_in();
    }

    function create_member(){
        $this->load->model('membership_model');
        if($query= $this->membership_model->create_member()){
            $this->load->view('includes/template');
        }else{
            $this->load->view('register/register');
        }
    }

    function is_logged_in(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if(!isset($is_logged_in) || $is_logged_in !=true){
            return true;
        }else{
            return false;
        }
    }
}
?>
