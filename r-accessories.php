<?phpsession_start();
$lang = $_SESSION['lang'];$pageNow = $_SESSION['page'];include("connect.php");require_once("framework/encry-html.php");$color = '4';if ($lang == '') {    $lang = 'EN';}?><!--
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
        <title>ASTW Fishmeal Plants how to choose</title>
        <?php include './base.php'; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
        <meta name="description" content="">
        <meta name="keywords" content="">
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

            $(window).load(function () {                $('.flexslider').flexslider();
                $("#cssmenu li").removeClass("blue").addClass("orange");
                $('body,html').addClass('loaded');
            });

        </script>
        <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>        <!-- end JS -->
        <style>
            a:hover{                color: white;            }            a.tooltips {                position: relative;                display: inline-block;            }            a.tooltips span {                position: absolute;                padding:5px;                width:153px;
                color: #FFFFFF;                background: #666666;                text-align: center;                visibility: hidden;                border-radius: 0px;            }            a.tooltips span:after {                content: '';                position: absolute;                top: 50%;                right: 100%;
                margin-top: -8px;
                width: 0; height: 0;                border-right: 8px solid #666666;                border-top: 8px solid transparent;                border-bottom: 8px solid transparent;            }            a:hover.tooltips span {                visibility: visible;                opacity: 1;
                left: 50%;                top: 50%;                margin-top: -15.5px;                margin-left: 15px;                z-index: 999;            }            #cal_left ul{
                list-style-type: none;
                padding: 0;
                margin: 0;            }
            #cal_left li            {
                background-image: url(img/li.png);                background-repeat: no-repeat;
                background-position: 0 .6em;
                padding-left: 1.6em;                line-height:20px;            }        </style>    </head>    <body>        <input type="hidden" id="h_page" value="2">        <div id="wrap">
            <?php include('header.php'); ?>            <section id="content" class="container clearfix">                <?php include('slide.php'); ?>                <div class="one-fourth bg-left">                    <div class="entry-image" style="position:relative" id="pic-left">                        <a href="renderingplants.php">                            <img src="Fishmeal-Plant/render-left-box.jpg">                            <div class="bg_left"></div>                            <span style="position:absolute;top: 2px;left: 13px;color:#FFFFFF;font-size:15px;">Rendering Plants</span>                        </a>                    </div>                    <?php include 'subscribe.php'; ?>                </div>                <div class="three-fourths column-last">                    <?php                    $sql = " SELECT * FROM `t_content` WHERE  `content_page` =  'r-accessories' ";
                    $res = $mysqli->query($sql);                    $i = 0;                    $row = $res->fetch_assoc();                    if ($row['content_detail_' . $lang] == "") {                        echo decodeToHtml($row['content_detail_EN']);                    } else {                        echo decodeToHtml($row['content_detail_' . $lang]);                    }                    $dowloadPdf = $row['pdf'];
                    $urlPdf = $row['urlPDF'];                    ?>
                    <p style="margin-top:30px;">                        <?php                        if ($dowloadPdf != "") {
                            $dis = "block";                        } else {                            $dis = "none";                        }                        if ($urlPdf != "") {
                            $dis2 = "block";                        } else {                            $dis2 = "none";                        }                        ?>
                    <div style="clear: both"></div>                    <div>
                        <div style="display: <?php echo $dis; ?>;float: left;margin-right: 10%">                            <span style="float:left;color: red">Download :</span>
                            <span style="position:relative">                                <a href="file-pdf/<?php echo $dowloadPdf; ?>" target="_blank" class="tooltips">                                    <img src="img/file_pdf.png" width="18">
                                    <span>Accessories & Equipment</span>                                </a>                            </span>                        </div>
                        <div style="display: <?php echo $dis2; ?>;">                            <a href="<?php echo $urlPdf; ?>"  style="float:left;" target="_blank">Link to pdf </a>                        </div>                    </div>
                    </p>
                    <div style="clear: both"></div>
                    <div style="margin:30px;"></div>                </div>            </section>            <?php include('footer.php'); ?>        </div>    </body></html>