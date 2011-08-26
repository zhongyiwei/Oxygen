<?php

class Home extends CI_Controller {
    function  __construct() {
        parent::__construct();
    }

    function index(){
        $this->load->view('includes/template');
    }
	
	//Wenjie-----Value & Resilience
	
    function value() {
        $data['main'] = 'value/value_understanding';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }

    function whyValue() {
        $data['main'] = 'value/value_needs';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }

    function determineValue() {
        $data['main'] = 'value/value_determination';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }

    function valueDesc() {

        $value = $this->input->post('value');

        $data['main'] = 'value_description';

        if ($this->input->post('ajax')) {
            $this->load->view($data['main']);
        } else {
            $data['main'] = 'value/value_determination';
            $data['nav'] = 'mission_statement/left_nav_value';
            $this->load->view('value/subpage_valuedetermination', $data);
        }
    }

    function evaluate_values() {
        $data['main'] = 'value/evaluate_values';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }
	     function insert_values() {
        $data['main'] = 'value/insert_values';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }
           function do_insert_values() {
        $data['main'] = 'value/do_insert_values';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }
       function delete_values() {
        $data['main'] = 'value/delete_values';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }
            function do_delete_values() {
        $data['main'] = 'value/do_delete_values';
        $data['nav'] = 'mission_statement/left_nav_value';
        $this->load->view('value/subpage_value', $data);
    }
    function test_resilience(){
        $data['main']='resilience/test_resilience';
        $data['nav']='includes/left_nav_resilience';
        $this->load->view('resilience/subpage_resilience',$data);
        }
    function test_result(){
        $data['main']='resilience/test_result';
        $data['nav']='includes/left_nav_resilience';
        $this->load->view('resilience/subpage_resilience',$data);
    }
	
	//End of Wenjie----Value & Resilience
	
	//Arian ---- activity Tracking
    function activity_tracking(){
        parse_str($_SERVER['QUERY_STRING'],$_GET);
        $this->load->model('activity_tracking_model');
        $this->activity_tracking_model->update_activity_status();
        $data['main_activity']='set_activity/activity_tracking';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }
	//End of tracking --- Arian
	
	
	
//Bowen ----- Goal & Smart
    function goal(){
         $data['main']='subpage/holistic';
        $data['nav']='includes/left_nav_goal';
        $this->load->view('subpage/subpage_goal',$data);
    }
	
    function holistic() {
        $data['main'] = 'subpage/set_holistic';
        $data['nav'] = 'includes/left_nav_goal';
        $this->load->view('subpage/subpage_goal', $data);
    }
	
