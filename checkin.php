<?php
	include 'dbcon.php';
	session_start();
	$add;
	if($_POST['pages'] == 1){
		$qrCheckin = "INSERT INTO chekin (id_tab_user,id_budaya,tanggal)
						values (".$_POST['iduser'].",".$_POST['ids'].",NOW()) 
						";
		$resultCheckin = mysql_query($qrCheckin);

		$qrUser = "SELECT checkin_time,login_time
					FROM user
					WHERE id_tab_user = ".$_POST['iduser']."
					";
		$getUser = mysql_query($qrUser);
		$resultUser=mysql_fetch_array($getUser);
		$add = $resultUser['checkin_time']+1;
		$qrUpdate = "UPDATE user SET checkin_time = ".$add." WHERE id_tab_user = ".$_POST['iduser']."
					";
		$resultUpdate =  mysql_query($qrUpdate);

	}
	else if ($_POST['pages'] == 2) {
		$qrCheckin = "INSERT INTO chekin_ev (id_tab_user,id_event,tanggal)
						values (".$_POST['iduser'].",".$_POST['ids'].",NOW()) 
						";
		$resultCheckin = mysql_query($qrCheckin);

		$qrUser = "SELECT checkin_time
					FROM user
					WHERE id_tab_user = ".$_POST['iduser']."
					";
					
		$getUser = mysql_query($qrUser);
		$resultUser=mysql_fetch_array($getUser);
		$add = $resultUser['checkin_time'] +1;
		$qrUpdate = "UPDATE user SET checkin_time = ".$add." WHERE id_tab_user = ".$_POST['iduser']."
					";
		$resultUpdate =  mysql_query($qrUpdate);
	}
?>