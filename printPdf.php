<?php
/*
 * Génération de l'annuaire pdf d'un labo
 * html2pdf   http://html2pdf.fr/
 * author : Pierre VERT - pôle web OMP
 */

$q=$_GET["q"];

// get the HTML
ob_start();
include(dirname(__FILE__).'/htmlDataAnnuaire.php');
$content = ob_get_clean();

// convert in PDF
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//      $html2pdf->setModeDebug();
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output('Annuaire-'.$q.'.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}

?>
