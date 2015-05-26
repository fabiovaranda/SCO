<?php
	if (isset($_GET['i'])){
		//vamos apagar o auto e suas informações
		include_once('DataAccess.php');
		$da = new DataAccess();
		$da->eliminarNacionalidade($_GET['i']);
		echo "<script>alert('Nacionalidade eliminada com sucesso'); window.location='nacionalidades.php'</script>";
	}
?>
