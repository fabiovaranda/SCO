<?php
    function verFormularioCriarAuto(){
    include_once 'DataAccess.php';
    $da = new DataAccess();
    $res = $da->getLastAuto();
    $row = mysql_fetch_object($res);
    echo "<form method='post' action='Auto111.php' class='ink-form'>
			<div class='large-75 medium-75 small-100'>
				<div class='ink-grid'>
					<fieldset>
						<legend>Criar Auto Viol. Dev. Coop 111º</legend>
                                                N.º Auto: $row->numeroAuto PCO N.º $row->Descricao
						<div class='control-group'>
							<div class='control large-33'>
								<label for='name'>Número do Auto</label>
								<input type='text' name='numeroAuto' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Data</label>
								<input type='date' name='data' placeholder='aaaa-mm-dd' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Nome do Autoado</label>
								<input type='text' name='nomeAutoado' required>
							</div>
						</div>
						
						<div class='control-group'>
								<div class='control large-33'>
										<label for='name'>Contribuinte Fiscal</label>
										<input type='text' name='contribuinteFiscal' required>
								</div>
								<div class='control large-66'>
										<label for='name'>Morada</label>
										<input type='text' size='20' name='morada' required>
								</div>
                                                </div>
                                                <div class='control-group'>
								<div class='control large-50'>
										<label for='name'>Local Procedente</label>
										<input type='text' name='localProcedente'  required>
								</div>
								<div class='control large-50'>
										<label for='name'>Numero de Voo</label>
										<input type='text' name='numeroVoo' required>
								</div>
                                                </div>
                                                <div class='control-group'>
                                                        <div class='control large-100'>
                                                            <label for='name'>Material que Transportava</label>
                                                            <textarea id='area' cols='50' rows='4' name='materialQueTransportava' required></textarea>
                                                            
                                                        </div>
								
						</div>
						<div class='control-group'>
								<div class='control large-33'>
										<label for='name'>Reexportação ou Inutilização</label>
										<option value='-1'></option>
										<select name='reexportacaoInutilizacao'> 
											<option value='-1'></option>
											<option value='reexportacao'>Reexportação</option>
											<option value='inutilizacao'>Inutilização</option> 											
										</select>
								</div>
								<div class='control large-33'>
										<label for='name'>Numero de Auto de Retenção</label>
										<input type='text' name='numAutoRetencao' required>
								</div>
								<div class='control large-33'>
										<label for='name'>Resposta de Entidade</label>
										<input type='text' name='respostaEntidade' required>
								</div>
								
						</div>
						<div class='control-group'>
								<div class='control large-33'>
										<label for='name'>Numero do Ofício</label>
										<input type='text' name='numOficio' required>
								</div>
								<div class='control large-33'>
										<label for='name'>Data do Ofício</label>
										<input type='date' name='dataOficio' required>
								</div>
								<div class='control large-33'>
										<label for='name'>Data da Receção do oficio</label>
										<input type='date' name='dataRececaoOficio' required>
								</div>
						</div>
                                                <div class='control-group'>
                                                <div class='control large-33'>
                                                            <label for='name'>Processo de contraordenação nº</label>
                                                            <input type='text' placeholder='xxx/".date('Y')."' name='numProcessoContraOrdenacao' required>
                                
                                                        </div>
                                                </div>
						<div class='vertical-space'>
								<input type='submit' value='Criar' class='ink-button black pull-right'>
								
						</div>
					</fieldset>
				</div>
			</div>
		</form>";
}

    function verFormularioEditarAuto($id){
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->getAuto($id);
		$row = mysql_fetch_assoc($res);
		echo "<form method='post' action='Auto111.php' class='ink-form'>
		<div class='large-75 medium-75 small-100'>
			<div class='ink-grid'>
				<fieldset>
					<legend>Editar Auto Viol. Dev. Coop 111º</legend>
					<div class='control-group'>
						<div class='control large-33'>
						<input type = 'hidden' name = 'id' value = '$id'/>
							<label for='name'>Número do Auto</label>
							<input type='text' value='".$row['Descricao']."' name='numeroAuto'required>
						</div>";
						$row = mysql_fetch_assoc($res); 
						
						echo "
						<div class='control large-33'>
							<label for='name'>Data</label>
							<input type='date' value='".$row['Descricao']."' name='data' placeholder='aaaa-mm-dd' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
							<label for='name'>Nome do Autoado</label>
							<input type='text' value='".$row['Descricao']."' name='nomeAutoado' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
					</div>
					<div class='control-group'>
						<div class='control large-33'>
								<label for='name'>Contribuinte Fiscal</label>
								<input type='text' value='".$row['Descricao']."' size='20' name='contribuinteFiscal' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-66'>
								<label for='name'>Morada</label>
								<input type='text' value='".$row['Descricao']."' name='morada' required>
						</div>
                                        </div>";
						$row = mysql_fetch_assoc($res);
						echo "
                                        <div class='control-group'>
						<div class='control large-50'>
								<label for='name'>Local Procedente</label>
								<input type='text' value='".$row['Descricao']."' name='localProcedente' placeholder='dd-mm-aaaa' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-50'>
								<label for='name'>Numero de Voo</label>
								<input type='text'  value='".$row['Descricao']."' size='50' name='numeroVoo' required>
						</div>
                                        </div>";
						$row = mysql_fetch_assoc($res);
						echo "
					<div class='control-group'>
                                                                <div class='control large-100'>
                                                                       <label for='name'>Material que Transportava</label>
                                                                       <textarea id='area' cols='50' rows='4' name='materialQueTransportava' required>".$row['Descricao']."</textarea>
                                                               </div>";
						$row = mysql_fetch_assoc($res);
						echo "
					</div>
					<div class='control-group'>
						<div class='control large-33'>
						
								<label for='name'>Reexportação ou Inutilização</label>
								<option value='".$row['Descricao']."' name='reexportacaoInutilizacao' required></option>
								<select name='reexportacaoInutilizacao'> 
									<option value='-1'></option>";
									
										if ($row['Descricao'] == 'reexportacao'){
											echo "<option value='reexportacao' selected>Reexportação</option> 
												  <option value='inutilizacao'>Inutilização</option> 	";
										}else{
											echo "<option value='reexportacao' >Reexportação</option> 
												  <option value='inutilizacao' selected>Inutilização</option> 	";
										}							
								echo "</select>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
								<label for='name'>Numero de Auto de Retenção</label>
								<input type='text' value='".$row['Descricao']."' name='numAutoRetencao' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
								<label for='name'>Resposta de Entidade</label>
								<input type='text' value='".$row['Descricao']."' name='respostaEntidade' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
					</div>
					<div class='control-group'>
						<div class='control large-33'>
								<label for='name'>Numero do Ofício</label>
								<input type='text' value='".$row['Descricao']."' name='numOficio' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
								<label for='name'>Data do Ofício</label>
								<input type='date' value='".$row['Descricao']."' name='dataOficio' required>
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
								<label for='name'>Data da receção do ofício</label>
								<input type='date' value='".$row['Descricao']."' name='dataRececaoOficio' required>
						</div>";
						echo "
					</div>
                                        <div class='control-group'>";
                                                $row = mysql_fetch_assoc($res);
                                                echo"
                                                <div class='control large-33'>
                                                    <label for='name'>Processo de contraordenação nº</label>
                                                        <input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao' required>
                                                </div>
                                        </div>
					<div class='vertical-space'>
						<a target='_blank' href='pdfAuto111.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>
						<input type='submit' value='Editar' class='ink-button black pull-right'>
					</div>
				</fieldset>
			</div>
		</div>
	</form>";
	
	}
	
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}
	else{
		verFormularioCriarAuto();
	}
?>
