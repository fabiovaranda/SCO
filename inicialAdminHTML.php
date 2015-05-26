<script>
    function confirmarEliminar() {
        return confirm('Tem a certeza que deseja eliminar?');
    }
</script>
<?php
	function getNomeFicheiroTipoAuto($tipoAuto){
		switch($tipoAuto){
			case "1": return "AutoIphones.php"; break;
			case "2": return "AutoCigarros.php"; break;
			case "3": return "AutoDinheiro.php"; break;
			case "4": return "AutoRelogioPulso.php"; break;
			case "5": return "AutoCitesMarfim.php"; break;
			case "6": return "Auto110a.php"; break;
			case "7": return "AutoDinheiro108n6.php"; break;
			case "8": return "Auto111.php"; break;
			case "9": return "Auto108a.php"; break;
			case "10": return "Auto108b.php"; break;
                        case "11": return "AutoMercadoriaA.php"; break;
			case "default": break;   
		}
	}
	echo"
		<div class='large-75 medium-75 small-75'>
			<div class='ink-grid'>
				<h4>Últimos Autos</h4>
				<table class='ink-table bordered alternating hover'>
					<thead>
						<tr>
							<th class='content-left'> Data</th>
							<th class='content-left'> Número de Auto </th>
							<th class='content-left'> Nome de Autuado </th>
							<th class='content-left'> Técnico </th>
							<th class='content-center'> Editar</th>
							<th class='content-center'> Apagar</th>
						</tr>
					</thead>
					<tbody>
	";
					$da = new DataAccess();
                                        
					$res = $da->getAutos();
					while ($row = mysql_fetch_array($res)){
						$data = $da->getDataAuto($row['numeroAuto']);
                                                if ( $row['idTipoAuto'] == 10 )
                                                   $nomeAutoado = "Não aplicável";
                                                else
                                                    $nomeAutoado = $da->getNomeAutoado($row['numeroAuto']);
                                                
						$nomeTecnico = $da->getNomeTecnico($row['numeroAuto']);
						$id = $row['id'];
	echo"
						<tr>
							<td>" . $data . "</td>
							<td>" . $row['numeroAuto'] . "</td>
							<td>" . $nomeAutoado . "</td>
							<td>" . $nomeTecnico . "</td>
							<td><center><a href='".getNomeFicheiroTipoAuto($row['idTipoAuto'])."?i=".$id."'><img src='img/botaoEditar.png'></a></center></td>
							<td><center><a onclick='return confirmarEliminar()' href='apagarAuto.php?i=".$id."'><img src='img/botaoApagar.png'></a></center></td>
						</tr>
	";              
					}
	echo "
					</tbody>
				</table>
			</div>
			<br><br>
		</div>
	";
?>

