<script>
	function confirmarSair(){
		return confirm('Tem a certeza que deseja sair?');
	}

</script>

<?php include_once('verificacaoPageName.php'); ?>
<div class="large-25">
	<?php
		include_once 'DataAccess.php';
		$da = new DataAccess();
		$res = $da->getUtilizador($_SESSION['id']);
		$row = mysql_fetch_assoc($res);

		echo "
			<ul class='unstyled'>
				<li><b>".$row['nome']."</b></li>
				<li>".$row['email']."</li>
				<li>".$row['cat']."</li>
				<li><a class='ink-button' href='logout.php' onclick='return confirmarSair()'>Terminar Sessão</a></li>
			</ul> 
		";

	?>
	
	<nav class="ink-navigation">
		<ul class="unstyled">
			<li>
				<h5>
					Administração
				</h5><br/>
			</li>
		</ul>
		<ul class="menu vertical rounded shadowed grey">
			<?php
				if($pageName == "criarAuto.php" || $pageName == "AutoIphones.php" ||
				   $pageName == "AutoCigarros.php" || $pageName == "AutoDinheiro.php" || 
				   $pageName == "AutoRelogioPulso.php" || $pageName == "AutoCitesMarfim.php" || 
				   $pageName == "Auto110a.php" || $pageName == "AutoDinheiro108n6.php" || 
				   $pageName == "Auto111.php" || $pageName == "Auto108a.php" || 
				   $pageName == "Auto108b.php" || $pageName == "AutoMercadoriaA.php" ||
                                   $pageName == "pesquisar.php" || $pageName == 'recuperarAutos.php')
					echo "<li class='active'><a href='criarAuto.php'>Autos</a></li>";
				else
					echo "<li><a href='criarAuto.php'>Autos</a></li>";					
				
				if ($pageName == "verUtilizadores.php" || $pageName == "criarUtilizador.php")
					echo "<li class='active'><a href='criarUtilizador.php'>Utilizadores</a></li>";
				else
					echo "<li><a href='criarUtilizador.php'>Utilizadores</a></li>";
				
				if ($pageName == "nacionalidades.php")
					echo "<li class='active'><a href='nacionalidades.php'>Nacionalidades</a></li>";
				else
					echo "<li><a href='nacionalidades.php'>Nacionalidades</a></li>";
			?>
			
			
		</ul>
	</nav>
	
	
</div>


