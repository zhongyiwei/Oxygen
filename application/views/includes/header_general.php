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
        <!--load main css-->
        <link href="<?php echo base_url();?>CSS/style.css" rel="stylesheet" type="text/css" media="screen" />

        <link href="<?php echo base_url();?>CSS/dropdown_sidebar.css" rel="stylesheet" type="text/css" media="screen" />
        <link type="text/css" href="<?php echo base_url();?>CSS/themename/ui-lightness/jquery-ui-1.8.12.custom.css" rel="Stylesheet" />
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.12.custom.min.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>js/jquery.dropdown.easing.1.3.js"></script>
         <script type="text/javascript" src="<?php echo base_url();?>js/script.sidebar_dropdown.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>

 <!--start of css and js for TRANSLATION-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>CSS/translation.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/google_ajax_translation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.translation.js"></script>




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
     <!--Begin of TRANSLATION--Robin   -->
              <script type="text/javascript">

		//Cufon('h1')('h2')('h3')('h4')('h5')('h6')('.intro')('dt');

		$(function() {
			// DEMO -------------------------------------------
                        //document.write("<p>" + Date() + "</p>");

			$('p').Translator( { trigger:'dblclick' } );
			$('p').TranslatorBubble( {  ctrlKey:true, shiftKey:true } );
			$('dd').TranslatorBubble();

			// EXAMPLE 1 ----------------------------------------
			$('#example1 .example').TranslatorReset();
			$('#example1 .example').Translator({
				source:'en',
				trigger:'dblclick',
				destination:{
					fr:'Fran?ais',
					it:'Italiano',
					es:'Espa?ol',
					de:'Deutsch',
					ja:'日本語',
					ar:'???????',
                                        hr:'hrvatski',
                                        id:'Indonesia',
                                        ko:'頃滉淡鞏?',
                                        lt:'Lietuvi懦',
                                        lv:'latvie拧u',
                                        nl:'Nederlands',
                                        no:'norsk',
                                        pl:'Polski',
                                        pt:'Portugu锚s',
                                        ro:'Rom芒n膬',
                                        ru:'袪褍褋褋泻懈泄',
                                        sk:'sloven膷ina',
                                        sl:'sloven拧膷ina',
                                        sr:'褋褉锌褋泻懈',
                                        sv:'Svenska',
                                        tl:'Filipino',
                                        vi:'Ti岷縩g Vi峄噒',
                                        CN:'涓枃 (绠€浣?'
				}
			});

			// EXAMPLE 2 ----------------------------------------
			$('#example2 .example').TranslatorReset();
			$('#example2 .example').TranslatorBubble({
				source:'en',
				destination:'fr'
			});

			// EXAMPLE 3 ----------------------------------------
			$('#example3 .example').TranslatorReset();
			$('#example3 .example input[type=button]').click(function(evt) {
				$.Translator(
					$('#example3 input[type=text]').val(),
					{ destination:'fr', menuLeft:evt.pageX, menuTop:evt.pageY},
					function(response) {
						$('#example3 input[type=text]').val(response.translation);
					}
				);
			});
		});
		</script>

     <script language="javascript" type="text/javascript">
                 $(function() {
		$( "#activity_accordion" ).accordion({
			autoHeight: false,
			navigation: true
		});
	});


             $(function() {
		$( ".start_date" ).datepicker({
                        minDate: 0,
			numberOfMonths: 3,
			showButtonPanel: true,
                        dateFormat:"yy-mm-dd"
		});
                $( ".end_date" ).datepicker({
                        minDate: 0,
			numberOfMonths: 3,
			showButtonPanel: true,
                        dateFormat:"yy-mm-dd"
		});
	});
        </script>
     <script language="javascript" type="text/javascript">
function getElementsByClass(searchClass,node,tag) {
	var classElements = new Array();
	if ( node == null )
		node = document;
	if ( tag == null )
		tag = '*';
	var els = node.getElementsByTagName(tag);
	var elsLen = els.length;
	var pattern = new RegExp("(^|\\s)"+searchClass+"(\\s|$)");
	for (i = 0, j = 0; i < elsLen; i++) {
		if ( pattern.test(els[i].className) ) {
			classElements[j] = els[i];
			j++;
		}
	}
	return classElements;
}



        function ValidateDate()
    {
        //document.write("here");
        var SDate = document.getElementsByID('start_date_id').value;
        var EDate =  document.getElementsById("end_date_id").value;
        var alertReason1 =  'End Date must be greater than or equal to Start Date.';
        //var endDate = new Date(EDate);
        //var startDate= new Date(SDate);
        if(SDate > EDate && SDate != '' && EDate != '')
        {
            alert(alertReason1);
            document.getElementById('end_date').value = "";
            return false;
        }
        return true;
    }
 </script>

    <script language="javascript" type="text/javascript">
	//tabs---wenjie
	            $(function() {
                $( "#tabs" ).tabs();
            });
	//End of tabs---wenjie
	
	
          $(document).ready(function() {
        //ta
        $("#myTable")
          .tablesorter({widthFixed: true, widgets: ['zebra']});

        //


      }); // ends (document).ready(function()

	$(function() {
		$( "#datepicker" ).datepicker({
			dateFormat:"yy-mm-dd"
		});   
	});

        $(function() {
                $( "#datepicker123" ).datepicker({
                    dateFormat:"yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-100y:-6y'

                });
            });
