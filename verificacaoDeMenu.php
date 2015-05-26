<?php
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getUtilizador($_SESSION['id']);
	$row = mysql_fetch_assoc($res);
	if($row['idTipoUtilizador']== 2)
		include('menu.php');
	else
		include('menuAdmin.php');
?>