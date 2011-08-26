<?php

class Set_goal extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function update() {
        $this->load->model('goal_setting');
        $query = $this->goal_setting->display_goal();

        if (!$query == null) {
            $data['id']=$query[0]->seeker_goal_id;
            $data['goal'] = $query[0]->goal_category;
            $data['goal_cat_id']=$query[0]->goal_cat_id;
            $data['goal_des'] = $query[0]->goal_desc;
            $data['achievement'] = $query[0]->achievement_criteria;
            $data['Progress'] = $query[0]->goal_completion_status;

            $this->load->view('subpage/update_goal_setting', $data);
        }
    }

    function create_family_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            //validation rules
            $this->form_validation->set_rules('family', 'Family Goal', 'trim|required');
            $this->form_validation->set_rules('family_criteria', 'Family Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 1,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_family_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                } else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_career_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('career', 'Career Goal', 'trim|required');
            $this->form_validation->set_rules('career_criteria', 'Career Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 2,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_career_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                } else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_education_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            //validation rules
            $this->form_validation->set_rules('education', 'Education Goal', 'trim|required');
            $this->form_validation->set_rules('education_criteria', 'Education Criteria', 'trim|required');

            //check the rules
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {//rules are correct
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 3,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_education_goal()) {//connect to model
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                } else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_spiritual_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('spiritual', 'Spiritual Goal', 'trim|required');
            $this->form_validation->set_rules('spiritual_criteria', 'Spiritual Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 4,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_spiritual_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                }else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_financial_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('financial', 'Financial Goal', 'trim|required');
            $this->form_validation->set_rules('financial_criteria', 'Financial Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 5,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_financial_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                }else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_social_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('social', 'Social Goal', 'trim|required');
            $this->form_validation->set_rules('social_criteria', 'Social Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 6,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_social_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                }else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }

    function create_physical_goal() {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('physical', 'Physical Goal', 'trim|required');
            $this->form_validation->set_rules('physical_criteria', 'Physical Criteria', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('subpage/wrong');
            } else {
                $seek_id = $this->session->userdata('seeker_id');
                $query = "SELECT * FROM goal WHERE seeker_id= ? and goal_cat_id=? and goal_completion_status=?";
                $record = $this->db->query($query, array($this->session->userdata('seeker_id'), 7,'Active'));
                if ($record->num_rows() == 0) {
                    $this->load->model('goal_setting');
                    if ($query = $this->goal_setting->create_physical_goal()) {
                        redirect('home/holistic');
                    } else {
                        $this->load->view('subpage/wrong');
                    }
                }else {
                    $this->load->view('subpage/add_goal_error');
                }
            }
        } else {
            $this->load->view('subpage/login');
        }
    }
}

?>
