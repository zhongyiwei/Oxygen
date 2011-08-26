<?php
class Content extends CI_Model{
    function view_seek(){
        $query="SELECT * FROM seeker";
        $answer = $this->db->query($query);

        return $answer;
    }

    function add_article(){
        $this->load->helper('date');
        $this->load->library('session');
        $date = date('Y-m-d');

        $new_article=array(
            'admin_id'=> $this->session->userdata('seeker_id'),
            'title'=> $this->input->post('title'),
            'article'=>  $this->input->post('article'),
            'date'=>$date
        );

        $insert=$this->db->insert('article',$new_article);
        return $insert;
    }

    function update_article(){
        $this->load->helper('date');
        $date = date('Y-m-d');

        $article=array(
            'title'=>  $this->input->post('new_title'),
            'article'=> $this->input->post('new_article'),
            'date'=> $date
        );
        $this->db->where('article_id',$this->input->post('article_id'));
        $update_data=$this->db->update('article', $article);

        return $update_data;

    }

    function delete_article(){
        $this->db->where('article_id', $this->input->post('delete_id'));
        $this->db->delete('article');
    }
}

?>
