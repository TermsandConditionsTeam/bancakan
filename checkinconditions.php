<?php
 /**
 * 
 */
 class CheckInConditions
 {
 	
 	function cekBanyakCekin($id_tab_user)
 	{
 		$qr = "SELECT checkin_time
 				FROM user
 				WHERE id_tab_user = ".$id_tab_user."
 				";
 		$result = mysql_query($qr);
 		return $result['checkintime'];
 	}

 	function cekBanyakCekinBudaya($id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin
 				WHERE id_tab_user = ".$id_tab_user."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}
 	function cekBanyakCekinBudayaSpec($idBud,$id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin
 				WHERE id_tab_user = ".$id_tab_user." AND id_budaya = ".$idBud."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}


 	function cekBanyakCekinEvent($id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin_ev
 				WHERE id_tab_user = ".$id_tab_user."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}
 	function cekBanyakCekinEventSpec($idev, $id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin_ev
 				WHERE id_tab_user = ".$id_tab_user." AND id_event = ".$idev."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}

 	function cekBanyakCekinPermainan($id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin_per
 				WHERE id_tab_user = ".$id_tab_user."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}
 	function cekBanyakCekinPermainanSpec($idper, $id_tab_user)
 	{
 		$qr = "SELECT *
 				FROM chekin_per
 				WHERE id_tab_user = ".$id_tab_user." AND id_permainan = ".$idper."
 				";
 		$get = mysql_query($qr);
		$result=mysql_fetch_array($get);
		$count=mysql_num_rows($get);
 		return $count;
 	}
 }
?>