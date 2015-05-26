<?php
if (isset($_GET['i'])){
    //vamos apagar o auto e suas informações
    include_once('DataAccess.php');
    $da = new DataAccess();
    $da->eliminarAuto($_GET['i']);
    echo "<script>alert('Auto eliminado com sucesso'); window.location='inicialAdmin.php'</script>";
}
?>
