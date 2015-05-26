<?php
	//para fazer login
	if(isset($_POST['email'])){
		//estamos a tentar fazer login
		include_once 'DataAccess.php';
		$da = new DataAccess();
		$res = $da->login($_POST['email'], md5($_POST['PalavraPasse']));
		if (mysql_num_rows($res)>0){
			//encontrou utilizador
			session_start();
			$row = mysql_fetch_assoc($res);		
			$_SESSION['id'] = $row['id'];
			if($row['idTipoUtilizador']== 2)
				echo "<script>window.location='inicial.php'; </script>";
			else
				echo "<script>window.location='inicialAdmin.php'; </script>";
		}else{
			echo "<script>alert('E-mail ou Palavra-Passe inválidos'); window.location='index.php'; </script>";
		}
	}
?>
<div class='ink-grid'>
    <div class='column-group vertical-space'></div>
</div>
<div class='ink-grid'>
    <div class='column-group vertical-space'></div>
</div>
<div class="ink-grid">
    <div class="column-group gutters top-space ">
        <div class="large-60 medium-60 small-100" ><!-- perceber como funciona os multiple screens e explicar ao prof-->
            <img src="img/LogoLogin.png"> 
        </div>
        <div class="large-40 medium-40 small-100">
            <form class="ink-form" method='post' action='indexHTML.php'>
                <fieldset>
                    <div class='ink-grid'>
                        <div class='column-group vertical-space'></div>
                    </div>
                    <div class='ink-grid'>
                        <div class='column-group vertical-space'></div>
                    </div>
                    <div class='ink-grid'>
                        <div class='column-group vertical-space'></div>
                    </div>
                    <div class="control-group column-group gutters vertical-space ">
                        <div class="control large-80">
                            <input type="email" name="email" placeholder='E-mail' required>
                        </div>
                    </div>
                    <div class="control-group column-group gutters">
                        <div class="control large-80">
                            <input type="password" name="PalavraPasse" required  placeholder='Palavra-passe'>
                        </div>
                    </div>
                    <div class="control-group column-group gutters large-align-center ">
                        <div class="control large-80">
							<input type='submit' value='Entrar' class='ink-button'/>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
