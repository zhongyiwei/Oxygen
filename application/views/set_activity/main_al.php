<?php
$id=$this->session->userdata('seeker_id');
    $all_activity_query = $this->db->query('SELECT * FROM activity a, goal g, goal_category gc
        WHERE a.seeker_goal_id = g.seeker_goal_id
        AND g.goal_cat_id = gc.goal_cat_id
        AND a.activity_status != "Completed"
        AND g.seeker_id = '.$id.'');

?>
<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">View all your records below</h2>
            <div class="entry">
                
                <table id="myTable" class="tablesorter">
                   <thead>
                    <tr>
                      <th width="55px">Goal Type</th>
                      <th width="90px">Activity Name</th>
                      <th width="250px">Activity Description</th>
                      <th width="55px">Start Date</th>
                      <th width="55px">End Date</th>
                      <th width="55px">Status</th>
                    </tr>
                  </thead>

                  <tbody>
                       <?php
                    foreach ($all_activity_query->result_array() as $row)
                    {
                  ?>
                        <tr>
                          <td><?php echo $row['goal_category']; ?></td>
                          <td><a href="<?php echo base_url();?>index.php/home/update_activity/?activity_id=<?php echo $row['activity_id']; ?>"><?php echo $row['activity_name']; ?></a></td>
                          <td><?php echo $row['activity_desc']; ?></td>
                          <td><?php echo $row['start_date']; ?></td>
                          <td><?php echo $row['end_date']; ?></td>
                          <td><?php echo $row['activity_status']; ?></td>
                        </tr>

                  <?php
                    }
                  ?>

                  </tbody>
               </table>

            </div><!-- End of div class entry -->
        </div><!-- End of div class post -->

    </div>
<!-- end #content -->