<?php include_once('verificacaoDeSessao.php'); ?>
<html lang="pt">                                                  
	<head>
		<?php
			include('importarBibliotecas.php');
		?>    
	</head>
	<body>
		<div class='ink-grid'>
			<?php
			   include('header.php');
			?>
			<div class='column-group'>
				<?php
					include('verificacaoDeMenu.php');
					include('recuperarAutosHTML.php');
				?>
			</div>
		</div>
	</body>
</html>
<?php
	if (isset($_GET['i'])){
		//vamos recuperar o auto e suas informações
		include_once('DataAccess.php');
		$da = new DataAccess();
		$da->recuperarAuto($_GET['i']);
		echo "<script>alert('Auto recuperado com sucesso'); window.location='inicialAdmin.php'</script>";
	}
?>
