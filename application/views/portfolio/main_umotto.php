<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Update your Motto</h2>
            <div class="entry">

        <!--<textarea id="ms" name="mission_statement" rows="5" cols="67"></textarea>-->
        <?php echo form_open('db_control/validate_motto_update');?>
                <!--<textarea name="motto_update" cols="65" rows="3" id="motto" maxlength="33" ></textarea>-->
        <?php
        $count = 'onkeypress="textCounter()"';
              $data = array('name'=> 'motto_update','id'=> 'motto','value'=> $motto_set,'rows'=> '3','cols'=> '65','onkeypress'=>"textCounter(this,this.form.counter,33);");
              echo form_textarea($data,$count);
        $display_count= 'onblur="textCounter()"' ;
        ?><br>You have<?php
              $data = array(
              'name' => 'counter','value'=> '33','maxlength'=> '3','size'=> '3','onblur'=>'textCounter(this.form.counter,this,33);');
                 echo form_input($data,$display_count);
              ?>characters left<?php
              echo form_error('motto_update');

              echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
        ?>
<br>
        <?php echo form_submit('submit','Update','id="form_submit"'); ?>
        <?php echo form_close(); ?>



            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->