    function smart() {
        $data['main'] = 'subpage/smart_goal';
        $data['nav'] = 'includes/left_nav_goal';
        $this->load->view('subpage/subpage_goal', $data);
    }


function see_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $data['main'] = 'subpage/see_goal';
            $data['nav'] = 'includes/left_nav_goal';
            $this->load->view('subpage/subpage_goal', $data);
        } else {
            $this->load->view('subpage/login');
        }
    }
	
    function update_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $data['main'] = 'subpage/update_goal_setting';
            $data['nav'] = 'includes/left_nav_goal';
            $this->load->view('subpage/update_goal_setting', $data);
        } else {
            $this->load->view('subpage/login');
        }
    }

    function change_password(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->view('register/update_password');
        }
    }

    function personal_info(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->model('membership_model');
            $member_info=$this->membership_model->select_info();

            if(!$member_info==null){
                $old_info['id']=$member_info[0]->seeker_id;
                $old_info['email']=$member_info[0]->email;
                $old_info['name']=$member_info[0]->name;
                $old_info['gender']=$member_info[0]->gender;
                $old_info['dob']=$member_info[0]->date_of_birth;
                $old_info['nationality']=$member_info[0]->nationality;
                $old_info['hp']=$member_info[0]->mobile_number;
            }
            $this->load->view('register/update',$old_info);
        }
    }
	
	//End of Bowen ----- Goal & Smart



    //Robin --- Activity & Portfolio & Mission statement & Coat of Arms
    function why_activity(){
        $data['main_activity']='set_activity/main_wa';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }

    function activity(){
        $data['main_activity']='set_activity/main_sc';
        //$data['main_activity_task']='set_activity/main_sc_task';
        $data['nav_goal']='includes/left_nav_goal';
        //$data2['activity_form']='set_activity/activity_form';
        $this->load->view('set_activity/template_sc',$data);
        //$this->load->view('set_activity/main_sc',$data2);
    }

    function activity_page(){
        $data['main_activity']='set_activity/main_sc';
        $data['nav_goal']='set_activity/left_nav_ac';
        $this->load->view('set_activity/template_sc',$data);
    }

    function activity_info(){
        $data['main_activity']='set_activity/main_info';
        $data['nav_goal']='set_activity/left_nav_ac';
        $this->load->view('set_activity/template_sc',$data);
    }



    function set_reminder(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true'))
        {
        $this->load->model('link_db_model');
        //echo "here";
        $query = $this->link_db_model->get_reminder(); //change to get_goal in future
        if ($query->num_rows() == 0) {
        //echo "here1";
        $data['main_activity']='set_activity/main_sr';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
        }
        else{
            echo "here";
            $data['main_activity']='set_activity/main_do_sr';
            $data['nav_goal']='includes/left_nav_goal';
            $this->load->view('set_activity/template_sc',$data);
        }
        }
        else{
            $this->load->view('portfolio/page_visitor');
        }
    }

    function reminder_setting(){
        $this->load->model('link_db_model');
        $data['rows'] = $this->link_db_model->get_reminder();

        $data['main_activity']='set_activity/main_rs';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }

        function reminder_update(){
        $this->load->model('link_db_model');
        $query = $this->link_db_model->get_reminder();
        if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['frequency']=$row[0]->reminder_frequency;
            $data['email']=$row[0]->reminder_email;
            $data['sms']=$row[0]->reminder_sms;
        }
        else{

        }
        $data['main_activity']='set_activity/main_urs';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }


    function update_activity(){
        parse_str($_SERVER['QUERY_STRING'],$_GET); //converts query string into global GET 
        $this->load->model('link_db_model');
        $data['rows'] = $this->link_db_model->get_activity();

        $data['main_activity']='set_activity/main_ua';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }
    function activity_list(){
        $data['main_activity']='set_activity/main_al';
        $data['nav_goal']='includes/left_nav_goal';
        $this->load->view('set_activity/template_sc',$data);
    }

     function coat_of_arm(){
        $data['main']='mission_statement/main_coa';
        $data['nav_value']='mission_statement/left_nav_value';
        $this->load->view('mission_statement/template_ms',$data);
     }

    function why_coat_of_arm(){
        $data['main']='mission_statement/main_wcoa';
        $data['nav_value']='mission_statement/left_nav_value';
        $this->load->view('mission_statement/template_ms',$data);
    }

    function update_coa(){
            $this->load->model('link_db_model');
            $data['rows'] = $this->link_db_model->get_mission();

            $data['main_portfolio']='portfolio/main_ucoa';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
    }

    function view_coa_ms(){
        $data['main']='mission_statement/main_coa_ms';
        $data['nav_value']='mission_statement/left_nav_value';
        $this->load->view('mission_statement/template_ms',$data);
    }

    function why_ms(){
        $data['main']='mission_statement/main_wm';
        $data['nav_value']='mission_statement/left_nav_value';
        $this->load->view('mission_statement/template_ms',$data);
    }

    function mission_statement(){
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) 
        {
        $this->load->library('form_validation');
         $this->load->model('link_db_model');
         $data['rows'] = $this->link_db_model->get_mission();
             if($data['rows']->num_rows() == 0){
                $data['main']='mission_statement/main_ms';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
             }else{
             $this->load->model('link_db_model');
             $query = $this->link_db_model->get_mission();
              if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['mission_statement']=$row[0]->mission_statement;
             }
              $data['main']='mission_statement/main_ms_set';
                $data['nav_value']='mission_statement/left_nav_value';
                $this->load->view('mission_statement/template_ms',$data);
            }
        } else {
            $data['main']='mission_statement/main_ms';
            $data['nav_value']='mission_statement/left_nav_value';
            $this->load->view('mission_statement/template_ms',$data);
        }
    }

    function update_ms(){
        $this->load->model('link_db_model');
        $query = $this->link_db_model->get_mission();
        if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['mission_set']=$row[0]->mission_statement;
            //$this->load->view('mission_statement/template_ms', $data);
        }
        $data['main']='mission_statement/main_ums';
        $data['nav_value']='mission_statement/left_nav_value';
        $this->load->view('mission_statement/template_ms',$data);
    }

   
    function portfolio(){
         $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true'))
        {
        $this->load->model('link_db_model');
        $query= $this->link_db_model->get_value();
        if ($query->num_rows() == 0){
            $data['main_portfolio']='portfolio/main_error';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        //echo "here";
        }
        else{
        $data['rows2'] = $this->link_db_model->get_coa(); //change to get_goal in future
        if($data['rows2'] == null){
            $data['rows'] = $this->link_db_model->get_motto();
            $this->load->model('link_db_model');
            $data['main_portfolio']='portfolio/main_mp';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        }
        else{
            $data['main_portfolio']='portfolio/main_do_coa';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);

        }
        }}
        else{
            $this->load->view('portfolio/page_visitor');
        }
    }

    
        function portfolio_coa_motto(){
         $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true'))
        {
        $this->load->model('link_db_model');
        $data['rows'] = $this->link_db_model->get_mission();

        $data['main_portfolio']='portfolio/main_coa_info';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
        }else{
            $this->load->view('portfolio/page_visitor');
        }
    }



    function portfolio_motto(){
         $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true'))
        {
        $this->load->model('link_db_model');
        $data['rows'] = $this->link_db_model->get_motto();
        if($data['rows']->num_rows() == 0){
                $data['main_portfolio']='portfolio/main_motto';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
             }else{
                  $this->load->model('link_db_model');
                  $query = $this->link_db_model->get_motto();
                     if ($query->num_rows() > 0) {
                         $row=$query->result();
                         $data['motto']=$row[0]->motto;
                      }
              $data['main_portfolio']='portfolio/main_motto_set';
                $data['nav_portfolio']='portfolio/left_nav_mp';
                $this->load->view('portfolio/template_mp',$data);
            }
        }else{
            $data['main_portfolio']='portfolio/main_motto';
            $data['nav_portfolio']='portfolio/left_nav_mp';
            $this->load->view('portfolio/template_mp',$data);
        }
    }

        function update_motto(){
        $this->load->model('link_db_model');
        $query = $this->link_db_model->get_motto();
        if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['motto_set']=$row[0]->motto;
            //$this->load->view('mission_statement/template_ms', $data);
        }

        $data['main_portfolio']='portfolio/main_umotto';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
    }


        function portfolio_mission(){
         $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true'))
        {
        $this->load->model('link_db_model');
        $query = $this->link_db_model->get_motto();
        if ($query->num_rows() > 0) {
            $row=$query->result();
            $data['motto_set']=$row[0]->motto;
            //$this->load->view('mission_statement/template_ms', $data);
        }
        else{
            $data['motto_set']="You have not set any motto yet";
        }

        $query1 = $this->link_db_model->get_mission();
        if ($query1->num_rows() > 0) {
            $row1=$query1->result();
            $data['mission_set']=$row1[0]->mission_statement;
            //$this->load->view('mission_statement/template_ms', $data);
        }
        else{
            $data['mission_set']="You have not set any mission yet";
        }

        $query2 = $this->link_db_model->get_value();
        if ($query2->num_rows() > 0) {
            $row2=$query2->result();
            $data['value1']=$row2[0]->value_name;
            $data['value2']=$row2[1]->value_name;
            $data['value3']=$row2[2]->value_name;
            $data['value4']=$row2[3]->value_name;
            //$this->load->view('mission_statement/template_ms', $data);
        }
        else{
            $data['value1']="No value";
            $data['value2']="No value";
            $data['value3']="No value";
            $data['value4']="No value";
        }
        $num_rows=$this->link_db_model->get_portfolio_goal_activity();
         if ($num_rows == null){
        $data['rows']="";
        }
        else{
            $data['rows'] = $this->link_db_model->get_portfolio_goal_activity();
        }

        $data['main_portfolio']='portfolio/main_portfolio';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
        }else{
            $this->load->view('portfolio/page_visitor');
        }
    }


    function portfolio_goal(){        
        $data['main_portfolio']='subpage/see_goal';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
    }

    function portfolio_activity(){
        $this->load->model('link_db_model');
        //$data['rows'] = $this->link_db_model->get_activity();

        $data['main_portfolio']='set_activity/main_al';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
    }

    function portfolio_tracking(){
        parse_str($_SERVER['QUERY_STRING'],$_GET);
        $this->load->model('activity_tracking_model');
        $this->activity_tracking_model->update_activity_status();
        $data['main_portfolio']='set_activity/activity_tracking';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
    }

    function portfolio_value(){
        $data['main_portfolio'] = 'value/value_determination';
        $data['nav_portfolio'] = 'portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp', $data);
    }

    function portfolio_resilience(){
        $data['main_portfolio']='portfolio/main_resilience';
        $data['nav_portfolio']='portfolio/left_nav_mp';
        $this->load->view('portfolio/template_mp',$data);
    }


    //End of Robin --- Activity & Portfolio & Mission statement & Coat of Arms
    function get_session(){
        parse_str($_SERVER['QUERY_STRING'],$_GET);
        $colour = $_GET['colour'];
        $newdata = array(
                       'colour'  => $colour
                   );

        $this->session->set_userdata($newdata);
        $this->load->view('includes/template');
    }

    function email(){

        $this->load->view('email_reminder/email_reminder');
    }
}

?>