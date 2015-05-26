<?php
	function verFormularioCriarAuto(){
        include_once 'DataAccess.php';
        $da = new DataAccess();
        $res = $da->getLastAuto();
        $row = mysql_fetch_object($res);
		echo "<form method='post' action='AutoDinheiro108n6.php' class='ink-form'>
			<div class='large-75 medium-75 small-100'>
				<div class='ink-grid'>
					<fieldset>
						<legend>Criar Auto Dinheiro 108º n.º6</legend>
                                                    N.º Auto: $row->numeroAuto PCO N.º $row->Descricao
							<div class='control-group'>
								<div class='control large-33'>
									<label for='name'>Número do Auto</label>
									<input type='text' name='numeroAuto' required>
								</div>
								<div class='control large-33'>
									<label for='name'>Data</label>
									<input type='date' name='data' placeholder='aaaa/mm/dd' required>
								</div>
								<div class='control large-33'>
									<label for='name'>Hora</label>
									<input type='time' name='hora' placeholder='hh:mm' required>
								</div>
							</div>
							<div class='control-group'>
								<div class='control large-33'>
									<label for='name'>Nome do Autoado</label>
									<input type='text' name='nomeAutoado' required>
								</div>
								<div class='control large-33'>			
									<label for='name'>Nacionalidade</label>
									<select name='nacionalidade'>
									 <option value='-1'></option>";
										include_once 'DataAccess.php';
										$da = new DataAccess();
										$resTR = $da->getNacionalidadesVisiveis();
										while($rowTR = mysql_fetch_object($resTR)){
												echo "<option value='$rowTR->id'>$rowTR->nacionalidade</option>";
										}
									echo "</select>
									</select>
								</div>
								<div class='control large-33'>
									<label for='name'>Número do Passaporte</label>
									<input type='text' size='20' name='numPassaporte' required>
								</div>
								
							</div>
							<div class='control-group'>
								<div class='control large-33'>
									<label for='name'>Data de Emissão do Passaporte</label>
									<input type='date' name='dataEmissaoPassaporte' placeholder='dd/mm/aaaa' required>
								</div>
								<div class='control large-33'>
									<label for='name'>Data de Nascimento</label>
									<input type='date' name='dataNascimento' required>
								</div>
								
							</div>
							
							<div class='control-group'>
								
								<div class='control large-100'>
									<label for='name'>Morada</label>
									<input type='text' name='morada' required>
								</div>
							</div>
							<div class='control-group'>
									<div class='control large-33'>
										<label for='name'>Local Procedente</label>
										<input type='text' name='localProcedente' required>
									</div>
									<div class='control large-33'>
										<label for='name'>Número do voo</label>
										<input type='text' name='numeroVoo' required>
									</div>
									<div class='control large-33'>
										<label for='name'>Contramarca Fiscal</label>
										<input type='text' name='contramarcaFiscal' required>
									</div>
							</div>
							<div class='control-group'>
								<div class='control large-33'>
										<label for='name'>Data voo</label>
										<input type='date' name='dataVoo' required>
								</div>
								<div class='control large-33'>			
										<label for='name'>Separado</label>
										<select name='tecnicoSeparador'>
												 <option value='-1'></option>";
													//ir à bd buscar todos os técnicos
													include_once 'DataAccess.php';
													$da = new DataAccess();
													$resTR = $da->getUtilizadores();
													while($rowTR = mysql_fetch_object($resTR)){
															echo "<option value='$rowTR->id'>$rowTR->nome</option>";
													}
												echo "</select>
										</select>
								</div>
								<div class='control large-33'>									
										<label for='name'>Revisão</label>
										<select name='tecnicoRevisor'>
												 <option value='-1'></option>";
													//ir à bd buscar todos os técnicos
													$resTR = $da->getUtilizadores();
													while($rowTR = mysql_fetch_object($resTR)){
														echo "<option value='$rowTR->id'>$rowTR->nome</option>";
													}
								  echo "</select>
								</div>
							</div>
							<div class='control-group'>
								<div class='control large-100'>
									<label for='name'>Descrição</label>
									<textarea id='area' cols='50' rows='6' name='descricao' required></textarea>
								</div>
							</div>
							<div class='control-group'>
								<div class='control large-33'>
									<label for='name'>Processo de contraordenação nº</label>
									<input type='text' name='numProcessoContraOrdenacao' placeholder='xxx/".date('Y')."' required>
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
		$row = mysql_fetch_assoc($res);//num auto
		echo"<form method='post' action='AutoDinheiro108n6.php' class='ink-form'>
                        <div class='large-75 medium-75 small-100'>
                            <div class='ink-grid'>
                            <fieldset>
                        	<legend>Editar Auto Dinheiro 108º n.º6</legend>
                                 <div class='control-group'>
                                    <div class='control large-33'>
                                    <input type = 'hidden' name = 'id' value = '$id'/>
                                       <label for='name'>Número do Auto</label>
                                       <input type='text' value='".$row['Descricao']."' name='numeroAuto'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res); //data
                                    echo "
                                    <div class='control large-33'>
                                        <label for='name'>Data</label>
                                        <input type='date' value='".$row['Descricao']."' name='data' placeholder='aaaa/mm/dd'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);//data extenso
                                    $row = mysql_fetch_assoc($res);//hora
                                    echo "
                                    <div class='control large-33'>
                                        <label for='name'>Hora</label>
                                        <input type='time' value='".$row['Descricao']."' name='hora' placeholder='hh:mm' required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);//nome autoado
                                    echo "
                                </div>
								<div class='control-group'>
									<div class='control large-33'>
										<label for='name'>Nome do Autoado</label>
										<input type='text' value='".$row['Descricao']."' name='nomeAutoado'required>
									</div>";
                                    $row = mysql_fetch_assoc($res);//nacionalidade
                                    echo "
									<div class='control large-33'>			
										<label for='name'>Nacionalidade</label>
										<select name='nacionalidade'>
										 <option value='-1'></option>";
																							
											 $resN = $da->getNacionalidades();
                                                                                            while ($rowN = mysql_fetch_array($resN)) {
                                                                                                if ($row['Descricao'] == $rowN['id'])
                                                                                                    echo "<option value='" . $rowN['id'] . "' selected>" . $rowN['nacionalidade'] . "</option>";
                                                                                                else
                                                                                                    echo "<option value='" . $rowN['id'] . "'>" . $rowN['nacionalidade'] . "</option>";
                                                                                            }
										echo "</select>
										</select>										
									</div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo"
									<div class='control large-33'>
										<label for='name'>Número do Passaporte</label>
										<input type='text' value='".$row['Descricao']."' size='20' name='numPassaporte'required>
									</div>";
                                    $row = mysql_fetch_assoc($res);//data emissao passaporte
                                    echo "
								</div>
                                <div class='control-group'>
                                    <div class='control large-33'>
                                        <label for='name'>Data de Emissão do Passaporte</label>
                                        <input type='date' value='".$row['Descricao']."' name='dataEmissaoPassaporte'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
									 <div class='control large-33'>
                                        <label for='name'>Data de Nascimento</label>
                                        <input type='date' value='".$row['Descricao']."' name='dataNascimento'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
                                </div>
                                <div class='control-group'>
                                   
                                    <div class='control large-100'>
                                        <label for='name'>Morada</label>
                                        <input type='text' value='".$row['Descricao']."' size='30' name='morada'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
                                </div>
                                <div class='control-group'>
                                    <div class='control large-33'>
                                        <label for='name'>Local Procedente</label>
                                        <input type='text' value='".$row['Descricao']."' name='localProcedente'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
                                    <div class='control large-33'>
                                        <label for='name'>Número do voo</label>
                                        <input type='text' value='".$row['Descricao']."' name='numeroVoo'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
                                    <div class='control large-33'>
                                        <label for='name'>Contramarca Fiscal</label>
                                        <input type='text' value='".$row['Descricao']."' name='contramarcaFiscal'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
                                    echo "
                                </div>
                                <div class='control-group'>
                                    <div class='control large-33'>
                                        <label for='name'>Data voo</label>
                                        <input type='date' value='".$row['Descricao']."' name='dataVoo'required>
                                    </div>";
                                    $row = mysql_fetch_assoc($res);
    echo "
                    <div class='control-group'>
                        <div class='control large-33'>
                            <label for='name'>Separado</label>
                                <select name='tecnicoSeparador'>
                                    <option value='-1'></option>
    ";

                                $resNU = $da->getNomesUtilizadores();
                                while ($rowNU = mysql_fetch_array($resNU)) {
                                    if ($row['Descricao'] == $rowNU['id'])
                                        echo "<option value='" . $rowNU['id'] . "' selected>" . $rowNU['nome'] . "</option>";
                                    else
                                        echo "<option value='" . $rowNU['id'] . "'>" . $rowNU['nome'] . "</option>";
                                }
                                echo"
                                                            </select>
                                                    </div>";

                                $row = mysql_fetch_assoc($res);
                                echo "
                                                    <div class='control large-33'>
                                                        <label for='name'>Revisão</label>
                                                            <select name='tecnicoRevisor'>
                                                                <option value='-1'></option>
                                ";

                                $resNU = $da->getNomesUtilizadores();
                                while ($rowNU = mysql_fetch_array($resNU)) {
                                    if ($row['Descricao'] == $rowNU['id'])
                                        echo "<option value='" . $rowNU['id'] . "' selected>" . $rowNU['nome'] . "</option>";
                                    else
                                        echo "<option value='" . $rowNU['id'] . "'>" . $rowNU['nome'] . "</option>";
                                }
                                echo"
                                                            </select>
                                                    </div>
                                                </div>";
    
                                $row = mysql_fetch_assoc($res);
                                echo "
                                <div class='control-group'>
                                    <div class='control large-100'>
                                        <label for='name'>Descrição</label><br>
                                        <textarea id='area' cols='50' rows='6' name='descricao'required> ".$row['Descricao']."</textarea>
                                    </div>
                                </div>";
								$row = mysql_fetch_assoc($res);
                                echo "
                                <div class='control-group'>
                                    <div class='control large-33'>
                                        <label for='name'>Processo de contraordenação nº</label>
                                        <input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao'required>
                                    </div>
                                </div>
                                <div class='vertical-space'>
                                    <a target='_blank' href='pdfAutoDinheiro108n6.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>
                                    <input type='submit' value='Editar' class='ink-button black pull-right'>                                    
                                </div>
                        </div>
                </div>
</form>";
	
	}
	
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}else{
		verFormularioCriarAuto();
	}
?>