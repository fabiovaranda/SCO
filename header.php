<?php include_once('verificacaoPageName.php'); 

function menuAutos($pageName){
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getUtilizador($_SESSION['id']);
	$row = mysql_fetch_assoc($res);
	if($pageName == "inicial.php" || $pageName == 'inicialAdmin.php'){
		if($row['idTipoUtilizador']== 2)
			echo "<li class='active'><a href='inicial.php'>Início</a></li>";
		else
			echo "<li class='active'><a href='inicialAdmin.php'>Início</a></li>";
	}else{
		if($row['idTipoUtilizador']== 2)
			echo "<li><a href='inicial.php'>Início</a></li>";
		else
			echo "<li><a href='inicialAdmin.php'>Início</a></li>";
	}
	if($pageName == "criarAuto.php" || $pageName == "AutoIphones.php" ||
					   $pageName == "AutoCigarros.php" || $pageName == "AutoDinheiro.php" || 
					   $pageName == "AutoRelogioPulso.php" || $pageName == "AutoCitesMarfim.php" || 
					   $pageName == "Auto110a.php" || $pageName == "AutoDinheiro108n6.php" || 
					   $pageName == "Auto111.php" || $pageName == "Auto108a.php" || 
					   $pageName == "Auto108b.php" || $pageName == "AutoMercadoriaA.php"){
		echo "<li class='active'><a href='criarAuto.php'>Criar</a></li>";
	}else{
		echo "<li><a href='criarAuto.php'>Criar</a></li>";
	}
	if($pageName == "pesquisar.php"){
		echo "<li class='active'><a href='pesquisar.php'>Pesquisar</a></li>";
	}else{
		echo "<li><a href='pesquisar.php'>Pesquisar</a></li>";
	}
	
	if($pageName == 'recuperarAutos.php'){
		echo " <li class='active'><a href='recuperarAutos.php'>Recuperar</a></li>";
	}
	if($pageName != 'recuperarAutos.php'){
		echo " <li><a href='recuperarAutos.php'>Recuperar</a></li>";						
	}
}

function menuNacionalidades($pageName){
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getUtilizador($_SESSION['id']);
	$row = mysql_fetch_assoc($res);
        if($pageName == "inicial.php" || $pageName == 'inicialAdmin.php'){
		if($row['idTipoUtilizador']== 2)
			echo "<li class='active'><a href='inicial.php'>Início</a></li>";
		else
			echo "<li class='active'><a href='inicialAdmin.php'>Início</a></li>";
	}else{
		if($row['idTipoUtilizador']== 2)
			echo "<li><a href='inicial.php'>Início</a></li>";
		else
			echo "<li><a href='inicialAdmin.php'>Início</a></li>";
	}
	
	if($pageName == "criarNacionalidade.php" ){
		echo "<li class='active'><a href='criarNacionalidade.php'>Criar Nacionalidade</a></li>";
	}else{
		echo "<li><a href='criarNacionalidade.php'>Criar Nacionalidade</a></li>";
	}
	if($pageName == "pesquisarnacionalidade.php"){
		echo "<li class='active'><a href='pesquisarnacionalidade.php'>Pesquisar Nacionalidade</a></li>";
	}else{
		echo "<li><a href='pesquisarnacionalidade.php'>Pesquisar Nacionalidade</a></li>";
	}
}

function menuUtilizadores($pageName){
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getUtilizador($_SESSION['id']);
	$row = mysql_fetch_assoc($res);
	if($pageName == "inicial.php" || $pageName == 'inicialAdmin.php'){
		if($row['idTipoUtilizador']== 2)
			echo "<li class='active'><a href='inicial.php'>Início</a></li>";
		else
			echo "<li class='active'><a href='inicialAdmin.php'>Início</a></li>";
	}else{
		if($row['idTipoUtilizador']== 2)
			echo "<li><a href='inicial.php'>Início</a></li>";
		else
			echo "<li><a href='inicialAdmin.php'>Início</a></li>";
	}
	if($pageName == "criarUtilizador.php" ){
		echo "<li class='active'><a href='criarUtilizador.php'>Criar Utilizador</a></li>";
	}else{
		echo "<li><a href='criarUtilizador.php'>Criar Utilizador</a></li>";
	}
	if($pageName == "verUtilizadores.php"){
		echo "<li class='active'><a href='verUtilizadores.php'>Ver Utilizadores</a></li>";
	}else{
		echo "<li><a href='verUtilizadores.php'>Ver Utilizadores</a></li>";
	}
}

?>
<header>
	<h1 class="pull-left large-25">
		<div class="logo">
			<img src="img/LogoPequeno.png" ALIGN="BASELINE" >
		</div>
	</h1>
	<div>
		<nav class="ink-navigation pull-right large-28">
			<ul class="menu horizontal rounded shadowed grey">
				<?php
					if($pageName == "inicial.php" || $pageName == 'inicialAdmin.php' || 
					   $pageName == "criarAuto.php" || $pageName == "AutoIphones.php" ||
					   $pageName == "AutoCigarros.php" || $pageName == "AutoDinheiro.php" || 
					   $pageName == "AutoRelogioPulso.php" || $pageName == "AutoCitesMarfim.php" || 
					   $pageName == "Auto110a.php" || $pageName == "AutoDinheiro108n6.php" || 
					   $pageName == "Auto111.php" || $pageName == "Auto108a.php" ||
					   $pageName == "Auto108b.php" || $pageName == "AutoMercadoriaA.php" || 
                                           $pageName == "pesquisar.php" || $pageName == 'recuperarAutos.php')
					   menuAutos($pageName);
					else{
						if($pageName == "verUtilizadores.php" || $pageName == 'criarUtilizador.php')
							menuUtilizadores($pageName);
                                                if($pageName == "nacionalidades.php" || $pageName == "criarNacionalidade.php" || $pageName == "pesquisarnacionalidade.php")
                                                        menuNacionalidades($pageName);
					}
						
				?>
			</ul>
		</nav>
	</div>
</header>