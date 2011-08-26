<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Update your activity here</h2>
            <div class="entry">
                <!--reminder preference selection begin-->

		<div>
                    		<p style="font-size:120%">Please click to compare with your previous details of your activity:</p>
                    <?php
                    //print_r($_GET);
                    $id_activity = $_GET['activity_id'];
             $query = $this->db->query('SELECT g.goal_cat_id FROM activity a, goal g, goal_category gc WHERE a.seeker_goal_id = g.seeker_goal_id AND a.activity_id='.$id_activity.'  AND g.seeker_id ='.$this->session->userdata('seeker_id').'');
             if($query->num_rows() > 0){
             $row=$query->result();
            $goal_cat = $row[0]->goal_cat_id;}
                    $attributes = array('class' => 'form', 'id' => 'form', 'name' => 'update_activity');
                    echo form_open('db_control/validate_activity_update',$attributes);
                     $this->load->view('set_activity/form_ua');
                    echo form_hidden('goal_type_id', $goal_cat);
                 echo form_hidden('activity_status', 'New');
                 echo form_hidden('id_seeker', $this->session->userdata('seeker_id'));
                 
                 echo form_hidden('activity_id', $id_activity);
                       echo form_submit('submit','Update','id="form_submit"','align="center"'); 
                 echo form_close();
        ?>
		</div>



<div class="form_content">
</div>

            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->