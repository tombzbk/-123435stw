<?php
session_start();
include './connect.php';

    if($_REQUEST['subscribe']=="Subscribe"&&$_REQUEST['newsletter']!=""){
            $sql    = " INSERT INTO `t_subscribe`(`subscribe_id`, `subscribe_name`, `subscribe_date`, `stytus`)"
                    . " VALUES ('".uniqid()."','".$_REQUEST['newsletter']."','".date('Y-m-d H:i:s')."','Y')";
            $res = $mysqli->query($sql);
            if($res==true){
                $_REQUEST['subscribe']="";
                $_REQUEST['newsletter']="";
                echo $str = "ok";
            }            
    }
?>