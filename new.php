<?php
session_start();

$lang = $_SESSION['lang'];

include("connect.php");

$color = '3';

if ($lang == '') {

    $lang = 'EN';
}
?>

<?php

function utf8_to_tis620($string) {

    $str = $string;

    $res = "";

    for ($i = 0; $i < strlen($str); $i++) {

        if (ord($str[$i]) == 224) {

            $unicode = ord($str[$i + 2]) & 0x3F;

            $unicode |= (ord($str[$i + 1]) & 0x3F) << 6;

            $unicode |= (ord($str[$i]) & 0x0F) << 12;

            $res .= chr($unicode - 0x0E00 + 0xA0);

            $i += 2;
        } else {

            $res .= $str[$i];
        }
    }

    return $res;
}

function substr_utf8($str, $start_p, $len_p) {

    $str_post = "";

    if (strlen(utf8_to_tis620($str)) > $len_p) {

        $str_post = "...";
    }

    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start_p . '}' .
                    '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len_p . '}).*#s', '$1', $str) . $str_post;
}

;
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

        <title>News ASTW Fishmeal Plants A & S Thai Works Co.,Ltd www.asthaiworks.com</title>

        <?php include './base.php'; ?>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">

        <meta http-equiv='content-type' content='text/html;charset=UTF-8' />

        <meta name="description" content="News ASTW,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,A & S Thai Works Co.,Ltd (ASTW) ASTW DIRECT CONDENSATE RETURN SYSTEM (SAVE TANK) Direct Condensate Return System Save up to 12% of your boiler fuel oil consumption and save,News">

        <meta name="keywords" content="News ASTW,home astw,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,News">

        <meta name="author" content="Ixtendo">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <link href="style.css" type="text/css" rel="stylesheet" id="main-style">

        <!--[if IE]> <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->

        <link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">

        <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">

        <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

        <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>

        <script type="text/javascript" charset="utf-8">

            $(window).load(function () {

                $('.flexslider').flexslider();

                $("#cssmenu li").removeClass("orange").addClass("blue");

                $('body,html').addClass('loaded');

            });

        </script>

        <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>

        <!-- end JS -->



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

                    <hr id="index">

                    <h1>News</h1><!--id="page-title"-->

                    <section>

                        <?php
                        $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new`" .
                                " WHERE news_language = '" . $lang . "'" .
                                " ORDER BY Auto_ID DESC LIMIT 3";

                        $res = $mysqli->query($sql);

                        $num = $res->num_rows;

                        if ($num == 0) {

                            $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new`" .
                                    " WHERE news_language = 'EN'" .
                                    " ORDER BY Auto_ID DESC LIMIT 3";

                            $res = $mysqli->query($sql);

                            $num = $res->num_rows;

                            $i = 0;

                            while ($row = $res->fetch_assoc()) {

                                $i++;
                                ?>

                                <div class="<?php
                                if ($i == '3') {
                                    echo 'new-third column-last';
                                } else {
                                    echo 'new-third';
                                }
                                ?>">

                                    <div class="entry-image float-left">	

                                        <img src="upload_new/small/<?php echo $row['Pic_new']; ?>" title="<?php echo $row['Title_new']; ?>" class="img_w">

                                    </div>                    	

                                    <p id="title_new"><?php echo $row['Title_new']; ?></p>

                                    <div id="detail_new">

                                        <?php echo substr_utf8($row['Detail_new'], 0, 80); ?>

                                    </div>

                                    <a class="more_new" id="n_<?php echo $i ?>" onClick="shoe_popup('<?php echo $row['Auto_ID'] ?>');">read more ></a>                            

                                </div>						

                                <?php
                            }
                        } else {

                            $i = 0;

                            while ($row = $res->fetch_assoc()) {

                                $i++;
                                ?>

                                <div class="<?php
                                if ($i == '3') {
                                    echo 'new-third column-last';
                                } else {
                                    echo 'new-third';
                                }
                                ?>">

                                    <div class="entry-image float-left">	

                                        <img src="upload_new/small/<?php echo $row['Pic_new']; ?>" title="<?php echo $row['Title_new']; ?>" class="img_w">

                                    </div>                    	

                                    <p id="title_new"><?php echo $row['Title_new']; ?></p>

                                    <div id="detail_new">

                                        <?php echo substr_utf8($row['Detail_new'], 0, 80); ?>

                                    </div>

                                    <a class="more_new" id="n_<?php echo $i ?>" onClick="shoe_popup('<?php echo $row['Auto_ID'] ?>');">read more ></a>                            

                                </div>



                                <?php
                            }
                        }
                        ?>



                    </section>

                    <div class="clear"></div> 

                    <div class="lise_new">

                        <?php
                        $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new`" .
                                " WHERE news_language = '" . $lang . "'" .
                                " ORDER BY Auto_ID DESC";

                        $res = $mysqli->query($sql);

                        $totalNum = $res->num_rows;

                        if ($totalNum == 0) {

                            $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new`" .
                                    " WHERE news_language = 'EN'" .
                                    " ORDER BY Auto_ID DESC";

                            $res = $mysqli->query($sql);

                            $totalNum2 = $res->num_rows;

                            $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new` " .
                                    " WHERE news_language = 'EN' ORDER BY Auto_ID DESC" .
                                    " LIMIT " . $num . "," . $totalNum2 . "";

                            $res = $mysqli->query($sql);

                            $i = 0;

                            while ($row = $res->fetch_assoc()) {

                                $i++;
                                ?>

                                <div class="sub_new">

                                    <?php
                                    $date = explode(' ', $row['Date_new']);

                                    $ext = explode('-', $date[0]);

                                    $Y = $ext[0];

                                    $M = $ext[1];

                                    $D = $ext[2];

                                    $thYear = $Y + 543;

                                    echo "<span class='new_date'>" . $D . ' / ' . $M . ' / ' . $thYear . "</span><span class='sub_detail'> - <strong>" . $row['Title_new'] . '</strong>&nbsp; ' .
                                    substr_utf8($row['Detail_new'], 0, 60) . '</span>';
                                    ?>          

                                    <span class="mor_sub"  onClick="shoe_popup('<?php echo $row['Auto_ID'] ?>')" id="l_<?php echo $i ?>" >

                                        <a style="cursor:pointer">read more ></a>

                                    </span> 

                                </div> 	

                                <?php
                            }
                        } else {

                            $sql = " SELECT `Auto_ID`, `Title_new`, `Detail_new`, `Pic_new`, `Date_new`, `Status` FROM `t_manage_new` " .
                                    " WHERE news_language = '" . $lang . "' ORDER BY Auto_ID DESC" .
                                    " LIMIT " . $num . "," . $totalNum . "";

                            $res = $mysqli->query($sql);

                            $i = 0;

                            while ($row = $res->fetch_assoc()) {

                                $i++;
                                ?>

                                <div class="sub_new">

                                    <?php
                                    $date = explode(' ', $row['Date_new']);

                                    $ext = explode('-', $date[0]);

                                    $Y = $ext[0];

                                    $M = $ext[1];

                                    $D = $ext[2];

                                    $thYear = $Y + 543;

                                    echo "<span class='new_date'>" . $D . ' / ' . $M . ' / ' . $thYear . "</span><span class='sub_detail'> - <strong>" . $row['Title_new'] . '</strong>&nbsp; ' .
                                    substr_utf8($row['Detail_new'], 0, 60) . '</span>';
                                    ?>          

                                    <span class="mor_sub"  onClick="shoe_popup('<?php echo $row['Auto_ID'] ?>')" id="l_<?php echo $i ?>" >

                                        <a style="cursor:pointer">read more ></a>

                                    </span> 

                                </div>   

                                <?php
                            }
                        }
                        ?>        

                    </div>	   

                    <div style="margin:30px;"></div>                      

                </div>



            </section>

            <?php include('footer.php'); ?>

        </div>

        <div class="overlaynew"></div>

        <div class="popup popup-new">

            <div class="close_popup"><img src="img/01-close.png"></div>

            <div class="clear"></div>

            <div id="loading"><img src="img/712.GIF"></div>

            <div id="show" style="position:relative"></div>

        </div>

        <script language="javascript" type="text/javascript">

            $(function () {
                $('.overlaynew').click(function () {
                    $('.overlaynew').fadeOut();
                    $('.popup').fadeOut();
                });
                $('.close_popup').click(function () {
                    $('.overlaynew').fadeOut();
                    $('.popup').fadeOut();
                });
            });


            function shoe_popup(id) {
                $("html, body").animate({scrollTop: 0}, "slow");
                $('#show').html('');
                $('#loading').css('display', 'block');
                $('.overlaynew').css('display', 'block');
                $('.popup').css('display', 'block');
                $.get('popup-new.php', {id: id}, function (data) {
                    $('#loading').css('display', 'none');
                    $('#show').html(data);
                });
            }
        </script>

    </body>

</html>

