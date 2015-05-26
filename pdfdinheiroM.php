<?php

    ob_start();
    include('2pdf/dinheiroM.php');
    $content = ob_get_clean();

    // convert in PDF
    require_once('html2pdf/html2pdf.class.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8', array(15, 5, 15, 5));
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output('dinheiroM.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
?>