//Validate end date is greater than start date



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
//Bowen---Accordion
            $(function() {
                $( "#accordion" ).accordion({
                    autoHeight: false,
                    navigation: true
                });
            });
//End of Bowen---Accordion

//Bowen---Check
$(function() {
            		$( "#check" ).button();
		$( "#format" ).buttonset();
            });
//End of Check--bowen

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


	//HIDE THE DIVS ON PAGE LOAD
	$("div.accordionContent").hide();

});
//end of function for dynamic "HELP" effect(drop-show effect) for "set_activity_form" on page "set activity"
              $(document).ready(function() {

    $("area.three").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/3.jpg)";
                

	});

	$("area.seven").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/7.jpg)";

	});

	$("area.eight").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/8.jpg)";
	});

        $("area.twelve").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/12.jpg)";
	});

	$("area.fifteen").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/15.jpg)";

	});

	$("area.twenty").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/20.jpg)";
	});

        $("area.twenty_three").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/23.jpg)";
	});

	$("area.twenty_four").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/24.jpg)";

	});

	$("area.twenty_eight").click( function(){
		document.getElementById("logo").style.background = "URL(<?php echo base_url(); ?>web_images/colour/28.jpg)";
	});

//Begin of the activity tracking
        $('#Educational,#Financial,#Spiritual,#Physical,#Career,#Social,#Family').hide();

          $('#goal_type').change(function() {
            var selectedGoal = $( "#goal_type" ).val();

            if (selectedGoal === "Family") {
              $('#Educational,#Financial,#Spiritual,#Physical,#Career,#Social').hide();
              $('#Family').effect('slide');
            }
            else if (selectedGoal === "Educational") {
              $('#Family,#Financial,#Spiritual,#Physical,#Career,#Social').hide();
              $('#Educational').effect('slide');
            }
            else if (selectedGoal === "Financial") {
              $('#Educational,#Family,#Spiritual,#Physical,#Career,#Social').hide();
              $('#Financial').effect('slide');
            }
            else if (selectedGoal === "Spiritual") {
              $('#Educational,#Family,#Financial,#Physical,#Career,#Social').hide();
              $('#Spiritual').effect('slide');
            }
            else if (selectedGoal === "Physical") {
              $('#Educational,#Family,#Spiritual,#Financial,#Career,#Social').hide();
              $('#Physical').effect('slide');
            }
            else if (selectedGoal === "Career") {
              $('#Educational,#Family,#Spiritual,#Physical,#Financial,#Social').hide();
              $('#Career').effect('slide');
            }
            else if (selectedGoal === "Social") {
              $('#Educational,#Family,#Spiritual,#Physical,#Career,#Financial').hide();
              $('#Social').effect('slide');
            }
          }); // ends $('#questions_set').change

      }); // ends (document).ready(function()



                  $(function() {
                $( "#accordion_Family, #accordion_Education, #accordion_Financial, #accordion_Career, #accordion_Social, #accordion_Physical, #accordion_Spiritual" ).accordion({
                    autoHeight: false,
                    navigation: true
                });
            });
            //end of activity tracking

            //Begin of No of character countdown---Robin
function textCounter( field, countfield, maxlimit ) {
  if ( field.value.length > maxlimit )
  {
    field.value = field.value.substring( 0, maxlimit );
    alert( 'Your motto can only be 33 characters in length.' );
    return false;
  }
  else
  {
    countfield.value = maxlimit - field.value.length;
  }
}
//End of No of character countdown---Robin
	</script>



  
        





<script>
   // $(function submit_form()
//{
//document.set_activity_family.submit();
//})
    </script>

        <style>
	#format { margin-top: 2em; }
	</style>





    <!--start all table relevant plugin-->

        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.tablesorter.js"></script>
            
        <!--CSS for table sorter -->
        <link rel="stylesheet" href="<?php echo base_url();?>CSS/table_sorter.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url();?>CSS/jquery.tablesorter.pager.biowee.css" type="text/css" />


           
        <!--end of all table-->
    </head>

    <body>
        <div id="wrapper">

            <div id="header">
                <div id="menu" align="center">
                    <ul>
                        <li class="current_page_item"><a href="<?php echo base_url();?>index.php/home/">Home</a></li>
						<li><a href="<?php echo base_url();?>index.php/home/test_resilience/">Resilience Test</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/why_ms/#MS/">Mission & Value</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/goal/">Set Goals</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/activity_page/">Activity</a></li>
                        <li><a href="<?php echo base_url();?>index.php/home/portfolio_coa_motto/#MS">My Portfolio</a></li>                        
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
            </div>
            <!--end #header -->