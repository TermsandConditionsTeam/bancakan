<?php
	header("Access-Control-Allow-Origin: http://demobacakanbdg.esy.es");
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
		<?php
			if($_SESSION['s_verifikasi']==0)
			{
				?>
					<div class="alert alert-warning fade in" role="alert">
					    Akun anda belum terverifikasi!
					</div>
				<?php
			}
		?>
		
		<div style="margin-bottom:20px;height:200px;">
			<div id="foto" style="float:left;" class="placeholder">
				<img id="propic" width="200px" height="200px" src="assets/user/<?php echo $_SESSION['nama_file_profile'];?>">
				<div id="up" class="muncul fileinput-button" style="position:absolute;margin-top:-50px;background:white;width:200px;height:50px;padding:15px 10px;border-radius:10px 10px 0px 0px;opacity:0.6">
					<a href="#"><center>upload photo</center></a>
					<form id="upss" role='form' action="upload.php" autocomplete='off' method='POST' enctype='multipart/form-data'>
						<input id="asd" type='file' name='lampiranDok' required>
					</form>
				</div>
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
	                <a id="ttp" href="#">Tutup Akun</a>
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
	                	<input style="height:35px;margin-bottom:10px;" name="email" id="email" type="email" class="form-control" placeholder="Email" required >
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

<div id="alertTtp" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
        <div class="alert alert-danger modal-content">
            <div style="padding:10px 20px">
            	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				Apakah Anda yakin ingin menonaktifkan account Anda?
				<button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Tidak</button>
	            <button id="ys" class="btn btn-default btn-lg btn-block" type="button">
	                Ya
	            </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$("#ys").click(function(){
		$.ajax({
	        url         : 'deactive.php',
	        cache       : false,
	        contentType : false,
	        processData : false,
	        type        : 'POST',
	        success     : function(data, textStatus, jqXHR){
	        	location.reload();
	        }
    	});
	});

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
    $("#ttp").click(function(){
        $("#alertTtp").modal('show');
    });
    $("#foto").hover(function() {
        $("#up").removeClass("muncul");
      }, function() {
 		$("#up").addClass("muncul");
      });

    //upload
   	var form = $('#upss');
	document.getElementById("asd").onchange = function(e) {
   		var formdata =false;
   		if(window.FormData){
   			formdata = new FormData(form[0]);
   		}
   		var formAction = form.attr('action');
   		$.ajax({
	        url         : 'upload.php',
	        data        : formdata ? formdata : form.serialize(),
	        cache       : false,
	        contentType : false,
	        processData : false,
	        type        : 'POST',
	        success     : function(data, textStatus, jqXHR){
	        	d = new Date();
	        	$('#propic').attr('src',$('#propic').attr('src')+ '?' + Math.random());
	        }
    	});
	};
    
</script>