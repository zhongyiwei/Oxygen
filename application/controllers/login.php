<?php

class Login extends CI_Controller {

    function Login() {
        parent::__construct();
        $this->load->library('session');
    }

    function log_out() {
        $this->session->sess_destroy();
        redirect('home/index');
    }

    function index() {
        $this->load->view('includes/template');
    }

    function validate() {
        $this->load->model('membership_model');
        $query = $this->membership_model->validate();

        if (!$query == null) {
            $data = array(
                'email' => $this->input->post('email'),
                'role'=> $query[0]->role,
                'is_logged_in' => true,
                'seeker_id'=>$query[0]->seeker_id,
                'name'=>$query[0]->name
            );

            $this->session->set_userdata($data);

            if($query[0]->role=='member'){
                redirect('home/index');}
            else if($query[0]->role=='admin'){
                redirect('cms/index');
            }
        } else {
            $this->index();
        }
    }

    function register() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == 'true') {//if user have logged in, they are not able to register
            $this->load->view('includes/template');
        } else {
            $this->load->view('register/register');
        }
    }

    function create_member() {
        $this->load->library('form_validation');

        // field name, error message, validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'trim|required|');
        $this->form_validation->set_rules('nationality', 'Nationality', 'trim|required|alpha');
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'trim|required|min_length[8]|numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'trim|required|matches[password]');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register/register');
        } else {
            $this->load->model('membership_model');
            if ($query = $this->membership_model->create_member()) {
                $this->load->view('includes/template');
            } else {
                $this->load->view('register/register');
            }
        }
    }

}

?>
