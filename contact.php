<?php
//	$color='7';
session_start();
$lang = $_SESSION['lang'];
include("connect.php");
require_once("framework/encry-html.php");
$color='7';
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
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js">
    <head>
        <title>Contact ASTW Fishmeal Plants A & S Thai Works Co.,Ltd www.asthaiworks.com</title>
        <?php include './base.php';?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">
	<meta http-equiv='content-type' content='text/html;charset=UTF-8' />
    <meta name="description" content="Contact ASTW,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,A & S Thai Works Co.,Ltd (ASTW) is the largest manufacturer of high quality fishmeal plant in Asia. Based in Bangkok, Thailand, the Company operates a sophisticated production facility producing complete fishmeal processing plants. With more than 27 years of experience, ASTW has manufactured more than 260 plants for installation in South East Asia, Pacific region, Middle East, Australia and New Zealand.">
	<meta name="keywords" content="Contact ASTW,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,">
	<meta name="author" content="Ixtendo">

<!--<meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
<meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="style.css" type="text/css" rel="stylesheet" id="main-style">
	<!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->
	<link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">
	<link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">
        <link rel="stylesheet" href="css/lightbox.css">
        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>
            <!-- lihht box -->
            <script src="js/lightbox.js"></script>
        <!--  -->
            <script type="text/javascript" charset="utf-8">
          $(window).load(function() {
            $('.flexslider').flexslider();
                    $( "#cssmenu li" ).removeClass( "orange" ).addClass( "blue" );
					$('body,html').addClass('loaded');
          });
        </script>
        <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>
        <!-- end JS -->
<style>
.msg {
    display: none;
}
.error {
    color: red;
}
.success {
    color: green;
}
</style>
</head>

<body>
<input type="hidden" id="h_page" value="2">
<div id="wrap">
    <?php include('header.php');?>
    <div id="content" class="container clearfix">
		<?php include('slide.php');?>
        	<div class="one-fourth bg-left">
                <div class="entry-image" style="position:relative" id="pic-left">
                    <a href="renderingplants.php"><img src="Fishmeal-Plant/render-left-box.jpg">
                    <div class="bg_left"></div>
                    <span style="position:absolute;top: 4px;left: 13px;color:#FFFFFF;font-size:15px;">Rendering Plants</span></a>

                </div>
                <?php include 'subscribe.php';?>
            </div>
            <div class="three-fourths column-last" style=" text-align: justify;text-justify: inter-word;">
                <hr id="index">
            	<h1>Contact Us</h1><!-- id="page-title"-->
				<section>
                    	<?php
                      require_once("framework/encry-html.php");

							$sql = 	 " SELECT  `content_detail_EN`, `content_detail_TH`, `content_detail_LA`, `content_detail_MM`,"
									." `content_detail_PK`, `content_detail_SA`, `content_detail_BD`, `content_detail_IR`, `content_detail_VN`,"
									." `content_detail_ID` FROM `t_content` WHERE `content_page`='contact'";

							$res = $mysqli->query($sql);
							$row = $res->fetch_assoc();
							if($row['content_detail_'.$lang]==""||$row['content_detail_'.$lang]=="<p><br></p>"){
									$sql = 	" SELECT content_detail_EN FROM `t_content` WHERE content_page = 'contact'";
									$res = $mysqli->query($sql);
									$row = $res->fetch_assoc();
									  echo decodeToHtml($row['content_detail_EN']);

							}else{
								  echo decodeToHtml($row['content_detail_'.$lang]);
							}
						?>
					<div class="clear"></div>
                    <hr>
                  <h3 id="page-title">Contact form</h3>
            	</section>
                        <section id="main" class="three-f">

                        <div id="contact-notification-box-success" class="notification-box notification-box-success" style="display: none;">
                        <p>Your message has been successfully sent. We will get back to you as soon as possible.</p>
                        <a href="#" class="notification-close notification-close-success">x</a>
                        </div>

                        <div id="contact-notification-box-error" class="notification-box notification-box-error " style="display: none;">
                        <p id="contact-notification-box-error-msg"
                        data-default-msg="Your message couldn't be sent because a server error occurred. Please try again.">
                        </p>
                        <a href="#" class="notification-close notification-close-error">x</a>
                        </div>
                        <form id="contact-form" class="content-form" method="post" action="#">
                        <p>
                        <label for="name">Name:<span class="note">*</span><span id="Complete" style="display:none;color:#018210"> &nbsp;<strong>Sending contact complete..</strong></span></label>
                        <input id="name" type="text" name="name" class="required">
                        </p>
                        <p>
                        <label for="companyname">Company name:<span class="note">*</span></label>
                        <input id="companyname" type="text" name="companyname">
                        </p>
                        <p>
                        <label for="email">Email:<span class="note">*</span></label>
                        <input id="email" type="email" name="email" class="required">
                        <span class="msg error">Not a valid email address</span>
                        <span class="msg success">A valid email address!</span>
                        </p>
                        <p>
                        <label for="message">Message:<span class="note">*</span></label>
                        <textarea id="message" cols="68" rows="8" name="message" class="required"></textarea>
                        </p>
                        <p>
                        <input type="hidden" id="h_date" name="h_date" value="<?php echo date('Y-m-d H:i:s')?>">
                        <input id="submit" class="button" type="button" name="submit" value="Send">
                        <input id="reset" class="button" type="reset" name="submit" value="Reset">
                        </p>
                        </form>
                        </section>
                        <section class="map_align">
                          <div class="entry-image column-last" style="border:3px #000000 inset ">
    								              <a class="" href="map/161114_ ASTWmap(1).jpg" data-lightbox="map" data-title="Download map">
                                      <span class="overlay zoom"></span>
                                      <img src="map/161114_ ASTWmap(1).jpg" width="330">
                                  </a>
                          </div>
                          <div>Download Map : <a href="map/161114_ ASTWmap(1).pdf" target="_blank"><span>Click here</span></a></div>
                        </section>
                        <br>
                        <section class="map_align">
                          <div class="entry-image column-last" style="border:3px #000000 inset ">
    								              <a class="" href="map/161114_ASTWmap(3).jpg" data-lightbox="map" data-title="Download map">
                                      <span class="overlay zoom"></span>
                                      <img src="map/161114_ASTWmap(3).jpg" width="330">
                                  </a>
                          </div>
                          <div>Download Map : <a href="map/161114_ASTWmap(3).pdf" target="_blank"><span>Click here</span></a></div>
                        </section>
            </div>
    </div>
	<?php include('footer.php');?>
</div>
</body>
</html>
