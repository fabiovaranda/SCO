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
				$nomeAutoado = $_POST['nomeAutoado'];
				$contribuinteFiscal = $_POST['contribuinteFiscal'];
				$morada = $_POST['morada'];
				$localProcedente = $_POST['localProcedente'];
				$numeroVoo = $_POST['numeroVoo'];
				$materialQueTransportava = $_POST['materialQueTransportava'];
				$reexportacaoInutilizacao = $_POST['reexportacaoInutilizacao'];
				$numAutoRetencao = $_POST['numAutoRetencao'];
				$respostaEntidade = $_POST['respostaEntidade'];
				$numOficio = $_POST['numOficio'];
				$dataOficio = $_POST['dataOficio'];
				$dataRececaoOficio = $_POST['dataRececaoOficio'];
                                $numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
				$idUtilizador = $_SESSION['id'];
					
				if (isset($_POST['id'])){
					$id = $_POST['id'];
					//editar
					$da->editarAuto111($id, $numeroAuto, $data, $nomeAutoado, $contribuinteFiscal, $morada, $localProcedente, $numeroVoo, 
									$materialQueTransportava, $reexportacaoInutilizacao, $numAutoRetencao, $respostaEntidade, $numOficio, $dataOficio, $dataRececaoOficio, $numProcessoContraOrdenacao);
					
							echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
				}else{					
					$da->inserirAuto111($numeroAuto, $data, $nomeAutoado, $contribuinteFiscal, $morada, $localProcedente, $numeroVoo, 
									$materialQueTransportava, $reexportacaoInutilizacao, $numAutoRetencao, $respostaEntidade, $numOficio, $dataOficio, $dataRececaoOficio, $numProcessoContraOrdenacao, $idUtilizador);
					
							echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
				}
			}
		?>
           <?php
			include('verificacaoDeMenu.php');
			include('Auto111HTML.php');
		?>
		</div>
	</div>
</body>
</html>