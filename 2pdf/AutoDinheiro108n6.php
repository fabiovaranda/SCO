<?php

include_once('horaExtenso.php');
include_once('DataAccess.php');
$da = new DataAccess();
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
$dataVoo = $row['Descricao'];

//separador e revisor
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
                                 <p align='justify'>
					$dataExtenso, pelas $hora, encontrando-me eu, 
					$nomeTecnico, $catTecnico, em Serviço na Sala de Controlo de Passageiros e Bagagem de Alfândega do Aeroporto de Lisboa, 
					compareceu perante mim $nomeAutoado, portador do passaporte $nacionalidade n.º $numPassaporte, emitido em $dataEmissaoPassaporte, 
					nascido em $dataNascimento e residente na $morada. O passageiro era procedente de $localProcedente no voo $numeroVoo, de 
					contramarca fiscal $contramarcaFiscal, em $dataVoo. 
					 </p>
				</td>
            </tr>
			<tr>
					<td>
                                         <p align='justify'>
					Tendo-se apresentado no Canal Verde, foi o mesmo separado para revisão da sua bagagem pelo(a) $TecnicoSeparadorBagagem, $catTecnicoSeparadorBagagem, 
					tendo o(a) $TecnicoRevisorBagagem, $catTecnicoRevisorBagagem procedido á sua revisão.
					</p>
                        </td>
                                        
			</tr>
			
			 
			
			<tr>
					<td>
                                         <p align='justify'>
					Procedeu-se à revisão da referida bagagem, ao abrigo dos artigos n.º 13º e 37.º n.º 1 do 
					Código Aduaneiro Comunitário (CAC) aprovado pelo REG. (CEE) n.º 2913/92 , de 12 de Outubro , tendo-se detectado o seguinte: 
					$descricao. 
                                            </p>
					</td>
			</tr>
			<tr>
					<td>
                                         <p align='justify'>
					Os factos atrás descritos constituem a prática de uma contra-ordenação fiscal aduaneira de 
					descaminho prevista e punível nos termos do n.º6 do art.108º do Regime Geral das Infrações Tributárias (RGIT), aprovado pela 
					Lei nº 15/2001, de 5/06 por violação do n.º1 do art 3º do Regulamento (CE) n.º 1889/2005 do Parlamento Europeu e do Conselho, 
					de 26/10 bem como do n.º 1 do art 3.º do Decreto-Lei nº61/2007 , de 14/03.
                                        </p>
					</td>
                                        
			</tr>
			<tr>
					<td>
                                         <p align='justify'>
					Razão pela qual se elaborou o presente Auto de Notícia e
					ao qual corresponde o Processo de Contra-Ordenação nº$numProcessoContraOrdenacao.
                                            </p>
					</td>
			</tr>
				
			<tr>
					<td>
                                         <p align='justify'>
					Foi atribuida franquia aduaneira prevista no art.º 41.º do Reg.(CEE) 1186/09 do 
					Conselho , de 16 de Novembro, para outras mercadorias transportadas pelo passageiro.
                                        </p>
					</td>
			</tr>
			<tr>
					<td>
                                         <p align='justify'>
					E, nada mais havendo a acrescentar , 
					se encerra o presente Auto que , depois de lido e achado conforme , vai ser devidamente assinado pelos intervenientes. 
                                        </p>
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
</html>";
?>