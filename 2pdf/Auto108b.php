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
$numProcessoContraOrdenacao = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$descricao = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$descricao2 = $row['Descricao'];
$row = mysql_fetch_assoc($res);
$descricao3 = $row['Descricao'];
echo "
<page backtop='20mm' backbottom='7mm' backleft='10mm' backright='10mm'> 
    <page_header>
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
    </page_header>
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
        <br/><br/><br/>
       <table style='width:500px'>
            <tr>
                    <td align='center'><b>AUTO DE NOTÍCIA Nº $numeroAuto</b></td>
            </tr>
            <tr>
                <td>
                    <p align='justify'>$dataextenso, $nomeTecnico, $catTecnico, a prestar funções no Sector de Controlo de Passageiros e Bagagem desta Alfândega, vem, em cumprimento do art. 57.º do Regime Geral das Infracções Tributárias (RGIT), aprovado pela Lei no.º 15/2001, de 5/06, notificar o seguinte: </p>
                </td>
            </tr>
            <tr>
                <td>
                    $descricao  
                </td>
            </tr>
            <tr>
                <td>
                    
                    $descricao2  
                </td>
            </tr>
            <tr>
                <td>
                
                    $descricao3  
                </td>
            </tr>
        </table>      
        
    </page>
";