<?php
	$pageId=$_GET['pageId'];

	if($pageId == 1)
	{
				
	}
	else if($pageId == 2)
	{
		?>
			<div class="container">
				<div class="isi">
					<form id="formBuat">
						<input style="height:35px;margin-bottom:10px;" name="namaGame" id="namaGame" type="text" class="form-control" placeholder="Nama Permainan.." required autofocus>
						<div id="map" style="width: 920px; height: 250px"></div>
						<ul style="list-style:none;margin-left:-30px;margin-top:10px;">
							<li><div style="float:left">Area Lokasi : </div><div style="float:left;margin-left:100px;" id="lats"></div><div style="float:left;margin-left:10px;" id="lngs"></div></li><br/>
							<li><div style="float:left">Tingkat Kesulitan : </div><div style="float:left;margin-left:70px;"><select name="df" style="height:20px;margin-top:10px;" type="date"><option value='1'>Easy</option><option value='2'>Medium</option><option value='3'>Hard</option></select></div></li><br/><br/>
							<li><div style="float:left">Petunjuk : </div><div style="float:left;margin-left:120px;"><textarea style='resize: none;width:600px;margin-top:10px;' name="clue" id ="clue" class="form-control" rows="15" required></textarea></div></li>
						</ul>
						<button id="subTambah" style="margin-top:30px;height:35px;line-height: 10px;float:right;width:150px;margin-right:20px" class="btn btn-lg btn-primary btn-block" type="submit">Tambah</button>
						<input id="lati" name ='lati' type='hidden' class='form-control'  value='' readonly='yes'>
						<input id="lngi" name ='lngi' type='hidden' class='form-control'  value='' readonly='yes'>
					</form>
				</div>
			</div>
			<script type="text/javascript">
				L.mapbox.accessToken = 'pk.eyJ1IjoicmlmcWl0aG9taSIsImEiOiJpUjFieHdVIn0.Cz3ME0XeH01-5IRnCJl3SA';
                var map = L.mapbox.map('map', 'rifqithomi.jb5ibjeg')
                    .setView([-1.527, 118.215], 4);

				//var coordinates = document.getElementById('coordinates');



				var marker = L.marker([-1.527, 118.215], {
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


