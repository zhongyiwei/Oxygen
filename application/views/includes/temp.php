<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Oxygen</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo base_url();?>CSS/style.css" rel="stylesheet" type="text/css" media="screen" />

        <link href="<?php echo base_url();?>CSS/dropdown_sidebar.css" rel="stylesheet" type="text/css" media="screen" />
        <link type="text/css" href="<?php echo base_url();?>CSS/themename/ui-lightness/jquery-ui-1.8.12.custom.css" rel="Stylesheet" />
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.12.custom.min.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>js/jquery.dropdown.easing.1.3.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>js/script.sidebar_dropdown.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>

 <!--start of css and js for gallery slider in mission_slider page-->




     <!--end of css and js for gallery slider in mission_slider page-->


        <!-- Start of Reference: http://www.jankoatwarpspeed.com/post/2008/06/09/Building-a-better-web-forms-Context-highlighting-using-jQuery.aspx -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>CSS/radio.css" media="screen"/>
        <script type="text/javascript" src="<?php echo base_url();?>js/radio.js"></script>

        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>CSS/highlight.css" media="screen"/>
        <!-- End of Reference: http://www.jankoatwarpspeed.com/post/2008/06/09/Building-a-better-web-forms-Context-highlighting-using-jQuery.aspx -->


        <!--Start of the style for Sortable textarea for specific tasks under page "set activity"   -->
        <style>
        	#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        	#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        	#sortable li span { position: absolute; margin-left: -1.3em; }
      </style>
    <!--End of the style for Sortable textarea for specific tasks under page "set activity"   -->


    <script language="javascript" type="text/javascript">

	$(function() {
		$( ".start_date" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true,
                        dateFormat:"yy-mm-dd"
		});

	});

	$(function() {
		$( ".end_date" ).datepicker({
			numberOfMonths: 3,
			showButtonPanel: true,
                        dateFormat:"yy-mm-dd"
		});

	});

	$(function() {
		$( "#sortable" ).sortable();
		$( "#sortable" ).disableSelection();
	});

	$(function() {
		$( "button, input:submit, a", ".form_submit" ).button();
		$( "a", ".form_submit" ).click(function() { return false; });
	});


//start of function for dynamic background for "set_activity_form" on page "set activity"
        $(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
		$( "#accordion" ).accordion({
			icons: icons
		});
	});

//radio button effect

        $(function()
        {
            $('.left,.left_update,.tasks, .form_content input, .form_content textarea, .form_content select').focus(function(){
            $(this).parents('.row').addClass("over");
            }).blur(function(){
            $(this).parents('.row').removeClass("over");
            });
        });
//End of function for dynamic background for "set_activity_form" on page "set activity"


//start of function for dynamic "HELP" effect(drop-show effect) for "set_activity_form" on page "set activity"
$(function() {

	//ACCORDION BUTTON ACTION
	$('div.left').click(function() {
		$('div.accordionContent').slideUp('normal');
		$(this).next().slideDown('normal');
	});

        $('div.left_update').click(function() {
		$('div.accordionContent').slideUp('normal');
		$(this).next().slideDown('normal');
	});

        $('div.tasks').click(function() {
		$('div.accordionContent').slideUp('normal');
		$(this).next().slideDown('normal');
	});

	//HIDE THE DIVS ON PAGE LOAD
	$("div.accordionContent").hide();

});
//end of function for dynamic "HELP" effect(drop-show effect) for "set_activity_form" on page "set activity"




//Begin of the accordian in "set activity" page

$(function() {
		var stop = false;
		$( "#accordion_activity h3" ).click(function( event ) {
			if ( stop ) {
				event.stopImmediatePropagation();
				event.preventDefault();
				stop = false;
			}
		});
		$( "#accordion_activity" )
			.accordion({
				header: "> div > h3"
			})
			.sortable({
				axis: "y",
				handle: "h3",
				stop: function() {
					stop = true;
				}
			});
	});


        $(function() {
		$( "#activity_accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});

//Begin of the gallery slider in "mission_slider" page
            $(function() {
        $("#controller").jFlow({
            slides: "#slides",
            width: "980px",
            height: "313px"
        });
    });

	</script>

    <script>
    //Add more fields dynamically.
function addField(field,area,limit) {
	if(!document.getElementById) return; //Prevent older browsers from getting any further.
	var field_area = document.getElementById(area);
	var all_inputs = field_area.getElementsByTagName("input"); //Get all the input fields in the given area.
	//Find the count of the last element of the list. It will be in the format '<field><number>'. If the
	//		field given in the argument is 'friend_' the last id will be 'friend_4'.
	var last_item = all_inputs.length - 1;
	var last = all_inputs[last_item].id;
	var count = Number(last.split("_")[1]) + 1;

	//If the maximum number of elements have been reached, exit the function.
	//		If the given limit is lower than 0, infinite number of fields can be created.
	if(count > limit && limit > 0) return;

	//if(document.createElement) { //W3C Dom method.
	//	var li = document.createElement("li");
	//	var input = document.createElement("input");
	//	input.id = field+count;
	//	input.name = field+count;
	//	input.type = "text"; //Type of field - can be any valid input type like text,file,checkbox etc.
	//	li.appendChild(input);
	//	field_area.appendChild(li);
	//}
        if((document.createElement)) { //Older Method
		field_area.innerHTML += "<li class='ui-state-default'><input name='"+(field+count)+"' id='"+(field+count)+"' type='text' size='70'  /><span class='ui-icon ui-icon-arrowthick-2-n-s'></span></li>";

	}
  }

//End more fields dynamically.


</script>

<script>
    function submit_form()
{
document.set_activity_family.submit();
}
    </script>






    <!--start all table relevant plugin-->

            <script type="text/javascript" src="<?php echo base_url();?>js/jquery.tablesorter.js"></script>

        <!--CSS for table sorter -->
        <link rel="stylesheet" href="<?php echo base_url();?>CSS/table_sorter.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>CSS/jquery.tablesorter.pager.biowee.css" type="text/css" />


            <script language="javascript" type="text/javascript">
      $(document).ready(function() {
        //ta
        $("#myTable")
          .tablesorter({widthFixed: true, widgets: ['zebra']});

        //


      }); // ends (document).ready(function()

    </script>
        <!--end of all table-->
    </head>

    <body>
        <div id="wrapper">

            <div id="header">
                <div id="menu" align="center">
                    <ul>
                        <li class="current_page_item"><a href="<?php echo base_url();?>index.php/home/">Home</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/coat_of_arm/">Mission & Value</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/goal/">Goal Setting</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/activity_page/">Activity</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/portfolio/">My Portfolio</a></li>
                        <li><a href="#">Resilience Test</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
            </div>
            <!--end #header -->