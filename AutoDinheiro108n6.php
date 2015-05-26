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
			alert('A data tem que ter o formato dd/mm/aaaa');
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
				$tecnicoSeparador = $_POST['tecnicoSeparador'];
				$tecnicoRevisor = $_POST['tecnicoRevisor'];
				$numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
				$descricao = $_POST['descricao'];
				$idUtilizador = $_SESSION['id'];
					
				if (isset($_POST['id'])){
                                    $id = $_POST['id'];
                                    //editar
                                    $da->editarDinheiro108n6($id, $numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                                            $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, $tecnicoSeparador, 
											$tecnicoRevisor, $numProcessoContraOrdenacao, $descricao, $idUtilizador);
                                    echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
				}else{					
                                    $da->inserirAutoDinheiro108n6($numeroAuto, $data, $hora, $nomeAutoado, $nacionalidade, $numPassaporte, $dataEmissaoPassaporte,
                                            $dataNascimento, $morada, $localProcedente, $numeroVoo, $contramarcaFiscal, $dataVoo, $tecnicoSeparador, 
											$tecnicoRevisor, $numProcessoContraOrdenacao, $descricao, $idUtilizador);
                                    echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
				}
			}
		?>
        <?php
			include('verificacaoDeMenu.php');
			include('AutoDinheiro108n6HTML.php');
		?>
		</div>
	</div>
</body>
</html>