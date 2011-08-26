<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Summary of Result.</h2>




            <?php
            $is_logged_in = $this->session->userdata('is_logged_in');
 
            if (isset($is_logged_in) && ($is_logged_in == 'true')) {
                $seeker_id=$this->session->userdata('seeker_id');
  
                $errFound=false;
                $query = $this->db->query('SELECT * FROM question');
                $rows=$query->num_rows();

                for($i=1;$i<=$rows;$i++) {
                    $data['q'.$i] = $this->input->post('q'.$i);
                    if($data['q'.$i]==null) {
                        $errFound=true;
                    }
                }
                if ($errFound==true) {
                    echo "There is an error!";?>
            <a href="<?php echo base_url();?>index.php/home/testResilience/">Click here to go back!</a>
                    <?php      }
                else {
                    $PvG=array(6,7,28,31,34,35,37,43);
                    $PvB=array(8,16,17,18,22,32,44,48);
                    $PmG=array(2,10,14,15,24,26,38,40);
                    $PmB=array(5,13,20,21,29,33,42,46);
                    $PsG=array(1,4,11,12,23,27,36,45);
                    $PsB=array(3,9,19,25,30,39,41,47);

// PvG Total Score
                    $PvGscore=0;
                    for($PvGcount=0;$PvGcount<count($PvG);$PvGcount++) {
                        $PvGscore=$PvGscore+$data['q'.$PvG[$PvGcount]];

                    }


//PvB Total Score
                    $PvBscore=0;
                    for($PvBcount=0;$PvBcount<count($PvB);$PvBcount++) {
                        $PvBscore=$PvBscore+$data['q'.$PvB[$PvBcount]];

                    }


// PmG Total Score
                    $PmGscore=0;
                    for($PmGcount=0;$PmGcount<count($PmG);$PmGcount++) {
                        $PmGscore=$PmGscore+$data['q'.$PmG[$PmGcount]];

                    }


//PmB Total Score
                    $PmBscore=0;
                    for($PmBcount=0;$PmBcount<count($PmB);$PmBcount++) {
                        $PmBscore=$PmBscore+$data['q'.$PmB[$PmBcount]];

                    }



// PsG Total Score
                    $PsGscore=0;
                    for($PsGcount=0;$PsGcount<count($PsG);$PsGcount++) {
                        $PsGscore=$PsGscore+$data['q'.$PsG[$PsGcount]];

                    }


//PmB Total Score
                    $PsBscore=0;
                    for($PsBcount=0;$PsBcount<count($PsB);$PsBcount++) {
                        $PsBscore=$PsBscore+$data['q'.$PsB[$PsBcount]];

                    }

                    $Hope=$PvBscore+$PmBscore;
                    $BadEvents=$PmBscore+$PvBscore+$PsBscore;
                    $GoodEvents=$PmGscore+$PvGscore+$PsGscore;
                    $Optimism=$GoodEvents-$BadEvents;


                    ?>
            <br/>

                    <?php if($Hope<=2) {
                        $h_descriptor1=" extraordinarily hopeful about life";
                        $h_descriptor2="This is a very good sign that you can survive challenging times. You don’t give up easily";
                        $h_descriptor3="We believe in your potential";


                    }
                    else if($Hope<=6) {
                        $h_descriptor1=" moderately hopeful  about life";
                        $h_descriptor2="This is a good sign that you can survive challenging times. You don’t give up easily";
                        $h_descriptor3="We believe in your potential";

                    }
                    else if($Hope<=8) {
                        $h_descriptor1=" average in being hopeful about life";
                        $h_descriptor2=" This is a sign that you can survive challenging times. You don’t give up so easily";
                        $h_descriptor3="We want YOU to have these special abilities";

                    }
                    else if($Hope<=11) {
                        $h_descriptor1=" not so hopeful about life";
                        $h_descriptor2="These are signs that you may feel more vulnerable than hopeful people around you when you are dealing with challenging issues. You tend to give up more readily. This is quite worrying";
                        $h_descriptor3="We want YOU to have these special abilities";

                    }
                    else if($Hope<=16) {
                        $h_descriptor1=" really not hopeful";
                        $h_descriptor2="These are signs that you may feel a lot more vulnerable than hopeful people around you when you are dealing with challenging issues. You tend to give up readily. This is really worrying";
                        $h_descriptor3="We want YOU to have these special abilities";

                    }
                    ?><?php if($Optimism<0) {
                        $op_descriptor=" very pessimistic in general.";
                    }
                    else if($Optimism<=2) {
                        $op_descriptor=" quite pessimistic in general.";
                    }
                    else if($Optimism<=5) {
                        $op_descriptor=" average in being optimistic in general.";
                    }
                    else if($Optimism<=8) {
                        $op_descriptor=" moderately optimistic in general.";
                    }
                    else {
                        $op_descriptor=" very optimistic in general.";
                    }
                    ?><?php if($GoodEvents<=10) {
                        $g_descriptor=" is very optimistic";
                    }
                    else if($GoodEvents<=13) {
                        $g_descriptor=" is moderately optimistic";
                    }
                    else if($GoodEvents<=16) {
                        $g_descriptor=" average in optimism";
                    }
                    else if($GoodEvents<=19) {
                        $g_descriptor=" is quite pessimistic";
                    }
                    else {
                        $g_descriptor=" is very pessimistic";
                    }
                    ?>
                    <?php if($BadEvents<=6) {
                        $b_descriptor=" marvellously optimistic";
                    }
                    else if($BadEvents<=9) {
                        $b_descriptor=" is moderately optimistic";
                    }
                    else if($BadEvents<=11) {
                        $b_descriptor=" is average in optimism";
                    }
                    else if($BadEvents<=14) {
                        $b_descriptor=" is quite pessimistic";
                    }
                    else {
                        $b_descriptor=" is very pessimistic";
                    }

                    ?>
            <center>
            <div style="text-align:left;width:500px">
                <?php $name=$this->session->userdata('name');?>
            <b><p>
                Dear <?php echo $name; ?>,<br/><br/>

            Your Hope score shows that you are <?php echo $h_descriptor1;?>. <?php echo $h_descriptor2;?>.<br/>
                    Your optimism level indicates that you are <?php echo $op_descriptor;?>. More specifically, the way you think about good events is <?php echo $g_descriptor; ?> and the way you think about bad events is <?php echo $b_descriptor;?>. These ways of thinking influence WHAT YOU WOULD likely do when these events happen, and hence make a difference to the outcomes or how things eventually turn out.<br/>
                    We have created some <a href="#">games and activities</a> for you to be inspired, to practise and improve the way you can think about events that happen to you so that you can achieve optimal results for yourself!  Remember, being optimistic is not about wearing rose-tinted glasses and being unrealistic, but it is about taking every opportunity to do something for ourselves and others so that we pave the way for ourselves to succeed!<br/>
                    Optimistic people do have special eyes that can help them look out for chances, they have super arms to gather resources and they have mighty legs that will keep running until they reach their goals. <?php echo $h_descriptor3; ?>!<br/>
                    So do set yourself the goals you want to achieve, and plan the steps to help yourself set your goals <a href="<?php echo base_url();?>index.php/home/holistic/">here</a>. Knowing what is important to you enables you to prioritise your time and effort affirm your values <a href="<?php echo base_url();?>index.php/home/determineValue/">here</a>.<br/>
                    We hope you can make a positive difference to your own life, and to those around you!<br/>
                    <br/>
                    With kindest regards,  <br/>                   
                    the team at Oxygen.</p></b>

                    <?php
                    $query = $this->db->query("INSERT INTO `test_result` (`result_id`, `PmB_score`, `PmG_score`, `PvB_score`, `PvG_score`, `PsB_score`, `PsG_score`, `test_type_id`, `seeker_id`) VALUES (NULL, '$PmBscore', '$PmGscore', '$PvBscore', '$PvGscore', '$PsBscore', '$PsGscore', '1', '$seeker_id')");


                    ?>
                    <?php           }

            
        ?>
            </div>

                      <?php   } else {
               ?>
			    <center><b><font size="5"> Login First.</font> </b></center>
			   <?php
            }
             ?>
            </center>
        </div>


    </div>
    <!-- end #content -->
