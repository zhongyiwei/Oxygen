<div id="page">
    <div id="content_sub">
        <div class="post">

            <h2 class="title">My Reminder Setting</h2>
            <div class="entry">
            <h3>My reminder preference Setting is</h3>
            <ul>
            <?php
            $this->load->model('link_db_model');
            $data = $this->link_db_model->get_reminder();
            if($data->num_rows() > 0) {
                $r=$data->result();
                $mode_email=$r[0]->reminder_email;
                $mode_sms=$r[0]->reminder_sms;
                $frequency=$r[0]->reminder_frequency;
                        if($mode_email==1){?>
		<li><p style="font-size:150%">
                    Email
                </p></li>
		<?php  }
                if($mode_sms==1){ ?>
                    <li><p style="font-size:150%">
                    SMS
                </p></li>
               <?php } ?>
                </ul>
            <h3>My reminder frequency </h3>
            <ul>
            <li><p style="font-size:150%">
                    <?php echo $frequency; ?>
                </p></li>
                </ul>
            <?php } else{?>
                <p style="font-size:150%">
                    You have never set any reminder preference yet
                </p>
           <?php }  ?>


            

            </div><!-- End of div class entry -->

<h5 align="right">Update and Change your Reminder Setting <a href="<?php echo base_url();?>index.php/home/reminder_update/">HERE</a></h5>
    </div></div>
<!-- end #content -->

