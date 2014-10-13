<?php
	include 'dbcon.php';
	include 'checkinconditions.php';
	$conditions = new CheckInConditions();
	session_start();
	$add;
	if($_POST['pages'] == 1){
		$qrCheckin = "INSERT INTO chekin (id_tab_user,id_tempat_budaya,tanggal)
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
		$cFirstEv = $conditions->cekBanyakCekinEvent($_POST['ids'], $_SESSION['id_tab_user']);
		if ($cFirstEv==0) {
			$qrLencana = "SELECT 
						id_lencana,
						nama_lencana, 
						nama_file_icon
						FROM lencana
						WHERE id_lencana = 3
					";

			$getLencana = mysql_query($qrLencana);
			$resultLencana = mysql_fetch_array($getLencana);

			$qrInsertLencana = "INSERT INTO user_have_lencana (id_tab_user,id_lencana,tanggal)
								values (".$_POST['iduser'].",3,NOW()) 
						";
			$resultInsertLencana = mysql_query($qrInsertLencana);
			if($resultInsertLencana)
			{
				?>
				<div id="dialogLencana" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-sm">
		            	<div class="modal-content">
		                	<div style="padding:10px 20px">
			                    <h3 style="text-align: center;color:#333;">Selamat, <?php echo $_SESSION['fname'] ;?>!</h3>
			                    <span  style="text-align:center;color:#333;">Anda mendapatkan lencana <?php echo $resultLencana['nama_lencana'];?>.</span>
			                    <img style="margin-left:25px;" src="assets/images/badge/<?php echo $resultLencana['nama_file_icon'];?>" width="200px" height="200px" alt="">
		                  	</div>
		              	</div>
		            </div>
		        </div>
				<?php
			}
			
		}
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
	else if ($_POST['pages'] == 3) {
<<<<<<< HEAD
		$cFirstPer = $conditions->cekBanyakCekinPermainan($ids, $_SESSION['id_tab_user']);
		if ($cFirstPer==0) {
			$qrLencana = "SELECT 
						id_lencana,
						nama_lencana, 
						nama_file_icon
						FROM lencana
						WHERE id_lencana = 5
					";

			$getLencana = mysql_query($qrLencana);
			$resultLencana = mysql_fetch_array($getLencana);

			$qrInsertLencana = "INSERT INTO user_have_lencana (id_tab_user,id_lencana,tanggal)
								values (".$_POST['iduser'].",5,NOW()) 
						";
			$resultInsertLencana = mysql_query($qrInsertLencana);
			if($resultInsertLencana)
			{
				?>
				<div id="dialogLencana" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		            <div class="modal-dialog modal-sm">
		            	<div class="modal-content">
		                	<div style="padding:10px 20px">
			                    <h3 style="text-align: center;color:#333;">Selamat, <?php echo $_SESSION['fname'] ;?>!</h3>
			                    <span  style="text-align:center;color:#333;">Anda mendapatkan lencana <?php echo $resultLencana['nama_lencana'];?>.</span>
			                    <img style="margin-left:25px;" src="assets/images/badge/<?php echo $resultLencana['nama_file_icon'];?>" width="200px" height="200px" alt="">
		                  	</div>
		              	</div>
		            </div>
		        </div>
				<?php
			}	
		}
=======
>>>>>>> origin/master
		$qrCheckin = "INSERT INTO chekin_per (id_tab_user,id_permainan,tanggal)
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