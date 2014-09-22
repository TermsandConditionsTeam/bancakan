<?php
	session_start();
	include 'dbcon.php';

	$prop = $_GET['prop'];

	if ($prop == 1) {
		$head = "Akun";
		
	}
	elseif ($prop == 2) {
		$head = "Lencana";
		$qrUhL = "SELECT * FROM user_have_lencana
					WHERE id_tab_user = ".$_SESSION['id_tab_user']." ";
		$getUhL = mysql_query($qrUhL);
		$count=mysql_num_rows($getUhL);


	}
?>
<div class="container">
	<div class="isi" style="padding:20px 25px;">
		<div style="margin-bottom:20px;height:200px;">
			<div style="float:left" class="placeholder">
				<img width="200px" height="200px" src="assets/user/<?php echo $_SESSION['nama_file_profile'];?>.png">
			</div>
			<div>
				<span style="position:absolute;margin-top:50px;margin-left:100px;font-size:28px;font-weight:bold">Hi, <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></span>
			</div><br/><br/>
			<div>
				<span style="position:absolute;margin-top:50px;margin-left:100px;font-size:12px;font-weight:bold">Bergabung sejak <?php echo $_SESSION['tanggal_gabung'];?></span>
			</div>
			<div style="float:right;margin-right:50px;margin-top:-25px;">
				<button style="width:200px" class="btn btn-lg btn-block" type="button">
	                <a id="ak" href="#">Akun</a>
	            </button>
	            <button style="width:200px" class="btn btn-lg btn-block" type="button">
	                <a id="ln" href="#">Lencana</a>
	            </button>
	            <button style="width:200px" class="btn btn-danger btn-lg btn-block" type="button">
	                <a href="#">Tutup Akun</a>
	            </button>
			</div>
		</div>
		<div style="border: 1px solid; border-color:grey;">
			<div style="background:#915224;padding:5px 10px;">
				<font style="font-size:20px;font-weight:bold;color:#ffffff;"><?php echo $head;?></font>
			</div>
			<div style="padding:50px 150px;height:auto;">
				<?php if ($prop == 1) {?>
					<form id="formUpdate" autocomplete="off" role="form" method="post">
	                	<input style="height:35px;margin-bottom:10px;" name="email" id="email" type="email" class="form-control" placeholder="Email" required autofocus>
	        			<input style="height:35px;margin-bottom:10px;float:left;width:310px;" name="fname" id="fname" type="text" class="form-control" placeholder="Nama Depan" required>
	        			<input style="height:35px;margin-bottom:10px;float:right;width:310px;" name="lname" id="lname" type="text" class="form-control" placeholder="Nama Belakang" required>
	        			<input style="height:35px;margin-bottom:10px;" name="pass" id="pass" type="password" class="form-control" placeholder="Password" required>
						<button id="subUp" style="height:35px;line-height: 10px;" class="btn btn-lg btn-primary btn-block" type="submit">update</button>
	                </form>
	            <?php }
	            	elseif ($prop == 2) {

	            ?>
		            	Kamu memiliki <?php echo $count;?> buah lencana
		            	<div style="margin-top:20px;overflow: hidden;">
		            	<?php 
		            		$udahpunya = array();
		            		while($result=mysql_fetch_assoc($getUhL)){
		            			$udahpunya[] = $result['id_lencana'];
		            			$qrLen = "SELECT * FROM lencana WHERE id_lencana = ".$result['id_lencana']." "; 
		            			$getLen = mysql_query($qrLen);
								$resultLen=mysql_fetch_array($getLen);
								?>
									<div class='badge'>
			            				<a class='thumbnail' href='#'>
			            					<img src='assets/images/badge/badge-newcomer.png' height='240px' width='160px'title="<?php echo $resultLen['nama_lencana'];?>">
										</a>	            					
			            				<p>
			            					<a href="#"><?php echo $resultLen['nama_lencana'];?></a>
			            				</p>
			            				<p style="color:#915224;margin-bottom:-12px;"><?php echo $result['tanggal'];?></p>
			            				
			            			</div>
								<?php
							}
							$qrAll = "SELECT * FROM lencana WHERE id_lencana not in (".join(', ', $udahpunya).") ";
							$getAll = mysql_query($qrAll);
							while($resultAll=mysql_fetch_assoc($getAll)){
								$qrLen = "SELECT * FROM lencana WHERE id_lencana = ".$resultAll['id_lencana']." "; 
		            			$getLen = mysql_query($qrLen);
								$resultLen=mysql_fetch_array($getLen);
								?>
									<div class='badge'>
			            				<a class='thumbnail' href='#'>
			            					<img src='assets/images/badge/badge-kosong.png' height='240px' width='160px'title="Hint: <?php echo $resultLen['hint'];?>">
										</a>	            					
			            				<p>
			            					<a href="#"><?php echo $resultLen['nama_lencana'];?></a>
			            				</p>			            				
			            			</div>
								<?php
							}
		            	?>
	            		</div>
	            <?php } ?>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#ak").click(function(){
        $("#contents").load("profile.php?prop=1");
        $("body").removeClass('idx');
        $("#hhr").html('');
        $("#hhr").html('<hr>');
    });
    $("#ln").click(function(){
        $("#contents").load("profile.php?prop=2");
        $("body").removeClass('idx');
        $("#hhr").html('');
        $("#hhr").html('<hr>');
    });
</script>