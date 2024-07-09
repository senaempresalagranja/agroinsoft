<?php
//============================================================+
// File name   : Reporte Maquina.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../../Exp_pdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Laura Sanchez');
$pdf->SetTitle('Reporte Novedad');
$pdf->SetSubject('Reporte Novedad');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'AGROINSOFT 2.0', 'Sistema de Información para Control de Mantenimientos Correctivos y Preventivos', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
					$id_maquina=$_POST["id_maquina"];
					$fecSalida=$_POST["fecSalida"];
                    $fecLimRegreso=$_POST["fecLimRegreso"];
                    $idProveedor=$_POST["idProveedor"];
                    $idUbicacion=$_POST["idUbicacion"];
                    $idCuentadante=$_POST["idCuentadante"];
                    $destino=$_POST["destino"];


					$connection=mysqli_connect("localhost","root","","bdagroinsoft");
					$query="SELECT nomElemento, codInterno, fecSalida, fecLimRegreso, nomProveedor, nomUbicacion, nomCuentadante, apeCuentadante, destino FROM `salidas` INNER JOIN maqyequipo ON salidas.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN proveedor ON salidas.idProveedor=proveedor.idProveedor INNER JOIN ubicacion ON salidas.idUbicacion=ubicacion.idUbicacion INNER JOIN cuentadante ON salidas.idCuentadante=cuentadante.idCuentadante where salidas.idMaqEquipo=$id_maquina ";
					$resource=mysqli_query($connection,$query);
					$fila=mysqli_fetch_row($resource);

	
	
// CONTENIDO DE HTML
				
$html = <<<EOD

	<style>   

	*{
				font-family: arial;
				font-size: 12pt;
	}
h1{
position: relative;
display: block; 
	color: blue;
		font-family: arial;
		font-size: 12pt;
text-align: center;


}
table,tr,td{

	border:0px solid #fff;
	border-collapse:collapse;
}


	</style>

<br>
<h1>REPORTE DE NOVEDAD</h1>
<table>
<tr><td> <b>CODIGO INTERNO: </b> $fila[1]  </td></tr>
<tr><td> <b>NOMBRE MAQUINA: </b>$fila[0]</td></tr>
<tr><td> <b>EFCHA SALIDA: </b>$fecSalida   </td></tr>
<tr><td> <b>FECHA REGRESO: </b>$fecLimRegreso </td></tr>
<tr><td> <b>PROVEEDOR: </b>$fila[4]   </td></tr>
<tr><td> <b>UBICACION: </b>$fila[5]   </td></tr>
<tr><td> <b>CUENTADANTE: </b> $fila[6]  $fila[7]   </td></tr>
<tr><td> <b>DESTINO: </b>$destino </td></tr>

</table>

 <hr/>
<p></p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Reporte Salida.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
