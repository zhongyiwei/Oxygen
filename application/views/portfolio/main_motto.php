<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">The 1st Step: Set the Mission Statement of your life</h2>
            <div class="entry">
                <p>This is <strong>Blogging</strong>, a free, fully standards-compliant CSS template designed by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a>, released for free under the <a href="http://creativecommons.org/licenses/by/2.5/">Creative Commons Attribution 2.5</a> license. The photos in this design are from <a href="http://www.pdphoto.org/">PDPhoto.org</a>. You're free to use this template for anything as long as you link back to <a href="http://www.freecsstemplates.org/">my site</a>. Enjoy :)</p>
                <p>Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem.Sed lacus. Donec lectus. </p>


        <h3>Write down your Motto here: </h3>
        <!--<textarea id="ms" name="mission_statement" rows="5" cols="67"></textarea>-->
        <?php //echo form_open('db_control/input_mission_control');?>
        <?php echo form_open('db_control/validate_motto_input');?>
        <?php //echo form_input('mission', '','id="mission"','size=50'); ?>
        <?php
        $count = 'onkeypress="textCounter()"';
              $data = array('name'=> 'motto_input','id'=> 'motto','value'=> '','rows'=> '3','cols'=> '65','onkeypress'=>"textCounter(this,this.form.counter,33);");
              echo form_textarea($data,$count);
              echo form_error('motto_input');
              $display_count= 'onblur="textCounter()"' ;
              ?><br>You have<?php
              $data = array(
              'name' => 'counter','value'=> '33','maxlength'=> '3','size'=> '3','onblur'=>'textCounter(this.form.counter,this,33);');
                 echo form_input($data,$display_count);
              ?>characters left<?php
              echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
     ?>
<br>
        <?php  //$attributes = array('id'=>'form_submit','class'=>'form_submit');
        echo form_submit('submit','Submit','id="form_submit"'); ?>
        <?php echo form_close(); ?>



            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->

