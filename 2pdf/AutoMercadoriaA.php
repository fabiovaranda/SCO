﻿<?php
	
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
        $dataVoo = $row['Descricao'];
        
        $row = mysql_fetch_assoc($res);
        $separadorBagagem = $row['Descricao'];
        $TecnicoSeparadorBagagem = $da->getUtilizador($separadorBagagem);
        $rowTecnicoSeparadorBagagem = mysql_fetch_object($TecnicoSeparadorBagagem);
        $TecnicoSeparadorBagagem = $rowTecnicoSeparadorBagagem->nome;
        $catTecnicoSeparadorBagagem = $rowTecnicoSeparadorBagagem->cat;

        $row = mysql_fetch_assoc($res);
        $revisorBagagem = $row['Descricao'];
        $TecnicoRevisorBagagem = $da->getUtilizador($revisorBagagem);
        $rowTecnicoRevisorBagagem = mysql_fetch_assoc($TecnicoRevisorBagagem);
        $TecnicoRevisorBagagem = $rowTecnicoRevisorBagagem['nome'];
        $catTecnicoRevisorBagagem = $rowTecnicoRevisorBagagem['cat'];

	$row = mysql_fetch_assoc($res);
	$descricao = $row['Descricao'];
        $row = mysql_fetch_assoc($res);
	$numProcessoContraOrdenacao = $row['Descricao'];
	$row = mysql_fetch_assoc($res);
	$descricaoEspecificoDescaminho = $row['Descricao'];
        $row = mysql_fetch_assoc($res);
        $SeparadoBagagem = $row['Descricao'];
	echo "
	<html>
		<body>
			<br/><br/><br/>
			<table style='width:500px'>
				<tr>
                                    <td>
                                        <table style='width:100%'>
                                            <tr>
                                                <td><img src='imagens/LogoPequeno.png' style='width:200px'/></td>
                                                <td align='right'>
                                                    <table style='width:100%'>
                                                        <tr>
                                                            <td>
                                                            <small> Classificação: 215.10.02<br/> Seg.: Pública <br/> Proc.: $numProcessoContraOrdenacao</small>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <img src='imagens/bar.png' />
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
						Alfândega do Aeroporto de Lisboa, compareceu perante mim <b>$nomeAutoado</b> de nacionalidade <b>$nacionalidade</b>, 
						portador do Passaporte n.º <b>$numPassaporte</b>, emitido a $dataEmissaoPassaporte, nascido em $dataNascimento, 
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
						<p align='justify'> Tendo-se apresentado no Canal Verde, foi o mesmo separado para revisão da sua bagagem pelo $catTecnicoSeparadorBagagem $TecnicoSeparadorBagagem, 
                                                   tendo-o $catTecnicoRevisorBagagem $TecnicoRevisorBagagem procedido à sua revisão. </p> 
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'>$descricao.</p> 
					</td>
				</tr>
                                <tr>
					<td>
						<p align='justify'> Os factos atrás descritos constituem a prática de uma contra-ordenação fiscal aduaneira de descaminho
                                                prevista e punível nos termos do art. 108.º conjugado com art.92.º, n.º1, alínea a), ambos do Regime Geral das Infracções
                                                Tributárias (RGIT), aprovado pela lei n.º 15/2001, de 5/06, por violação do artigo 40.º do Código Aduaneiro Cumunitário (CAC)
                                                , aprovado pela Reg. (CEE) n.º 2913/92, de 12/10 conjugado com o n.º 2 do 234.º do Reg. (CEE) n.º2454/93, da Comissão, de 02/07
                                                , que fixa as Disposições de Aplicação do Código Aduaneiro Comunitário (DACAC), o artg. 41.º do Regulamneto (CE) n.º 1186/2009 do Conselho de 16/11
                                                e ainda do art. 116.º da Lei n.º 64-A/2008, de 31/12. </p>
					</td>
				</tr>
                                <tr>
					<td>
						<p align='justify'> Razão pela qual se elaborou o presente auto de Notícia e ao qual corresponde o Processo de Contra-Ordenação n.º $numProcessoContraOrdenacao. </p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'>$descricaoEspecificoDescaminho</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'>$SeparadoBagagem</p>
					</td>
				</tr>
				<tr>
					<td>
						<p align='justify'>Foi atribuída franquia aduaneira prevista no Art.º 41.º do Reg.(CEE) 1186/09 do Conselho, de 16 de Novembro, para outras mercadorias transportadas pelo passagueiro. </p>
					</td>
				</tr>
                                <tr>
					<td>
						<p align='justify'>E, nada mais havendo a acrescentar, se encerra o presente Auto que, depois de lido e achado conforme, vai ser devidamente assindado pelos intervenientes.</p>		
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

