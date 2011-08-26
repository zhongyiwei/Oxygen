

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-latest.js"></script>
<script type="text/javascript">
$(function(){

//Larger thumbnail preview

$("ul.thumb li").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
		.animate({
			marginTop: '-110px',
			marginLeft: '-110px',
			top: '50%',
			left: '50%',
			width: '174px',
			height: '174px',
			padding: '20px'
		}, 200);

	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
		.animate({
			marginTop: '0',
			marginLeft: '0',
			top: '0',
			left: '0',
			width: '100px',
			height: '100px',
			padding: '5px'
		}, 400);
});

//Swap Image on Click
	$("ul.thumb li a").click(function() {

		var mainImage = $(this).attr("href"); //Find Image Name
		$("#image img").attr({ src: mainImage });
		return false;
	});

        //for thumb2
        $("ul.thumb2 li").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
		.animate({
			marginTop: '-110px',
			marginLeft: '-110px',
			top: '50%',
			left: '50%',
			width: '174px',
			height: '174px',
			padding: '20px'
		}, 200);

	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
		.animate({
			marginTop: '0',
			marginLeft: '0',
			top: '0',
			left: '0',
			width: '100px',
			height: '100px',
			padding: '5px'
		}, 400);
});

//Swap Image on Click
	$("ul.thumb2 li a").click(function() {

		var mainImage = $(this).attr("href"); //Find Image Name
		$("#banner img").attr({ src: mainImage });
		return false;
	});

//for div thumb3 -- crest
        $("ul.thumb3 li").hover(function() {
	$(this).css({'z-index' : '10'});
	$(this).find('img').addClass("hover").stop()
		.animate({
			marginTop: '-110px',
			marginLeft: '-110px',
			top: '50%',
			left: '50%',
			width: '174px',
			height: '174px',
			padding: '20px'
		}, 200);

	} , function() {
	$(this).css({'z-index' : '0'});
	$(this).find('img').removeClass("hover").stop()
		.animate({
			marginTop: '0',
			marginLeft: '0',
			top: '0',
			left: '0',
			width: '100px',
			height: '100px',
			padding: '5px'
		}, 400);
});

//Swap Image on Click
	$("ul.thumb3 li a").click(function() {

		var mainImage = $(this).attr("href"); //Find Image Name
		$("#crest img").attr({ src: mainImage });
		return false;
	});
});





function ChgText(imgvalue)
{
    var MyElement = document.getElementById("MyTextBox_coa");
    MyElement.value = imgvalue;

    return true;
}

function ChgText_banner(imgvalue)
{
    var MyElement = document.getElementById("MyTextBox_banner");
    MyElement.value = imgvalue;

    return true;
}

function ChgText_crest(imgvalue)
{
    var MyElement = document.getElementById("MyTextBox_crest");
    MyElement.value = imgvalue;

    return true;
}


</script>
 <?php //$this->load->view('portfolio/portfolio_translate');?>

<?php //$this->load->view('portfolio/value_image');?>
<div align=center class="coa" id="coa">
	<div align=center class="image" id="image">
  <img alt="" src="<?php echo base_url();?>web_images/coa_image/shield/coa2.jpg" /></div>

 <?php
  $this->load->model('link_db_model');
  $data = $this->link_db_model->get_value_symbol();
  if($data != null){

$this->load->view('portfolio/value_symbol');
  }
?>
   <div class="banner" id="banner" align=center>
  <img alt="" src="<?php echo base_url();?>web_images/coa_image/banner/banner1.png" />
  </div>
  <div class="supporter" align=center>
  <img alt="" src="<?php echo base_url();?>web_images/coa_image/supporter/supporter1.jpg" />
  </div>
    <div class="crest" id="crest" align=center>
          <img alt="" src="<?php echo base_url();?>web_images/coa_image/crest/crest5.jpg" />
           </div>
        <?php
         $this->load->model('link_db_model');
                $data = $this->link_db_model->get_motto();
                if($data->num_rows() > 0) {
                foreach($data->result() as $r) : ?>
                <div id="example1" align="center" style="text-align: center;">

  <p align="center" class="example" style="font-size:150%; color:black ;text-align: center">

                    <?php echo $r->motto; ?>
                </p>

		<?php endforeach; ?>

</div>
  <?php
}else{

?>

<p></p>
<?php }
?>



 <?php //$this->load->view('portfolio/portfolio_translate');?>
  </div>



