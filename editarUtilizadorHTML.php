<?php
    if ( isset ($_POST['nome'])){
    $id                 = $_POST['ID'];
    $nome               = $_POST['nome'];
    $pwd                = md5($_POST['password']);
    $email              = $_POST['email'];
    $numTecnico         = $_POST['numTecnico'];
    $idTipoUtilizador   = $_POST['idTipoUtilizador'];
    $idCategoriaTecnico = $_POST['idCategoriaTecnico'];
        
        include_once('DataAccess.php');
        $da = new DataAccess();
        $res = $da->atualizarUtilizador($id, $nome, $pwd, $email, $numTecnico, $idTipoUtilizador, $idCategoriaTecnico);
        echo "<script>alert('Utilizador Atualizado com sucesso'); window.location='inicialAdmin.php'</script>";
    }
?>
<script>
	function confirmarPWD(){
	if ( document.getElementById('password').value != 
			document.getElementById('password2').value ){
		alert('As palavras-passe têm que ser iguais.');
		return false;
		}else
		return true;
	}
</script>
<?php
    if(isset($_GET['i'])){
        $id = $_GET['i'];
        //ir buscar as informações do user
        $res = $da->getUtilizador($id);
        $row = mysql_fetch_assoc($res);
		echo "
			<div class='large-75 medium-75 small-75'>    
				<form method='post' action='editarUtilizadorHTML.php' 
					<div class='ink-form top-space' onsubmit='return confirmarPWD()'>        
						<fieldset>
							<h3>Ver/Editar Utilizador</h3>
							<input type='hidden' name='ID' value='$id'/>
								<div class='control-group'>
									<div class='control large-33'>
										Nome
										<input id='Nome' name='nome' required value='".$row['nome']."' type='text' placeholder='Nome do técnico'/>
									</div>
									<div class='control large-33'>
										Nº do técnico
										<input id='numTecnico' name='numTecnico' value='".$row['numeroTecnico']."' required type='text' placeholder='Número do Técnico' />
									</div>
									<div class='control large-33'>
										E-mail
										<input id='Email' name='email' value='".$row['email']."' required type='text' placeholder='XXX@at.gov.pt'/>
									</div>          
								</div>
								<div class='control-group'>
									<div class='control large-50'>
									   <input id='password' name='password'  type='password' placeholder='Palavra-passe'>
									</div>
									<div class='control large-50'>
									   <input id='password2' name='password2'  type='password' placeholder='Repetir a Palavra-passe'>
									</div>          
								</div>
								<div class='control-group'>
									<div class='control large-50'>
										<p class='label'>Selecione uma categoria de Técnico</p>
											<ul class='control unstyled'>
												<select name='idCategoriaTecnico'>
													<option value='-1'></option>";
													
													
													$res2 = $da->getCategoriasTecnicos();
													while ($row2 = mysql_fetch_array($res2)){
														if ($row['idCategoriaTecnico'] == $row2['id'])
															echo"    <option value='" . $row2['id'] . "' selected>" . $row2['Categoria'] . "</option>";
														else
															echo"    <option value='" . $row2['id'] . "'>" . $row2['Categoria'] . "</option>";
													}
													echo"       
												</select>
											</ul>
									</div>
									<div class='control large-50'>
										<p class='label'>Selecione um tipo de Utilizador</p>
										<ul class='control unstyled'>
										<select name='idTipoUtilizador'>
										<option value='-1'></option>";
										$res2 = $da->getTiposUtilizadores();
										while ($row2 = mysql_fetch_array($res2)){
                                                                                    if ($row['idTipoUtilizador'] == $row2['id'])
                                                                                        echo "<option value='" . $row2['id'] . "' selected>" . $row2['tipo'] . "</option>";
                                                                                    else
											echo "<option value='" . $row2['id'] . "'>" . $row2['tipo'] . "</option>";
										}
										echo"        
										</select>
										</ul>
									</div>   
								</div>
								<div class='control-group>
									<div class='vertical-space'>
										<input type='submit' value='Guardar' class='ink-button black' required>
									</div>
								</div>
						</fieldset>
					</div>
				</form>
			</div>
		";
    }
?>



