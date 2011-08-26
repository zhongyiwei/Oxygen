            <?php
            $is_logged_in = $this->session->userdata('is_logged_in');
        if (isset($is_logged_in) && ($is_logged_in == 'true')) {
            $seeker_id=$this->session->userdata('seeker_id');
            $errFound=false;
            $query = $this->db->query('SELECT * FROM test_result WHERE seeker_id='.$seeker_id.' ORDER BY result_id DESC LIMIT 0, 1');
            $rows=$query->num_rows();
            if($rows>0){
            $data=$query->result();
            //$rows=$query->num_rows();

            //for($i=1;$i<=$rows;$i++) {
            $PvBscore = $data[0]->PvB_score;
            $PmBscore = $data[0]->PmB_score;
            $PsBscore = $data[0]->PsB_score;
            $PmGscore = $data[0]->PmG_score;
            $PvGscore = $data[0]->PvG_score;
            $PsGscore = $data[0]->PsG_score;
            /*
                $PvBscore=$data['PvBscore'];
                $PmBscore=$data['PmBscore'];
                $PsBscore=$data['PsBscore'];
                $PmGscore=$data['PmGscore'];
                $PvGscore=$data['PvGscore'];
                $PsGscore=$data['PsGscore'];
*/
            //}



                $Hope=$PvBscore+$PmBscore;
                $BadEvents=$PmBscore+$PvBscore+$PsBscore;
                $GoodEvents=$PmGscore+$PvGscore+$PsGscore;
                $Optimism=$GoodEvents-$BadEvents;


                ?>
            <br/>
            <center>
                <table border="1">
                    <tr>
                        <td> <b>Indicators</b> </td>
                        <td> <b>Score</b> </td>
                        <td> <b>Explanation</b> </td>
                    </tr>
                    <tr>
                        <td>Hope</td>
                        <td><?php echo $Hope; ?></td>
                        <td><?php if($Hope<=2) {
                                    echo "You are extraodinarily Hopeful!";
                                }
                                else if($Hope<=6) {
                                    echo "You are moderately Hopeful!";
                                }
                                else if($Hope<=8) {
                                    echo "You are average Hopeful!";
                                }
                                else if($Hope<=11) {
                                    echo "You are moderately Hopeless!";
                                }
                                else if($Hope<=16) {
                                    echo "You are severely Hopeless!";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Overall level of Optimism</td>
                        <td><?php echo $Optimism; ?></td>
                        <td><?php if($Optimism<0) {
                                    echo "You are very pessimistic!";
                                }
                                else if($Optimism<=2) {
                                    echo "You are moderately pessimistic!";
                                }
                                else if($Optimism<=5) {
                                    echo "You are average pessimistic!";
                                }
                                else if($Optimism<=8) {
                                    echo "You are moderately optimistic!";
                                }
                                else {
                                    echo "You are very optimistic across the board!";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Explanatory Style For Good Events</td>
                        <td><?php echo $GoodEvents; ?></td>
                        <td><?php if($GoodEvents<=10) {
                                    echo "You have great pessimism in you!";
                                }
                                else if($GoodEvents<=13) {
                                    echo "You think quite pessimistically!";
                                }
                                else if($GoodEvents<=16) {
                                    echo "You think about good events average!";
                                }
                                else if($GoodEvents<=19) {
                                    echo "Your thinking is moderately optimistic!";
                                }
                                else {
                                    echo "You think about good events very optimistic!";
                                }
                                ?></td>
                    </tr>
                    <tr>
                        <td>Explanatory Style For Bad Events</td>
                        <td><?php echo $BadEvents; ?></td>
                        <td><?php if($BadEvents<=6) {
                                    echo "You are marvelously optimistic!";
                                }
                                else if($BadEvents<=9) {
                                    echo "You are moderately optimistic!";
                                }
                                else if($BadEvents<=11) {
                                    echo "You are about average when you think about bad events!";
                                }
                                else if($BadEvents<=14) {
                                    echo "Your are moderately pessimistic!";
                                }
                                else {
                                    echo "You require a change badly!";
                                }

?></td>
                    </tr>

                </table>

            </center>
<?php
//$query = $this->db->query("INSERT INTO `test_result` (`result_id`, `PmB_score`, `PmG_score`, `PvB_score`, `PvG_score`, `PsB_score`, `PsG_score`, `test_type_id`, `seeker_id`) VALUES (NULL, '$PmBscore', '$PmGscore', '$PvBscore', '$PvGscore', '$PsBscore', '$PsGscore', '1', '$seeker_id')");
}else{
?>
            <br><center>
            <font color="green" size="5"> You have never completed resilience test yet.  </font></center>
  <?php
}
        }
else{
   echo "LOGIN FIRST";
}
?>