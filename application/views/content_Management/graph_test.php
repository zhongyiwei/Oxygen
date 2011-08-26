<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Simple Test</title>
        <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>graph/jquery.jqplot.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>graph/examples.css" />
        <link href="<?php echo base_url(); ?>CSS/style.css" rel="stylesheet" type="text/css" media="screen" />
        <!-- BEGIN: load jquery -->
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>graph/jquery.js"></script>
        <!-- END: load jquery -->

        <!-- BEGIN: load jqplot -->
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>graph/jquery.jqplot.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>graph//jqplot.pieRenderer.js"></script>
        <!-- END: load jqplot -->

        <style type="text/css">
            div.jqplot-target { margin-bottom: 45px; }
        </style>

        <?php
        //number of burma
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Burma');
        $burma = $this->db->get();
        $graph_burma = $burma->num_rows();

        //number of china
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'China');
        $china = $this->db->get();
        $graph_china = $china->num_rows();

        //number of india
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'India');
        $India = $this->db->get();
        $graph_india = $India->num_rows();

        //number of Indonesia
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Indonesia');
        $Indonesia = $this->db->get();
        $graph_indonesia = $Indonesia->num_rows();

        //number of Malaysia
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Malaysia');
        $Malaysia = $this->db->get();
        $graph_malaysia = $Malaysia->num_rows();

        //number of Singapore
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Singaporean');
        $Singapore = $this->db->get();
        $graph_singapore = $Singapore->num_rows();

        //number of Thailand
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Thailand');
        $Thailand = $this->db->get();
        $graph_thailand = $Thailand->num_rows();

        //number of Vietnam
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Vietnam');
        $Vietnam = $this->db->get();
        $graph_vietnam = $Vietnam->num_rows();

        //number of Others
        $this->db->select('*');
        $this->db->from('seeker');
        $this->db->where('nationality', 'Others');
        $Others = $this->db->get();
        $graph_others = $Others->num_rows();
        ?>
        <script class="test" type="text/javascript">$(document).ready(function(){
            plot1 = $.jqplot('pie1', [[['Burma',<?php echo $graph_burma; ?>],['China',<?php echo $graph_china; ?>],['India',<?php echo $graph_india; ?>],['Indonesia',<?php echo $graph_indonesia; ?>],['Malaysia',<?php echo $graph_malaysia; ?>],['Singapore',<?php echo $graph_singapore; ?>],['Thailand',<?php echo $graph_thailand; ?>],['Vietnam',<?php echo $graph_vietnam; ?>],['Others',<?php echo $graph_others; ?>]]], {
                gridPadding: {top:0, bottom:38, left:0, right:0},
                seriesDefaults:{renderer:$.jqplot.PieRenderer, trendline:{show:false}, rendererOptions: { padding: 8, showDataLabels: true}},
                legend:{
                    show:true,
                    placement: 'outside',
                    rendererOptions: {
                        numberRows: 1
                    },
                    location:'s',
                    marginTop: '15px'
                }
            });
        });</script>

    </head>
    <body>

        <div id="header">
            <div id="menu">
                <ul>
                    <li class="current_page_item"><a href="<?php echo base_url(); ?>index.php/home/">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/index/">Website Statistics By Nationality</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/add_article/">Add Articles</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/update_article/">Maintain Articles</a></li>
                </ul>
            </div>
        </div>

        <div id="logo">
            <?php
            $is_logged_in = $this->session->userdata('is_logged_in');
            $role = $this->session->userdata('role');
            if (isset($is_logged_in) && ($is_logged_in == 'true') && ($role == 'admin')) {
            ?>
                <h1><a href="<?php echo base_url(); ?>index.php/cms/view_customer">Oxygen</a></h1>
                <p><em>Guide to a successful life </em></p>
            <?php } else {
            ?>
                <h1><a href="<?php echo base_url(); ?>index.php/home/">Oxygen</a></h1>
                <p><em>Guide to a successful life </em></p>
            <?php } ?>
        </div>

        <h1>Nationality Distribution</h1>
        <div align="center">
            <div id="pie1" style="margin-top:20px; margin-left:20px; width:400px; height:400px;"></div>
            <pre class="test"></pre>
        </div>

        <div id="footer">
            <p>Copyright (c) 2011 Thinkquest Competition. All rights reserved. Design by <a href="#">BOWEN CAI</a>.</p>
            <div id="sitemap">
                <ul>
                    <li><a href="<?php echo base_url(); ?>index.php/home/">Home</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/index/">Website Statistics By Nationality</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/add_article/">Add Articles</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/cms/update_article/">Maintain Articles</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>