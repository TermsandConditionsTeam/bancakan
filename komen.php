<?php
	include 'dbcon.php';
	session_start();
	
	if($_POST['pages'] == 1){
		$qrKomen = "INSERT INTO comment_bud (id_tempat_budaya,isi,tanggal,id_tab_user)
						values (".$_POST['ids'].",'".$_POST['isi']."', NOW(),".$_POST['iduser'].") 
					";
		$resultKomen = mysql_query($qrKomen);
		if($resultKomen)
		{
			?>
<<<<<<< HEAD
				<div id='komentar_user'>
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' class="user_icon" title="" src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>">
					<div class='isi_komentar'><?php echo $_POST['isi'];?></div>
=======
				<div style="margin-bottom:20px;">
<<<<<<< HEAD
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>" width="50px" height="50px">
=======
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>.png" width="50px" height="50px">
>>>>>>> origin/master
					<span style='margin-top:-20px;'><?php echo $_POST['isi'];?></span>
>>>>>>> origin/master
				</div>
				<div class='clear'></div>
			<?php
		}
	}
	elseif ($_POST['pages'] == 2) {
		$qrKomen = "INSERT INTO comment_ev (id_event,isi,tanggal,id_tab_user)
						values (".$_POST['ids'].",'".$_POST['isi']."', NOW(),".$_POST['iduser'].") 
					";
		$resultKomen = mysql_query($qrKomen);
		if($resultKomen)
		{
			?>
<<<<<<< HEAD
				<div id='komentar_user'>
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' class="user_icon" title="" src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>">
					<div class='isi_komentar'><?php echo $_POST['isi'];?></div>
=======
				<div style="margin-bottom:20px;">
<<<<<<< HEAD
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>" width="50px" height="50px">
=======
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>.png" width="50px" height="50px">
>>>>>>> origin/master
					<span style='margin-top:-20px;'><?php echo $_POST['isi'];?></span>
				</div>
				<hr>
				<br/>
			<?php
		}
	}
	elseif ($_POST['pages'] == 3) {
		$qrKomen = "INSERT INTO comment_per (id_permainan,isi,tanggal,id_tab_user)
						values (".$_POST['ids'].",'".$_POST['isi']."', NOW(),".$_POST['iduser'].") 
					";
		$resultKomen = mysql_query($qrKomen);
		if($resultKomen)
		{
			?>
				<div style="margin-bottom:20px;">
<<<<<<< HEAD
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>" width="50px" height="50px">
=======
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>.png" width="50px" height="50px">
>>>>>>> origin/master
					<span style='margin-top:-20px;'><?php echo $_POST['isi'];?></span>
>>>>>>> origin/master
				</div>
				<div class='clear'></div>
			<?php
		}
	}
	elseif ($_POST['pages'] == 3) {
		$qrKomen = "INSERT INTO comment_per (id_permainan,isi,tanggal,id_tab_user)
						values (".$_POST['ids'].",'".$_POST['isi']."', NOW(),".$_POST['iduser'].") 
					";
		$resultKomen = mysql_query($qrKomen);
		if($resultKomen)
		{
			?>
				<div id='komentar_user'>
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' class="user_icon" title="" src="assets/user/<?php echo $_SESSION['nama_file_profile']; ?>">
					<div class='isi_komentar'><?php echo $_POST['isi'];?></div>
				</div>
				<div class='clear'></div>
			<?php
		}
	}

?>