<?php
include 'dbcon.php';
$reg = md5('b4nC4k@nA50y');
$code = $_GET['code'].$reg;

$qrOrang = "SELECT id_tab_user
			FROM user
			WHERE kode_aktifasi = '".$code."'
			";
	$getOrang = mysql_query($qrOrang);
	$resultOrang=mysql_fetch_array($getOrang);
	$count=mysql_num_rows($getOrang);
if($count == 1)
{
	$qrCekUdah = "SELECT id_tab_user
					FROM user
					WHERE kode_aktifasi = '".$code."' AND s_verifikasi = 0;
			";
	$getCekUdah = mysql_query($qrCekUdah);
	$resultCekUdah=mysql_fetch_array($getCekUdah);
	$counts = mysql_num_rows($getCekUdah);
	if ($counts == 1) {
<<<<<<< HEAD
		$_SESSION['s_verifikasi']=1;
=======
<<<<<<< HEAD
		$_SESSION['s_verifikasi']=1;
=======
>>>>>>> origin/master
>>>>>>> origin/master
		$qrVerified = "UPDATE user SET s_verifikasi = 1 WHERE id_tab_user = ".$resultCekUdah['id_tab_user']."";
		$resultUpdate =  mysql_query($qrVerified);
		if ($resultUpdate) {
			?>
				<script type="text/javascript">
					alert('Verifikasi Akun Anda Berhasil.');
					parent.location = 'index.php';
				</script>
			<?php
			
		}
	}
	else
	{
		?>
			<script type="text/javascript">
				alert('Akun anda sudah terverifikasi, tidak perlu verifikasi lagi');
				parent.location = 'index.php';
			</script>
		<?php
	}
}
else {
	?>
	<script type="text/javascript">
		alert('Kode verifikasi salah');
		parent.location = 'index.php';
	</script>
	<?php
}
?>