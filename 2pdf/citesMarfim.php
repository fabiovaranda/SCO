<?php
	
	include_once('horaExtenso.php');
	include_once('DataAccess.php');
	$da = new DataAccess();
        //$da = lowerN();
	$id = $_GET['i'];
	$res = $da->getAuto($id);
	$row = mysql_fetch_assoc($res);
	$numeroAuto = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$data = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$dataExtenso = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$hora = horaParaExtenso($row['Descricao']);
	
	$Tecnico = $da->getTecnico($id);
        $row = mysql_fetch_assoc($Tecnico);
        $nomeTecnico = $row['nome'];
        $catTecnico = $row['categoria'];
	
       
        
	$row = mysql_fetch_assoc($res);
	$nomeAutoado = $row['Descricao'];
         $row = mysql_fetch_assoc($res);
        $nacionalidade = $row['Descricao'];
        $nacionalidade = $da->getNacionalidade($nacionalidade); 
           
	$row = mysql_fetch_assoc($res);
	$numPassaporte = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$dataEmissaoPassaporte = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$dataNascimento = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$morada = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$localProcedente = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$numeroVoo = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$contramarcaFiscal = $row['Descricao'];
        $row = mysql_fetch_assoc($res);
        $revisorBagagem = $row['Descricao'];
        $TecnicoRevisorBagagem = $da->getUtilizador($revisorBagagem);
        $rowTecnicoRevisorBagagem = mysql_fetch_assoc($TecnicoRevisorBagagem);
        $TecnicoRevisorBagagem = $rowTecnicoRevisorBagagem['nome'];
        $catTecnicoRevisorBagagem = $rowTecnicoRevisorBagagem['cat'];
	$row = mysql_fetch_assoc($res);
	$materialQueTransportava = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$tituloDeposito = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$dataTituloDeposito = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$idUtilizador = $row['Descricao'];
        $row = mysql_fetch_assoc($res);
        $numProcessoContraOrdenacao = $row['Descricao'];
	
        
	echo "
	<html>
		<body>
			<br/><br/><br/>
			<table style='width:500px'>
				<tr>
					<td >
						<table width='500px'  cellpadding='0' cellspacing='0'>
							<tr>
								<td width='200px'>
									<img src='imagens/LogoPequeno.png' style='width:200px'/>
								</td>
								<td width='300px' align='right'>
									<table cellpadding='0' cellspacing='0'>
									<tr>
										<td align='right'>
										<small> Classificação: 215.10.02<br/> Seg.: Pública <br/> Proc.: $numProcessoContraOrdenacao</small>
										</td>
									</tr>
									<tr>
										<td>
											<img src='imagens/bar.png' style='width:470px'/>
											<br/> 
											<small>Alfândega do Aeroporto de Lisboa</small>
										</td>
									</tr>
								</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
                <tr>
					<td align='center'><br/><br/><b>AUTO DE NOTÍCIA Nº $numeroAuto</b></td>
				</tr>
            <tr>
					<td>
						<p align='justify'> $dataExtenso, pelas $hora, encontrando-me eu, $nomeTecnico, $catTecnico, em serviço na Sala de Controlo de Passageiros e Bagagem da 
						Alfândega do Aeroporto de Lisboa, compareceu perante mim <b>$nomeAutoado</b>, 
						portador do passaporte <b>$nacionalidade</b> n.º <b>$numPassaporte</b>, emitido a $dataEmissaoPassaporte, nascido em $dataNascimento, 
						residente em $morada. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> O passageiro era procedente de $localProcedente, no voo $numeroVoo, contramarca fiscal $contramarcaFiscal. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> O passageiro apresentou-se no Circuito Verde ou 'nada a declarar', previsto no Artº 233, nº1 a) do Regulamento (CEE) nº 2454/93 da Comissão,
						de 2 de Julho de 1993 (Disposições de Aplicação do Código Aduaneiro Comunitário), onde foi seleccionada para efeitos de revisão da sua bagagem, tendo esta sido
						efectuada pelo $catTecnico $TecnicoRevisorBagagem. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> Na bagagem do referido passageiro foi detectado o seguinte: <b>$materialQueTransportava</b>. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> Esta mercadoria encontra-se inscrita no <b>Anexo II</b> da Convenção de Washington <b>(CITES)</b>, Decreto-Lei nº 50/80,
						sendo transportados em violação desta convenção e do dispositivo no Decreto-Lei nº 114/90 de 5 de Abril.   </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> Foi emitido para a referida mercadoria, o Título de Depósito n.º $tituloDeposito de $dataTituloDeposito, que irá ser entregue ao CITES. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'> E, nada mais havendo a acrescentar, se encerra o presente Auto que, depois de lido e achado conforme, vai ser devidamente assinado
						pelos intervenientes. </p>
					</td>
				</tr>
				
				
			</table>
			<page_footer>
                <small><hr style='height:1px'/></small>
                <table>
                <tbody>
                <tr>
                <td>
                <small>Aeroporto de Lisboa - Terminal de Carga, Edifício 134 1750-364 Lisboa</small>
                <br/>
                <small>Email: aalisboa-sb@at.gov.pt</small>
                </td>
                <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>
                <small>Tel:(+351)210030080</small>
                <small>Fax:(+351)210037777</small>
                <br/>
                <small>www.portaldasfinancas.gov.pt</small>
                </td>
                </tr>
                </tbody>
                </table>
            </page_footer>
		</body>
	</html>
	";
?>

