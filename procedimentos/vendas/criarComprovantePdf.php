<?php
// Carregar dompdf
require_once '../../vendor/autoload.php';

use Dompdf\Dompdf;

$id=$_GET['idvenda'];



 $html=file_get_contents("http://localhost/SCAP/view/vendas/comprovanteVendaPdf.php?idvenda=".$id);


 
// Instanciamos um objeto da classe DOMPDF.
$pdf = new DOMPDF();
 
// Definimos o tamanho do papel e orientação.
$pdf->setPaper(array(0,0,125,250));
 
// Carregar o conteúdo html.
$htmlIso = iconv('UTF-8', 'ISO-8859-1', $html);
$pdf->loadHtml($htmlIso);

// Renderizar PDF.
$pdf->render();
 
// Enviamos pdf para navegador.
$pdf->stream('comprovanteVenda.pdf');



