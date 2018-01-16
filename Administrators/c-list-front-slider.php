<?php
@session_start();
include('php/function_check_logout.php');
require_once('./php/classdb/mysqliConn.php');
$mysqli = new classDb;
$User_id = $_SESSION['User_id'];
$Username = $_SESSION['Username'];
$FullName = $_SESSION['FullName'];
if ($User_id == '') {
    echo "<script>
                    window.location='index.php';
            </script>";
}
if ($_REQUEST['language'] == "") {
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
            <?php include("c-menu.php"); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Welcome to Chicken rendering plant
                        <small> administrator control panel</small>
                    </h1>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-xs-6" style="min-width: 800px;">           
                                <div class="box box-success box-form frm-slider" style="display: none">
                                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                                        <h3 class="box-title">Manage Front Page Image Gallery</h3>
                                    </div><!-- /.box-header -->  

                                    <div class="box-body">
                                        <!-- form project-->                                    
                                        <form class="form-horizontal" name="frmslider" action="php/c-slider.class.php" method="post" 
                                              enctype="multipart/form-data" onsubmit="return dosubmit_sl();">
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  English : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_EN" id="Caption_EN">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Thailand : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_TH" id="Caption_TH">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Laos : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_LA" id="Caption_LA">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Myanmar : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_MM" id="Caption_MM">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Pakistan : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_PK" id="Caption_PK">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Saudi Arabia : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_SA" id="Caption_SA">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Bangladesh : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_BD" id="Caption_BD">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Iran : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_IR" id="Caption_IR">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Vietnam : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_VN" id="Caption_VN">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">Caption for  Indonesia : </label>
                                                <div class="col-xs-6">
                                                    <input class="form-control" name="Caption_ID" id="Caption_ID">
                                                </div>            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-xs-4">
                                                    Upload Image for slide:</label>
                                                <div class="col-xs-3">
                                                    <div class='input-group'>
                                                        <input type='file' name="Image_name" id="Image_name" />
                                                        <span style="color: red;font-size: 10px;">
                                                            *Fixed size 1000px * 340px
                                                        </span>

                                                    </div>
                                                </div>
                                            </div>
                                            <input type='hidden' class="form-control" name="Date_new" id="Date_new" 
                                                   value="<?php echo date('Y-m-d H:s:i'); ?>"/>

                                            <div class="box-footer"> 
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                            <input  name="action" id="action" value="add" type="hidden">
                                            <input  name="h_id" id="h_id" value="" type="hidden">
                                            <input type="hidden" id="h_Pic_new"  name="h_Pic_new">       
                                        </form>

                                    </div>    
                                </div>
                            </div>
                            <div class="col-xs-6" style="min-width: 800px;">           
                                <div class="box box-success box-form frm-slider" style="display: none">
                                    <div class="box-header ui-sortable-handle" >
                                        <h3 class="box-title">Image</h3>
                                    </div><!-- /.box-header -->  
                                    <div class="box-body">
                                        <div class="show-img">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>                          
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title"> Manage Front Page Image Gallery&nbsp;&nbsp;
                                            <span class="btn btn-xs btn-success add-img"><i class="fa fa-plus"> Add</i></span> 
                                            <span class="btn btn-xs btn-warning close-img"><i class="fa fa-times-circle"> Cancle</i></span> 
                                        </h3>

                                    </div>
                                    <div class="box-body table-responsive no-padding">
                                        <table  id="table-slider-c" class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width='250'>English </th>
                                                    <th width='250'>Thailand </th>
                                                    <th width='250'>Laos </th>
                                                    <th width='250'>Myanmar </th>
                                                    <th width='250'>Pakistan </th>
                                                    <th width='250'>Saudi Arabia</th>
                                                    <th width='250'>Bangladesh</th>
                                                    <th width='250'>Iran</th>
                                                    <th width='250'>Vietnam</th>
                                                    <th width='250'>Indonesia</th>
                                                    <th width="150">Image</th>
                                                    <th width='25'></th>
                                                    <th width='25'></th>
                                                </tr>                                            
                                            </thead>
                                            <tbody>

                                                <?php
                                                $mysqli->order('sort_oder', 'ASC');
                                                $mysqli->where("status_type='C'");
                                                $sql = $mysqli->query('', 't_image_slide');
                                                if ($mysqli->num_rows() == 0) {
                                                    ?>
                                                    <tr><td  colspan="13">Empty</td></tr>
                                                    <?php
                                                } else {
                                                    $sql = $mysqli->fetch_assoc();
                                                    $i = 0;
                                                    foreach ($sql as $row) {
                                                        ++$i;
                                                        ?>
                                                        <tr id="<?php echo $row ['AutoIid'] ?>">
                                                            <td><?php echo $row ['Caption_EN'] ?></td>
                                                            <td><?php echo $row ['Caption_TH'] ?></td>
                                                            <td><?php echo $row ['Caption_LA'] ?></td>
                                                            <td><?php echo $row ['Caption_MM'] ?></td>
                                                            <td><?php echo $row ['Caption_PK'] ?></td>
                                                            <td><?php echo $row ['Caption_SA'] ?></td>
                                                            <td><?php echo $row ['Caption_BD'] ?></td>
                                                            <td><?php echo $row ['Caption_IR'] ?></td>
                                                            <td><?php echo $row ['Caption_VN'] ?></td>
                                                            <td><?php echo $row ['Caption_ID'] ?></td>
                                                            <td>
                                                                <a href="../Slider/<?php echo $row['Image_name']; ?>" data-toggle="r-lightbox-slider" data-gallery="multiimages" 
                                                                   data-title="Front Page Image  Slider">
                                                                    <img src="../Slider/small/<?php echo $row ['Image_name'] ?>"/></a>

                                                            </td>
                                                            <td>
                                                                <span class="btn btn-xs btn-warning edit-slider" 
                                                                      onclick="edit_slider('<?php echo $row['AutoIid']; ?>');">
                                                                    <i class="fa fa fa-pencil"></i> Edit
                                                                </span>                                                    
                                                            </td>
                                                            <td>
                                                                <span class="btn btn-xs btn-danger del-slider" 
                                                                      onclick="del_slider('<?php echo $row['AutoIid']; ?>');">
                                                                    <i class="fa fa fa-times"></i> Del
                                                                </span>
                                                            </td>
                                                        </tr>   
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>    
                                    </div>
                                </div>    
                            </div>

                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script src="js/jquery-1.11.3.min.js"></script> 
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="script/c-slider.js" type="text/javascript"></script>
        <!-- Imagen -->
        <script src="js/plugins/ekko-ligthbox/ekko-lightbox.js"></script>
        <script src="script/customer-lightbox.js" type="text/javascript"></script>
        <script src="js/js/jquery-ui-1.9.2.custom.js" type="text/javascript"></script>
    </body>
</html>

