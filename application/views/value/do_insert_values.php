<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Insert Status.</h2>
    <?php

$errFound=false;


         ?>
            <center><br/> <?php
            $insertValue=$this->input->post('value');
                                    $insertValue = str_replace("'", "''", $insertValue);
                        $insertValue = str_replace('"', '""', $insertValue);
                        if($insertValue==null||$insertValue==''){
                            $errFound=true;
                        }
                        else{
                         
                            if ((($_FILES["file"]["type"] == "image/gif") // security check to prevent other type of file upload
                                    || ($_FILES["file"]["type"] == "image/jpeg")
                                    || ($_FILES["file"]["type"] == "image/pjpeg"))
                                    && ($_FILES["file"]["size"] < 2000000)) { //byte
                                if ($_FILES["file"]["error"] > 0) {
                                    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
                                } else {

                                    if (file_exists("web_images/value_symbol/" . $_FILES["file"]["name"])) { // Check for file existing
                                        $newpath = "web_images/value_symbol/" . uniqid(rand()) . $_FILES["file"]["name"];
                                        copy($_FILES["file"]["tmp_name"], $newpath);
                                    } else {
                                        move_uploaded_file($_FILES["file"]["tmp_name"],
                                                "web_images/value_symbol/" . $_FILES["file"]["name"]);
                                        $newpath = "web_images/value_symbol/" . $_FILES["file"]["name"];
                                    }
                        }
                                    }
                                      $query=$this->db->query("INSERT INTO `ci`.`value` (`value_name`, `value_symbol`) VALUES ( '$insertValue', '$newpath');");
                        }
            if($errFound==false){
             ?>
                 <b><font size="5"> Values Added!</font> </b>
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
