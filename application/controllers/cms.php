<?php
class Cms extends CI_Controller{
    function  __construct() {
        parent::__construct();
    }

    function index(){
        $this->load->view('content_Management/graph_test');
    }

    function view_customer(){
        $data['cms']='content_Management/view';
        $this->load->view('content_Management/template',$data);
    }

    function add_article(){
        $data['cms']='content_Management/add_article';
        $this->load->view('content_Management/template',$data);
    }
    
    
    function add(){
        $this->load->model('content');
        $query=  $this->content->add_article();
        if($query){
            redirect('home/index');
        }
    }

    function update_article(){
        $data['cms']='content_Management/update';
        $this->load->view('content_Management/template',$data);
    }

    function maintain_artcile(){
        $this->load->model('content');
        $this->content->view_article();
    }

    function update(){
        $this->load->model('content');
        $query=$this->content->update_article();
        if($query){
            redirect('home/index');
        }
    }

    function delete(){
        $this->load->model('content');
        $this->content->delete_article();
        redirect('cms/update_article');
    }
}
?>
