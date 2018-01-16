<!--

        ,-----.                                             ,--.

        |  |) /_   ,--,--.  ,---.  ,-----.  ,---.  ,--,--,  `--'

        |  .-.  \ ' ,-.  | | .-. : `-.  /  | .-. : |      \ ,--.

        |  '--' / \ '-'  | \   --.  /  `-. \   --. |  ||  | |  |

        `------'   `--`--'  `----' `-----'  `----' `--''--' `--'

-->

<?php

//echo phpinfo();

session_start();

$lang = $_SESSION['lang'];



include './connect.php';

$color = '1';



if ($lang == '') {

    $lang = 'EN';

}



function utf8_to_tis620($string)

{

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



function substr_utf8($str, $start_p, $len_p)

{

    $str_post = "";

    if (strlen(utf8_to_tis620($str)) > $len_p) {

        $str_post = "...";

    }

    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $start_p . '}' .

        '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,' . $len_p . '}).*#s', '$1', $str) . $str_post;

}



;





$sql = " SELECT pl.`product_id`, pl.`product_n1`, pl.`product_n2`, pl.`product_n3`, pl.`product_n4`,"

    . " pl.`product_n5`, pl.`product_n6`, pl.`product_n7`, pl.`product_n8`, pl.`cuntry_id`, pl.`status` "

    . " ,tc.cuntry_name,tc.abbreviation"

    . " FROM `t_product_language` pl"

    . " JOIN  `t_cuntry` tc ON(tc.cuntry_id=pl.cuntry_id)"

    . " WHERE tc.abbreviation='" . $lang . "'";



$result = $mysqli->query($sql) or die($mysqli->error);





$num = $res->num_rows;

if ($num == 0) {

    $sql = " SELECT pl.`product_id`, pl.`product_n1`, pl.`product_n2`, pl.`product_n3`, pl.`product_n4`,"

        . " pl.`product_n5`, pl.`product_n6`, pl.`product_n7`, pl.`product_n8`, pl.`cuntry_id`, pl.`status` "

        . " ,tc.cuntry_name,tc.abbreviation"

        . " FROM `t_product_language` pl"

        . " JOIN  `t_cuntry` tc ON(tc.cuntry_id=pl.cuntry_id)"

        . " WHERE tc.abbreviation='EN'";

    $res = $mysqli->query($sql);

    $row = $res->fetch_assoc();

    $_SESSION['_cuntry'] = 'EN';

    $product_n1 = $row['product_n1'];

    // $product_n2 = $row['product_n2'];

    $product_n3 = $row['product_n3'];

    $product_n4 = $row['product_n4'];

    $product_n5 = $row['product_n5'];

    $product_n6 = $row['product_n6'];

    $product_n7 = $row['product_n7'];

    $product_n8 = $row['product_n8'];

} else {

    $row = $res->fetch_assoc();

    $cuntry = $row['abbreviation'];

    $_SESSION['_cuntry'] = $cuntry;

    $product_n1 = $row['product_n1'];

    $product_n2 = $row['product_n2'];



    $product_n3 = $row['product_n3'];

    $product_n4 = $row['product_n4'];

    $product_n5 = $row['product_n5'];

    $product_n6 = $row['product_n6'];

    $product_n7 = $row['product_n7'];

    $product_n8 = $row['product_n8'];

}

?>

<!DOCTYPE HTML>

<!--[if IE 8]>

