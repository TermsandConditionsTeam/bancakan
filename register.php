<?php
	session_start();
	include "dbcon.php";
	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = md5($_POST['pass']);

	$qrDaftar ="INSERT INTO user (password,email,nama_depan,nama_belakang,login_time,nama_file_profile,checkin_time)
				values ('".$password."','".$email."','".$fname."','".$lname."',1,'default',0)
				";
	//echo $qrDaftar;exit();
	$resultDaftar = mysql_query($qrDaftar);
	if($resultDaftar)
	{
		$_SESSION['email']=$email;
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$lname;
		$_SESSION['login_time']=1;
		$_SESSION['checkin_time']=0;
		$qrCari = "SELECT id_tab_user,nama_file_profile FROM user where email = '".$email."'";
		$getCari = mysql_query($qrCari);

		$resultCari=mysql_fetch_array($getCari);
		$count=mysql_num_rows($getCari);
		if($count == 1)
		{
			$_SESSION['id_tab_user']=$resultCari['id_tab_user'];
			$_SESSION['nama_file_profile']=$resultCari['nama_file_profile'];
		}
		?>
		<script type="text/javascript">
			alert ('Daftar Berhasil');
			parent.location = 'index.php';
		</script>
		<?php
	}	

	
?>