
                     <div class="row">                          <!--<form name="set_activity_form" class="form" id="form">-->
        <!--start_date selection begin-->
        <div class="left_update"><h4>Enter your new Activity Name: </h4></div>
        <div class="accordionContent">Your previous activity name: <br />
           
        <?php echo $rows[0]->activity_name; ?>
          
        </div>

        <div class="">
                 <?php
                 $data = array(
              'name' => 'activity_name','id'=> 'activity_name','value'=> '','maxlength'=> '100','size'=> '103',);
                 echo form_input($data);
                 ?></div>

        <div class="clear"></div>
        </div>

        <!--start_date selection begin-->
        <div class="row">
         <div class="left_update"><h4>Enter your new Description:</h4></div>
        <div class="accordionContent">Your previous Description: <br />
        <?php echo $rows[0]->activity_desc; ?>

        </div>
    <div class="">
     <?php
      $data = array(
              'name'=> 'activity_desc','id'=> 'activity_desc','value'=> '','rows'=> '5','cols'=> '79',
            );
                 echo form_textarea($data);
     ?><br></div><div class="clear"></div>
        </div>

        <!--start_date selection begin-->
        <div class="row">
         <div class="left_update"><h4>Enter your new Start Date:
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <?php
                 $data = array('name' => 'start_date','class'=> 'start_date','value'=> '','size'=> '50','onchange'=>'ValidateDate(this)');
                 echo form_input($data);
                 ?>
             </h4></div>
         <div class="accordionContent">Your previous start date: <br />
         <?php echo $rows[0]->start_date; ?>
         </div></div>
        
        <!--end_date selection begin-->
        <div class="row">
        <div class="left_update"><h4>Enter your new End Date:
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <?php
                 $data = array('name' => 'end_date','class'=> 'end_date','value'=> '','size'=> '50','onchange'=>'ValidateDate(this)');
                 echo form_input($data);
                 ?>
             </h4></div>
         <div class="accordionContent">Your previous end date: <br />
         <?php echo $rows[0]->end_date; ?>
         </div></div>


        
        <!-- end_date selection ends-->
        <br>
      