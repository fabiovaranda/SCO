<?php
function verFormularioCriarAuto(){
    include_once 'DataAccess.php';
        $da = new DataAccess();
        $res = $da->getLastAuto();
        $row = mysql_fetch_object($res);
		echo "<div class='large-75 medium-75 small-100'>
				<div class='ink-grid'>
					<form method='post' action='Auto108a.php' class='ink-form'>
						<fieldset>
							<legend>Criar Auto 108a</legend>
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
									<label for='name'>Hora</label>
									<input type='time' name='hora' required>
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
							</div>
							<div class='control-group'>
								<div class='control large-33'>
									<label for='name'>Número do Passaporte</label>
									<input type='text' size='20' name='numPassaporte'required>
								</div>
								<div class='control large-33'>
									<label for='name'>Data de Emissão do Passaporte</label>
									<input type='date' name='dataEmissaoPassaporte' placeholder='dd-mm-aaaa' required>
								</div>
								<div class='control large-33'>
									<label for='name'>Data de Nascimento</label>
									<input type='date' name='dataNascimento' required>
								</div>
								
							</div>
							<div class='control-group'>
								<div class='control large-70'>
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
									<label for='name'>Data do Voo</label>
									<input type='date' name='dataVoo' required>
								</div>
								<div class='control large-33'>
                                    <label for='name'>Separado</label>
                                    <select name='separadorBagagem'>
                                        <option value='-1'></option>";
										include_once('DataAccess.php');
										$da = new DataAccess();
										$res = $da->getNomesUtilizadores();
										while ($row = mysql_fetch_array($res)) {
											echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
										}
							  echo "</select>
                                </div>";
                                echo"
                                <div class='control large-33'>
                                    <label for='name'>Revisão</label>
									<select name='revisorBagagem'>
										<option value='-1'></option>";                               
										$res = $da->getNomesUtilizadores();
										while ($row = mysql_fetch_array($res)) {
											echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
										}
										echo"
									</select>
								</div>
							</div>
							 
							<div class='control-group'>
								<div class='control large-90'>
									<label for='name'>Descrição</label>
									<textarea id='area' cols='70' rows='8' name='descricao'>
Procedeu-se à revisão da referida bagagem, ao abrigo dos artigos n.º 13º e 37.º n.º 1 do Código Aduaneiro Comunitário (CAC), aprovado pelo Reg. (CEE) n.º 2913/92, de 12 de Outubro, tendo-se detectado o seguinte: (PREENCHER).
Com a conduta descrita o passageiro evitava o pagamento de (PREENCHER) (extenso) a título de imposições aduaneiras devidas pela introdução em consumo da mercadoria, nos termos do art. 79.º do CAC, de acordo com o mapa da dívida que se anexa e faz parte integrante do presente Auto.
									</textarea>
								</div>
                                                                <div class='control-group'>
								<div class='control large-30'>
									<label for='name'>Processo de contraordenação nº</label>
									<input type='text' name='numProcessoContraOrdenacao' placeholder='xxx/".date('Y')."' required>
								</div>
							</div>
								<div class='control large-90'>
									<label for='name'>Descrição Específica Descaminho</label>
									<textarea id='area' cols='70' rows='10' name='descricaoEspecificaDescaminho' required>
O passageiro declarou que a mercadoria seria destinada a Angola e, como tal, alvo de reexportação, pelo que foi emitido o ticket nº (PREENCHER), para a mercadoria em causa ficando a mesma sob controlo aduaneiro.
Ou
Foi processada a declaração Verbal n.º (PREENCHER), no valor de (PREENCHER), pelo pagamento das imposições aduaneiras devidas pela introdução em consumo da mercadoria.
Ou
Foi emitido o Separado de Bagagem n.º (PREENCHER), encontrando-se em curso o prazo para o cumprimento das formalidades aduaneiras previsto na alínea b) do n.º 1 art. 49.º do CAC.
									</textarea>
								</div>
							</div>
							
							<div class='vertical-space'>
								<input type='submit' value='Criar' class='ink-button black pull-right'>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		";
	}

