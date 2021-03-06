<?php
	header("Access-Control-Allow-Origin: http://demobacakanbdg.esy.es");
	include 'dbcon.php';
	include 'checkinconditions.php';

	session_start();
	$pages=$_GET['pages'];
	$conditions = new CheckInConditions();
	$icon;
	$nama;
	$kategori;
	$ever;
	if($pages==1)
	{
		$ids=$_GET['idBud'];
		$qrTempatBudaya = "SELECT 
							t.nama_tempat, 
							t.lat_bud, 
							t.long_bud, 
							t.alamat, 
							b.id_budaya,
							b.id_kategori
						FROM budaya b, budaya_in_loc l, tempat_budaya t
						WHERE t.id_tempat_budaya = ".$ids." AND l.id_tempat_budaya = t.id_tempat_budaya AND l.id_budaya = b.id_budaya  ";

		$getTempatBudaya = mysql_query($qrTempatBudaya);
		$resultTempatBudaya = mysql_fetch_array($getTempatBudaya);
		$qrKat = "SELECT k.nama_file_icon, k.nama_kategori 
						FROM kategori k, budaya b 
						WHERE k.id_kategori = ".$resultTempatBudaya['id_kategori']." AND b.id_budaya = ".$resultTempatBudaya['id_budaya']."
					";
		$getKat = mysql_query($qrKat);
		$resultKat=mysql_fetch_array($getKat);
		$icon = $resultKat['nama_file_icon'];
		$nama = $resultTempatBudaya['nama_tempat'];
		$kategori = $resultKat['nama_kategori'];
		$lat = $resultTempatBudaya['lat_bud'];
		$lng = $resultTempatBudaya['long_bud'];
		$alamat = $resultTempatBudaya['alamat'];
		

		$temp = $lat * -1;
		$tmod = $temp - floor($temp);
		$tD = $temp -  ($temp - floor($temp)) ;
		$tM = ($tmod*60) - (($tmod*60) - floor(($tmod*60)));
		$tS = floor((($tmod*60) - floor(($tmod*60)))*60);

		$lmod = $lng - floor($lng);
		$lD = $lng -  ($lng - floor($lng)) ;
		$lM = ($lmod*60) - (($lmod*60) - floor(($lmod*60)));
		$lS = floor((($lmod*60) - floor(($lmod*60)))*60);
	}
	else if($pages == 2)
	{
		$ids=$_GET['idEve'];
		$qrEvent = "SELECT 
						e.nama_event,
						e.alamat, 
						e.tanggal_open,
						e.tanggal_close,
						e.nama_file_poster, 
						t.lat_bud, 
						t.long_bud,
						b.id_kategori
						FROM event e, budaya_in_loc l, tempat_budaya t, budaya b
						WHERE id_event = ".$ids." AND l.id_in = e.id_in AND l.id_budaya = b.id_budaya AND l.id_tempat_budaya = t.id_tempat_budaya
					";

		$getEvent = mysql_query($qrEvent);
		$resultEvent = mysql_fetch_array($getEvent);
		$qrKatEvent = "SELECT nama_file_icon, nama_kategori
						FROM kategori
						WHERE id_kategori = ".$resultEvent['id_kategori']."
					";
		$getKatEvent = mysql_query($qrKatEvent);
		$resultKatEvent=mysql_fetch_array($getKatEvent);
		$icon = $resultKatEvent['nama_file_icon'];
		$nama = $resultEvent['nama_event'];
		$kategori = $resultKatEvent['nama_kategori'];
		$lat = $resultEvent['lat_bud'];
		$lng = $resultEvent['long_bud'];
		$alamat = $resultEvent['alamat'];
		$tanggal = $resultEvent['tanggal_open'];
		$poster = $resultEvent['nama_file_poster'];

		$temp = $lat * -1;
		$tmod = $temp - floor($temp);
		$tD = $temp -  ($temp - floor($temp)) ;
		$tM = ($tmod*60) - (($tmod*60) - floor(($tmod*60)));
		$tS = floor((($tmod*60) - floor(($tmod*60)))*60);

		$lmod = $lng - floor($lng);
		$lD = $lng -  ($lng - floor($lng)) ;
		$lM = ($lmod*60) - (($lmod*60) - floor(($lmod*60)));
		$lS = floor((($lmod*60) - floor(($lmod*60)))*60);



	}
	else if($pages == 3)
	{
		$ids=$_GET['idPer'];
		$qrPermainan = "SELECT nama_per, lat_per, long_per, id_tab_user, nama_file_icon, favorite, clue, difficult, tanggal
						FROM permainan
						WHERE id_permainan = ".$ids." ";
		$getPermainan = mysql_query($qrPermainan);
		$resultPermainan = mysql_fetch_array($getPermainan);
		
		$icon = $resultPermainan['nama_file_icon'];
		$nama = $resultPermainan['nama_per'];
		$kategori = 'Permainan';
		$lat = $resultPermainan['lat_per'];
		$lng = $resultPermainan['long_per'];
		$mine = $resultPermainan['id_tab_user'];
		$alamat = 'Tidak Diketahui';
		$clue = $resultPermainan['clue'];
		$tanggal = $resultPermainan['tanggal'];

		$temp = $lat * -1;
		$tmod = $temp - floor($temp);
		$tD = $temp -  ($temp - floor($temp)) ;
		$tM = ($tmod*60) - (($tmod*60) - floor(($tmod*60)));
		$tS = floor((($tmod*60) - floor(($tmod*60)))*60);

		$lmod = $lng - floor($lng);
		$lD = $lng -  ($lng - floor($lng)) ;
		$lM = ($lmod*60) - (($lmod*60) - floor(($lmod*60)));
		$lS = floor((($lmod*60) - floor(($lmod*60)))*60);



	}
