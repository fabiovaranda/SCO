<?php
if (isset($_GET['i'])){
    include_once('DataAccess.php');
    $da = new DataAccess();
    $da->nacionalidadeNaoVisivel($_GET['i']);
    echo "<script>alert('Alterado Com Sucesso'); window.location='nacionalidades.php'</script>";
    
}
?>
