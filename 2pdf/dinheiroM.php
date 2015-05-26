<?php	
	include_once('horaExtenso.php');
    include_once('DataAccess.php');
    $da = new DataAccess();
    //$da->lowerN(); 
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
    $dataNascimento = $row['Descricao'];
    $row = mysql_fetch_assoc($res);
    $morada = $row['Descricao'];
    $row = mysql_fetch_assoc($res);
    $localProcedente = $row['Descricao'];
    $row = mysql_fetch_assoc($res);
    $numeroVoo = $row['Descricao'];
    $row = mysql_fetch_assoc($res);
    $dinheiroQueTransportava = $row['Descricao'];
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
    $numProcessoContraOrdenacao = $row['Descricao'];


	echo"
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
				    <p align='justify'> $dataExtenso, pelas $hora,
				    encontrando-me eu, $nomeTecnico ,$catTecnico, em serviço na Sala de Controlo de Passageiros
				    e Bagagem da Alfândega do Aeroporto de Lisboa, compareceu perante mim <b>$nomeAutoado</b>, portador do passaporte
					$nacionalidade n.º $numPassaporte, nascido em $dataNascimento, residente em $morada. 
					O passageiro era procedente de $localProcedente 
                                        no voo $numeroVoo.</p>
			    </td>
		    </tr>
		    <tr>
			    <td>
				    <p align='justify'> Tendo-se apresentado no Canal Verde, foi o mesmo separado para revisão da sua bagagem pelo $catTecnicoSeparadorBagagem $TecnicoSeparadorBagagem, 
                                        tendo o $catTecnicoRevisorBagagem $TecnicoRevisorBagagem procedido à sua revisão, tendo constatado que o passageiro transportava <b>$dinheiroQueTransportava</b>.</p>
			    </td>
		    </tr>
		    <tr>
			    <td>
				    <p align='justify'> O passageiro deveria ter-se deslocado à Alfândega por sua própria iniciativa declarando o montante que transportava dado que o montante equivalente em euros é superior a 10000€ (dez mil euros)
                                                            ou equivalente, em clara violação do estipulado no nº1 do Artigo 3º do Decreto-Lei 61/2007 de 14 de Março e do Regulamento (CE) 1889/2005 do Parlamento Europeu e do Conselho.</p>
			    </td>
		    </tr>
		    <tr>
			    <td>
				    <p align='justify'> Os factos atrás descritos constituem a prática de uma contra-ordenação fiscal aduaneira, prevista na alínea a) 
				    do nº1 do Art. 92º conjugado com o nº 1 do Art. 108º do Regime Geral das Infracções Tributárias (RGIT) aprovado pela Lei nº 15/2001,
				    de 5 de Junho e punível pelo nº 6 do Art. 108º do RGIT. </p>
			    </td>
		    </tr>
		    <tr>
			    <td>
				    <p align='justify'> E, nada mais havendo a acrescentar, se encerra o presente Auto que, depois de lido e achado conforme, vai ser 
				    devidamente assinado pelos intervenientes. </p>
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


