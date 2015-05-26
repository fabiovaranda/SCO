<?php
    if ( isset ($_POST['nacionalidade'])){
        $nacionalidade = $_POST['nacionalidade'];
        include_once('DataAccess.php');
        $da = new DataAccess();
        $res = $da->inserirNacionalidade($nacionalidade);
        echo "<script>alert('Nacionalidade criada com sucesso'); 
		window.location='nacionalidades.php'</script>";
    }
?>


<div class='control large-75'>
    <div class='ink-grid'>
        <form method='post' action='criarNacionalidadeHTML.php' class='ink-form' onsubmit="return confirmarPWD()">
            <fieldset>
                <legend>Criar Nacionalidade</legend>
                <br><br>
                <div class='control-group'>
                    <div class='control large-50'>
                            <label for='nacionalidade'>Nacionalidade</label>
                            <input type='text' id='nacionalidade' name='nacionalidade' required/>
                    </div>
                </div>
                <div class='control-group'>
                    <div class='vertical-space'>
                            <input type='submit' value='Criar' class='ink-button black' required />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
    