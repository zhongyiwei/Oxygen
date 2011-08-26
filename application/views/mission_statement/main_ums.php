<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Update your Mission Statement</h2>
            <div class="entry">
        
        <?php
        echo form_open('db_control/validate_mission_update');
              $data = array('name'=> 'mission_update','id'=> 'mission','value'=> $mission_set,'rows'=> '3','cols'=> '65',);
              echo form_textarea($data);
              echo form_error('mission_update');

              echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
        ?>
<br>
        <?php echo form_submit('submit','Update','id="form_submit"'); ?>
        <?php echo form_close(); ?>



            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->