?>
<div class="container">
	<!-- <div class="isi"> -->
		<div class="ikon">
        <?php 
          if($pages==2){
            echo "<img src='assets/images/".$poster."' alt='' width='50px' height='60px'>&nbsp;"; 
          }
          else
          {
            echo "<img src='assets/images/".$icon."' alt='' width='50px' height='67px'>&nbsp;";
          }
            
            // echo "<span style='font-size:20px; font-weight:bold;margin-top:-20px;'>".."</span><br/>";
            // echo "&nbsp;<span style='font-size:12px;'>".$kategori."</span>";
        ?>
    </div>
    <div class="jud_kat">
        <!-- <h2>Nama Budaya / Event / Permainan</h2> -->
        <h2><?php echo $nama; ?></h2>
        <!-- <p>Kategori</p> -->
        <p><?php echo $kategori; ?></p>
    </div>
    <div class="clear"></div>

	<div id="info" class="box">
        <!-- buat informasi general -->
        <ul>
          <li>Alamat : <?php echo $alamat ;?></li>
          <li>Koordinat :<a href="https://www.google.com/search?q=<?php echo $tD.'°'.$tM.'′'.$tS.'″';?>+S+<?php echo $lD.'°'.$lM.'′'.$lS.'″' ;?>+E" target="_blank"> <?php echo $tD.'°'.$tM.'′'.$tS.'″';?> S <?php echo $lD.'°'.$lM.'′'.$lS.'″' ;?> E </a></li>
          <?php
            if(($pages ==2) || ($pages ==3))
            {
          ?>
            <li>Tanggal : <?php echo $tanggal ;?></li>
          <?php 
            if($pages==3)
            {
              ?>
                <li>Clue : <?php echo $clue;?></li>
              <?php
            }
          } 
          ?>
        </ul>
        <?php
          if(isset($_SESSION['id_tab_user']))
          {
            if(($pages ==2) || ($pages ==3) )
            {
              if ($pages ==2) {
                $ever = $conditions->cekBanyakCekinEventSpec($ids, $_SESSION['id_tab_user']);
              }
              else if ($pages ==3)
              {
                $ever = $conditions->cekBanyakCekinPermainanSpec($ids, $_SESSION['id_tab_user']);
              }

              if ($ever > 0) {
                echo '<button id="subCheck" style="float:right;" class="btn btn-lg btn-primary btn-block" type="submit" disabled>Anda Sudah Check in</button>';
              }
              else
              {
                if($pages==3)
                {
                  if($mine==$_SESSION['id_tab_user'])
                  {
                    echo '<button id="subCheck" style="float:right;" class="btn btn-lg btn-primary btn-block" type="submit" disabled>Anda Pemilik Permainan</button>';
                  }
                  else
                  {
                    echo '<button id="subCheck" style="float:right;" class="btn btn-lg btn-primary btn-block" type="submit">Ikutin Permainan</button>';  
                  } 
                }
                else
                {
                  echo '<button id="subCheck" style="float:right;" class="btn btn-lg btn-primary btn-block" type="submit">Check In</button>';  
                }
                
                    
              }
            }
            else
            {
              echo '<button id="subCheck" style="float:right;" class="btn btn-lg btn-primary btn-block" type="submit">Check In</button>';  
            }
            
          }
          else
          {
            echo '<a href="#" id="logs" style="font-size:12px;height:30px;line-height: 10px;width:150px;margin-left:350px" class="btn btn-lg btn-primary btn-block">Login Untuk Check In</a>';
          }
        ?>
        <!-- <a href="#" class="btn btn-lg btn-block">Login first</a></button> -->
    </div>
    <div id="map" class="box"></div>
    <div id="event2" class="box">
        buat daftar event
        1 - 5 pagination
    </div>
    <div id="checkin" class="box">
      Lihat siapa saja yang pernah check-in di sini!<br>
      <?php
        $counter=0;
        if($pages == 1){
          $qrWho = "SELECT
          id_tab_user
          FROM chekin
          WHERE id_tempat_budaya = ".$ids."
          ";
          $getWho = mysql_query($qrWho);
          $countWho=mysql_num_rows($getWho);
        }
        elseif ($pages == 2) {
          $qrWho = "SELECT
          id_tab_user
          FROM chekin_ev
          WHERE id_event = ".$ids."
          ";

          $getWho = mysql_query($qrWho);
          $countWho=mysql_num_rows($getWho);
        }
        elseif ($pages==3) {
          $qrWho = "SELECT
          id_tab_user
          FROM chekin_per
          WHERE id_permainan = ".$ids."
          ";

          $getWho = mysql_query($qrWho);
          $countWho=mysql_num_rows($getWho);
        }
        if ($countWho<1) {
          echo "Jadilah orang pertama untuk check in!";
        }
        else
        {
          while($resultWho=mysql_fetch_assoc($getWho))
          {
            $qrWhoU = "SELECT nama_depan, nama_belakang, nama_file_profile
            FROM user
            WHERE id_tab_user = ".$resultWho['id_tab_user']."
            ";
            $getWhoU = mysql_query($qrWhoU);
            $resultWhoU=mysql_fetch_array($getWhoU);

      ?>
      <div class='col-lg-3 col-md-4 col-xs-6 thumb' style="height: auto;width: auto;margin:0px;padding:0px;">
        <a class='thumbnail' href='#' style="width:33px;margin:3px;">
          <img src="assets/user/<?php echo $resultWhoU['nama_file_profile'] ;?>" height='30px' width='30px' title="<?php echo $resultWhoU['nama_depan'].' '.$resultWhoU['nama_belakang'];?>">
        </a>
      </div>
      <?php
            $counter++;
            } 
          }
          if ($countWho>=70) {
            $sisa = $countWho-$counter;
            if ($sisa<0) {
              $sisa=$sisa*(-1);
            }
      ?>
      &nbsp;+<?php echo $sisa;?> more
      <?php
          }
      ?>
    </div>
    <div class="clear"></div>
		
		
	<!-- </div> end isi -->
