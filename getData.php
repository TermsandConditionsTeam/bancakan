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
				   'type' => 'Feature'
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

			$qrTempatBud = "SELECT t.nama_tempat, t.alamat, t.lat_bud, t.long_bud, t.preview, t.nama_file_video, l.id_in,t.id_tempat_budaya
								FROM tempat_budaya t, budaya b, budaya_in_loc l
								WHERE l.id_budaya = ".$resultBud['id_budaya']." AND l.id_tempat_budaya = t.id_tempat_budaya AND b.id_budaya = ".$resultBud['id_budaya']."
							";
							//echo $qrTempatBud;exit();
			$getTempatBud = mysql_query($qrTempatBud);
			//$resultTempatBud = mysql_fetch_array($getTempatBud);
			while($resultTempatBud=mysql_fetch_assoc($getTempatBud)){

			
				$geometry = array(
								'type' => 'Point',
								'coordinates' => array($resultTempatBud['long_bud'],$resultTempatBud['lat_bud'])
							);

				//get Icon
				$qrKat = "SELECT nama_file_icon 
							FROM kategori 
							WHERE id_kategori = ".$resultBud['id_kategori']."
						";
				$getKat = mysql_query($qrKat);
				$resultKat=mysql_fetch_array($getKat);

				$icon = array(
<<<<<<< HEAD
							'iconUrl' => 'assets/images/'.$resultKat['nama_file_icon'].'',
=======
<<<<<<< HEAD
							'iconUrl' => 'assets/images/'.$resultKat['nama_file_icon'].'',
=======
							'iconUrl' => 'assets/images/'.$resultKat['nama_file_icon'].'.png',
>>>>>>> origin/master
>>>>>>> origin/master
							'iconSize' => array(32,43),
							'iconAnchor' => array(16,42),
							'popupAnchor' => array(0,-40),
							'className' => 'dot'
						);
				
				//get Event
				$qrEvent = "SELECT * 
							FROM event
							WHERE id_in = ".$resultTempatBud['id_in']."
						";
				$getEvent = mysql_query($qrEvent);
				$events = array();
				while($resultEvent=mysql_fetch_assoc($getEvent)){
						$events[] = array(
										'id_event' => $resultEvent['id_event'],
										'nama_event' => $resultEvent['nama_event'],
										'alamat' =>  $resultEvent['alamat'],
<<<<<<< HEAD
										'tanggal_open' => $resultEvent['tanggal_open'],
										'tanggal_close' => $resultEvent['tanggal_close'],
=======
<<<<<<< HEAD
										'tanggal' => $resultEvent['tanggal'],
>>>>>>> origin/master
										'nama_file_poster' => $resultEvent['nama_file_poster']

									);
				}
<<<<<<< HEAD

				//get Gallery
				$qrGal = "SELECT * 
							FROM gallery
							WHERE id_tempat_budaya = ".$resultTempatBud['id_tempat_budaya']."
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
				
				
				

=======

				//get Gallery
				$qrGal = "SELECT * 
							FROM gallery
							WHERE id_budaya = ".$resultTempatBud['id_tempat_budaya']."
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
								'sejarah' => $resultTempatBud['preview'],
		                        'event' => $events,
		                        'galery' => $gals,
		                        'video' => $resultTempatBud['nama_file_video'],
								'jenis' => '2',
								'icon' => $icon,
								'city' => $resultTempatBud['nama_tempat']
							);

=======
										'tanggal' => $resultEvent['tanggal']

									);
				}

				//get Gallery
				$qrGal = "SELECT * 
							FROM gallery
							WHERE id_budaya = ".$resultTempatBud['id_tempat_budaya']."
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
				
				
				

>>>>>>> origin/master
				$propertiess = array(
								'sejarah' => $resultTempatBud['preview'],
		                        'event' => $events,
		                        'galery' => $gals,
		                        'video' => $resultTempatBud['nama_file_video'],
								'jenis' => '2',
								'icon' => $icon,
								'city' => $resultTempatBud['nama_tempat']
							);

<<<<<<< HEAD
=======
>>>>>>> origin/master
>>>>>>> origin/master
				$hasil['geometry'] =  $geometry;
				$hasil['id'] = $resultTempatBud['id_tempat_budaya'];
				$hasil['properties'] = $propertiess;
				$hasilss[] = $hasil;
			}
		}

		echo json_encode($hasilss);//, JSON_NUMERIC_CHECK);
	}
	elseif ($req =="3") {
		$qrPer = "SELECT * FROM permainan";
		$getPer = mysql_query($qrPer);
		$type = "Feature";
		$hasilss = array();
		$hasil = array(
				   'type'      => 'Feature'
				);
		while($resultPer=mysql_fetch_assoc($getPer)){
			$geometry = array(
							'type' => 'Point',
							'coordinates' => array($resultPer['long_per'],$resultPer['lat_per'])
						);
			$icon = array(
<<<<<<< HEAD
						'iconUrl' => 'assets/images/'.$resultPer['nama_file_icon'].'',
=======
<<<<<<< HEAD
						'iconUrl' => 'assets/images/'.$resultPer['nama_file_icon'].'',
=======
						'iconUrl' => 'assets/images/'.$resultPer['nama_file_icon'].'.png',
>>>>>>> origin/master
>>>>>>> origin/master
						'iconSize' => array(32,43),
						'iconAnchor' => array(16,42),
						'popupAnchor' => array(0,-40),
						'className' => 'dot'
					);
			$propertiess = array(
							'clue' => $resultPer['clue'],
	                        'difficult' => $resultPer['difficult'],
	                        'tanggal' => $resultPer['tanggal'],
	                        'favorite' => $resultPer['favorite'],
	                        'mine' => $resultPer['id_tab_user'],
							'jenis' => '3',
							'icon' => $icon,
							'city' => $resultPer['nama_per']
						);
			$hasil['geometry'] =  $geometry;
			$hasil['id'] = $resultPer['id_permainan'];
			$hasil['properties'] = $propertiess;
			$hasilss[] = $hasil;

		}
		echo json_encode($hasilss);//, JSON_NUMERIC_CHECK);
		
	}
	

?>