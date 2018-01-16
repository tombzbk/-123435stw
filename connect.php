<?php

//$hostname = "104.199.174.117";
//$username = "root";
//$password = "5*XJ15IL34zYj2o*0y@5";
//$database = "asthaiworks";

$hostname = "localhost";
$username = "root";
$password = "";
$database = "asthaiwo_ASTW";

// $hostname = "localhost";
// $username = "asthaiwo_adm";
// $password = "C[!2aHd^,sL4";
// $database = "asthaiwo_ASTW";

$mysqli = new mysqli($hostname, $username, $password, $database);
$mysqli->query("SET NAMES 'utf8'");
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}