<html class="ie8 no-js"> <![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->

<html class="no-js">

<head>

    <title>Home ASTW Fishmeal Plants A & S Thai Works Co.,Ltd www.asthaiworks.com</title>

    <?php include("base.php"); ?>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=8, IE=9, IE=10">

    <meta http-equiv='content-type' content='text/html;charset=UTF-8'/>

    <meta name="description"

          content="Home ASTW,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,A & S Thai Works Co.,Ltd (ASTW) ASTW DIRECT CONDENSATE RETURN SYSTEM (SAVE TANK) Direct Condensate Return System Save up to 12% of your boiler fuel oil consumption and save,Home A&S Thai Works">

    <meta name="keywords"

          content="Home ASTW,home astw,Fishmeal Plants,Rendering Plants,A & S Thai Works Co.,Ltd,Disc Driers,Contact,How to chose a Fishmeal Plant,A&S Thai Works,asthaiworks.com,Deodorizer Smell Removal,Energy Saving,Accessories,Equipment,Twin Screw Presses,Home A&S Thai Works">

    <meta name="author" content="Ixtendo">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="style.css" type="text/css" rel="stylesheet" id="main-style">

    <!--[if IE]>

    <link href="css/ie.css" type="text/css" rel="stylesheet"> <![endif]-->

    <link href="css/color/orange.css" type="text/css" rel="stylesheet" id="color-style">

    <link href="images/favicon.ico" type="image/x-icon" rel="shortcut icon">



    <!-- begin JS -->

    <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

    <!-- jQuery -->



    <script src="js/jquery.flexslider-min.js" type="text/javascript"></script>

    <!-- slider -->

    <script type="text/javascript">

        $(window).load(function () {

            $('.flexslider').flexslider();

            $("#cssmenu li").removeClass("orange").addClass("blue");

            $('.bl').mouseover(function () {

              $(this).find('div.bg_m_blue').removeClass("bg_m_blue").addClass("bg_m_orange");

            });

            $('.bl').mouseout(function () {

              $(this).find('div.bg_m_orange').removeClass("bg_m_orange").addClass("bg_m_blue");

            });

            $('body,html').addClass('loaded');

        });



    </script>

    <script src="js/changemenu.js" language="javascript" type="text/javascript"></script>



</head>

<body>

<input type="hidden" id="h_page" value="1">



<div id="wrap">

    <?php include('header.php'); ?>

    <section id="content" class="container clearfix">

        <?php include('slide.php'); ?>

        <div class="one-fourth bg-left">

            <div class="entry-image" style="position:relative" id="pic-left">

                <a href="<?php echo $lang ?>/Rendering/">

                    <img src="Fishmeal-Plant/render-left-box.jpg">



                    <div class="bg_left"></div>

                    <span

                        style="position:absolute;top: 4px;left: 13px;color:#FFFFFF;font-size:15px;">Rendering Plants</span>

                </a>

            </div>

            <?php include 'subscribe.php'; ?>

        </div>

        <div class="three-fourths column-last" id="imlink">

            <hr id="index">

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/Disk-driers/"><!--disk-driers.php-->

                    <div class="entry-image">

                        <img src="images/thumb/1disk-driers.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="color_lable bg_m_blue"></div>

                        <div class="p"><?php echo $product_n1; ?></div>

                    </div>                     

                </a>

            </div>

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/How-to-choose-a-Fishmeal-Plant/"><!--howtochoose.php-->

                    <div class="entry-image">

                        <img src="images/thumb/2How-to-choose-a-Fishmeal-Plant.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p">

                            <?php

                            if ($lang == "VN") {

                            echo $product_n2 = substr_utf8($row['product_n2'], 0, 30);

                            } else {

                            echo $product_n2 = $row['product_n2'];

                            }

                            ?>

                        </div>

                    </div>                      



                </a>

            </div>

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/Twin-Screw-Presses/"><!--twin_screw_presses.php-->

                    <div class="entry-image">

                        <img src="images/thumb/3Twin-Screw-Presses.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n3; ?></div>

                    </div>  



                </a>

            </div>

            <div class="one-fourth bl  column-last" style="position:relative">

                <a href="<?php echo $lang ?>/Fish-Coockers/"><!--fish_cookers.php-->

                    <div class="entry-image">

                        <img src="images/thumb/4Fish-Coockers.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n4; ?></div>

                    </div>  

                    

                </a>

            </div>

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/Complete-Fishmeal-Plants/"><!--complete_fishmealplants.php-->

                    <div class="entry-image">

                        <img src="images/thumb/5Complete-Fishmeal-Plants.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n5; ?></div>

                    </div>  

                    

                </a>

            </div>

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/Deodoriser-smell-removal/"><!-- deodoriser-smell-removal.php-->

                    <div class="entry-image">

                        <img src="images/thumb/6Deodoriser-Smell-Removal.jpg" alt="" title="">

                    </div>

                   <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n6; ?></div>

                    </div>

                    

                </a>

            </div>

            

            <div class="one-fourth bl" style="position:relative">

                <a href="<?php echo $lang ?>/Energy-saving/"><!--energy_saving.php-->

                    <div class="entry-image">

                        <img src="images/thumb/7Energy-Saving.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n7; ?></div>

                    </div>                  

                </a>

            </div>

            <div class="one-fourth bl  column-last" style="position:relative">

                <a href="<?php echo $lang ?>/Accessories/"><!--accessories.php-->

                    <div class="entry-image">

                        <img src="images/thumb/8Accessories-and-Equipment.jpg" alt="" title="">

                    </div>

                    <div class="box-service">

                        <div class="bg_m_blue"></div>

                        <div class="p"><?php echo $product_n8; ?></div>

                    </div>

                </a>

            </div>

        </div>

        <div class="clear"></div>

    </section>

    <?php include('footer.php'); ?>

</div>

</body>

</html>

