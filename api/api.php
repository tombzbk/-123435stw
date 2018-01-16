<?php

include '../connect.php';
include '../framework/encry-html.php';
$data = array();
$arrayMain = array();
$arrayContent = array();
$sql = sprintf("SELECT id, header FROM t_refurbished WHERE id='%s'", $_POST["id"]);
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    $arrayMain = $result->fetch_assoc();
}
$sql2 = sprintf("SELECT detail  FROM t_content_detail WHERE mainId='%s'AND lang_code='%s'", $_POST["id"], $_POST["lang"]);
$result2 = $mysqli->query($sql2);
if ($result2->num_rows > 0) {
    $rowCon = $result2->fetch_assoc();
    $arrayContent = decodeToHtml($rowCon["detail"]);
}

$arrayCover = array();
$sql3 = sprintf("SELECT name as url  FROM t_content_files WHERE id_content='%s' AND _type='%s'", $_POST["id"], "cover");
$result3 = $mysqli->query($sql3);
if ($result3->num_rows > 0) {
    $row3 = $result3->fetch_assoc();
    $arrayCover = $row3["url"];
}
$arrayImg1 = array();
$sql4 = sprintf("SELECT name as url  FROM t_content_files WHERE id_content='%s' AND _type='%s'", $_POST["id"], "img1");
$result4 = $mysqli->query($sql4);
if ($result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $arrayImg1 = $row4["url"];
}
$arrayImg2 = array();
$sql5 = sprintf("SELECT name as url  FROM t_content_files WHERE id_content='%s' AND _type='%s'", $_POST["id"], "img2");
$result5 = $mysqli->query($sql5);
if ($result5->num_rows > 0) {
    $row5 = $result5->fetch_assoc();
    $arrayImg2 = $row5["url"];
}

$arrayInfo = array();
$sqlinfo = sprintf("SELECT lebel  FROM t_content_info WHERE content_id='%s' AND lang='%s'",  $_POST["id"], $_POST["lang"]);
$resInfo = $mysqli->query($sqlinfo);
if ($resInfo->num_rows > 0) {
    $rowInfo = $resInfo->fetch_assoc();
    $arrayInfo = $rowInfo["lebel"];
}

$data["objMain"] = $arrayMain;
$data["objContent"] = $arrayContent;
$data["objCover"] = $arrayCover;
$data["objImg1"] = $arrayImg1;
$data["objImg2"] = $arrayImg2;
$data["objInfo"] = $arrayInfo;

header('Content-Type: application/json');
echo json_encode($data);
