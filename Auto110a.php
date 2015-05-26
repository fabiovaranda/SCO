<?php
include_once('verificacaoDeSessao.php'); ?>
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
                                        $da                         = new DataAccess();
                                        $numeroAuto                 = $_POST['numeroAuto'];
                                        $data                       = $_POST['data'];
                                        $dataocorrencia             = $_POST['dataocorrencia'];
                                        $nomeAutoado                = $_POST['nomeAutoado'];
                                        $contribuinteFiscal         = $_POST['contribuinteFiscal'];
                                        $localResidente             = $_POST['localResidente'];
                                        $nomeEmpresa                = $_POST['nomeEmpresa'];
                                        $contribuinteFiscalEmpresa  = $_POST['contribuinteFiscalEmpresa'];
                                        $sedeSocialEmpresa          = $_POST['sedeSocialEmpresa'];
                                        $dataEntregaDeclaracao      = $_POST['dataEntregaDeclaracao'];
                                        $numDeclaracao              = $_POST['numDeclaracao'];
                                        $numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
                                        $idUtilizador               = $_SESSION['id'];
					
				if (isset($_POST['id'])){
						$id = $_POST['id'];
				$da->editarAuto110a($id, $numeroAuto, $data, $dataocorrencia, $nomeAutoado, $contribuinteFiscal, $localResidente,
						$nomeEmpresa, $contribuinteFiscalEmpresa, $sedeSocialEmpresa, $dataEntregaDeclaracao, $numDeclaracao, $numProcessoContraOrdenacao);
					
							echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
				}else{
				$da->inserirAuto110a($numeroAuto, $data, $dataocorrencia, $nomeAutoado, $contribuinteFiscal, $localResidente,
						$nomeEmpresa, $contribuinteFiscalEmpresa, $sedeSocialEmpresa, $dataEntregaDeclaracao, $numDeclaracao, $numProcessoContraOrdenacao, $idUtilizador);
					
							echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
				}
			}
        ?>
		<?php
			include('verificacaoDeMenu.php');
			include('Auto110aHTML.php');
		?>
		</div>
	</div>
</body>
</html>