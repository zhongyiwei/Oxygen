<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Set the reminder for your activity</h2>
            <div class="entry">
                
        <!--reminder preference selection begin-->

<script language="javascript" type="text/javascript">
$(function() {
		//$( "#checkbox_preference" ).button();
		$( "#checkbox_preference" ).buttonset();
                $( "#radio_frequency" ).buttonset();
	});
</script>
	<style>
	#format { margin-top: 2em; }
	</style>



         <div class="left"><h4>>How frequently you want the reminder to be sent to you?</h4></div>
<br><br><br>
            <div id="radio_frequency">
                 <?php
     $attributes = array('class' => 'form', 'id' => 'form', 'name' => 'set_reminder_form');
     echo form_open('db_control/update_reminder_control',$attributes);
     echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
 ?>
        <?php $data = array('name' => 'radio_frequency','id'=> 'daily_reminder','value'=> 'daily','checked'=> TRUE);
        echo form_radio($data);?><label for="daily_reminder">Daily</label>
        <?php $data = array('name' => 'radio_frequency','id'=> 'weekly_reminder','value'=> 'weekly');
        echo form_radio($data);?><label for="weekly_reminder">Weekly</label>
        <?php $data = array('name' => 'radio_frequency','id'=> 'monthly_reminder','value'=> 'monthly');
        echo form_radio($data);?><label for="monthly_reminder">Monthly</label>
        <?php $data = array('name' => 'radio_frequency','id'=> 'None_reminder','value'=> 'none');
        echo form_radio($data);?><label for="None_reminder">None</label>
            </div>
<br><br>

         <div class="left"><h4>How to remind you?</h4></div>
<br><br><br>
            <div id="checkbox_preference">
            <label for="email_reminder">Email</label> <?php
            if($email==1){
                    $data = array('name' => 'email','id'=> 'email_reminder','value'=> 1, 'checked'=> TRUE);}
                    else{
                         $data = array('name' => 'email','id'=> 'email_reminder','value'=> 1, );
                    }
                    echo form_checkbox($data);
                    ?>

            <label for="SMS_reminder">&nbsp&nbspSMS&nbsp&nbsp</label> <?php
             if($sms==1){
                  $data2 = array('name' => 'SMS','id'=> 'SMS_reminder','value'=> 1, 'checked'=> TRUE);}
                  else{
                      $data2 = array('name' => 'SMS','id'=> 'SMS_reminder','value'=> 1);
                  }
                  echo form_checkbox($data2);
                 ?>
        </div>

   <br>
<?php echo
         form_submit('submit','Submit','id="form_submit"'); ?>
        <?php echo form_close(); ?>

<div class="form_content">
</div>

            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->