function verFormularioEditarAuto($id){
	include_once('DataAccess.php');
	$da = new DataAccess();
	$res = $da->getAuto($id);
	$row = mysql_fetch_assoc($res); //n.º do auto
	 echo "<div class='large-75 medium-75 small-100'>
                    <div class='ink-grid'>
                        <form method='post' action='Auto108a.php' class='ink-form'>
                            <fieldset>
                            <legend>Editar Auto 108a</legend>
                            <div class='control-group'>
                                <div class='control large-33'>
                                    <input type='hidden' name='id' value='$id'/>
                                    <label for='name'>Número do Auto</label>
                                    <input type='text' value='".$row['Descricao']."' name='numeroAuto' required>
                                </div>";
                                $row = mysql_fetch_assoc($res);//data                        
                          echo "<div class='control large-33'>
                                        <label for='name'>Data</label>
                                        <input type='date' value='".$row['Descricao']."' name='data' placeholder='aaaa-mm-dd' required>
                                </div>";
                            $row = mysql_fetch_assoc($res);//data por extenso
			    $row = mysql_fetch_assoc($res);//hora
	echo "                  <div class='control large-33'>
                                        <label for='name'>Hora</label>
                                        <input type='time' value='".$row['Descricao']."' name='hora' required>
                                </div>
			     </div>";
			     $row = mysql_fetch_assoc($res); //nome do autoado
	echo "
				<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Nome do Autoado</label>
						<input type='text' value='".$row['Descricao']."' name='nomeAutoado' required>
					</div>";
                                        $row = mysql_fetch_assoc($res);//id da nacionalidade escolhida
                                   echo "<div class='control large-33'>
                                                <label for='name'>Nacionalidade</label>
                                                <select name='nacionalidade'>
                                                    <option value='-1'></option>";
                                                        $resNacionalidade = $da->getNacionalidades();
                                                        while ($rowNacionalidade = mysql_fetch_array($resNacionalidade)) {
                                                            if ($row['Descricao'] == $rowNacionalidade['id'])
                                                                echo "<option value='" . $rowNacionalidade['id'] . "' selected>" . $rowNacionalidade['nacionalidade'] . "</option>";
                                                            else
                                                                echo "<option value='" . $rowNacionalidade['id'] . "'>" . $rowNacionalidade['nacionalidade'] . "</option>";
                                                        }
                                            echo "</select>
                                            </div>
                                        </div>
         ";
					$row = mysql_fetch_assoc($res);//n.º do passaporte
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Número do Passaporte</label>
						<input type='text' value='".$row['Descricao']."' size='20' name='numPassaporte' required>
					</div>
	";
					$row = mysql_fetch_assoc($res);// data de emissão do Passaporte
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Data de emissão do Passaporte</label>
						<input type='date' value='".$row['Descricao']."' name='dataEmissaoPassaporte' required>
					</div>
				
	";
					$row = mysql_fetch_assoc($res);// data de nascimento
	echo "
                                        <div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Data de Nascimento</label>
						<input type='date' value='".$row['Descricao']."' name='dataNascimento' required>
					</div>
                                       
	";
					$row = mysql_fetch_assoc($res);// morada
	echo "
					<div class='control-group'>
                                        <div class='control large-70'>
						<label for='name'>Morada</label>
						<input type='text' value='".$row['Descricao']."' size='50' name='morada' required>
					</div>
                                        
	";
					$row = mysql_fetch_assoc($res);// local Procedente
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Local Procedente</label>
						<input type='text' value='".$row['Descricao']."' name='localProcedente' required>
					</div>
				
	";
					$row = mysql_fetch_assoc($res);// Numero de voo
	echo "
				<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Número do voo</label>
						<input type='text' value='".$row['Descricao']."' name='numeroVoo' required>
					</div>
	";
					$row = mysql_fetch_assoc($res);//contramarca fiscal
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Contramarca Fiscal</label>
						<input type='text' value='".$row['Descricao']."' name='contramarcaFiscal' required>
					</div>
	";
					$row = mysql_fetch_assoc($res);// data do voo
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
						<label for='name'>Data do Voo</label>
						<input type='text' value='".$row['Descricao']."' name='dataVoo' required>
					</div>
	";
                                        $row = mysql_fetch_assoc($res);// técnico separador de bagagem
        echo"
                                    <div class='control large-33'>
                                    <label for='name'>Separado</label>
                                    <select name='separadorBagagem'>
                                        <option value='-1'></option>
         "; 
                                        $resNUtilizadores = $da->getNomesUtilizadores();
                                        while ($rowNUtilizadores = mysql_fetch_assoc($resNUtilizadores)) {
                                            if ($row['Descricao'] == $rowNUtilizadores['id'])
                                                echo "<option value='" . $rowNUtilizadores['id'] . "' selected>" . $rowNUtilizadores['nome'] . "</option>";
                                             else
                                                 echo "<option value='" . $rowNUtilizadores['id'] . "'>" . $rowNUtilizadores['nome'] . "</option>";
                                        }
                                        
	 echo "                     </select>
                                </div>";
                                    $row = mysql_fetch_assoc($res);
        echo"
                                    <div class='control large-33'>
                                    <label for='name'>Revisão</label>  
									<select name='revisorBagagem'>
										<option value='-1'></option>";                               
										$resRevisorBag = $da->getNomesUtilizadores();
                                                                                        while ($rowRevisorBag = mysql_fetch_array($resRevisorBag)) {
                                                                                    if ($row['Descricao'] == $rowRevisorBag['id'])
											echo "<option value='" . $rowRevisorBag['id'] . "' selected>" . $rowRevisorBag['nome'] . "</option>";
                                                                                     else
                                                                                        echo "<option value='" . $rowRevisorBag['id'] . "'>" . $rowRevisorBag['nome'] . "</option>";
										}
	echo"
									</select>
								</div>
							</div>
           ";
        
					$row = mysql_fetch_assoc($res);
	echo "
					<div class='control-group'>
                                        <div class='control large-90'>
							<label for='name'>Descrição</label>
							<textarea id='area' cols='50' rows='6' name='descricao' required>".$row['Descricao']."</textarea>
						</div>
					</div>
	";
					$row = mysql_fetch_assoc($res);
	echo "
					<div class='control-group'>
                                        <div class='control large-33'>
							<label for='name'>Processo de contraordenação nº</label>
							<input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao' required>
						</div>
					</div>
	";
					$row = mysql_fetch_assoc($res);
	echo "
					<div class='control-group'>
                                        <div class='control large-90'>
							<label for='name'>Descrição Especifica Descaminho</label>
							<textarea id='area' cols='50' rows='6' name='descricaoEspecificaDescaminho' required>".$row['Descricao']."</textarea>
						</div>
					</div>
					<div class='vertical-space'>
							<a target='_blank' href='pdfAuto108a.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>
							<input type='submit' value='Editar' class='ink-button black pull-right'>
                                                        
							
					</div>
				</div>
			</div>
		</form>
	";
	}
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}
        else{
		verFormularioCriarAuto();
	}
?>