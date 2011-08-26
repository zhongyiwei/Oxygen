<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Deletion Status.</h2>
    <?php $query = $this->db->query('SELECT * FROM value');
$rows=$query->num_rows();

$errFound=false;

for($i=0;$i<=$rows;$i++) {
                $data['check'.$i] = $this->input->post('check'.$i);
                if($data['check'.$i]!=null) {
                    $valuename=$data['check'.$i];

                $query=$this->db->query("SELECT value_id FROM value WHERE value_name='$valuename'");
                  if($query->num_rows()>0) {

                    foreach($query->result()as $a):

                        $valueid=$a->value_id;
                           $delete=$this->db->query('DELETE FROM seeker_value WHERE value_id="'.$valueid.'"');
                           $delete2=$this->db->query('DELETE FROM value WHERE value_id="'.$valueid.'"');
                  endforeach;

                  }
                  else{
                      $errFound=true;
                      break;
                  }
                        

                }
            }
         ?>
            <center><br/> <?php
            if($errFound==false){
             ?>
                 <b><font size="5"> Values Deleted!</font> </b>
                <?php
            }
            else{
                ?>
                 <b><font size="5" color="red"> Unexpected Error!</font> </b>
           <?php
            }

 ?>

            </center>


        </div>

    </div>
    <!-- end #content -->
