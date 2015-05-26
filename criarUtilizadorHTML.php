<?php
    if ( isset ($_POST['nome'])){
        $nome = $_POST['nome'];
        $pwd = md5($_POST['password']);
		$email = $_POST['email'];
        $numTecnico = $_POST['numTecnico'];
        $idTipoUtilizador = $_POST['tipoUtilizador'];
        $idCategoriaTecnico = $_POST['categoriaTecnico'];
        include_once('DataAccess.php');
        $da = new DataAccess();
        $res = $da->inserirUtilizador($nome, $pwd, $email, $numTecnico, $idTipoUtilizador, $idCategoriaTecnico);
        echo "<script>alert('Utilizador criado com sucesso'); 
		window.location='criarUtilizador.php'</script>";
    }
?>

<script>
function confirmarPWD(){	
	if ( document.getElementById('password').value 
		!= document.getElementById('password2').value ){
		alert('As palavras-passe têm que ser iguais.');
		return false;
	}else
		return true;
}
</script>


<div class="large-75">    
    <form method="post" action="criarUtilizadorHTML.php" class="ink-form top-space" onsubmit="return confirmarPWD()">         
         <fieldset>
            <div class="ink-grid">
                <div class="control-group column-group">
                    <div class="control large-33">
                        Nome
                         <input id="Nome" name='nome' type="text" placeholder="Nome do técnico" required/>
                    </div>
                    <div class="control large-33">
                        Nº do Técnico
                       <input id="numTecnico" name='numTecnico' type="text" placeholder="Número do Técnico" required>
                    </div>
                    <div class="control large-33">
                        E-mail
                         <input id="Email" name='email' type="text" placeholder="XXX@at.gov.pt" required/>
                    </div>
                </div>
                <div class="control-group column-group">
                    <div class="control large-50">
                        Palavra-passe
                       <input id="password" name="password" type="password" placeholder="Palavra-passe" required>
                    </div>
                    <div class="control large-50">
                        Repetir a palavra-passe
                       <input id="password2" name='password2' type="password" placeholder="Repetir a Palavra-passe" required>
                    </div>          
                </div>
                <div class="control-group column-group">
                    <div class="control large-50">
                    <label for='categoriaTecnico'>Categoria de Técnico</label>
                        <select name='categoriaTecnico'>
                                        <option value='-1'></option>
                                            <?php
                                                include_once('DataAccess.php');
                                                $da = new DataAccess();
                                                $res = $da->getCategoriasTecnicos();
                                                while ($row = mysql_fetch_array($res)) {
                                                    echo "<option value='" . $row['id'] . "'>" . $row['Categoria'] . "</option>";
                                                }
                                            ?>
                                    </select>
                    </div>
                    <div class="control large-50">
                    <label for='tipoUtilizador'>Tipo de Utilizador</label>
                        <select name='tipoUtilizador'>
                                        <option value='-1'></option>
                                            <?php
                                                include_once('DataAccess.php');
                                                $da2 = new DataAccess();
                                                $res2 = $da2->getTiposUtilizadores();
                                                while ($row2 = mysql_fetch_array($res2)) {
                                                    echo "<option value='" . $row2['id'] . "'>" . $row2['tipo'] . "</option>";
                                                }
                                            ?>
                                    </select>
                    </div>
                </div>
                <div class="control-group column-group">
                    <div class="vertical-space">
                        <input type='submit' value='Criar' class='ink-button' required>
                    </div>         
                </div>    
            </div>
        </fieldset>
    </form>
</div>
    