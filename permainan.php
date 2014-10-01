<?php
include "dbcon.php";
	$pageId=$_GET['pageId'];

	if($pageId == 1)
	{
		$qrPermainan = "SELECT 
						id_permainan,
						lat_per,
						long_per,
						nama_per,
						nama_file_icon,
						favorite,
						clue,
						difficult,
						tanggal,
						id_tab_user
						FROM permainan
			";
			 $getPermainan = mysql_query($qrPermainan);
               
			?>
				 <div class='table-responsive'>
				 	<table style='width:100%' class='table table-hover'>
				 		<thead>
							<tr>
								<label><h4>Daftar Permainan :</h4></label>
							</tr>
							<tr>
								<th style='font-size:90%' valign='middle'>
									Nama Permainan
								</th>
								<th style='font-size:90%' valign='middle'>
									Difficult
								</th>
								<th style='font-size:90%' valign='middle'>
									Tanggal
								</th>
								<th style='font-size:90%' valign='middle'>
									Latitude
								</th>
								<th style='font-size:90%' valign='middle'>
									Longitude
								</th>
								<th style='font-size:90%' valign='middle'>
									Tipe Permainan
								</th>
								<th style='font-size:90%' valign='middle'>
									Favorite
								</th>
								<th style='font-size:90%' valign='middle'>
									Pembuat
								</th>
								<th style='font-size:90%' valign='middle'>
									
								</th>
							</tr>
						</thead>
						<tbody>

						
			<?php
				 while($resultPermainan=mysql_fetch_assoc($getPermainan)){
				 	switch ($resultPermainan['difficult']) {
				 		case 1:
				 			$dif = "Easy";
				 			break;
				 		
				 		case 2:
				 			$dif = "Medium";
				 			break;

				 		case 3:
				 			$dif = "Hard";
				 			break;	
				 	}
					?>
						<tr>
							<td width='10%'><?php echo $resultPermainan['nama_per']; ?></td>
							<td width='10%'><?php echo $dif ; ?></td>
							<td width='10%'><?php echo $resultPermainan['tanggal']; ?></td>
							<td width='10%'><?php echo $resultPermainan['lat_per']; ?></td>
							<td width='10%'><?php echo $resultPermainan['long_per']; ?></td>
							<td width='10%'><img src="assets/images/<?php echo $resultPermainan['nama_file_icon']; ?>.png"></td>
							<td width='10%'><?php echo $resultPermainan['favorite']; ?></td>
							<?php
								$qrUserPer = "SELECT nama_depan, nama_belakang
											FROM user 
											WHERE id_tab_user = ".$resultPermainan['id_tab_user']."
										";
								$getUserPer = mysql_query($qrUserPer);
								$resultUser=mysql_fetch_array($getUserPer);
							?>
							<td width='10%'><?php echo $resultUser['nama_depan']." ".$resultUser['nama_belakang']; ?></td>
							<td width='10%'><a onclick="det(<?php echo $resultPermainan['id_permainan'];?>)" href="#">Detail</a></td>
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
				 		$("#contents").load('detail.php?pages=3&idPer='+id_per);  
				 	}
				 </script>
				<?php
	}
	else if($pageId == 2)
	{
		?>
			<div class="container">
				<div class="isi">
					<form id="formBuat">
						<input style="height:35px;margin-bottom:10px;" name="namaGame" id="namaGame" type="text" class="form-control" placeholder="Nama Permainan.." required autofocus>
						<div id="map" style="width: 978px; height: 250px"></div>
						<ul style="list-style:none;margin-left:-30px;margin-top:10px;">
							<li><div style="float:left">Area Lokasi : </div><div style="float:left;margin-left:100px;" id="lats"></div><div style="float:left;margin-left:10px;" id="lngs"></div></li><br/>
							<li><div style="float:left">Tingkat Kesulitan : </div><div style="float:left;margin-left:70px;"><select name="df" style="height:20px;margin-top:10px;" type="date"><option value='1'>Easy</option><option value='2'>Medium</option><option value='3'>Hard</option></select></div></li><br/><br/>
							<li><div style="float:left">Petunjuk : </div><div style="float:left;margin-left:180px;"><textarea style='resize: none;width:780px;' name="clue" id ="clue" class="form-control" rows="15" required></textarea></div></li>
						</ul>
						<button id="subTambah" style="margin-top:30px;height:35px;line-height: 10px;float:right;width:150px;margin-right:20px" class="btn btn-lg btn-primary btn-block" type="submit">Tambah</button>
						<input id="lati" name ='lati' type='hidden' class='form-control'  value='' readonly='yes'>
						<input id="lngi" name ='lngi' type='hidden' class='form-control'  value='' readonly='yes'>
					</form>
				</div>
			</div>
			<script type="text/javascript">
				 var southWest = L.latLng(-6.99888,107.47473),
                northEast = L.latLng(-6.85557,107.75098),
                bounds = L.latLngBounds(southWest, northEast);

                L.mapbox.accessToken = 'pk.eyJ1IjoicmlmcWl0aG9taSIsImEiOiJpUjFieHdVIn0.Cz3ME0XeH01-5IRnCJl3SA';
                var map = L.mapbox.map('map', 'rifqithomi.jb5ibjeg',{
                    maxBounds: bounds,
                    minZoom:11
                })
                    .setView([-6.91486,107.608], 12)
                    .fitBounds(bounds);

				//var coordinates = document.getElementById('coordinates');



				var marker = L.marker([-6.91486,107.608], {
				    icon: L.mapbox.marker.icon({
				      'marker-color': '#f86767'
				    }),
				    draggable: true
				}).addTo(map);

				// every time the marker is dragged, update the coordinates container
				marker.on('dragend', ondragend);

				// Set the initial marker coordinate on load.
				ondragend();

				function ondragend() {
				    var m = marker.getLatLng();
				    //coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;
				    var temp = m.lat * -1;
				    var tD = temp - (temp % 1);
				    var tM = ((temp % 1)*60) - (((temp % 1)*60)%1);
				    var tS = Math.floor((((temp % 1)*60)%1)*60);

				    var lemp = m.lng;
				    var lD = lemp - (lemp % 1);
				    var lM = ((lemp % 1)*60) - (((lemp % 1)*60)%1);
				    var lS = Math.floor((((lemp % 1)*60)%1)*60);
				   	$('#lati').val(m.lat);
				   	$('#lngi').val(m.lng);
				    document.getElementById("lats").innerHTML = tD+'° '+tM+'′ '+tS+'″ S';
				    document.getElementById("lngs").innerHTML = lD+'° '+lM+'′ '+lS+'″ E';
				}


				var form = $('#formBuat');
                var submit = $('#subTambah');

                form.on('submit', function(e){
                	e.preventDefault();
                	$.ajax({
                		url : 'getPermainan.php',
                		type : 'POST',
                		cache : false,
                		data : form.serialize(),
                		beforeSend: function(){
					        submit.val('Sedang Menambahkan...').attr('disabled', 'disabled');
					    },
					    success: function(data){
					        // Append with fadeIn see http://stackoverflow.com/a/978731
					        $("#contents").load("detail.php?pages=3&idPer="+data);
				      	}

                	});
                });

			</script>
		<?php
	}	
?>


