<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Delete Values</h2>

<center>
    <b>List Of Values</b>
    <?php $query = $this->db->query('SELECT * FROM value');
$rows=$query->num_rows();
?>
           <script type="text/javascript">
                    function checkBoxes(){
var Questions=<?php echo $rows;?>;
var submit=true;
var atLeastOneChecked=false;

for (var i = 1; i <= Questions; i++) {

var Radios = document.getElementsByName('check' + i);

for (var a = 0; a < Radios.length; a++) {

if (Radios[a].checked){
    atLeastOneChecked=true;
    break;
}

}
if(atLeastOneChecked==true){
    break;
}

}
if(atLeastOneChecked==false){
    submit=false;
}

if(submit==true){
    var answer = confirm("Confirm Deletion?")
	if (answer){
            return true;

	}
    else{
        return false;
    }

}
else {
    alert("You did not choose any values to delete!");
    return false;
}

                }
</script>

<?php
$role=$this->session->userdata('role');

if($role=='admin'){
$attributes = array('onsubmit' => 'return checkBoxes();');

            echo form_open('home/do_delete_values',$attributes); ?>
      <div id="format">
                        <?php $query = $this->db->query('SELECT * FROM value');

                        ?>
                        <?php

                        $valuesCount=0;
                        $separator=1;
                        foreach($query->result()as $r):
                            ?>
                        <input type="checkbox"  name="check<?php echo $valuesCount; ?>" id="check<?php echo $valuesCount; ?>" value="<?php echo $r->value_name;?>" onclick="addToList(this.value,this.name);"/><label for="check<?php echo $valuesCount; ?>"><?php echo $r->value_name;?></label>
                            <?php        if($separator%5==0) {
                                echo "<br/>";
                            }
                            $valuesCount++;
                            $separator++;
                        endforeach;?>

                    </div> <br/><b>Select any one or few to delete.</b>
     <div align="right"><input type="submit" name="submit" value="Submit" ></div>
    <?php 	echo form_close(); ?>

   
</center>
            <?php }


            else
                {
                echo "Error! You do not have the rights to view this page.";

                }
                ?>

        </div>

    </div>
    <!-- end #content -->
