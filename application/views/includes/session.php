<?php
$colour = $_GET['colour'];
$newdata = array(
                   'colour'  => $colour
               );

$this->session->set_userdata($newdata);
header('Location:'. base_url() .'home');
?>
