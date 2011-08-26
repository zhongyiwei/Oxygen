<?php

/*
 * send email with gmail
 */
class Email extends CI_Controller {

    function construct(){
        parent:: Controller();
    }
    
    function index(){

    }
    function send() {
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('tom.caibowen@gmail.com', 'Admin');
        $this->email->to('91150@myrp.edu.sg');
        $this->email->subject('Testing');
        $this->email->message('It is working. Great!');

        if ($this->email->send()) {
            echo 'Your email was sent !!! ';
        }else {
            show_error($this->email->print_debugger());
        }
    }

}

?>
