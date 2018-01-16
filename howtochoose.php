<?php
session_start();
$lang = $_SESSION['lang'];
$pageNow = $_SESSION['page'];
include './connect.php';
require_once("framework/encry-html.php");
$color = '';

if($lang==''){
$lang='EN';
}
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
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js">
    <head>
        <title>How to choose ASTW Fishmeal Plants A & S Thai Works Co.,Ltd www.asthaiworks.com</title>
        <?php include ("base.php"); ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
        <meta http-equiv='content-type' content='text/html;charset=UTF-8' />
        <meta name="description" content="How to choose ASTW,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,A & S Thai Works Co.,Ltd (ASTW) ASTW DIRECT CONDENSATE RETURN SYSTEM (SAVE TANK) Direct Condensate Return System Save up to 12% of your boiler fuel oil consumption and save,How to choose">
        <meta name="keywords" content="How to choose ASTW,home astw,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,How to choose">
        <meta name="author" content="Ixtendo">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="style.css" type="text/css" rel="stylesheet" id="main-style">
        <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
        <link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">
        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="css/lightbox.css">
        <script src="js/lightbox.js"></script>

        <script type="text/javascript" charset="utf-8">
            $(window).load(function () {
                $('.flexslider').flexslider();
                $("#cssmenu li").removeClass("blue").addClass("orange");
				$('body,html').addClass('loaded');
            });
        </script>
        <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>
        <!-- end JS -->
       <style>
            a:hover{
                color: white;
            }
            a.tooltips {
                position: relative;
                display: inline-block;
            }
            a.tooltips span {
                position: absolute;
                padding:5px;
                width:153px;
                color: #FFFFFF;
                background: #666666;
                text-align: center;
                visibility: hidden;
                border-radius: 0px;

            }
            a.tooltips span:after {
                content: '';
                position: absolute;
                top: 50%;
                right: 100%;
                margin-top: -8px;
                width: 0; height: 0;
                border-right: 8px solid #666666;
                border-top: 8px solid transparent;
                border-bottom: 8px solid transparent;
            }
            a:hover.tooltips span {
                visibility: visible;
                opacity: 1;
                left: 50%;
                top: 50%;
                margin-top: -15.5px;
                margin-left: 15px;
                z-index: 999;
            }
            #cal_left ul
            {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            #cal_left li
            {
                background-image: url(img/li.png);
                background-repeat: no-repeat;
                background-position: 0 .6em;
                padding-left: 1.6em;
                line-height:20px;
            }
        </style>
    </head>

    <body>
        <input type="hidden" id="h_page" value="2">
        <div id="wrap">
            <?php include('header.php'); ?>
            <section id="content" class="container clearfix">
                <?php include('slide.php'); ?>
                <div class="one-fourth bg-left">
                    <div class="entry-image" style="position:relative" id="pic-left">
                        <a href="renderingplants.php">
                            <img src="Fishmeal-Plant/render-left-box.jpg">
                            <div class="bg_left"></div>
                            <span style="position:absolute;top: 2px;left: 13px;color:#FFFFFF;font-size:15px;">Rendering Plants</span>
                        </a>

                    </div>
                    <?php include 'subscribe.php'; ?>
                </div>

                <div class="three-fourths column-last">
                    <h1 id="page-title">How to choose a Fishmeal Plants</h1>
                    <section>
                        <div id="cal_left">

                            <?php

                            $sql = "SELECT * FROM t_content WHERE content_page='f-howto'";
                            $result = $mysqli->query($sql);
                            $row = $result->fetch_assoc();
                            if ($row['content_detail_' . $lang] == "") {
                                echo decodeToHtml($row['content_detail_EN']);
                            } else {
                                echo decodeToHtml($row['content_detail_' . $lang]);
                            }
                            $dowloadPdf = $row['pdf'];
                            $urlPdf = $row['urlPDF'];
                            ?>

                        </div>

                        <div class="right-third column-last">
                            <div class="entry-image float-right">
                                <a class="" href="fullsize/DSC_0078.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                    <span class="overlay zoom"></span>
                                    <img src="rendering-plants/how_to_shoose/thumb/01-howtoshoose.jpg" alt="" title="">
                                </a>
                            </div>
                            <div class="entry-image float-right">
                                <a class="" href="fullsize/P1040051e900.jpg" data-lightbox="ASTW-Chicken" data-title="">
                                    <span class="overlay zoom"></span>
                                    <img src="rendering-plants/how_to_shoose/thumb/02-howtoshoose.jpg" alt="" title="">
                                </a>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </section>
                    <div class="clear"></div>

                    <div style="border-bottom:1px #FFA600 solid;margin:10px 0 10px 0;"></div>

                    <?php
                    $sql = "SELECT * FROM t_content_sub WHERE content_page='f-howto'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_assoc();
                    if ($row['content_detail_' . $lang] == "") {
                      echo decodeToHtml($row['content_detail_EN']);
                    }else{
                        echo decodeToHtml($row['content_detail_' . $lang]);
                    }
                    ?>
                    <div class="clear"></div>
                    <p style="margin-top:30px;">
                        <?php
                        //if ($dowloadPdf != "" && $urlPdf != "")

                        if ($dowloadPdf != "") {
                            $dis = "block";
                        } else {
                            $dis = "none";
                        }
                        if ($urlPdf != "") {
                            $dis2 = "block";
                        } else {
                            $dis2 = "none";
                        }
                        ?>
                    <div>
                        <div style="display: <?php echo $dis; ?>;float: left;margin-right: 10%">
                            <span style="float:left;">Download :</span>
                            <span style="position:relative">
                                <a href="file-pdf/<?php echo $dowloadPdf;?>" target="_blank" class="tooltips">
                                    <img src="img/file_pdf.png" width="18">
                                    <span>How to choose a Fishmeal Plants</span>
                                </a>
                            </span>
                        </div>
                        <div style="display: <?php echo $dis2; ?>;">
                            <a href="<?php echo $urlPdf;?>"  style="float:left;" target="_blank">Link to pdf </a>
                        </div>
                    </div>

                    </p>
                    <div style="clear: both"></div>
                    <div style="margin:30px;"></div>
                 </div>
            </section>
            <?php include('footer.php'); ?>
        </div>
    </body>
</html>
