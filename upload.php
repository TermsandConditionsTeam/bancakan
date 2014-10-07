<?php
/*
* NAME : M. RIFQI THOMI F.H
* EMAIL : rifqithomi@gmail.com / rifqithomi@yahoo.co.id
* Linkedin : id.linkedin.com/in/rifqithomi/
*/
header("Access-Control-Allow-Origin: http://demobacakanbdg.esy.es");
ob_start();
session_start();
include "dbcon.php";
$idUser = $_SESSION['id_tab_user'];

if (!empty($_FILES['lampiranDok']['name'])) 
{

	if(($_FILES["lampiranDok"]["type"] == "image/jpeg") || ($_FILES["lampiranDok"]["type"] == "image/jpg") || ($_FILES["lampiranDok"]["type"] == "image/png"))
	{
		$filename  = basename($_FILES['lampiranDok']['name']);
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		$new       = $idUser.'.'.$extension;

		if ($_FILES["lampiranDok"]["error"] > 0) 
		{
			echo "Error: " . $_FILES["lampiranDok"]["error"] . "";
		} 
		else {
			$qrUpload = "UPDATE user SET nama_file_profile = '".$new."' WHERE (id_tab_user=".$idUser.") ";
				$result =  mysql_query($qrUpload);
				if ($result) {
					move_uploaded_file($_FILES["lampiranDok"]["tmp_name"], "assets/user/" . $new);
					$_SESSION['nama_file_profile'] = $new;
					echo "upload berhasil";
				}
				else
				{
					echo mysql_error();
					echo "upload tidak berhasil";
				}
		}
	}
	else
	{
		echo "Pastikan format file bertipe image";
	}
}
else
{
	echo "file tidak ada";
}
?>