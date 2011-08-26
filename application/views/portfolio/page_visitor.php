<?php $this->load->view('includes/header_general');?>
<?php $this->load->view('includes/banner_general');?>

<h1>&otimes;Error&otimes;</h1>

<p style="font-family:arial;color:green;font-size:15px">You have not login, please <a href="<?php echo base_url();?>index.php/home/index/">login</a> first!</p>
<p style="font-family:arial;color:green;font-size:12px">My Portfolio is only displayed to the Members. If you are not a member yet, please <a href="<?php echo base_url();?>index.php/login/register">Sign up</a> first!</p>
<?php $this->load->view('includes/footer_general'); ?>
