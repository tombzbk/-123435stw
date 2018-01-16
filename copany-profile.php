<?php
session_start();
$lang = $_SESSION['lang'];
include 'connect.php';
require_once("framework/encry-html.php");
$color = '2';

if($lang==''){
    $lang='EN';
}
//$color='2';
?>
<!--
        ,-----.                                             ,--.
        |  |) /_   ,--,--.  ,---.  ,-----.  ,---.  ,--,--,  `--'
        |  .-.  \ ' ,-.  | | .-. : `-.  /  | .-. : |      \ ,--.
        |  '--' / \ '-'  | \   --.  /  `-. \   --. |  ||  | |  |
        `------'   `--`--'  `----' `-----'  `----' `--''--' `--'

-->

<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js">
    <head>
        <title>About ASTW Fishmeal Plants A & S Thai Works Co.,Ltd www.asthaiworks.com</title>
        <?php include './base.php';?>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
	<meta http-equiv='content-type' content='text/html;charset=UTF-8' />
    <meta name="description" content="About ASTW,Company Profile,What is fishmeal,Service Team,Team,Organisation,A & S Thai Works Co., Ltd. is a leading designer and manufacturer of fishmeal and rendering plants in Asia Pacific, Since 1986, we have delivered, installed and commissioned more than240 complete plants. As of 2013, nerly all are still running.">
	<meta name="keywords" content="About ASTW,Fishmeal Plants,Rendering Plants,About ASTW,Company Profile,What is fishmeal,Service Team,Team,Organisation,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="style.css" type="text/css" rel="stylesheet" id="main-style">
	<!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
	<link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">
        <link href="css/csstab.css" type="text/css" rel="stylesheet">
	<link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">

    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
    <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/lightbox.css">
    <script src="js/lightbox.js"></script>
   	<script type="text/javascript" charset="utf-8">
      $(window).load(function() {
        $('.flexslider').flexslider();
		$( "#cssmenu li" ).removeClass( "orange" ).addClass( "blue" );
      });

		//  tab  //
		jQuery(document).ready(function() {
			jQuery('.tabs .tab-links a').on('click', function(e)  {
				var currentAttrValue = jQuery(this).attr('href');
		 			console.log(currentAttrValue);
				// Show/Hide Tabs
				jQuery('.tabs ' + currentAttrValue).slideDown(400).siblings().slideUp(400);
				// Change/remove current tab to active
				jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

				e.preventDefault();
			});
			$('body,html').addClass('loaded');
		});
    </script>
    <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>
    <!-- end JS -->
   <style>
            #about-page ul
            {
            list-style-type: none;
            padding: 0;
            margin: 0;
            }

            #about-page li
            {
            background-image: url(img/li.png);
            background-repeat: no-repeat;
            background-position: 0 .6em;
            padding-left: 1.6em;
            }
    </style>
</head>

