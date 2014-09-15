<?php
	include 'dbcon.php';
	session_start();
	
	if($_POST['pages'] == 1){
		$qrKomen = "INSERT INTO comment_bud (id_budaya,isi,tanggal,id_tab_user)
						values (".$_POST['ids'].",'".$_POST['isi']."', NOW(),".$_POST['iduser'].") 
					";
		$resultKomen = mysql_query($qrKomen);
		if($resultKomen)
		{
			?>
				<div style="margin-bottom:20px;">
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_POST['iduser']; ?>/<?php echo $_SESSION['nama_file_profile']; ?>.png" width="50px" height="50px">
					<span style='margin-top:-20px;'><?php echo $_POST['isi'];?></span>
				</div>
				<hr>
				<br/>
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
				<div style="margin-bottom:20px;">
					<img title='<?php echo $_SESSION['fname']." ".$_SESSION['lname'];?>' style="float:left;margin-right:10px;"src="assets/user/<?php echo $_POST['iduser']; ?>/<?php echo $_SESSION['nama_file_profile']; ?>.png" width="50px" height="50px">
					<span style='margin-top:-20px;'><?php echo $_POST['isi'];?></span>
				</div>
				<hr>
				<br/>
			<?php
		}
	}

?>