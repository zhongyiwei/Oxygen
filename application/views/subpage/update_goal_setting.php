<?php $this->load->view('includes/header_general'); ?>

<?php $this->load->view('includes/banner_general'); ?>
<div>
    <h1>Update Your Goal</h1>
    <div align="center">
        <table cellpadding="5" cellspace="5" border="2">
            <?php echo form_open('update_goal/update');?>
            <?php echo form_hidden('goal_id',$id);?>
            <?php echo form_hidden('goal_cat_id',$goal_cat_id);?>
            <tr>
                <th>Type Of Goal</th>
                <td><input type="text" name="goal_cat" value="<?php echo $goal;?>" readonly="readonly"/></td>
            </tr>

            <tr>
                <th>Goal Description</th>
                <td><?php echo form_input('goal_des', set_value('goal_des',$goal_des));?></td>
            </tr>

            <tr>
                <th>Achievement Criteria</th>
                <td><?php echo form_input('achievement', set_value('achievement',$achievement));?></td>
            </tr>

            <tr>
                <th>Progress</th>
                <td><?php $choice=array(
                    'Active'=>'Active',
                    'Completed'=>'Completed'
                );
                if($Progress=='Active'){
                    echo form_dropdown('process',$choice,'Active');
                }else if($Progress=='Completed'){
                    echo form_dropdown('process',$choice,'Completed');
                }
                ?></td>
            </tr>
        </table><br><br>
        <?php echo form_submit('submit', 'Update');?>
        <?php echo form_close(); ?>
    </div>
    </div><br><br>
    <?php $this->load->view('includes/footer_general'); ?>
