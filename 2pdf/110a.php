<?php
include_once('DataAccess.php');
$da = new DataAccess();
$id = $_GET['i'];
$Tecnico = $da->getTecnico($id);
$row = mysql_fetch_assoc($Tecnico);
$nomeTecnico = $row['nome'];
$catTecnico = $row['categoria'];
$res = $da->getAuto($id);
$row = mysql_fetch_assoc($res);
$numeroAuto = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$data = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataextenso = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataocorrencia = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataOcorrenciaExtenso = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$nomeAutoado = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$contribuinteFiscal = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$localResidente = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$nomeEmpresa = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$contribuinteFiscalEmpresa = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$sedeSocialEmpresa = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataEntregaDeclaracao = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$numDeclaracao = $row['Descricao'];
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
                    <p align='justify'>$dataextenso, $nomeTecnico, $catTecnico, a prestar funções no Sector de Controlo de Passageiros e Bagagem desta Alfândega, vem, em cumprimento do art. 57.º do Regime Geral das Infracções Tributárias (RGIT), aprovado pela Lei no.º 15/2001, de 5/06, notificar o seguinte: </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='justify'>$dataOcorrenciaExtenso apresentou-se, junto deste serviço aduaneiro, o(a) passageiro(a) $nomeAutoado, contribuinte fiscal n.º $contribuinteFiscal, residente em $localResidente, na qualidade de representante da empresa $nomeEmpresa, contribuinte fiscal n.º $contribuinteFiscalEmpresa, e sede social em $sedeSocialEmpresa, com vista à obtenção da certificação de exportação dos bens adquiridos em território comunitário e transportados na sua bagagem pessoal. </p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='justify'> Acontece que a mercadoria não se encontrava acompanhada de declaração aduaneira de exportação conforme previsto no art. 59º do Código Aduaneiro Comunitário (CAC), estabelecido pelo Regulamento (CEE) nº 2913/92 do Conselho, de 12 de Outubro.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='justify'>Foi permitido o embarque da mercadoria, sob controlo aduaneiro.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='justify'><i>A posteriori</i>, concretamente em $dataEntregaDeclaracao, foi entregue a declaração aduaneira de exportação com o nº $numDeclaracao.</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p align='justify'>Estabele o art. 795º das Disposições de Aplicação do Código Aduaneiro Comunitário (DACAC), aprovadas pelo Regulamento (CEE) nº. 2454/93 da Comissão, de 02 de Julho que '<i>A aceitação a posteriori dessa declaração (referindo-se à declaração aduaneira de exportação) não obsta à aplicação das sanções em vigor...</i>'.</p>
                </td>				
            </tr>
            <tr>
                <td>
                    <p align='justify'>Os factos atrás descritos constituem contra-ordenação tributária aduaneira prevista e punível nos termos do art. 110.º-A do Regime Geral das Infraçções Tributárias (RGIT), aprovado pela Lei n.º 15/2011, de 05 de Junho, com coima de (euro) 75 a (euro) 3750, na redacção da Lei n.º 64-B/2011, de 30/12, sendo estes valores para o dobro no caso de a infracção ter sido praticada por uma pessoa colectiva, de acordo com o art. 26.º, n.º 4 do mesmo diploma.</p>		
                </td>	
            </tr>		
            <tr>
                <td>
                    <p align='justify'>Razão pela qual se lavrou o presente Auto de Notícia que não segue assinado pelo(a) Autuado(a) em virtude de o(a) mesmo(a) não se encontar presente no momento da sua elaboração.</p>
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