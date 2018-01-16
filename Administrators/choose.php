<?php
@session_start();
if (isset($_REQUEST['l']) == 'Y') {
    $_SESSION['User_id'] = '';
    $_SESSION['Username'] = '';
    $_SESSION['FullName'] = '';
    echo "<script>window.location='index.php';</script>";
}
include('../connect.php');
$User_id = $_SESSION['User_id'];
$Username = $_SESSION['Username'];
$FullName = $_SESSION['FullName'];
if ($User_id == '') {
    echo "<script>window.location='index.php';</script>";
}
$p = 1;
?>
<!DOCTYPE html>
<html class="full" lang="en">
    <!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Choose panel to go </title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="css/the-big-picture.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="js/html5shiv.js"></script>
            <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>
   <body>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../EN/Home/">ASTW</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../EN/AboutASTW/">About</a>
                        </li>
                        <li>
                            <a href="../EN/Contact/">Contact</a>
                        </li>
                        <li>
                            <a href="index.php?l=Y">Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>ASTW – Fishmeal and Rendering Plants</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-lg-4">
                    <div class="btn-group bootstrap-select">
                        <button class="btn dropdown-toggle clearfix btn-warning" data-toggle="dropdown">
                            <span class="filter-option pull-left">Choose Admin panel</span>
                            &nbsp;<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" style="overflow-y: auto; min-height: 78px; max-height: 363px;">
                            <li rel="0"><a tabindex="-1" href="dashboard.php" class="">Fishmeal Plants</a></li>
                            <li rel="1"><a tabindex="-1" href="r-dashboard.php" class="">Rendering plants</a></li>
                        </ul>
                    </div>                
                </div>
            </div>
           <!-- /.row -->
        </div>
        <!-- /.container -->
        <script src="js/jquery-1.11.3.min.js"></script> 
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
//            $(document).ready(function () {
//                $('.combobox').combobox();
//            });
        </script>
    </body>
</html>