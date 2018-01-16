<?php
session_start();
include("php/function_check_logout.php");
require_once('./php/classdb/mysqliConn.php');
$mysqli = new classDb;
$User_id = $_SESSION['User_id'];

$Username = $_SESSION['Username'];

$FullName = $_SESSION['FullName'];

if ($User_id == '') {

    echo "<script>window.location='index.php';</script>";
}

$current_page = "About";

$data = "content_page='" . $current_page . "'";

$mysqli->where($data);

$sql = $mysqli->query("", "t_content");

if ($mysqli->num_rows() != 0) {

    $sql = $mysqli->fetch_assoc();

    $i = 0;

    foreach ($sql as $row) {

        $content_ID = $row['content_ID'];
    }
} else {

    $content_ID = uniqid();
}

if (isset($_REQUEST['tab_status']) != "") {

    $currentTab = $_REQUEST['tab_status'];
} else {

    $currentTab = "tb-com-pro";
}

$data = "content_tab='" . $currentTab . "'";

$mysqli->where($data);

$sql = $mysqli->query("", "t_content_tab");

if ($mysqli->num_rows() != 0) {

    $sql = $mysqli->fetch_assoc();

    $i = 0;

    foreach ($sql as $row) {

        $content_tab_id = $row['content_tab_id'];
    }
} else {

    $content_tab_id = uniqid();
}

if (isset($_REQUEST['language']) == "") {

    $_REQUEST['language'] = "EN";
}
?>







<!DOCTYPE html>



<html>



    <head>



        <meta charset="UTF-8">



        <title>Admin ASTW | Dashboard</title>



        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>



        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />



        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />



        <!-- Ionicons -->



        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />



        <!-- Theme style -->



        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />







        <!-- Cuntom css -->



        <link href="css/custom-style.css" rel="stylesheet" type="text/css" />



        <link rel="stylesheet" type="text/css" href="editors/dist/summernote.css">

        <link href="js/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />



        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->



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







                    <form class="frm-content" id="frm-content" name="frm-content" method="post" enctype="multipart/form-data">



                        <div class="row">



                            <div class="col-md-6" style="min-width:755px;">



                                <div class="box  box-form">







                                    <div class="box-header ui-sortable-handle">



                                        <i class="fa fa-cogs"></i>



                                        <h3 class="box-title">About page setting</h3>



                                    </div>

                                    <!-- /.box-header -->



                                    <div class="row">



                                        <div class="col-md-12">



                                            <div class="box-body">



                                                <div class="col-md-8">



                                                    <a id="btn-tb-com" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "tb-com-pro") {

                                                        echo "disabled ";
                                                    }
                                                    ?>">



                                                        Company Profile



                                                    </a>



                                                    <a id="btn-tb-What-fishmeal" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "tb-What-fishmeal") {

                                                        echo "disabled ";
                                                    }
                                                    ?>">



                                                        What is fishmeal?



                                                    </a>



                                                    <a id="btn-tb-team" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "tb-team") {

                                                        echo "disabled ";
                                                    }
                                                    ?>">



                                                        Team



                                                    </a>



                                                    <a id="btn-tb-Organisation" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "tb-Organisation") {
                                                        echo "disabled ";
                                                    }
                                                    ?>">
                                                        Organisation
                                                    </a>



                                                </div>



                                                <div class="col-md-4">



                                                    <div class="box-tools pull-right">

                                                        <i class="fa fa-language"></i> Set Language :

                                                        <?php include("set-languages.php"); ?>



                                                    </div>

                                                </div>



                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="box-body">

                                                <?php
                                                $data = "content_tab='" . $currentTab . "' AND content_ID='" . $content_ID . "'"
                                                        . " AND content_tab_id='" . $content_tab_id . "'";

                                                $mysqli->where($data);

                                                $sql = $mysqli->query("", "t_content_tab");

                                                if ($mysqli->num_rows() != 0) {

                                                    $sql = $mysqli->fetch_assoc();

                                                    foreach ($sql as $row) {

                                                        $dataL = $row['content_detail_' . $_REQUEST['language']];
                                                    }
                                                }
                                                ?>

                                                <textarea class="summernote" data-content-id="<?php echo $content_ID ?>" data-current-page="<?php echo $current_page; ?>" data-current-tab="<?php echo $currentTab; ?>" data-conten-tab-id="<?php echo $content_tab_id; ?>">

                                                    <?php echo $dataL ?>

                                                </textarea>

                                                <button type="submit" class="btn btn-primary">submit</button>

                                                <input type="hidden" value="add" id="action" name="action">

                                            </div>

                                            <!-- /.box-body -->

                                        </div>



                                    </div>

                                    <!-- /.box -->



                                </div>



                            </div>

                            <!-- /.col -->



                    </form>







                </section>

                <!-- /.content -->



            </aside>

            <!-- /.right-side -->







        </div>

        <!-- ./wrapper -->



        <!-- MOdal -->

        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modal-success">

            <div class="modal-dialog">

                <div class="alert alert-success alert-dismissable">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                    <span id="status-action" style="display:block"></span>

                </div>

            </div>

        </div>

        <?php include './modal-gallery.php'; ?>

        <script src="js/jquery-1.11.3.min.js"></script>

        <script src="js/bootstrap.min.js" type="text/javascript"></script>

        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script src="editors/dist/summernote.min.js"></script>

        <script src="script/summetnote-gallery.js" type="text/javascript"></script>

        <script src="js/plugins/dropzone/dropzone.js" type="text/javascript"></script>

        <script src="script/jsModal-media-files.js" type="text/javascript"></script>

        <script src="script/install-summer.js" type="text/javascript"></script>

        <script src="script/about-page.js" type="text/javascript" id="about" data-role="<?php echo $_REQUEST['tab_status'] == "" ? "tb-com-pro" : $_REQUEST['tab_status']; ?>"></script>

    </body>



</html>