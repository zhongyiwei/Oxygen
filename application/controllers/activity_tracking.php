<?php
class Activity_tracking extends CI_Controller{

        function Activity_tracking() {
        parent::__construct();
        }
    
    function activity_status_update() {
        //$is_logged_in = $this->session->userdata('is_logged_in');
        //if (isset($is_logged_in) && ($is_logged_in == 'true')) {
//            $this->load->model('activity_tracking_model');
//            if ($query = $this->activity_tracking_model->update_activity_status()) {
//                        $data['main_activity']='set_activity/activity_tracking';
//        $data['nav_goal']='includes/left_nav_goal';
//        $this->load->view('set_activity/template_sc',$data);
//            } else {
//                $data['main']='set_activity/activity_tracking';
//                $data['nav_goal']='includes/left_nav_goal';
//                $this->load->view('set_activity/activity_tracking',$data);
//            }
        $this->load->model('activity_tracking_model');
        if($this->activity_tracking_model->update_activity_status()) {
                  $data['main_activity']='set_activity/activity_tracking';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
        }
        

       //} else {
       //     $this->load->view('subpage/login');
       // }
    }
}
?>
