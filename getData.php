<?php
	require_once 'dbcon.php';
	$req = $_POST['req'];

	if($req =="1")
	{
		$qrProv="SELECT * FROM provinsi";
		$getProv = mysql_query($qrProv);
		$type = "Feature";
		$hasilss = array();
		$hasil = array(
				   'type'      => 'Feature'
				);
		while($resultProv=mysql_fetch_assoc($getProv)){
			$geometry = array(
							'type' => 'Point',
							'coordinates' => array($resultProv['long'],$resultProv['lat'])
						);
			$icon = array(
						'iconUrl' => 'assets/images/map-marker-kota(32xx).png',
						'iconSize' => array(32,43),
						'iconAnchor' => array(16,42),
						'popupAnchor' => array(0,-40),
						'className' => 'dot'
					);
			$propertiess = array(
							'jenis' => '1',
							'icon' => $icon,
							'city' => $resultProv['nama_provinsi']
						);

			$hasil['geometry'] =  $geometry;
			$hasil['id'] = $resultProv['id_provinsi'];
			$hasil['properties'] = $propertiess;
			$hasilss[] = $hasil;
		}

		echo json_encode($hasilss);//, JSON_NUMERIC_CHECK);
	}

	else if($req =="2")
	{
		$qrBud="SELECT * FROM budaya";
		$getBud = mysql_query($qrBud);
		$type = "Feature";
		$hasilss = array();
		$hasil = array(
				   'type'      => 'Feature'
				);
		while($resultBud=mysql_fetch_assoc($getBud)){
			$geometry = array(
							'type' => 'Point',
							'coordinates' => array($resultBud['long_bud'],$resultBud['lat_bud'])
						);

			//get Icon
			$qrKat = "SELECT nama_file_icon 
						FROM kategori 
						WHERE id_kategori = ".$resultBud['id_kategori']."
					";
			$getKat = mysql_query($qrKat);
			$resultKat=mysql_fetch_array($getKat);

			$icon = array(
						'iconUrl' => 'assets/images/'.$resultKat['nama_file_icon'].'.png',
						'iconSize' => array(32,43),
						'iconAnchor' => array(16,42),
						'popupAnchor' => array(0,-40),
						'className' => 'dot'
					);
			//get Event
			$qrEvent = "SELECT * 
						FROM event
						WHERE id_budaya = ".$resultBud['id_budaya']."
					";
			$getEvent = mysql_query($qrEvent);
			$events = array();
			while($resultEvent=mysql_fetch_assoc($getEvent)){
					$events[] = array(
									'id_event' => $resultEvent['id_event'],
									'nama_event' => $resultEvent['nama_event'],
									'tanggal' => $resultEvent['tanggal']

								);
			}

			//get Gallery
			$qrGal = "SELECT * 
						FROM gallery
						WHERE id_budaya = ".$resultBud['id_budaya']."
					";
					//echo $qrGal; exit();
			$getGal = mysql_query($qrGal);
			$gals = array();
			while($resultGal=mysql_fetch_assoc($getGal)){
					$gals[] = array(
									'nama_gallery' => $resultGal['nama_gallery'],
									'tanggal' => $resultGal['tanggal'],
									'nama_file' => $resultGal['nama_file_gallery']
								);
			}
			
			
			

			$propertiess = array(
							'sejarah' => $resultBud['preview'],
	                        'event' => $events,
	                        'galery' => $gals,
	                        'video' => $resultBud['nama_file_video'],
							'jenis' => '2',
							'icon' => $icon,
							'city' => $resultBud['nama_budaya']
						);

			$hasil['geometry'] =  $geometry;
			$hasil['id'] = $resultBud['id_budaya'];
			$hasil['properties'] = $propertiess;
			$hasilss[] = $hasil;
		}

		echo json_encode($hasilss);//, JSON_NUMERIC_CHECK);
	}
	

?>