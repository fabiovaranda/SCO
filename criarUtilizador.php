<?php include_once('verificacaoDeSessao.php'); include_once('verificacaoDeAdministrador.php'); ?>
<html>
    <head>
    <?php
        include('importarBibliotecas.php');
    ?>
    </head>
    <body>         
         <div class="ink-grid">
            <?php
               include('header.php');
            ?>
            <div class="column-group gutters">
                <?php
                    include('verificacaoDeMenu.php');
                    include('criarUtilizadorHTML.php');
                ?>
            </div>
         </div>
    </body>
</html>