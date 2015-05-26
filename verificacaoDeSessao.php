<?php
	//verificar se existe sessão. Se não existir, manda para o index
	session_start();
	if(!isset($_SESSION['id'])){
		echo "<script>window.location='index.php'</script>";
	}
?>