<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Oxygen</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo base_url(); ?>CSS/style.css" rel="stylesheet" type="text/css" media="screen" />

        <link href="<?php echo base_url(); ?>CSS/dropdown_sidebar.css" rel="stylesheet" type="text/css" media="screen" />
        <link type="text/css" href="<?php echo base_url(); ?>CSS/themename/ui-lightness/jquery-ui-1.8.12.custom.css" rel="Stylesheet" />
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.5.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.12.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dropdown.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/script.sidebar_dropdown.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>

        <!-- password strength-->
        <script type="text/javascript" src="<?php echo base_url(); ?>password/mocha.js"></script>
        <link type="text/css" href="<?php echo base_url(); ?>password/style.css" rel="stylesheet" />

        <script>
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
        </script>

        <style>
            #format { margin-top: 2em; }
        </style>
    </head>
    <body>
        <div id="wrapper">

            <div id="header">
                <div id="menu" align="center">
                    <ul>
                        <li class="current_page_item"><a href="<?php echo base_url(); ?>index.php/home/">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/why_ms/#MS/">Mission & Value</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/goal/">Set Goals</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/activity_page/">Activity</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/testResilience/">Resilience Test</a></li>
                        <li><a href="<?php echo base_url(); ?>index.php/home/portfolio_coa_motto/#MS">My Portfolio</a></li>
                        <li><a href="#">About us</a></li>
                    </ul>
                </div>
            </div>
            <!--end #header -->