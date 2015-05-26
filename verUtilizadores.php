<?php 
include_once('verificacaoDeSessao.php'); 
?>
<html>
	<head>
		<?php
                        include_once ('DataAccess.php');
			include('importarBibliotecas.php');
		?>
	</head>
	<body>         
		<div class="ink-grid">
			<?php
			   include('header.php');
			?>
			<div class="column-group gutters">
				<?php
					include('verificacaoDeMenu.php');
					include('verUtilizadoresHTML.php');
				?>
			</div>
		</div>
	</body>
</html>