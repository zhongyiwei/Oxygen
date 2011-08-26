
<?php $this->load->view('register/register_header'); ?>

<?php $this->load->view('includes/banner_general'); ?>
<h1>Create An Account</h1>

<table cellpadding="5" cellspace="5">
    <?php echo form_open('login/create_member'); ?>

    <tr>
        <th>Name:</th>
        <td><?php echo form_input('name', '', 'id="email"'); ?></td>
        <td><?php echo form_error('name'); ?></td>
    </tr>

    <tr>
        <th>Gender:</th>
        <td><?php
    $options = array(
        'male' => 'Male',
        'female' => 'Female',
    );
    echo form_dropdown('gender', $options);
    ?></td>
    </tr>

    <tr>
        <th>Date Of Birth:</th>
        <td><?php echo form_input('date_of_birth', '', 'id="datepicker123"'); ?></td>
        <td><?php echo form_error('date_of_birth'); ?></td>
    </tr>


    <tr>
        <th>Nationality:</th>
        <td><?php
    $options = array(
        'Burma' => 'Burma',
        'China' => 'China',
        'India' => 'India',
        'Indonesia' => 'Indonesia',
        'Malaysia' => 'Malaysia',
        'Singapore' => 'Singapore',
        'Thailand' => 'Thailand',
        'Vietnam' => 'Vietnam',
        'Others' => 'Others'
    );
    echo form_dropdown('nationality', $options);
    ?></td>
        <td><?php echo form_error('nationality'); ?></td>
    </tr>

    <tr>
        <th>Mobile Number:</th>
        <td><?php echo form_input('mobile_number', ''); ?></td>
        <td><?php echo form_error('monile_number'); ?></td>
    </tr>

    <tr>
        <th>Email:</th>
        <td><?php echo form_input('email', ''); ?></td>
        <td><?php echo form_error('email'); ?></td>
    </tr>

    <tr>
        <th>Password:</th>
        <td><input type="password" name="password" id="inputPassword"/></td>
        <td><div id="complexity" class="default"></div></td>
        <td><?php echo form_error('password'); ?></td>
    </tr>

    <tr>
        <th>Confirm Password:</th>
        <td><?php echo form_password('password2', ''); ?></td>
        <td><?php echo form_error('password2'); ?></td>
    </tr>
    
    <tr>
        <td><?php echo form_submit('submit', 'Register', 'id=submit_login'); ?></td>
    </tr>
    <?php echo form_close(); ?>
</table>

<?php $this->load->view('includes/footer_general'); ?>