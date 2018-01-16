<?php



session_start();

if(isset($_REQUEST['l'])=='Y'){
    
    $_SESSION['User_id']='';
    
    $_SESSION['Username']='';
    
    $_SESSION['FullName']='';
    
    echo "<script>
    
    window.location='index.php';
    
    </script>";
    
}

require_once('php/classdb/mysqliConn.php');
$mysqli = new classDb;


if((isset($_POST['Username']) != '')&&(isset($_POST['Password']) != '')){

    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $mysqli->where("Username='".$Username."' AND Password='".md5($Password)."'");
    $sql = $mysqli->query('','t_administrator');    
    if($mysqli->num_rows()==0){
        $_SESSION['User_id']='';
        $_SESSION['Username']='';
        $_SESSION['FullName']='';
        $_REQUEST['l']='Y';
        echo      "<script>"
        
        . " alert('User ro Password not correct...');"
        
        . " window.location='index.php'"
        
        . "</script>";
        
    }else{
        
        $sql = $mysqli->fetch_assoc();
        
        foreach ($sql as $row){
            
            $_SESSION['User_id']=$row['Auto_id'];
            
            $_SESSION['Username']=$row['Username'];
            
            $_SESSION['FullName']=$row['FullName'];
            
            $_REQUEST['l']='';
            
            echo      "<script>"
            
            . " window.location='choose.php'"
            
            . "</script>";
            
        }
        
    }
    
}

?>



  <!DOCTYPE html>

  <html class="bg-black">

  <head>

    <meta charset="UTF-8">

    <title>ASTW | Log in</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->

    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />



    <link href="js/plugins/dropzone/dropzone.css" rel="stylesheet" type="text/css" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    
<script src="js/html5shiv.js"></script>

<script src="js/respond.min.js"></script>

<![endif]-->

  </head>

  <body class="bg-black">



    <div class="form-box" id="login-box">

      <div class="header">Sign In</div>

      <form action="index.php" method="post">

        <div class="body bg-gray">

          <div class="form-group">

            <input type="text" name="Username" class="form-control" placeholder="User Name" />

          </div>

          <div class="form-group">

            <input type="password" name="Password" class="form-control" placeholder="Password" />

          </div>

        </div>

        <div class="footer">

          <button type="submit" class="btn bg-olive btn-block" name="submit">Sign me in</button>

        </div>

      </form>

    </div>



    <script src="js/jquery-1.11.3.min.js"></script>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>



  </body>

  </html>