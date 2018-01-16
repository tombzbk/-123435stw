<?php
session_start();
$lang = $_SESSION['lang'];
$pageNow = $_SESSION['page'];
include './connect.php';
require_once("framework/encry-html.php");
$myURL = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
//$myURL = $_SERVER['REQUEST_URI'];
$arr = explode('/', $myURL);
$urlThisPage = $arr[3] . '/' . $arr[4] . '/' . $arr[5];

if ($lang == '') {
    $lang = 'EN';
}
?>
<!DOCTYPE HTML>
<!--[if IE 8]> <html class="ie8 no-js"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js">
    <head>
        <title>ASTW Rendering Plants and Machinery A & S Thai Works Co.,Ltd www.asthaiworks.com</title>
        <?php include './base.php'; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
        <meta http-equiv='content-type' content='text/html;charset=UTF-8' />
        <meta name="description" content="ASTW Rendering Plants and Machinery,A & S Thai Works Co., Ltd (ASTW) is the largest manufacturer of high quality Fishmeal and Rendering plants in Asia. Based in Bangkok, Thailand, the Company operates a sophisticated production facility producing complete processing plants.,A & S THAI WORKS CO., LTD.(ASTW)
              99/199 moo 1 Theparak Rd., (Km.22), Bangsaothong,Samutprakarn 10540 Thailand.">
        <meta name="keywords" content="ASTW Rendering Plants and Machinery,Rendering Plants,Disc Drier, Cookers,Blood Drying,Accessories & Equipment,Energy Saving,Deodorizer Smell Removal,Photo of Plants,">
        <meta name="author" content="Ixtendo">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="style.css" type="text/css" rel="stylesheet" id="main-style">
        <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
        <link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">
        <link href="css/style-refurbished.css" type="text/css" rel="stylesheet">

        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function () {
                $('.flexslider').flexslider();
                $('.blo').mouseover(function () {
                    $(this).find('div.bg_m_orange').removeClass("bg_m_orange").addClass("bg_m_blue");
                });
                $('.blo').mouseout(function () {
                    $(this).find('div.bg_m_blue').removeClass("bg_m_blue").addClass("bg_m_orange");
                });
                $('body,html').addClass('loaded');
            });
        </script>
        <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>
    </head>
    <body data-page="<?php echo $page2; ?>" data-host="<?php echo $arr[0]; ?>">
        <input type="hidden" id="h_page" value="<?php echo $page2 == '4' ? '4' : ''; ?>">
        <div id="wrap">
            <?php include('header.php'); ?>
            <section class="container clearfix">
                <div class="clear"></div>
