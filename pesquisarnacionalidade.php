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
					include('pesquisarnacionalidadeHTML.php');
				?>
			</div>
		</div>
	</body>
</html>

