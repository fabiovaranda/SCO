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
			case "default": break;
		}
	}
	if (isset($_POST['s'])) {
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->PesquisarFiltros($_POST['numeroAuto'], $_POST['data'], /* $_POST['nomeAutoado'], */ $_POST['tecnico']);
		$contador = 0;
		while ($row = mysql_fetch_array($res)) {
			if($contador == 0){
				echo "
					<div class='large-75 medium-75 small-75'>
						<div class='ink-grid'>
							<h4>Autos Pesquisados</h4>
							<table class='ink-table bordered alternating hover'>
								<thead>
									<tr>
										<th class='content-left'> Data</th>
										<th class='content-left'> Número de Auto </th>
										<th class='content-left'> Nome de Autoado </th>
										<th class='content-left'> Técnico </th>
										<th class='content-center'> Editar</th>
										<th class='content-center'> Apagar</th>
									</tr>
								</thead>
								<tbody>   
				";
			}
									$contador++;
									$data = $da->getDataAuto($row['numeroAuto']);
									 if ( $row['idTipoAuto'] == 10 )
                                                                            $nomeAutoado = "Não aplicável";
                                                                         else
                                                                             $nomeAutoado = $da->getNomeAutoado($row['numeroAuto']);
                                                                        $nomeTecnico = $da->getNomeTecnico($row['numeroAuto']);
									$id = $da->getId($row['numeroAuto']);
				echo "
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
                                                                        if ($contador > 5)
                                                                        {
                                                                            return false;
                                                                        }
									if ($contador == 0) {
										echo"<script>alert('Pesquisa sem sucesso.');</script>";
									}else{
				echo "
								</tbody>
							</table>
						</div>
						<br><br>
					</div>
				";
		
                                                                        }
	}
?>
<div class='large-75'>
    <div class='ink-grid'>
        <form method='post' action='pesquisar.php' class='ink-form'>
            <fieldset>
                    <legend>Pesquisar Auto</legend>
                    <br><br>
                    <input type='hidden' name='s' value='-1'/>
                    <div class='control-group'>
                            <div class='control large-20'>
                                    <label for='numeroAuto'>Número do Auto</label>
                                    <input type='text' onkeypress="return isNumberKey(event)" name='numeroAuto'>
                            </div>
                            <!--<div class='control-group'>
                                    <div class='control large-80'>
                                            <label for='nomeAutoado'>Nome do Autoado</label>
                                            <input type='text' name='nomeAutoado'>
                                    </div>
                            </div>-->
                            <div class='control large-40'>
                                    <label for='tecnico'>Técnico</label>
                                    <select name='tecnico'>
                                            <option value='-1'></option>
                                            <?php
                                                    include_once('DataAccess.php');
                                                    $da = new DataAccess();
                                                    $res = $da->getUtilizadores();
                                                    while ($row = mysql_fetch_array($res)) {
                                                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                                                    }
                                            ?>
                                    </select>
                            </div>
                            <div class='control large-20'>
                                    <label for='data'>Data</label>
                                    <input type='date' name='data' placeholder='aaaa-mm-dd'>
                            </div>
                            <div class='control large-20'>
                                    <div class='vertical-space'>
                                            <input type='submit' value='Pesquisar' class='ink-button black' required>
                                    </div>
                            </div>
                    </div>
            </fieldset>
        </form>
    </div>
</div>