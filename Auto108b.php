<?php include_once('verificacaoDeSessao.php'); ?>
<html lang="pt">
	<head>
		<?php
			include('importarBibliotecas.php');
		?> 
		<script>
			function confirmarData(){
				var x = document.getElementById('dataAuto').value;
				if(x.length < 10){
					alert('A data tem que ter o formato dd-mm-aaaa');
					document.getElementById('dataAuto').focus();
					return false;
				}			
				else
					return true;
			}
		</script>	
	</head>
	<body>
		<div class='ink-grid'>
			<?php
				include('header.php');
			?>
			<div class='column-group'>
				<?php
					if (isset($_POST['numeroAuto'])){
						//guardar o novo auto
						include_once('DataAccess.php');
						$da = new DataAccess();
						$numeroAuto = $_POST['numeroAuto'];
						$data = $_POST['data'];
						$descricao = $_POST['descricao'];
                                                $descricao2 = $_POST['descricao2'];
                                                $descricao3 = $_POST['descricao3'];
                                                $numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
						$idUtilizador = $_SESSION['id'];
                                                
						if (isset($_POST['id'])){
							$id = $_POST['id'];
							//editar
							$da->editarAuto108b($id, $numeroAuto, $data, $descricao, $descricao2, $descricao3, $numProcessoContraOrdenacao);
							echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
						}else{		
                                                        $idUtilizador = $_SESSION['id'];
							$da->inserirAuto108b($numeroAuto, $data, $descricao, $descricao2, $descricao3, $numProcessoContraOrdenacao, $idUtilizador);
							
							echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
						}
					}
				?>
				<?php
					include('verificacaoDeMenu.php');
					include('Auto108bHTML.php');
				?>
			</div>
		</div>
	</body>
</html>