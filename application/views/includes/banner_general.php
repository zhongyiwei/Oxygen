<?php
    $colour = $this->session->userdata('colour');

    if ($colour != ""){
        echo '<div id="logo" style="background-image: url('.  base_url().'web_images/colour/'.$colour.')">';
    }
    else {
        echo '<div id="logo" style="background-image: url('.  base_url().'web_images/colour/28.jpg)">';
    }

?>

    <?php
    $is_logged_in = $this->session->userdata('is_logged_in');
    $role= $this->session->userdata('role');
    if(isset($is_logged_in) && ($is_logged_in == 'true') && ($role=='admin')){
    ?>
    <h1><a href="<?php echo base_url();?>index.php/cms/index/">Oxygen</a></h1>
    <p><em>Guide to a successful life </em></p>
    <?php }else{
        ?>
    <h1><a href="<?php echo base_url();?>index.php/home/">Oxygen</a></h1>
    <p><em>Guide to a successful life </em></p>
    <?php } ?>
</div>
<hr />
<!-- end #logo -->
