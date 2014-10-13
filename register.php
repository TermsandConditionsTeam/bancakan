<?php
	session_start();
	include "dbcon.php";
	require "class.phpmailer.php";

	$email = $_POST['email'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$password = md5($_POST['pass']);
	$activation=md5($email.time());
	$reg = md5('b4nC4k@nA50y');

	$qrDaftar ="INSERT INTO user (password,email,nama_depan,nama_belakang,login_time,nama_file_profile,checkin_time,tanggal_gabung,kode_aktifasi,s_verifikasi)
<<<<<<< HEAD
				values ('".$password."','".$email."','".$fname."','".$lname."',1,'default.png',0,NOW(),'".$activation."".$reg."',0)
=======
<<<<<<< HEAD
				values ('".$password."','".$email."','".$fname."','".$lname."',1,'default.png',0,NOW(),'".$activation."".$reg."',0)
=======
				values ('".$password."','".$email."','".$fname."','".$lname."',1,'default',0,NOW(),'".$activation."".$reg."',0)
>>>>>>> origin/master
>>>>>>> origin/master
				";
	//echo $qrDaftar;exit();
	$resultDaftar = mysql_query($qrDaftar);
	if($resultDaftar)
	{
		//send email
		$ServerName = 'mx1.idhostinger.com'; 
		$UserName = 'verification.bancakan@demobacakanbdg.esy.es';
		$PassWord = '0218210239';
		$tujuanGet = $email;    
		$tujuanMail = new PHPMailer();
		$tujuanMail->IsSMTP();
		$tujuanMail->Host = $ServerName;
		$tujuanMail->Port = 2525;
		$tujuanMail->SMTPAuth = true;    
		$tujuanMail->Username = $UserName; 
		$tujuanMail->Password = $PassWord;
		$tujuanMail->From = 'verification.bancakan@demobacakanbdg.esy.es';
		$tujuanMail->FromName = "Bancakan Mailer";
		$tujuanMail->AddAddress($tujuanGet);
		$tujuanMail->WordWrap = 50;
		$tujuanMail->IsHTML(true);                                
		$tujuanMail->Subject = "Bancakan - Email Verification ";
		$tujuanMail->Body =	"
			<font face='Calibri'>
                        Dear ".$fname." ".$lname.",
                        <br/><br/>
                        Please verify your email and get started using your Bancakan account. Thank You<BR><BR>

<<<<<<< HEAD
                        Please click <strong><a href='".$base_url."activation.php?code=".$activation."'>this</a></strong> link to active your account.
                        
=======
<<<<<<< HEAD
                        Please click <strong><a href='".$base_url."activation.php?code=".$activation."'>this</a></strong> link to active your account.
                        
=======
                        Please click this link to active your account.
                        ".$base_url."activation.php?code=".$activation."
>>>>>>> origin/master
>>>>>>> origin/master

                        Happy Explore!<BR><BR>
                        Best Regards,<BR>
                        Admin Bancakan<BR><BR><BR>
                                                               
                <center>----------- Powered by Bancakan System - website developed by Terms & Conditions Team -----------</center>

            </font>
		";
		$tujuanMail->AltBody = "";

		if(!$tujuanMail->Send())
		{
		print "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mailer Error: " . $tujuanMail->ErrorInfo."<br>";
		exit();
		}
		else{
		
		}
		//------------END SEND EMAIL ---------------


		$_SESSION['email']=$email;
		$_SESSION['fname']=$fname;
		$_SESSION['lname']=$lname;
		$_SESSION['login_time']=1;
		$_SESSION['checkin_time']=0;
<<<<<<< HEAD
		$_SESSION['s_verifikasi']=0;
=======
<<<<<<< HEAD
		$_SESSION['s_verifikasi']=0;
=======
>>>>>>> origin/master
>>>>>>> origin/master
		$qrCari = "SELECT id_tab_user,nama_file_profile,tanggal_gabung FROM user where email = '".$email."'";
		$getCari = mysql_query($qrCari);

		$resultCari=mysql_fetch_array($getCari);
		$count=mysql_num_rows($getCari);
		if($count == 1)
		{
			$_SESSION['tanggal_gabung']=$resultCari['tanggal_gabung'];
			$_SESSION['id_tab_user']=$resultCari['id_tab_user'];
			$_SESSION['nama_file_profile']=$resultCari['nama_file_profile'];
		}
		?>
		<script type="text/javascript">
			alert ('Daftar Berhasil. Mohon verifikasi email anda');
			parent.location = 'index.php';
		</script>
		<?php
	}	



	
?>

