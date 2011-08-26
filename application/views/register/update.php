
<?php $this->load->view('register/register_header'); ?>

<?php $this->load->view('includes/banner_general'); ?>
<h1>Update User Info</h1>

<table cellpadding="5" cellspace="5">
    <?php echo form_open('update_info/info'); ?>

    <tr>
        <th>Name:</th>
        <td><?php echo form_input('name', set_value('name',$name), 'id="name"'); ?></td>
        <td><?php echo form_error('name'); ?></td>
    </tr>

    <tr>
        <th>Gender:</th>
        <td><?php
    $options = array(
        'Male' => 'Male',
        'Female' => 'Female',
    );
    echo form_dropdown('gender', $options, set_value('gender',$gender));
    ?></td>
    </tr>

    <tr>
        <th>Date Of Birth:</th>
        <td><?php echo form_input('date_of_birth', set_value('date_of_birth',$dob), 'id="datepicker123"'); ?></td>
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
        'Singaporean' => 'Singaporean',
        'Thailand' => 'Thailand',
        'Vietnam' => 'Vietnam',
        'Others' => 'Others'
    );
    echo form_dropdown('nationality', $options, set_value('nationality',$nationality));
    ?></td>
        <td><?php echo form_error('nationality'); ?></td>
    </tr>

    <tr>
        <th>Mobile Number:</th>
        <td><?php echo form_input('mobile_number', set_value('mobile_number',$hp)); ?></td>
        <td><?php echo form_error('mobile_number'); ?></td>
    </tr>

    <tr>
        <th>Email:</th>
        <td><?php echo form_input('email', set_value('email',$email)); ?></td>
        <td><?php echo form_error('email'); ?></td>
    </tr>

    <tr>
        <td><?php echo form_submit('submit', 'Submit'); ?></td>
    </tr>
    <?php echo form_close(); ?>
</table>

<?php $this->load->view('includes/footer_general'); ?>