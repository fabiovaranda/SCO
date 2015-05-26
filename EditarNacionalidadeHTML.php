<?php
    if ( isset ($_POST['nacionalidade'])){
        $nacionalidade = $_POST['nacionalidade'];
        $id = $_POST['ID'];
        include_once('DataAccess.php');
        $da = new DataAccess();
        $res = $da->editarNacionalidade($id, $nacionalidade);
        echo "<script>alert('Nacionalidade editada com sucesso'); 
		window.location='inicialAdmin.php'</script>";
    }
    if(isset($_GET['i'])){
        $id = $_GET['i'];
        //ir buscar as informações do user
        $res = $da->getNacionalidade($id);
        $row = mysql_fetch_assoc($res);
		echo "
			<div class='large-75 medium-75 small-75'>    
				<form method='post' action='editarNacionalidade.php' 
					<div class='ink-form top-space'>        
						<fieldset>
							<h3>Editar Nacionalidade</h3>
							<input type='hidden' name='ID' value='$id'/>
								<div class='control-group'>
									<div class='control large-33'>
										Nacionalidade
										<input id='nacionalidade' name='nacionalidade' required value='".$row['nacionalidade']."' type='text' placeholder='Nacionalidade'/>
									</div>
                                                                </div>
								<div class='control-group>
									<div class='vertical-space'>
										<input type='submit' value='Editar' class='ink-button black' required>
									</div>
								</div>
						</fieldset>
					</div>
				</form>
			</div>
		";
    }
?>
