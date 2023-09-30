<?php
require 'dompdf/vendor/autoload.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

ob_start();
require('pdf_ticket.php');
$html=ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait'); 
$dompdf->render();
$dompdf->stream("halumticket", array("attachment" => 0));
?>
