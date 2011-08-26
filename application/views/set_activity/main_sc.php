<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Set the activity for your goal here</h2>
            <div class="entry">
                <!--<p style="font-size:150%; color:green;" > Set your activities for your goals below: </p>-->
                
<div class="goal_for_activity">
<div id="activity_accordion">
        <?php
        //$activity_type=array['Family','Career','Educational','Spiritual',,'Financial','Social','Physical'];
        $activity_type=array('Family','Career','Educational','Spiritual','Financial','Social','Physical');
        for($i=1; $i<=7; $i++){
?>
	<h3><a href="#section1"><?php echo $activity_type[$i-1]?></a></h3>
	<div>

	     <?php
            $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
             $query = $this->db->query('SELECT seeker_goal_id FROM goal WHERE goal_cat_id = '.$i.' AND goal_completion_status = "Active" AND seeker_id ='.$this->session->userdata('seeker_id').'');
             if($query->num_rows() > 0){
             $row=$query->result();
            $seeker_id_goal = $row[0]->seeker_goal_id;

                            
            //echo $seeker_id_goal;
             $attributes = array('class' => 'form', 'id' => 'form', 'name' => 'set_activity_family');
                 echo form_open('db_control/validate_activity_input',$attributes);
                 echo form_hidden('seeker_goal_id',$seeker_id_goal);
                echo form_hidden('goal_type_id', $i);
                 echo form_hidden('activity_status', 'New');
                 echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
                 

                 $this->load->view('set_activity/activity_form');
                 $js = 'onchange="ValidateDate(this)"';
                 echo form_submit('submit','Submit','id="form_submit"',$js);
                 echo form_close();
        }            else{
                ?>
                                 <h3>You do not have any goal of this type yet. Please set the its goal before you setting any of its activity </h3>
                                 <?php
            }
        }       
        else{        
        ?>
          <h3>You have not login yet. Please Log in first to set relevant activities. </h3>
            <?php
        }
             ?>
    </div>
        <?php
        }
        ?>
        
	</div>


</div><!-- End demo -->
            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->


