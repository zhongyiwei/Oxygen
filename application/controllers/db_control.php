<?php
class Db_control extends CI_Controller{

        function Value_mission() {
        parent::__construct();
    }
     function validate_mission_input() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('mission', 'Mission', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main']='mission_statement/main_ms';
            $data['nav_value']='mission_statement/left_nav_value';
            $this->load->view('mission_statement/template_ms',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->input_mission()) {
                $query = $this->link_db_model->get_mission();
              if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['mission_statement']=$row[0]->mission_statement;
             }
              $data['main']='mission_statement/main_ms_set';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
            } else {
                $data['main']='mission_statement/main_ms';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
            }
        }
        } else {
            $this->load->view('subpage/login');
        }
    }


     function validate_mission_update() {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('mission_update', 'Mission', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main']='mission_statement/main_ums';
            $data['nav_value']='mission_statement/left_nav_value';
            $this->load->view('mission_statement/template_ms',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->update_mission()) {
                $query = $this->link_db_model->get_mission();
              if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['mission_statement']=$row[0]->mission_statement;
             }
              $data['main']='mission_statement/main_ms_set';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
            
                //$this->load->view('mission_statement/template_ms_set');
            } else {
                $data['main']='mission_statement/main_ums';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
            }
        }

    }


//Activity Related Functions:

    function validate_activity_input() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('activity_name', 'Activity name', 'trim|required');
        $this->form_validation->set_rules('activity_desc', 'Activity description', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main_activity']='set_activity/main_sc';
            $data['nav_goal']='includes/left_nav_goal';
            $this->load->view('set_activity/template_sc',$data);
        } else {
        $this->load->model('link_db_model');
        $data['rows'] = $this->link_db_model->get_goal(); 
        if($data['rows'] == null){
            $this->load->view('set_activity/template_eg');
        }else{

            if ($query = $this->link_db_model->input_activity()) {
                $data['main_activity']='set_activity/main_al';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
            } else {
                $data['main_activity']='set_activity/main_sc';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
            }
        }
        }
       } else {
            $this->load->view('subpage/login');
        }
    }

    function validate_activity_update() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('activity_name', 'Activity name', 'trim|required');
        $this->form_validation->set_rules('activity_desc', 'Activity description', 'trim|required');
        $this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
        $this->form_validation->set_rules('end_date', 'End date', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main_activity']='set_activity/main_ua';
            $data['nav_goal']='includes/left_nav_goal';
            $this->load->view('set_activity/template_sc',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->update_activity()) {
                $data['main_activity']='set_activity/main_al';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
            } else {
                $data['main']='set_activity/main_ua';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
            }
        }
       } else {
            $this->load->view('subpage/login');
        }
    }


    function get_activity(){
            $this->load->model('link_db_model');
            $data['rows'] = $this->link_db_model->get_activity();

            $data['main_portfolio']='set_activity/main_al';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
    }


    function input_reminder_control(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
                $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('radio_frequency', 'Activity name', 'trim|required');
       if ($this->form_validation->run() == FALSE) {
           $data['main_activity']='set_activity/main_rs';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
        }else{
        $this->load->model('link_db_model');
        if($query=$this->link_db_model->input_reminder()){
                $data['main_activity']='set_activity/main_al';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
        }else{
            $this->load->view('set_acivity/template_sc');
        }}
    }else {
            $this->load->view('subpage/login');
        }
    }

        function update_reminder_control(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
                $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('radio_frequency', 'Activity name', 'trim|required');
       if ($this->form_validation->run() == FALSE) {
           $data['main_activity']='set_activity/main_urs';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
        }else{
        $this->load->model('link_db_model');
        if($query=$this->link_db_model->update_reminder()){
                $data['main_activity']='set_activity/main_al';
                $data['nav_goal']='includes/left_nav_goal';
                $this->load->view('set_activity/template_sc',$data);
        }else{
            $this->load->view('set_acivity/template_sc');
        }}
    }else {
            $this->load->view('subpage/login');
        }
    }

    function get_mission_control() {
		//$this->load->model('link_db_model');
		//$data['rows'] = $this->link_db_model->get_mission();

                //$data = $this->link_db_model->get_mission();

		$this->load->view('portfolio/retrieve_ms');
	}


    function validate_coa_input(){
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('shield_coa', 'Shield', 'trim|required');
        $this->form_validation->set_rules('banner_coa', 'Banner', 'trim|required');
        $this->form_validation->set_rules('crest_coa', 'Banner', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('link_db_model');
            $data['rows'] = $this->link_db_model->get_mission();

            $data['main_portfolio']='portfolio/main_mp';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->input_coa()) {
                $data['rows2'] = $this->link_db_model->get_coa();
                $data['main_portfolio']='portfolio/main_do_coa';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            } else {
                $this->load->model('link_db_model');
                $data['rows'] = $this->link_db_model->get_motto();

                $data['main_portfolio']='portfolio/main_mp';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            }
        }
    }


        function validate_coa_update(){
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('shield_coa', 'Shield', 'trim|required');
        $this->form_validation->set_rules('banner_coa', 'Banner', 'trim|required');
        $this->form_validation->set_rules('crest_coa', 'Banner', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->model('link_db_model');
            $data['rows'] = $this->link_db_model->get_coa();

            $data['main_portfolio']='portfolio/main_ucoa';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->update_coa()) {
                $data['rows2'] = $this->link_db_model->get_coa();
                $data['main_portfolio']='portfolio/main_do_coa';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            } else {
                $this->load->model('link_db_model');
                $data['rows'] = $this->link_db_model->get_motto();

                $data['main_portfolio']='portfolio/main_mp';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            }
        }
    }





    function validate_motto_input() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('motto_input', 'Motto', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main_portfolio']='portfolio/main_motto';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->input_motto()) {
                $query = $this->link_db_model->get_motto();
              if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['motto']=$row[0]->motto;
             }
              $data['main_portfolio']='portfolio/main_motto_set';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            } else {
                $data['main_portfolio']='portfolio/main_motto';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            }
        }
        } else {
            $this->load->view('subpage/login');
        }
    }


     function validate_motto_update() {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('motto_update', 'Motto', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['main_portfolio']='portfolio/main_umotto';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        } else {
            $this->load->model('link_db_model');
            if ($query = $this->link_db_model->update_motto()) {
            $query = $this->link_db_model->get_motto();
              if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['motto']=$row[0]->motto;
             }
              $data['main_portfolio']='portfolio/main_motto_set';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            } else {
                $data['main_portfolio']='portfolio/main_umotto';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            }
        }

    }




}
?>
