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

$Tecnico = $da->getTecnico($id);
$row = mysql_fetch_assoc($Tecnico);
$nomeTecnico = $row['nome'];
$catTecnico = $row['categoria'];

$row = mysql_fetch_assoc($res);
$nomeAutoado = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$contribuinteFiscal = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$morada = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$localProcedente = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$numeroVoo = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$materialQueTransportava = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$reexportacaoInutilizacao = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$numAutoRetencao = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$respostaEntidade = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$numOficio = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataOficio = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$dataRececaoOficio = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$numProcessoContraOrdenacao = $row['Descricao'];


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
					<p align='justify'>$nomeTecnico, $catTecnico, a desempenhar funções no Sector de Controlo de Passageiros e Bagagem desta Alfândega, noticia a V. Ex.ª, nos termos do art. 57.º do Regime Geral das Infracções Tributárias (RGIT), aprovado pela Lei n.º 15/2001, de 5 de Junho, o seguinte:</p>
				</td>
			</tr>
			<tr>
				<td>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'>$dataExtenso, compareceu neste Sector o passageiro $nomeAutoado, contribuinte fiscal n.º $contribuinteFiscal, residente em $morada, procedente de $localProcedente, no voo $numeroVoo.</p>
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'> O pasageiro foi seleccionado para revisao de bagagem onde, através desse controlo, foi possível constatar que o mesmo transportava $materialQueTransportava.</p>
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'> Acontece que a referida mercadoria não reunia as medidas de política comercial necessárias para que se pudesse ser declarada para um outro destino aduaneiro que não fosse a $reexportacaoInutilizacao, conforme Auto Retenção n.º $numAutoRetencao e resposta do $respostaEntidade que se veio a pronunciar sobre o destino possível a atribuir á mercadoria. </p>
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'> Nesse sentido, o passageiro foi notificado, através do n/oficio n.º $numOficio, de $dataOficio, para, 
					no prazo de 20 dias, atribuir o destino aduaneiro á mercadoria, nos termos do art. 48.º do Código Aduaneiro Comunitário (CAC), 
					aprovado pelo Reg. (CEE) n.º 2913/92 de 12/10, que, no caso concreto, seria a $reexportacaoInutilizacao da mercadoria devendo
				
			";
			if ($reexportacaoInutilizacao == 'reexportacao'){
				echo " a mesma ser solicitada junto desta Alfândega, por requerimento, onde constasse informação sobre a data e o modo como a mercadoria iria 
				sair do território aduaneiro comunitário, comprovados documentalmente, de forma a serem acautelados os procedimentos aduaneiros 
				competentes.</p>
				";
			}else{
				echo " a mesma ser proveniente comunicada ás autoridades aduaneiras, para que fosse exercido o controlo entendido por necessário e sem 
				implicação de qualquer despesa o erário público, confomr n.ºs 3 e 4 do art. 182.º do CAC.</p>
				";
			}
			
			echo "
			
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'>O passageiro foi ainda informado que, nos termos do art. 2.º e 13.º do Decreto-Lei n.º 68/2007, de 26/03, seriam cobradas as taxas correspondetes ao serviço e assistência prestadas por esta entidade em função do tempo dispendido e da distância percorrida.</p>
				</td>
			</tr>
			<tr>
				<td>
					<br>
				</td>
			</tr>
			<tr>
				<td>
					<p align='justify'> O referido oficio foi recebido em $dataOficio. </p>
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