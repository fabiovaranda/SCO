<?php
	function verFormularioCriarAuto(){
		echo "<form method='post' action='AutoCitesMarfim.php'  class='ink-form'>
                        <fieldset>
                            <div class='large-100'>
                                <div class='ink-grid'>
                                    <div class='control-group'>
                                        <div class='large-75 medium-75 small-75'>
                                            <legend>Criar Auto Cites Marfim</legend>
                                        </div>
                                    </div>
                                    
		<div class='control-group'>
                    <div class='control large-33'>
                        <label for='name'>Número do Auto</label>
                            <input type='text' name='numeroAuto'required>
                    </div>
			<div class='control large-33'>
                            <label for='name'>Data</label>
				<input type='date' name='data' placeholder='aaaa-mm-dd'required>
			</div>
                            <div class='control large-33'>
                                 <label for='name'>Hora</label>
                                    <input type='time' name='hora' placeholder='hh:mm'required>
                            </div>
		</div>
                
                    <div class='control-group'>
                        <div class='control large-33'>
                            <label for='name'>Nome do Autoado</label>
                                <input type='text' name='nomeAutoado'required>
                        </div>
                            <div class='control large-33'>
                                <label for='name'>Nacionalidade</label>
                                    <select name='nacionalidade'>
                                        <option value='-1'></option> 
                            ";
                                                include_once('DataAccess.php');
                                                $da = new DataAccess();
                                                $res = $da->getNacionalidadesVisiveis();
                                                while ($row = mysql_fetch_array($res)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['nacionalidade'] . "</option>";
                                                }
                                                echo"
                                    </select>
                            </div>
                                <div class='control large-33'>
                                    <label for='name'>Numero do Passaporte</label>
                                        <input type='text' size='20' name='numPassaporte'required>
                                </div>

                    </div>
                    
                        <div class='control-group'>
                            <div class='control large-33'>
                                <label for='name'>Data de emissão do Passaporte</label>
                                <input type='date' name='dataEmissaoPassaporte'required>
                            </div>
                                <div class='control large-33'>
                                    <label for='name'>Data de Nascimento</label>
                                    <input type='date' name='dataNascimento'required>
                                </div>
                        </div>
                        
                            <div class='control-group'>
                                <div class='control large-66'>
                                    <label for='name'>Morada</label>
                                    <input type='text' name='morada'required>
                                </div>
                                    <div class='control large-33'>
                                        <label for='name'>Local Procedente</label>
                                            <input type='text' name='localProcedente'required>
                                    </div>
                            </div>
                            
                                <div class ='control-group'>
                                        <div class='control large-33'>
                                            <label for='name'>Número do voo</label>
                                            <input type='text' name='numeroVoo'required>
                                        </div>
                                            <div class='control large-33'>
                                                <label for='name'>Contramarca Fiscal</label>
                                                <input type='text' name='contramarcaFiscal'required>
                                            </div>       
                                                <div class='control large-33'>
                                                    <label for='name'>Técnico Revisor de Bagagem</label>
                                                        <select name='revisorBagagem'>
                                                            <option value='-1'></option>
                                                    ";
                                                include_once('DataAccess.php');
                                                $da = new DataAccess();
                                                $res = $da->getNomesUtilizadores();
                                                while ($row = mysql_fetch_array($res)) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                                                }
                                                echo"
                                                        </select>
                                                </div>";
                                                echo"
                            </div>
                            
                                <div class='control-group'>
                                    <div class='control large-90'>
                                        <label for='name'>Material Que Transportava</label>                                       
										<textarea id='area' cols='50' rows='6' name='materialQueTransportava' required></textarea>
                                    </div>
									
                                </div>
								<div class='control-group'>
                                    
									<div class='control large-33'>
										<label for='name'>Título de depósito nº</label>
										<input type='text' name='tituloDeposito'required>
									</div>
									<div class='control large-33'>
										<label for='name'>Data do título de Depósito</label>
										<input type='date' name='dataTituloDeposito'required>
									</div>
                                                                        <div class='control large-33'>
                                                                                <label for='name'>Processo de contraordenação nº</label>
                                                                                <input type='text' placeholder='xxx/".date('Y')."' name='numProcessoContraOrdenacao' required>
                                
                                                                        </div>
                                </div>
                                
                                    <div class='vertical-space'>
                                        <input type='submit' value='Criar' class='ink-button black pull-right'>
                                    </div>
                                </div>
                            </div>
                          </fieldset>
                        </form>";
}

