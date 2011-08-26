<?php
class Update_info extends CI_Controller{
    function info(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->model('membership_model');
            $new_record=$this->membership_model->update_member();
            if($new_record){
                $this->load->view('register/update_info_successful');
            }
        }

    }

    function change_pass(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->model('membership_model');
            $pass=$this->membership_model->update_password();
            if($pass){
                $this->load->view('register/change_password_successful');
            }
        }
    }
}

?>
