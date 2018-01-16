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

if (isset($_REQUEST['language']) == "") {
    $_REQUEST['language'] = "EN";
}

$myURL = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
//$myURL = $_SERVER['REQUEST_URI'];
$arr = explode('/', $myURL);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin ASTW | Refurbished and new equipment in stock </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <link href="js/plugins/datatables/jquery.dataTables.css"/>
        <link href="js/plugins/datatables/dataTables.bootstrap.css"/>
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
    <body class="skin-blue fixed" data-host="<?php echo $arr[2]; ?>">
        <!-- header logo: style can be found in header.less -->
        <?php include 'top-bar.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            $_GET["_type"] == 'r' ? include('r-menu.php') : include('menu.php');
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome to <?php echo $_GET["_type"] == 'r' ? 'Rendering' : 'Fishmeal'; ?>  plants
                        <small> administrator control panel</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">


                    <div class="row">
                        <div class="col-md-8">

                            <div class="box  box-form" >
                                <form class="frm-content" id="frm-content" name="frm-content" method="post" enctype="multipart/form-data">
                                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                                        <h3 class="box-title">Refurbished and new equipment in stock</h3>
                                    </div><!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label>Header :</label>
                                                <input type="text" class="form-control" id="txt-header" name="txt-header" required="">
                                            </div>                                            
                                            <div class="col-md-12" style="margin-top: 1%;">
                                                <!-- Custom Tabs -->
                                                <div class="nav-tabs-custom">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active" id="li-teb-EN"><a href="#tab_en" data-toggle="tab">English</a></li>
                                                        <li id="li-teb-TH"><a href="#tab_th" data-toggle="tab">Thailand</a></li>
                                                        <!--<li id="li-teb-LA"><a href="#tab_la" data-toggle="tab">Laos</a></li>-->
                                                        <li id="li-teb-MM"><a href="#tab_mm" data-toggle="tab">Myanmar</a></li>
                                                        <li id="li-teb-PK"><a href="#tab_pk" data-toggle="tab">Pakistan</a></li>
                                                        <li id="li-teb-SA"><a href="#tab_sa" data-toggle="tab">Saudi Arabia</a></li>
                                                        <li id="li-teb-DB"><a href="#tab_bd" data-toggle="tab">Bangladesh</a></li>
                                                        <li id="li-teb-IR"><a href="#tab_ir" data-toggle="tab">Iran</a></li>
                                                        <li id="li-teb-VN"><a href="#tab_vn" data-toggle="tab">Vietnam</a></li>
                                                        <li id="li-teb-ID"><a href="#tab_id" data-toggle="tab">Indonesia</a></li>
                                                        <li id="li-teb-RU"><a href="#tab_ru" data-toggle="tab">Russia</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab_en">
                                                            <textarea class="summernote" id="summernote-EN" data-role="EN" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-EN" data-role="EN" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_th">
                                                            <textarea class="summernote" id="summernote-TH" data-role="TH" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-TH" data-role="TH" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_mm">
                                                            <textarea class="summernote" id="summernote-MM" data-role="MM" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-MM" data-role="MM" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_pk">
                                                            <textarea class="summernote" id="summernote-PK" data-role="PK" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-PK" data-role="PK" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_sa">
                                                            <textarea class="summernote" id="summernote-SA" data-role="SA" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-SA" data-role="SA" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_bd">
                                                            <textarea class="summernote" id="summernote-DB" data-role="BD" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-DB" data-role="DB" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_ir">
                                                            <textarea class="summernote" id="summernote-IR" data-role="IR" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-IR" data-role="IR" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_vn">
                                                            <textarea class="summernote" id="summernote-VN" data-role="VN" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-VN" data-role="VN" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_id">
                                                            <textarea class="summernote" id="summernote-ID" data-role="ID" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-ID" data-role="ID" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                        <div class="tab-pane" id="tab_ru">
                                                            <textarea class="summernote" id="summernote-RU" data-role="RU" data-current=""></textarea>
                                                            <label>Excerpt</label>
                                                            <textarea class="form-control" id="excerpt-RU" data-role="RU" data-current="" rows="5" maxlength="800"></textarea>
                                                        </div>
                                                        <!-- /.tab-pane -->
                                                    </div>
                                                    <!-- /.tab-content -->
                                                </div>
                                                <!-- nav-tabs-custom -->  
                                            </div>
                                        </div>
                                        <div class="row box-lebel-info">
                                            <div class="col-md-12">
                                                <label>Info label:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control input-info" name="info[]" id="info1" placeholder="text">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-flat btn-add-more-info"><i class="fa fa-plus"></i></button>
                                                    </span>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%;">
                                            <div class="col-md-6">
                                                <label>Cover picture :</label>
                                                <input type="file" name="cover-picture" id="cover-picture" class="form-control upload-img" accept="image/*" data-role="cover-view" >
                                            </div>
                                            <div class="col-md-6">
                                                <div id="cover-view" class="view-img"></div>
                                            </div>
                                        </div>
                                        <div class="row"  style="margin-top: 1%;">
                                            <div class="col-md-6">
                                                <label>Image 1 :</label>
                                                <input type="file" name="img-1" id="img-1" class="form-control upload-img" accept="image/*"  data-role="img-1-view" >

                                            </div>
                                            <div class="col-md-6">
                                                <div id="img-1-view" class="view-img"></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 1%;">
                                            <div class="col-md-6">
                                                <label>Image 2 :</label>
                                                <input type="file" name="img-2" id="img-2" class="form-control upload-img" accept="image/*"  data-role="img-2-view">
                                            </div>
                                            <div class="col-md-6">
                                                <div id="img-2-view" class="view-img"></div>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <input type="hidden" id="_type" value="<?php echo $_GET["_type"]; ?>">
                                        <button type="reset" class="btn btn-default">reset</button>
                                        <button type="button" class="btn btn-primary pull-right btn-save-content"><i class="fa fa-save"></i> Save change</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <div class="box">

                                <div class="box-body">
                                    <table class="table table-striped" id="list-content">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Header</th>
                                                <th style="width: 120px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $data = sprintf("_type='%s' AND status <> 'B' ORDER BY `sort` DESC ", $_GET["_type"]);
                                            $mysqli->where($data);
                                            $sql = $mysqli->query("", "t_refurbished");
                                            if ($mysqli->num_rows() != 0) {
                                                $sql = $mysqli->fetch_assoc();
                                                $i = 0;
                                                foreach ($sql as $row) {
                                                    ++$i;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $i ?></td>
                                                        <td><?php echo $row["header"]; ?></td>
                                                        <td>
                                                            <button class="btn btn-xs btn-warning btn-edit" data-id="<?php echo $row["id"]; ?>" data-sort="<?php echo $row["sort"]; ?>"><i class="fa fa-pencil"></i> Edit</button>
                                                            <button class="btn btn-xs btn-danger btn-del" data-id="<?php echo $row["id"]; ?>"><i class="fa fa-times"></i> Del</button>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    $sort = 1;
                                    $where = sprintf("status<>'B' ORDER BY sort DESC");
                                    $mysqli->where($where);
                                    $query = $mysqli->query("", "t_refurbished");
                                    if ($mysqli->num_rows() == 0) {

                                        $sort = 1;
                                    } else {
                                        $query = $mysqli->fetch_assoc();
                                        foreach ($query as $row) {
                                            $sort = $mysqli->num_rows() + 1;
                                        }
                                    }
                                    ?>
                                    <input type="hidden" id="_sort" value="<?php echo $sort; ?>">
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>

                    </div> <!-- /.row -->

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
        <!-- DataTables -->
        <script src="js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.min.js"></script>  

        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="editors/dist/summernote.min.js"></script>
        <script src="script/summetnote-gallery.js" type="text/javascript"></script>
        <script src="js/plugins/dropzone/dropzone.js" type="text/javascript" ></script>
        <script src="script/jsModal-media-files.js" type="text/javascript"></script>
        <script src="script/install-summer.js" type="text/javascript"></script>
        <script src="script/action-execute-refurbished.js" type="text/javascript"></script>

    </body>
</html>
