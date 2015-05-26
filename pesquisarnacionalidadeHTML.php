<script>
    function confirmarEliminar() {
        return confirm('Tem a certeza que deseja eliminar?');
    }
</script>
<?php
	if (isset($_POST['s'])) {
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->pesquisarNacionalidade($_POST['nacionalidade']);
                
                
		$contador = 0;
		while ($row = mysql_fetch_array($res)) {
                    $id = $row['id'];
                    $nacionalidade = $row['nacionalidade'];
			if($contador == 0){
				echo "
                                    <div class='large-75 medium-75 small-75'>
                                        <div class='ink-grid'>
                                            <h4>Nacionalidades Pesquisadas</h4>
                                            <table class='ink-table bordered alternating hover'>
                                                    <thead>
                                                            <tr>
                                                                    <th class='content-left'> Nacionalidade</th>
                                                                    <th class='content-center'> Editar</th>
                                                                    <th class='content-center'> Apagar</th>
                                                                    <th class='content-center'> Estado</th>
                                                            </tr>
                                                    </thead>
                                                    <tbody>   
				";
			}
                        $contador++;
                                                                       
				echo "
                                                        <tr>
                                                                <td>" . $nacionalidade . "</td>
                                                                <td><center><a href='EditarNacionalidade.php?i=".$id."'><img src='img/botaoEditar.png'></a></center></td>
                                                                <td><center><a onclick='return confirmarEliminar()' href='apagarAuto.php?i=".$id."'><img src='img/botaoApagar.png'></a></center></td>";
                                                                   
                                                                $idEstado = $da ->getIdEstadoNacionalidade($row['id']);
                                                                if ( $row['idEstado'] == 1 )
                                                                   echo"<td><center><a href='MudarEstado.php?i=$id'><img src='img/redball.png'></a></center></td>";
                                                                if ( $row['idEstado'] == 3 ) 
                                                                   echo"<td><center><a href='mudarestado2.php?i=$id'><img src='img/greenball.png'></a></center></td>";
                echo"                                    
                                                        </tr>
				";
		}   
                                                        if ($contador >= 1)
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
<div class='control large-75'>
    <div class='ink-grid'>
        <form method='post' action='pesquisarnacionalidade.php' class='ink-form'>
            <fieldset>
                <legend>Pesquisar Nacionalidade</legend>
                <br><br>
                <input type='hidden' name='s' value='-1'/>
                <div class='control-group'>
                    <div class='control large-50'>
                            <label for='nacionalidade'>Nacionalidade</label>
                            <input type='text' id='nacionalidade' name='nacionalidade'>
                    </div>
                </div>
                <div class='control-group'>
                    <div class='vertical-space'>
                            <input type='submit' value='Pesquisar' class='ink-button black' required>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>