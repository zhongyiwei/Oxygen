<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">See your goals</h2>
            <div class="entry">
                <table cellpadding="5" cellspace="5" frame="rhs">
                    <tr>
                        <th width="10%">Type Of Goal</th>
                        <th width="25%">Goal Description</th>
                        <th width="35%">Achievement Criteria</th>
                        <th width="10%">Goal Set Date</th>
                        <th width="10%">Progress</th>
                        <th width="10%"></th>
                    </tr>

                    <?php
                    //$query="SELECT * FROM goal WHERE seeker_id= ?";
                    
                    //$record = $this->db->query($query,array($this->session->userdata('seeker_id')));
                    $seeker_id=$this->session->userdata('seeker_id');
                    $this->db->select('*');
                    $this->db->from('goal');
                    $this->db->where('seeker_id',$seeker_id);
                    $this->db->join('goal_category','goal_category.goal_cat_id=goal.goal_cat_id');

                    $record=$this->db->get();
                    if ($record) {
                        foreach ($record->result()as $row){
                  
                    ?>
                            <tr>
                                <?php echo form_open('set_goal/update');?>
                                <?php echo form_hidden('goal_id',$row->seeker_goal_id);?>
                                <td><?php echo $row->goal_category; ?></td>
                                <td><?php echo $row->goal_desc; ?></td>
                                <td><?php echo $row->achievement_criteria; ?></td>
                                <td><?php echo $row->goal_set_date; ?></td>
                                <td><?php echo $row->goal_completion_status; ?></td>
                                <td><?php echo form_submit('submit','Update');?></td>
                                <?php echo form_close();?>
                            </tr>
                    <?php
                    //$goal_id= array('seeker_goal_id'=>$row->seeker_goal_id);
                    //$this->session->set_userdata($goal_id);
                        }
                    } else {
                        $record = null;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <!-- end #sub-content -->