<body>
<input type="hidden" id="h_page" value="2">
<div id="wrap">
    <?php include('header.php');?>
    <section id="content" class="container clearfix">
		<?php include('slide.php');?>
        	<div class="one-fourth bg-left">
                <div class="entry-image" style="position:relative" id="pic-left">
                    <a href="renderingplants.php">
                    <img src="Fishmeal-Plant/render-left-box.jpg">
                    <div class="bg_left"></div>
                    <span style="position:absolute;top: 4px;left: 13px;color:#FFFFFF;font-size:15px;">Rendering Plants</span>
                    </a>

                </div>
                <?php include 'subscribe.php';?>
            </div>
            <div class="three-fourths column-last" style=" text-align: justify;text-justify: inter-word;">
            <hr id="index">
            <div class="tabs">
                <ul class="tab-links">
                    <li class="active"><a href="#tab1">Company Profile</a></li>
                    <li><a href="#tab2">What is fishmeal?</a></li>
                    <li><a href="#tab3">Team</a></li>
                    <li><a href="#tab4">Organisation</a></li>
                </ul>

                <div class="tab-content" id="about-page">
                    <div id="tab1" class="tab active">
                            <h1 id="page-title">ASTW – Fishmeal and Rendering Plants</h1>
                            <section>
                            <div id="cal_left">
                    	<?php

                        $sql = 	" SELECT content_detail_".$lang." FROM `t_content_tab` WHERE  `content_tab` =  'tb-com-pro' ";
                        $res = $mysqli->query($sql);
                        $row = $res->fetch_assoc();
                        
                        if($row['content_detail_'.$lang]==""){
                          $sql = 	" SELECT content_detail_EN FROM `t_content_tab` WHERE  `content_tab` =  'tb-com-pro' ";
                          $res = $mysqli->query($sql);
                          $row = $res->fetch_assoc();
                            echo decodeToHtml($row['content_detail_EN']);
                          }else{
                            echo decodeToHtml($row['content_detail_'.$lang]);
                          }
						?>
                            </div>
                            <!-- END Content1 -->

                            <div class="right-third column-last">
                           		<div class="entry-image float-right">
                                    <a class="" href="fullsize/Second-ASTW-workshop-office.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                        <span class="overlay zoom"></span>
                                        <img src="img/03-profile.jpg" alt="" title="">
                                    </a>
                                </div>
                                <div class="entry-image float-right">
                                    <a class="" href="fullsize/Vietfish-empty.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                            <span class="overlay zoom"></span>
		                                    <img src="img/02-profile.jpg" alt="" title="">
        							</a>
                                </div>
                                <div class="entry-image float-right">
                                    <a class="" href="fullsize/2556-05-14-10-38-03_0019.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                            <span class="overlay zoom"></span>
                                    		<img src="img/05-profile.jpg" alt="" title="">
                                    </a>
                                </div>
                                <div class="entry-image float-right">
                                    <a class="" href="fullsize/First-ASTW-workshop.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                            <span class="overlay zoom"></span>
		                                    <img src="img/04-profile.jpg" alt="" title="">
                                    </a>
                                </div>
                                <div class="entry-image float-right">
                                    <a class="" href="fullsize/Second ASTW workshop.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                            <span class="overlay zoom"></span>
		                                    <img src="img/01-profile.jpg" alt="" title="">
                                    </a>
                                </div>
                            </div>


                            <div class="clear"></div>
                            </section>
                    </div> <!-- End tab 1-->
                    <!-- tab 2 -->
                    <div id="tab2" class="tab">
                        <p><h1 id="page-title">What is fishmeal?</h1></p>
                    	<?php
                        	$sql = 	" SELECT content_detail_".$lang." FROM `t_content_tab` WHERE  `content_tab` =  'tb-What-fishmeal' ";
							$res = $mysqli->query($sql);
							$row = $res->fetch_assoc();
							if($row['content_detail_'.$lang]==""){
								$sql = 	" SELECT content_detail_EN FROM `t_content_tab` WHERE  `content_tab` =  'tb-What-fishmeal' ";
								$res = $mysqli->query($sql);
								$row = $res->fetch_assoc();
								  echo decodeToHtml($row['content_detail_EN']);
							}else{
								  echo decodeToHtml($row['content_detail_'.$lang]);
							}
						?>
                    </div>
                    <!-- tab 3-->
                    <div id="tab3" class="tab">
                    <p><h1 id="page-title">Team</h1></p>
                    	<?php
                        	$sql = 	" SELECT content_detail_".$lang." FROM `t_content_tab` WHERE  `content_tab` =  'tb-team' ";
							$res = $mysqli->query($sql);
							$row = $res->fetch_assoc();
							if($row['content_detail_'.$lang]==""){
								$sql = 	" SELECT content_detail_EN FROM `t_content_tab` WHERE  `content_tab` =  'tb-team' ";
								$res = $mysqli->query($sql);
								$row = $res->fetch_assoc();
								  echo decodeToHtml($row['content_detail_EN']);
							}else{
								  echo decodeToHtml($row['content_detail_'.$lang]);
							}
						?>
                    </div>
                    <!----   tab 4 ---->
                    <div id="tab4" class="tab">
                        <p><h1 id="page-title">Organisation</h1></p>
                    	<?php
                        	$sql = 	" SELECT content_detail_".$lang." FROM `t_content_tab` WHERE  `content_tab` =  'tb-Organisation' ";
							$res = $mysqli->query($sql);
							$row = $res->fetch_assoc();
							if($row['content_detail_'.$lang]==""){
								$sql = 	" SELECT content_detail_EN FROM `t_content_tab` WHERE  `content_tab` =  'tb-Organisation' ";
								$res = $mysqli->query($sql);
								$row = $res->fetch_assoc();
								  echo decodeToHtml($row['content_detail_EN']);
							}else{
								  echo decodeToHtml($row['content_detail_'.$lang]);
							}
						?>
                    </div>
                </div>
            </div>
            </div>
    </section>
	<?php include('footer.php');?>
</div>
</body>
</html>
