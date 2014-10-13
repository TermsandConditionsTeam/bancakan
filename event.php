<<<<<<< HEAD
<div class="container">
	<div id="events">
		<?php
			include "dbcon.php";

			$qrEvent = "SELECT 
						id_event,
						nama_event,
						alamat,
						tanggal_open,
						tanggal_close
						FROM event
						ORDER BY tanggal_open DESC
						";
			$getEvent = mysql_query($qrEvent);

		?>
		<div class='table-responsive'>
			<table style='width:100%' class='table table-hover'>
				<thead>
					<tr>
						<label><h2>Daftar Event</h2></label>
					</tr>
					<tr>
						<th style='font-size:90%' valign='middle'>Nama Event</th>
						<th style='font-size:90%' valign='middle'>Alamat</th>
						<th style='font-size:90%' valign='middle'>Tanggal</th>
						<th style='font-size:90%' valign='middle'></th>
					</tr>
				</thead>
				<tbody>

				<?php
					while($resultEvent=mysql_fetch_assoc($getEvent)){
				?>
				<tr>
					<td width='30%'><?php echo $resultEvent['nama_event']; ?></td>
					<td width='35%'><?php echo $resultEvent['alamat']; ?></td>
					<td width='25%'><?php echo $resultEvent['tanggal_open']; ?></td>
					<td width='10%'><a onclick="det(<?php echo $resultEvent['id_event'];?>)" href="#">Detail</a></td>
				</tr>
				<?php
					}
				?>

				</tbody>
			</table>
		</div>
	</div>
	
	<script type="text/javascript">
		function det(id_per)
		{
			$("#contents").load('detail.php?pages=2&idEve='+id_per);  
		}
	</script>
</div>
=======
<?php
include "dbcon.php";

		$qrEvent = "SELECT 
						id_event,
						nama_event,
						alamat,
						tanggal
						FROM event
			";
			 $getEvent = mysql_query($qrEvent);
               
			?>
				 <div class='table-responsive'>
				 	<table style='width:100%' class='table table-hover'>
				 		<thead>
							<tr>
								<label><h4>Daftar Event :</h4></label>
							</tr>
							<tr>
								<th style='font-size:90%' valign='middle'>
									Nama Event
								</th>
								<th style='font-size:90%' valign='middle'>
									Alamat
								</th>
								<th style='font-size:90%' valign='middle'>
									Tanggal
								</th>
								<th style='font-size:90%' valign='middle'>
									
								</th>
							</tr>
						</thead>
						<tbody>

						
			<?php
				 while($resultEvent=mysql_fetch_assoc($getEvent)){
					?>
						<tr>
							<td width='10%'><?php echo $resultEvent['nama_event']; ?></td>
							<td width='10%'><?php echo $resultEvent['alamat']; ?></td>
							<td width='10%'><?php echo $resultEvent['tanggal']; ?></td>
							<td width='10%'><a onclick="det(<?php echo $resultEvent['id_event'];?>)" href="#">Detail</a></td>
						</tr>
					<?php
				}
				?>
						</tbody>
				 	</table>
				 </div>
				 <script type="text/javascript">
				 	function det(id_per)
				 	{
				 		$("#contents").load('detail.php?pages=2&idEve='+id_per);  
				 	}
				 </script>
>>>>>>> origin/master
