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
$current_page = "r-energy";
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
    $currentTab = "r-tb-energy";
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
        <?php include 'top-bar.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('r-menu.php'); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome to Rendering plants
                        <small> administrator control panel</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <form class="frm-content" id="frm-content" name="frm-content" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6" style="min-width:755px;">
                                <div class="box  box-form" >
                                    <div class="box-header ui-sortable-handle">
                                        <h3 class="box-title">Energy saving</h3>
                                    </div><!-- /.box-header -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-body">
                                                <div class="col-md-8">
                                                    <a id="btn-tb-energy" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "r-tb-energy") {
                                                        echo "disabled";
                                                    }
                                                    ?>">
                                                        Energy Saving
                                                    </a>
                                                    <a id="btn-tb-Whe" href="#" class="btn btn-default btn-flat btn-sm <?php
                                                    if ($_REQUEST['tab_status'] == "r-tb-Whe") {
                                                        echo "disabled";
                                                    }
                                                    ?>">
                                                        Whe
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
                                                $filePdf = "";
                                                $urlPDF = "";
                                                $data = "content_tab='" . $currentTab . "' AND content_ID='" . $content_ID . "'"
                                                        . " AND content_tab_id='" . $content_tab_id . "'";
                                                $mysqli->where($data);
                                                $sql = $mysqli->query("", "t_content_tab");
                                                if ($mysqli->num_rows() != 0) {
                                                    $sql = $mysqli->fetch_assoc();
                                                    foreach ($sql as $row) {
                                                        $dataL = $row['content_detail_' . $_REQUEST['language']];
                                                        if ($row['urlPDF'] != "") {
                                                            $urlPDF = $row['urlPDF'];
                                                        };
                                                        if ($row['pdf'] != "") {
                                                            $filePdf = $row['pdf'];
                                                        };
                                                    }
                                                }
                                                ?>
                                                <textarea class="summernote" data-role="<?php echo $content_ID ?>" data-current="<?php echo $current_page; ?>" data-tab="<?php echo $currentTab ?>" data-tab-id="<?php echo $content_tab_id; ?>"><?php echo $dataL ?></textarea>
                                                <input type="hidden" value="add" id="action" name="action">
                                            </div><!-- /.box-body -->
                                            <div class="box-footer">
                                                <div class="col-md-2">
                                                    <div class="box-body">
                                                        Choose pdf
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="box-body">
                                                        <input type="file" name="file-pdf" id="file-pdf"  >
                                                        <p><?php echo $filePdf; ?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="box-body">
                                                        <textarea name="rul-pdf" id="rul-pdf" style="width: 100%"><?php echo trim($urlPDF); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer" style="clear: both">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        </div>
                                    </div><!-- /.box -->
                                </div>
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
        <script src="script/r-energysaving.js" type="text/javascript" id="eng" data-tab="<?php echo $_REQUEST['tab_status'] ?>"></script>
    </body>
</html>
