<?php
	//nas páginas em que apenas possa ter acesso o administrador, 
	//temos que verificar se tem permissões de administrador
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getUtilizador($_SESSION['id']);
	$row = mysql_fetch_assoc($res);
	if($row['idTipoUtilizador']== 2)
		echo "<script>window.location='inicial.php'</script>";
?>