<?php
function verFormularioCriarAuto(){
    include_once 'DataAccess.php';
    $da = new DataAccess();
    $res = $da->getLastAuto();
    $row = mysql_fetch_object($res);
    echo "<div class='large-75 medium-75 small-100'>
		<div class='ink-grid'>
			<form method='post' action='Auto110a.php' class='ink-form'>
				<fieldset>
					<legend>Criar Auto DAU a posteriori</legend>
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
								<label for='name'>Data Ocorrência</label>
								<input type='date' name='dataocorrencia' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='control large-33'>
								<label for='name'>Nome do Autoado</label>
								<input type='text' name='nomeAutoado' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Contribuinte Fiscal</label>
								<input type='text' name='contribuinteFiscal' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Local Residente</label>
								<input type='text' size='20' name='localResidente' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='control large-66'>
								<label for='name'>Nome da Empresa</label>
								<input type='text' name='nomeEmpresa' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Contribuinte Fiscal da Empresa</label>
								<input type='text' name='contribuinteFiscalEmpresa' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='control large-100'>
								<label for='name'>Sede Social da Empresa</label>
								<input type='text' name='sedeSocialEmpresa' required>
							</div>
						</div>
						<div class='control-group'>
							<div class='control large-33'>
								<label for='name'>Data de Entrega da Declaração</label>
								<input type='date' name='dataEntregaDeclaracao' placeholder='aaaa-mm-dd' required>
							</div>
							<div class='control large-33'>
								<label for='name'>Número da Declaração</label>
								<input type='text' name='numDeclaracao'required>
							</div>
                                                        <div class='control large-33'>
                                                            <label for='name'>Processo de contraordenação nº</label>
                                                            <input type='text' placeholder='xxx/".date('Y')."' name='numProcessoContraOrdenacao' required>
                                
                                                        </div>
						</div>
						<div class='vertical-space'>
                            <input type='submit' value='Criar' class='ink-button black pull-right'>
						</div>
                </fieldset>
            </form>
        </div>
    </div>";
}
function verFormularioEditarAuto($id){
    include_once('DataAccess.php');
    $da = new DataAccess();
    $res = $da->getAuto($id);
    $row = mysql_fetch_assoc($res);
    echo "<form method='post' action='Auto110a.php' class='ink-form'>
            <fieldset>
                <div class='large-100'>
                    <div class='ink-grid'>
                        <div class='control-group'>
                            <div class='large-75 medium-75 small-75'>
                                <legend> Editar Auto DAU a posteriori</legend>
                                    <input type = 'hidden' name ='id' value ='$id'>
                            </div>
                        </div>
                        <div class='control-group'>
                            <div class='control large-33'>
                                    <label for='name'>Número do Auto</label>
                                    <input type='text' value='".$row['Descricao']."' name='numeroAuto' required>
                            </div>";
                            $row = mysql_fetch_assoc($res);

                            echo "
                            <div class='control large-33'>
                                    <label for='name'>Data</label>
                                    <input type='date' value='".$row['Descricao']."' name='data' placeholder='aaaa-mm-dd' required>
                            </div>";
                            $row = mysql_fetch_assoc($res);
                            $row = mysql_fetch_assoc($res);
                            echo "
                            <div class='control large-33'>
                                    <label for='name'>Data Ocorrência</label>
                                    <input type='date' value='".$row['Descricao']."' name='dataocorrencia' required />
                            </div>
                    </div>";
                    $row = mysql_fetch_assoc($res);
                    $row = mysql_fetch_assoc($res);
                    echo "
                    <div class='control-group'>
                            <div class='control large-33'>
                                    <label for='name'>Nome do autoado</label>
                                    <input type='text' value='".$row['Descricao']."' name='nomeAutoado' required>
                            </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                            <div class='control large-33'>
                                    <label for='name'>Contribuinte Fiscal</label>
                                    <input type='text' value='".$row['Descricao']."' size='20' name='contribuinteFiscal' required>
                            </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                            <div class='control large-33'>
                                    <label for='name'>Local Residente</label>
                                    <input type='text' value='".$row['Descricao']."' name='localResidente' required>
                            </div>
                    </div>";
                    $row = mysql_fetch_assoc($res);
                    echo "
                    <div class='control-group'>
                            <div class='control large-66'>
                                    <label for='name'>Nome da Empresa</label>
                                    <input type='text' value='".$row['Descricao']."' name='nomeEmpresa' required>
                            </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                            <div class='control large-33'>
                                    <label for='name'>Contribuinte Fiscal da impresa</label>
                                    <input type='text' value='".$row['Descricao']."' size='50' name='contribuinteFiscalEmpresa' required>
                            </div>
                    </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                    <div class='control-group'>
                            <div class='control large-100'>
                                    <label for='name'>Sede Social da Empresa</label>
                                    <input type='text' value='".$row['Descricao']."' size='50' name='sedeSocialEmpresa' required>
                            </div>
                    </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                            <div class='control-group'>
                                    <div class='control large-33'>
                                            <label for='name'>Data Entrega da Declaração</label>
                                                    <input type='date' value='".$row['Descricao']."' name='dataEntregaDeclaracao' required>
                                    </div>";
                            $row = mysql_fetch_assoc($res);
                            echo "
                                   <div class='control large-33'>
                                            <label for='name'>Número da Declaração</label>
                                            <input type='text' value='".$row['Descricao']."' name='numDeclaracao' required>
                                    </div>";        
                            $row = mysql_fetch_assoc($res);
                            echo "
                                        <div class='control large-33'>
                                            <label for='name'>Processo de contraordenação nº</label>
                                                <input type='text' value='".$row['Descricao']."' name='numProcessoContraOrdenacao' required>
                                        </div>
                                    </div>
                                    <div class='vertical-space'>
                                            <input type='submit' value='Editar' class='ink-button black pull-right'>
                                            <a target='_blank' href='pdf110a.php?i=".$_GET['i']."' class='ink-button black'>PDF</a>
                                    </div>

                            </fieldset>
                    </form>
            </div>
    </div>
</div>";
	}
	if (isset($_GET['i'])){
		verFormularioEditarAuto($_GET['i']);
	}
        else{
		verFormularioCriarAuto();
	}
?>

