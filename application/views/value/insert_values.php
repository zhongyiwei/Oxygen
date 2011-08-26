<div id="page">
    <div id="content_sub">
        <div class="post">
            <h2 class="title">Insert Values</h2>

<center>

           <script type="text/javascript">
function checkBoxes(){
var submit=true;



var value = document.getElementsByName('value');


if (value[0].value==''){
    submit=false; //Field not set.
}
var image = document.getElementsByName('file');
if (image[0].value==''){
    submit=false; //Field not set.
}



if(submit==true){
    return true;

}
else {
alert("You have field not set");
    return false;
}

                }
</script>

<?php
$role=$this->session->userdata('role');

if($role=='admin'){


   ?>
    <br/>
     <form action="<?php echo base_url();?>index.php/home/do_insert_values" method="post" enctype="multipart/form-data" onsubmit="return checkBoxes();">
         <table border="0">
         <tr><td><b>Name Of Value</b></td><td><input type="textbox" id="value" name="value"></td></tr>
         
         <tr><td><b>Value Symbol</b></td> <td> <input type="file" id="file" name="file" ></td></tr>
         
       
         </table>
     <div align="right"><input type="submit" name="submit" value="Submit" ></div>
     </form>




</center>
            <?php }


            else
                {
                ?>
            <b><font size="5" color="red"> You do not have rights to view this page!</font> </b>
<?php
                }
                ?>

        </div>

    </div>
    <!-- end #content -->
