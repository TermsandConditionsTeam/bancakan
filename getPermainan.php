<?php
	session_start();
	include 'dbcon.php';

	$nama = $_POST['namaGame'];
	$lat =  $_POST['lati'];
	$lng = $_POST['lngi'];
	$cl = $_POST['clue'];
	$df = $_POST['df'];
	$qrTambah =" INSERT INTO permainan (lat_per,long_per, nama_per, nama_file_icon, favorite, clue, difficult, tanggal, id_tab_user)
					values (".$lat.",".$lng.",'".$nama."','map-marker2-permainan(32xx)',0,'".$cl."',".$df.",NOW(),".$_SESSION['id_tab_user'].")
				";
	$resultTambah = mysql_query($qrTambah);

	$qrSelect = "SELECT id_permainan
					FROM permainan
					WHERE nama_per = '".$nama."'
					";
	$getSelect = mysql_query($qrSelect);
	$resultSelect=mysql_fetch_array($getSelect);
	echo $resultSelect['id_permainan'];	
?>