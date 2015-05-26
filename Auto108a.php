<?php include_once('verificacaoDeSessao.php'); ?>
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
						$hora = $_POST['hora'];
						$nomeAutoado = $_POST['nomeAutoado'];
						$nacionalidade = $_POST['nacionalidade'];
						$numPassaporte = $_POST['numPassaporte'];
						$dataEmissaoPassaporte = $_POST['dataEmissaoPassaporte'];
						$dataNascimento = $_POST['dataNascimento'];
						$morada = $_POST['morada'];
						$localProcedente = $_POST['localProcedente'];
						$numeroVoo = $_POST['numeroVoo'];
						$contramarcaFiscal = $_POST['contramarcaFiscal'];
						$dataVoo = $_POST['dataVoo'];
						$separadorBagagem = $_POST['separadorBagagem'];
						$revisorBagagem = $_POST['revisorBagagem'];
						$descricao = $_POST['descricao'];
						$numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
						$descricaoEspecificoDescaminho = $_POST['descricaoEspecificaDescaminho'];
						$resNT = $da->getNumeroTecnico($_SESSION['id']);
						$rowNT = mysql_fetch_assoc($resNT);
						
						if (isset($_POST['id'])){
							$id = $_POST['id'];
							//editar
							$da->editarAuto108a($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                                                        $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, 
							$separadorBagagem, $revisorBagagem, $descricao,
							$numProcessoContraOrdenacao, $descricaoEspecificoDescaminho);
							echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
						}else{					
                                                    $idUtilizador = $_SESSION['id'];					
						    $da->inserirAuto108a($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, 
							$dataEmissaoPassaporte,	$dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, 
							$dataVoo, $separadorBagagem, $revisorBagagem, $descricao, $numProcessoContraOrdenacao, 
                                                        $descricaoEspecificoDescaminho, $idUtilizador);
							echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
						}
					}
				?>
				<?php
					include('VerificacaoDeMenu.php');
					include('Auto108aHTML.php');
				?>
			</div>
		</div>
	</body>
</html>