<div id="page">
    <div id="content_sub">
        <div class="post">


         <div class="post">
            <h2 class="title" id="MOTTO">My Motto</h2>
            <div class="entry">
            
        <p style="font-family:arial;color:black;font-size:14px"><?php echo $motto_set;?></p>
            </div>

            <h2 class="title" id="MS">My Mission Statement</h2>
            <div class="entry">
               
                <p style="font-family:arial;color:black;font-size:14px"><?php echo $mission_set;?></p>
            </div>


            <h2 class="title" id="VALUE">My Value</h2>
            <div class="entry">
               <table border="1">
                      <th width="120px">Value 1</th>
                      <th width="120px">Value 2</th>
                      <th width="120px">Value 3</th>
                      <th width="120px">Value 4</th>
                       <tbody><tr>                           
                <td width="120px"><?php echo $value1;?></td>
                <td width="120px"><?php echo $value2;?></td>
                <td width="120px"><?php echo $value3;?></td>
                <td width="120px"><?php echo $value4;?></td>
                       </tr></tbody>
                   </table>
                <br><br><br><br>
            </div>

            <h2 class="title" id="ACHIEVEMENT">My Achievement</h2>
            <div class="entry">

                <table border="1">
                      <th>Description</th>
                      <th width="500px">What I have achieved</th>
                       <tbody>
             <?php
            //echo "here".$rows;
            if($rows==null){
            echo "No goal has been accomplished at this moment";
            }
            else{
                foreach($rows as $r) :?>                   
                <tr><td><b>Goal Type:</b></td><td><b><p style="font-family:arial;color:black;font-size:14px;text-align:center;"><?php echo $r->goal_category;?></p></b></td></tr>
              <tr><td><b>Goal Description:</b></td><td><p style="font-family:arial;color:black;font-size:14px; text-align:center;"><?php echo $r->goal_desc;?></p></td></tr>
               <tr><td><b>Achievement Criteria:</b></td><td><p style="font-family:arial;color:black;font-size:14px;text-align:center;"><?php echo $r->achievement_criteria;?></p></td></tr>
               <tr><td><b>Goal Completion Date:</b></td><td><p style="font-family:arial;color:black;font-size:14px;text-align:center;"><?php echo $r->actual_end_date;?></p></td></tr>
               <?php $seeker_goal_id=$r->seeker_goal_id;
                           $activity_query = $this->db->query('SELECT * FROM activity WHERE activity_status="Completed" AND seeker_goal_id = '.$seeker_goal_id.'');
                       ?>
               <?php foreach($activity_query->result_array() as $row) :?>
               <tr><td><b>Completed Activity:</b></td><td><p style="font-family:arial;color:black;font-size:14px;text-align:center;"><?php echo $row['activity_name'];?></p></td></tr>
                <?php endforeach; ?>
               <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
       <?php endforeach; }?>
         </tbody></table>
            </div>
            <br>

            
            <h2 class="title" id="RESILIENCE">My Resilience Scale</h2>
            <div class="entry">
            <?php $this->load->view('portfolio/resilience_section');?>
            </div>

            <!--<h2 class="title" id="VALUE">Your Values</h2>-->

         </div>
        </div>

    </div>
    <!-- end #content -->