function verFormularioEditarAuto($id){
		include_once('DataAccess.php');
		$da = new DataAccess();
		$res = $da->getAuto($id);
		$row = mysql_fetch_assoc($res);
		echo "
		<form method='post' action='AutoCitesMarfim.php' class='ink-form'>
                    <fieldset>
			<div class='large-100'>
                            <div class='ink-grid'>
                                    <div class='control-group'>
                                        <div class='large-75 medium-75 small-75'>
                                            <legend> Editar Auto Cites Marfim</legend>
                                            <input type = 'hidden' name ='id' value ='$id'>
                                        </div>
                                    </div>
					<div class='control-group'>
                                            <div class='control large-33'>
                                                <label for='name'>Número do Auto</label>
                                                <input type='text' value='".$row['Descricao']."' name='numeroAuto' required />
                                            </div>";
						$row = mysql_fetch_assoc($res); 
						echo "
                                                        <div class='control large-33'>
                                                                <label for='name'>Data</label>
                                                                <input type='date' value='".$row['Descricao']."' name='data' placeholder='aaaa-mm-dd' required />
                                                        </div>";
						$row = mysql_fetch_assoc($res);
						$row = mysql_fetch_assoc($res);
						echo "
							<div class='control large-33'>
								<label for='name'>Hora</label>
								<input type='time' value='".$row['Descricao']."' name='hora' required />
							</div>
					</div>";
					$row = mysql_fetch_assoc($res);
					echo "
					<div class='control-group'>
						<div class='control large-33'>
							<label for='name'>Nome do Autoado</label>
							<input type='text' value='".$row['Descricao']."' name='nomeAutoado' required />
						</div>";
					$row = mysql_fetch_assoc($res);
                                                            echo "
                                                                <div class='control large-33'>
                                                                    <label for='name'>Nacionalidade</label>
                                                                        <select name='nacionalidade'>
                                                                        <option value='-1'></option>
                                                            ";

                                                            $resN = $da->getNacionalidades();
                                                            while ($rowN = mysql_fetch_array($resN)) {
                                                                if ($row['Descricao'] == $rowN['id'])
                                                                    echo "<option value='" . $rowN['id'] . "' selected>" . $rowN['nacionalidade'] . "</option>";
                                                                else
                                                                    echo "<option value='" . $rowN['id'] . "'>" . $rowN['nacionalidade'] . "</option>";
                                                            }
                                                            echo"
                                                                                        </select>
                                                                                </div>";
                                                $row = mysql_fetch_assoc($res);
                                            echo "
						<div class='control large-33'>
							<label for='name'>Passaporte Nº</label>
							<input type='text' value='".$row['Descricao']."' size='20' name='numPassaporte' required />
						</div>
					</div>";
					$row = mysql_fetch_assoc($res);
					echo "
					<div class='control-group'>
						<div class='control large-33'>
							<label for='name'>Data de emissão do Passaporte</label>
							<input type='date' value='".$row['Descricao']."' name='dataEmissaoPassaporte' required />
						</div>";
						$row = mysql_fetch_assoc($res);
						echo "
						<div class='control large-33'>
							<label for='name'>Data de Nascimento</label>
							<input type='date' value='".$row['Descricao']."' name='dataNascimento' required /> 
						
                                                </div>
                                        </div>";			
						$row = mysql_fetch_assoc($res);
					echo "
					<div class='control-group'>
						<div class='control large-66'>
							<label for='name'>Morada</label>
							<input type='text' value='".$row['Descricao']."' size='50' name='morada' required />
						</div>";
                                                    $row = mysql_fetch_assoc($res);
                                                    echo"
                                                    <div class='control large-33'>
                                                            <label for='name'>Local Procedente</label>
                                                            <input type='text' value='".$row['Descricao']."' name='localProcedente' required />
                                                    </div>
                                                </div>";
                                                        $row = mysql_fetch_assoc($res);
                                                                 echo "
                                                            <div class='control-group'>     
                                                                 <div class='control large-33'>
                                                                         <label for='name'>Número do voo</label>
                                                                         <input type='text' value='".$row['Descricao']."' name='numeroVoo' required>
                                                                 </div>";
                                                                 $row = mysql_fetch_assoc($res);
                                                                 echo "
                                                                 <div class='control large-33'>
                                                                         <label for='name'>Contramarca Fiscal</label>
                                                                         <input type='text' value='".$row['Descricao']."' name='contramarcaFiscal'required>
                                                                 </div>";		
                                                          $row = mysql_fetch_assoc($res);
                                                            echo "
                                                                                <div class='control large-33'>
                                                                                    <label for='name'>Técnico Revisor de Bagagem</label>
                                                                                        <select name='revisorBagagem'>
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
                                                    <div class='control large-33'>
                                                        <label for='name'>Material Que Transportava</label>
                                                            <input type='text' value='".$row['Descricao']."' name='materialQueTransportava' required />
                                                    </div>";
						$row = mysql_fetch_assoc($res);
                                                echo "
						
                                                        <div class='control large-33'>
                                                            <label for='name'>Título de depósito nº</label>
                                                                <input type='text' value='".$row['Descricao']."' name='tituloDeposito' required />
                                                        </div>";
                                                $row = mysql_fetch_assoc($res);
                                                echo "
							<div class='control large-33'>
                                                            <label for='name'>Data do título de Depósito</label>
								<input type='date' value='".$row['Descricao']."' name='dataTituloDeposito' required />
							</div>
						</div>";
                                                $row = mysql_fetch_assoc($res);
                                                echo "
                                                                <div class='control-group'>
                                                                    <div class='control large-33'>
                                                                        <label for='name'>Processo de contraordenação nº</label>
                                                                            <input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao' required>
                                                                    </div>
						<div class='vertical-space'>
                                                
							<input type='submit' value='Editar' class='ink-button black pull-right' />	
							<a target='_blank' href='pdfCitesMarfim.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>								
						</div>
					</div>
				</div>
			</div>
                </fieldset>
		</form>
		";	
}
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}else{
		verFormularioCriarAuto();
	}
?>
