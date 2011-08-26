<?php $this->load->view('register/register_header'); ?>

<?php $this->load->view('includes/banner_general'); ?>
<h1>Update User Password</h1>

<table cellpadding="5" cellspace="5">
    <?php echo form_open('update_info/change_pass'); ?>
    <tr>
        <th>Please Enter Your Old Password:</th>
        <td><?php echo form_password('password', '');?></td>
    </tr>
    

    <tr>
        <th>New Password:</th>
        <td><?php echo form_password('password_new', '','id="inputPassword"');?></td>
        <td><div id="complexity" class="default"></div></td>
    </tr>

    <tr>
        <td><?php echo form_submit('submit', 'Submit'); ?></td>
    </tr>
    <?php echo form_close(); ?>
</table>
<?php $this->load->view('includes/footer_general'); ?>