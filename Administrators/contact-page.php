<?php
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
$current_page = "contact";
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
                            <div class="col-md-6" style="min-width: 768px">
                                <div class="box  box-form" >
                                    <div class="box-header ui-sortable-handle">
                                        <i class="fa fa-gear"></i>
                                        <h3 class="box-title">Contact page setting</h3>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-2">
                                                    Language :
                                                </div>
                                                <div class="col-md-10">
                                                <?php include("set-languages.php");?>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <?php
                                        $data = "content_ID='" . $content_ID . "' AND content_page='" . $current_page . "'";
                                        $mysqli->where($data);
                                        $sql = $mysqli->query("", "t_content");
                                        if ($mysqli->num_rows() != 0) {
                                            $sql = $mysqli->fetch_assoc();
                                            foreach ($sql as $row) {
                                                $dataTotextarea = $row['content_detail_' . $_REQUEST['language']];
                                            }
                                            echo '<input type="hidden" value="edit" id="action" name="action">';
                                        } else {
                                            echo '<input type="hidden" value="add" id="action" name="action">';
                                        }
                                        ?>
                                        <textarea class="summernote" data-role="<?php echo $content_ID ?>" data-current="<?php echo $current_page; ?>"><?php echo $dataTotextarea; ?></textarea>
                                        <button type="submit" class="btn btn-primary">submit</button>
                                        <!--<button type="reset" class="btn btn-default">Reset</button>-->
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                    </form>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
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
        <script src="js/plugins/dropzone/dropzone.js" type="text/javascript" ></script>
        <script src="script/jsModal-media-files.js" type="text/javascript"></script>        
        <script src="script/install-summer.js" type="text/javascript"></script>
        <script src="script/contact-page.js" type="text/javascript"></script>
    </body>
</html>
