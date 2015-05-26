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
                include_once('DataAccess.php');
                    $da = new DataAccess();
                    $numeroAuto                 = $_POST['numeroAuto'];
                    $data                       = $_POST['data'];
                    $hora                       = $_POST['hora'];
                    $nomeAutoado                = $_POST['nomeAutoado'];
                    $nacionalidade              = $_POST['nacionalidade'];
                    $numPassaporte              = $_POST['numPassaporte'];
                    $dataNascimento             = $_POST['dataNascimento'];
                    $morada                     = $_POST['morada'];
                    $localProcedente            = $_POST['localProcedente'];
                    $dinheiroQueTransportava    = $_POST['dinheiroQueTransportava'];
                    $numeroVoo                  = $_POST['numeroVoo'];
                    $separadorBagagem           = $_POST['separadorBagagem'];
                    $revisorBagagem             = $_POST['revisorBagagem'];
                    $numProcessoContraOrdenacao = $_POST['numProcessoContraOrdenacao'];
                    $idUtilizador               = $_SESSION['id'];

                    if (isset($_POST['id'])){
                        $id = $_POST['id'];
                        //editar
                    $da->editarAutoDinheiroM($id, $numeroAuto, $data, $hora, $nomeAutoado,  $nacionalidade, $numPassaporte,
        $dataNascimento, $morada, $localProcedente, $numeroVoo, $dinheiroQueTransportava, $separadorBagagem, $revisorBagagem, $numProcessoContraOrdenacao);
                           echo "<script>alert('Auto editado com sucesso'); window.location='inicialAdmin.php';</script>";
                    }else{
                    $da->inserirAutoDinheiroM($numeroAuto, $data, $hora, $nomeAutoado,  $nacionalidade, $numPassaporte,
        $dataNascimento, $morada, $localProcedente, $numeroVoo, $dinheiroQueTransportava, $separadorBagagem, $revisorBagagem, $numProcessoContraOrdenacao, $idUtilizador);
                           echo "<script>alert('Auto criado com sucesso'); window.location='inicialAdmin.php';</script>";
                    }
            }
        ?>
		<?php
			include('verificacaoDeMenu.php');
			include('AutoDinheiroHTML.php');
		?>
		</div>
	</div>
</body>
</html>