<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Values Submission</h2>


         
            <br/>
            <br/>
 
 <br/>
 

 <?php
 $is_logged_in = $this->session->userdata('is_logged_in');
       if (isset($is_logged_in) && ($is_logged_in == 'true')) {
      $seeker_id=$this->session->userdata('seeker_id');
     
 $numValues=4;
 $errFound=false;
  for($i=1;$i<=$numValues;$i++) {
      $data['value'.$i] = $this->input->post('value'.$i);
      if($data['value'.$i]==null) {
                    $errFound=true;
                }
  }
 
  if($errFound==true){
     ?><center>

         <b><font size="5"> Your Values are  <font color="red">not saved!</font></font> </b></center>
<?php  }
else{
    $query=$this->db->query('SELECT * FROM seeker_value WHERE seeker_id="'.$seeker_id.'"');
    if($query->num_rows()>1){

                    $deleteData=$this->db->query('DELETE FROM seeker_value WHERE seeker_id="'.$seeker_id.'"');

                }
              for($i=1;$i<=$numValues;$i++) {
                    $newValue=$this->input->post('value'.$i);

     $statement='SELECT value_id FROM value WHERE value_name="'.$newValue.'"';
                    $query=$this->db->query($statement);

                    $row = $query->row();
                  
                    $newValueID=$row->value_id;

                    $insertData=$this->db->query('INSERT INTO seeker_value (value_id, seeker_id) VALUES ("'.$newValueID.'", "'.$seeker_id.'")');
     

  }
?>

 <center>

 <b><font size="5"> Your Values are  <font color="green">saved!</font></font> </b></center>
<?php   }

   
            }
            else{
?>
 <center><b><font size="5"> Login First.</font> </b></center>
 <?php
            }
 ?>

            



        </div>

    </div>
<!-- end #content -->
