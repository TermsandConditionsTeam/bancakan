<?php
	session_start();
	include "dbcon.php";
	ob_start();
	$qrDelete = "DELETE FROM user
        WHERE id_tab_user = ".$_SESSION['id_tab_user']." ";
    $result = mysql_query($qrDelete);
    session_destroy();
?>