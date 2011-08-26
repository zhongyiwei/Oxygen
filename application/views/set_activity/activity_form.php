
                     <div class="row">                         
        <!--start_date selection begin-->
        <h4>Activity Name: </h4>
       
        <div class="right">
                 <?php
                 $data = array(
              'name' => 'activity_name','id'=> 'activity_name','value'=> '','maxlength'=> '100','size'=> '88',);
                 echo form_input($data);
                 echo form_error('activity_name');
                 ?></div>

        <div class="clear"></div>
        </div>

        <!--start_date selection begin-->
        <div class="row">
         <h4>Description:</h4>
        <div class="">

     <?php
      $data = array(
              'name'=> 'activity_desc','id'=> 'activity_desc','value'=> '','rows'=> '5','cols'=> '88',
            );
                 echo form_textarea($data);
                 echo form_error('activity_desc');
     ?><br></div>
        </div>

        <!--start_date selection begin-->

        <!--start_date selection begin-->
        <div class="row">
         <!--<div class="left_time">-->
             <h4>Start Date:
                 
             <?php
             $js = 'onchange="ValidateDate(this)"';
                 $data = array('name' => 'start_date','class'=> 'start_date','value'=> '','size'=> '35',  'onchange'=>'ValidateDate(this)');
                 echo form_input($data,$js);
                 echo form_error('start_date');
                 ?>
             </h4></div>


   

        <!--end_date selection begin-->
        <div class="row">
        <!--<div class="left_time">-->
            <h4>End Date:&nbsp&nbsp
             <?php
             $js = 'onchange="ValidateDate(this)"';
                 $data = array('name' => 'end_date','class'=> 'end_date','value'=> '','size'=> '35','onchange'=>'ValidateDate(this)');
                 echo form_input($data,$js);
                 echo form_error('end_date');
                 ?>
             </h4></div>

        
        <!-- end_date selection ends-->