</div>	<!-- end container -->
<div id="tempatDialogLencana"></div>

<script type="text/javascript">
				var lat = '<?php echo $lat; ?>';
				var lng = '<?php echo $lng; ?>';
				var iconPath = '<?php echo $icon; ?>';
				var city = '<?php echo $nama; ?>';

				var geojson = { 
								type: 'Feature',
								geometry : {'type' :'Point', 'coordinates' : [lng,lat] },
								properties : {
									'city' : city,
									'icon' : {
										'iconUrl' : 'assets/images/'+iconPath+'',
										'iconSize' : [32,43],
										'iconAnchor' : [16,42],
										'popupAnchor' : [0,-40],
										'className' : 'dot'
									}
								}
							};

	 			L.mapbox.accessToken = 'pk.eyJ1IjoicmlmcWl0aG9taSIsImEiOiJpUjFieHdVIn0.Cz3ME0XeH01-5IRnCJl3SA';
                var map = L.mapbox.map('map', 'rifqithomi.jb5ibjeg')
                    .setView([lat, lng], 15);

                var myLayer = L.mapbox.featureLayer().addTo(map);

                // Add custom popups to each using our custom feature properties
                myLayer.on('layeradd', function(e) {
                    var marker = e.layer,
                        feature = marker.feature;

                    // Create custom popup content
                    var popupContent =  e.layer.feature.properties.city;

                    // http://leafletjs.com/reference.html#popup
                    marker.setIcon(L.icon(feature.properties.icon));
                    marker.bindPopup(popupContent,{
                        closeButton: false,
                        maxWidth: 300
                    });
                    e.layer.feature.geometry.coordinates.reverse();
                });

                myLayer.on('mouseover', function(e) {
                    e.layer.openPopup();
                });
                myLayer.on('mouseout', function(e) {
                    e.layer.closePopup();
                });
                myLayer.setGeoJSON(geojson);


                //comment submit
                var form = $('#comment');
                var submit = $('#subKomen');

                form.on('submit', function(e){
                	e.preventDefault();
                	$.ajax({
                		url : 'komen.php',
                		type : 'POST',
                		cache : false,
                		data : form.serialize(),
                		beforeSend: function(){
					        submit.val('Sedang Menambahkan...').attr('disabled', 'disabled');
					    },
					    success: function(data){
					        // Append with fadeIn see http://stackoverflow.com/a/978731
					        var item = $(data).hide().fadeIn(800);
					        $('#blokComment').prepend(item);

					        // reset form and button
					        form.trigger('reset');
					        submit.val('Tambahkan').removeAttr('disabled');
				      	}

                	});
                });

                //login
                $('#logs').click(function(e){
                	e.stopPropagation();
                	$("#drops").addClass('open');
                });


                //checkin
                $('#subCheck').click(function(e){
                	e.preventDefault();
			        e.stopPropagation();
			        map.locate();
                });

                map.on('locationfound', function(e){
                	var form = $('#comment');
                	var submit = $('#subCheck');
                	var myLat = e.latlng.lat;
                	var myLng = e.latlng.lng;
                	
                	$.ajax({
                		url : 'checkin.php',
                		type : 'POST',
                		cache : false,
                		data : form.serialize(),
                		beforeSend: function(){
					        submit.val('Sedang Check In...').attr('disabled', 'disabled');
					    },
					    success: function(data){
					        
					        // reset form and button
					        form.trigger('reset');
					        document.getElementById("subCheck").innerHTML = "Checked In";
					        //alert(data);
					        alert('Check In berhasil');
					        $("#tempatDialogLencana").html(data);
					        $('#dialogLencana').modal('show');
				      	}

                	});
                	
                });
                map.on('locationerror', function() {
				    alert('Posisi Anda Tidak Dapat Ditemukan');
				});


</script>