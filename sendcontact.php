<?php
	include('connect.php');
	$tname = $_REQUEST['tname'];
	$tcompany = $_REQUEST['tcompany'];
	$temail = $_REQUEST['temail'];
	$tmessage = $mysqli->real_escape_string($_REQUEST['tmessage']);
	$h_date = $_REQUEST['h_date'];
	$strcontact = 'Contact by : '.$tname." <br>Company Name : ".$tcompany ."<br> Email :".$temail."<br>".$tmessage."<br><br>Date : ".$h_date;
	if(($tname!="")and($tcompany!="")and($temail!="")and($tmessage!="")){
		$sql  = " INSERT INTO `t_contact_us`(`Name`, `Company`, `Email`, `Message`,`Date_C`,`User`)";
		$sql .= " VALUES ('".$tname."','".$tcompany."','".$temail."','".$tmessage."','".$h_date."','visitor') ";
		$re = $mysqli->query($sql) or die($mysqli->error);
		$strTo      = 'sales@asthaiworks.com';
		$strSubject = 'Contact to ASTW. from '.$tname;
		$strMessage = $strcontact."<br><br>";
		$strHeader = 'From: '.$temail. "\r\n".
		'Reply-To: '.$temail. "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$strSid = md5(uniqid(time()));
		$strHeader .= "MIME-Version: 1.0\n";
		$strHeader .= "Content-Type: multipart/mixed; boundary=\"".$strSid."\"\n\n";
		$strHeader .= "This is a multi-part message in MIME format.\n";
		$strHeader .= "--".$strSid."\n";
		$strHeader .= "Content-type: text/html; charset=windows-874\n";
		$strHeader .= "Content-Transfer-Encoding: 7bit\n\n";
		$strHeader .= $strMessage."\n\n";
		if($re==true){
			$flgSend = @mail($strTo,$strSubject,null,$strHeader);
			if($flgSend==true){
				echo "ok";
			}
		}
	}

?>