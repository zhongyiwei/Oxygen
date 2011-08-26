<?php

class Membership_model extends CI_Model {

    function validate() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', sha1($this->input->post('password')));

        $query = $this->db->get('seeker');

        if ($query->num_rows == 1) {
            $record = $query->result();
        } else {
            $record = null;
        }
        return $record;
    }

    function create_member() {
        $new = array(
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'gender' => $this->input->post('gender'),
            'date_of_birth' => $this->input->post('date_of_birth'),
            'nationality' => $this->input->post('nationality'),
            'password' => sha1($this->input->post('password')),
            'mobile_number' => $this->input->post('mobile_number'),
            'role' => 'member'
        );

        $insert = $this->db->insert('seeker', $new);
        return $insert;
    }

    function update_member() {
        $data=array(
            'name'=>  $this->input->post('name'),
            'gender'=>  $this->input->post('gender'),
            'date_of_birth'=>  $this->input->post('date_of_birth'),
            'nationality'=>  $this->input->post('nationality'),
            'mobile_number'=>  $this->input->post('mobile_number'),
            'email'=>  $this->input->post('email'),
        );
        $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
        $update_info=$this->db->update('seeker',$data);
        return $update_info;
    }

    function select_info() {
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
        $query = $this->db->get();

        if ($query->num_rows == 1) {
            $record = $query->result();
        } else {
            $record = null;
        }
        return $record;
    }

    function update_password(){
        $this->db->select('password');
        $this->db->from('seeker');
        $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
        $this->db->where('password', sha1($this->input->post('password')));
        $password=$this->db->get();

        if ($password->num_rows == 1) {
            $new=array(
                'password'=> sha1($this->input->post('password_new'))
            );

        $this->db->where('seeker_id', $this->session->userdata('seeker_id'));
        $update_pass=$this->db->update('seeker',$new);
        
        } else {
            $update_pass = null;
        }
        return $update_pass;
    }

}

?>
