<script>
    function confirmarRecuperar() {
        return confirm('Tem a certeza que deseja recuperar?');
    }
</script>
<?php
	if (isset($_POST['s'])) {
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->PesquisarEliminados($_POST['numeroAuto'], $_POST['data'], /* $_POST['nomeAutoado'], */ $_POST['tecnico']);
		$contador = 0;
		while ($row = mysql_fetch_array($res)){
			if($contador == 0){
				echo "
					<div class='large-75 medium-75 small-75'>
						<div class='ink-grid'>
							<h4>Autos Eliminados</h4>
							<table class='ink-table bordered alternating hover'>
									<thead>
										<tr>
											<th class='content-left'> Data </th>
											<th class='content-left'> Número de Auto </th>
											<th class='content-left'> Nome de Autoado </th>
											<th class='content-left'> Técnico </th>
											<th class='content-center'> Recuperar </th>
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
											<td><center><a onclick='return confirmarRecuperar()' href='recuperarAutos.php?i=".$id."'><img src='img/BotaoRecuperar.png'></a></center></td>
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
<div class='large-75 medium-75 small-100'>
    <div class='ink-grid'>
        <form method='post' action='recuperarAutos.php' class='ink-form'>
            <fieldset>
                <legend>Pesquisar Auto Eliminado</legend>
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