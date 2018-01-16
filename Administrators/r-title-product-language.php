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
        <?php include 'top-bar.php'; ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include("r-menu.php"); ?>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-xs-12" style="min-width: 800px;">           
                                <div class="box box-success box-form frm-cuntry" style="display:">
                                    <div class="box-body">
                                        <h2 class="page-header">Manage Title Product language</h2>
                                        <!-- form project-->                                    
                                        <form class="form-horizontal" name="frmcuntry" action="php/r-acction.lng.class.php" method="post" 
                                              enctype="multipart/form-data" onsubmit="return dosubmit_lng();">

                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="col-xs-3">
                                                            <label for="product_n1">Disk Driers :</label>
                                                            <input type="text" name="product_n1" id="product_n1" class="form-control">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <label for="product_n2">How to choose a Fishmeal Plant :</label>
                                                            <input type="text" name="product_n2" id="product_n2" class="form-control">
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <label for="product_n3">Twin Screw Presses :</label>
                                                            <input type="text" name="product_n3" id="product_n3" class="form-control">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <label for="product_n4">Fish Cookers :</label>
                                                            <input type="text" name="product_n4" id="product_n4" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12" style="margin-top: 10px;">
                                                        <div class="col-xs-3">
                                                            <label for="product_n5">Complete Fishmeal Plants :</label>
                                                            <input type="text" name="product_n5" id="product_n5" class="form-control">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <label for="product_n6">Deodoriser Smell Removal :</label>
                                                            <input type="text" name="product_n6" id="product_n6" class="form-control">
                                                        </div>

                                                        <div class="col-xs-3">
                                                            <label for="product_n7">Energy Saving :</label>
                                                            <input type="text" name="product_n7" id="product_n7" class="form-control">
                                                        </div>
                                                        <div class="col-xs-3">
                                                            <label for="product_n8">Accessories and Equipment :</label>
                                                            <input type="text" name="product_n8" id="product_n8" class="form-control">
                                                        </div>
                                                    </div>                                

                                                </div>
                                            </div>                   
                                            <div class="box-footer"> 
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </div>
                                            <input name="action" id="action" value="add" type="hidden">
                                            <input name="h_id" id="h_id" value="" type="hidden">
                                            <input name="cuntry" id="cuntry" value="<?php echo $_GET['lng'] ?>" type="hidden">
                                        </form>
                                    </div>    
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title"> 
                                            <span class="btn btn-xs btn-success add-lng"><i class="fa fa-plus"> Add</i></span> 
                                            <span class="btn btn-xs btn-warning"><i class="fa fa-times-circle"> Cancle</i></span> 
                                        </h3>
                                        <span  class="box-title" style="margin-left: 20%">
                                            <?php
                                            $_cuntry = strtoupper($_GET["lng"]);
                                            if ($_cuntry == "EN")
                                                echo 'United Kingdom';
                                            if ($_cuntry == "TH")
                                                echo 'Thailand';
                                            if ($_cuntry == "LA")
                                                echo 'Laos';
                                            if ($_cuntry == "MM")
                                                echo 'Myanmar';
                                            if ($_cuntry == "PK")
                                                echo 'Pakistan';
                                            if ($_cuntry == "SA")
                                                echo 'Saudi Arabia';
                                            if ($_cuntry == "BD")
                                                echo 'Bangladesh';
                                            if ($_cuntry == "IR")
                                                echo 'Iran';
                                            if ($_cuntry == "VN")
                                                echo 'Vietnam';
                                            if ($_cuntry == "ID")
                                                echo 'Indonesia';
                                            if ($_cuntry == "RU")
                                                echo 'Rusia';
                                            if ($_cuntry == "")
                                                echo 'United Kingdom';
                                            ?>
                                        </span>
                                    </div>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <?php
                                            $sql = " SELECT tpl.`Auto_id` as tlpautoid, tpl.`product_id`, tpl.`product_n1`, tpl.`product_n2`,"
                                                    . " tpl.`product_n3`, tpl.`product_n4`, tpl.`product_n5`, tpl.`product_n6`, "
                                                    . " tpl.`product_n7`, tpl.`product_n8`, tpl.`cuntry_id`,"
                                                    . " tc.`cuntry_id`, tc.`abbreviation`"
                                                    . " FROM `t_product_language_r` tpl"
                                                    . " INNER JOIN t_cuntry tc ON (tc.`cuntry_id`=tpl.`cuntry_id`)"
                                                    . " WHERE tc.`abbreviation`='" . $_GET['lng'] . "' LIMIT 1";
                                            $res = $mysqli->query($sql, '');
                                            $num = $mysqli->num_rows();
                                            if ($num == 0) {
                                                $product_n1 = 'Empty';
                                                $product_n2 = 'Empty';
                                                $product_n3 = 'Empty';
                                                $product_n4 = 'Empty';
                                                $product_n5 = 'Empty';
                                                $product_n6 = 'Empty';
                                                $product_n7 = 'Empty';
                                                $product_n8 = 'Empty';
                                                $display = "none";
                                                $row['product_id'] = '';
                                            } else {
                                                $res = $mysqli->fetch_assoc();
                                                $i = 0;
                                                foreach ($res as $row) {
                                                    ++$i;
                                                    $product_n1 = $row['product_n1'];
                                                    $product_n2 = $row['product_n2'];
                                                    $product_n3 = $row['product_n3'];
                                                    $product_n4 = $row['product_n4'];
                                                    $product_n5 = $row['product_n5'];
                                                    $product_n6 = $row['product_n6'];
                                                    $product_n7 = $row['product_n7'];
                                                    $product_n8 = $row['product_n8'];
                                                }
                                            }
                                            ?>    
                                            <tbody>
                                                <tr>
                                                    <th width="250">Fix Product title</th>
                                                    <th> Language </th>
                                                    <th width="50" >
                                                        <span class="btn btn-xs btn-warning edit-proj" onclick="update_lng('<?php echo $row['product_id']; ?>');" 
                                                              style="display: <?php echo $display; ?>">
                                                            <i class="fa fa fa-pencil"></i> Edit
                                                        </span>                                            
                                                    </th>
                                                    <th width="50">
                                                        <span class="btn btn-xs btn-danger del-new" onclick="del_lng('<?php echo $row['product_id']; ?>');"  
                                                              style="display: <?php echo $display; ?>">
                                                            <i class="fa fa fa-times"></i> Del
                                                        </span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>Disk Driers</td>
                                                    <td><?php echo $product_n1; ?></td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>How to choose a Fishmeal Plant</td>
                                                    <td><?php echo $product_n2; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Twin Screw Presses</td>
                                                    <td><?php echo $product_n3; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Fish Cookers</td>
                                                    <td><?php echo $product_n4; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Complete Fishmeal Plants</td>
                                                    <td><?php echo $product_n5; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Deodoriser Smell Removal</td>
                                                    <td><?php echo $product_n6; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Energy Saving</td>
                                                    <td><?php echo $product_n7; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>Accessories and Equipment</td>
                                                    <td><?php echo $product_n8; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>                                    
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
        <script src="script/r-language.js" type="text/javascript"></script>
    </body>
</html>
