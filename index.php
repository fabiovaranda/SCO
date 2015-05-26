<html lang="pt">
<head>
    <?php
		include('importarBibliotecas.php');
    ?>    
	

</head>
<body>
	<div class='ink-grid'>
		<?php
			session_start();
			if (isset($_SESSION['id'])){
				echo "<script>window.location='inicialAdmin.php'</script>";
			}
		   include('indexHTML.php');
		?>
	</div>
</body>
</html>