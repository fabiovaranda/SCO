<?php include_once('verificacaoDeSessao.php'); ?>
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
            <div class="column-group">
                <?php
                    include('verificacaoDeMenu.php');
                    include('criarNacionalidadeHTML.php');
                ?>
            </div>
         </div>
    </body>
</html>