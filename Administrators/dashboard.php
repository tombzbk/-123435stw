<?php
header('Content-Type: text/html; charset=utf-8');
@session_start();
if (isset($_REQUEST['l']) == 'Y') {
    $_SESSION['User_id'] = '';
    $_SESSION['Username'] = '';
    $_SESSION['FullName'] = '';
    echo "<script>window.location='index.php';</script>";
}
require_once('./php/classdb/mysqliConn.php');
$mysqli = new classDb;
$User_id = $_SESSION['User_id'];
$Username = $_SESSION['Username'];
$FullName = $_SESSION['FullName'];
if ($User_id == '') {
    echo "<script>window.location='index.php';</script>";
}

//- ส่วนของการประกาศ Function --------------------------------------------------------
function utf8_to_tis620($string) {
    $str = empty($string) ? '' : $string;
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
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Admin ASTW | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Cuntom css -->
        <link href="css/custom-style.css" rel="stylesheet" type="text/css" />
        <!-- Cuntom image css -->
        <link href="css/ekko-lightbox/ekko-lightbox.css" rel="stylesheet">
        <!-- Cuntom datatable css -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="js/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    </head>

    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="choose.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                ASTW Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $Username; ?><i class="caret"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('menu.php'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome to Fishmeal plants
                        <small> administrator control panel</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($page == "media") {
                                include './media-file.php';
                            } else if ($page == "new") {
                                include './list-new.php';
                            } else if ($page == "slider") {
                                include './list-front-slider.php';
                            } else if ($page == "lng") {
                                include './language.php';
                            } else if ($page == "gallery") {
                                include './list-gallery.php';
                            } else if ($page == "user") {
                                include './list-user.php';
                            } else if ($page == "faq") {
                                include './list-faq.php';
                            } else if ($page == "subscribe") {
                                include './subscribe.php';
                            } else if ($page == 'content') {
                                include './content.php';
                            } else {
                                include('./list-main-menu.php');
                            }
                            ?>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </aside>
            <!-- /.right-side -->
        </div>
        <!-- ./wrapper -->
        <script src="js/jquery-1.11.3.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- Custom script -->
        <script src="script/news.js" type="text/javascript"></script>
        <script src="script/slider.js" type="text/javascript"></script>
        <script src="script/language.js" type="text/javascript"></script>
        <script src="script/gallery.js" type="text/javascript"></script>
        <script src="script/user.js" type="text/javascript"></script>
        <script src="script/faq.js" type="text/javascript"></script>
        <script type="text/javascript" src="script/subscribe.js"></script>
        <!-- Imagen -->
        <script src="js/plugins/ekko-ligthbox/ekko-lightbox.js"></script>
        <script src="script/jsCustom.js" type="text/javascript"></script>
        <!---  Custom data table   -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <script src="script/mainMenu.js" type="text/javascript"></script>
        <script src="js/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>
       
        <?php
        if ($_GET['gpage'] == "media") {
            ?>
            <script src="js/plugins/dropzone/dropzone.js" type="text/javascript"></script>
            <script src="script/jsMediafile.js" type="text/javascript"></script>
        <?php } ?>

    </body>

</html>