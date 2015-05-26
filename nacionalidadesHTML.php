<script>
    function confirmarEliminar() {
        return confirm('Tem a certeza que deseja eliminar?');
    }
</script>
<?php

echo"
		<div class='large-75 medium-75 small-75'>
			<div class='ink-grid'>
				<h4>Nacionalidades</h4>
				<table class='ink-table bordered alternating hover'>
					<thead>
						<tr>
							<th class='content-left'> Nacionalidade</th>
                                                        <th class='content-left'> Editar</th>
                                                        <th class='content-left'> Apagar</th>
                                                        <th class='content-left'> Estado</th>
						</tr>
					</thead>
					<tbody>
	";                              
                                        include_once("DataAccess.php");
					$da = new DataAccess();
					$res = $da->getNacionalidades();
					while ($row = mysql_fetch_array($res)){
                                        $id = $da->getIdNacionalidades($row['id']);
	echo"
						<tr>
							<td>" . $row['nacionalidade'] . "</td>
							
							<td><center><a href='editarNacionalidade.php?i=".$id."'><img src='img/botaoEditar.png'></center></td>
							<td><center><a onclick='return confirmarEliminar()' href='apagarNacionalidade.php?i=".$id."'><img src='img/botaoApagar.png'></a></center></td>";
                                            
						$idEstado = $da ->getIdEstadoNacionalidade($row['id']);
                                                if ( $row['idEstado'] == 1 )
                                                   echo"<td><center><a href='MudarEstado.php?i=$id'><img src='img/redball.png'></a></center></td>";
                                                if ( $row['idEstado'] == 3 ) 
                                                   echo"<td><center><a href='MudarEstado2.php?i=$id'><img src='img/greenball.png'></a></center></td>";
                                                
                                                
        echo"
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
