<?php
//============================================================+
// File name   : example_001.php
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

// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL

$pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Reporte Mantenimiento Ejecutado');
$pdf->SetSubject('TCPDF Tutorial');
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
$pdf->SetFont('dejavusans', '', 9, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect

$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT nomElemento, codInterno, nomTipMantenimiento, nomProveedor, fecEjecutado, procedimiento, recomendaciones, garantia, nomPerMantenimiento, cedPerMantenimiento FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN maqyequipo ON manprogramado.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor";
$ejecutados= $mysqli->query($sql);
$html='

<style>
	h1{

	position: relative;
display: block; 
	color: blue;
		font-family: arial;
		font-size: 14pt;

text-align: center;
	}
</style>
<p></p>


<h1>REPORTE MANTENIMIENTOS EJECUTADOS</h1>
<table >
			<tr>
				<td><b>NOMBRE </b></td>
				<td><b>CODIGO INTERNO</b></td>
				<td><b>TIPO MANTENIMIENTO</b></td>
				<td><b>PROVEEDOR</b></td>
				<td><b>FECHA EJECUCION</b></td>
				<td><b>DESCRIPCION</b></td>
				<td><b>SUGERENCIA</b></td>
				<td><b>GARANTIA</b></td>
				<td><b>QUIEN REPORTA</b></td>
				<td><b>N. DOCUMENTO</b></td>
				

			</tr>
			</table>';

$item=0;
foreach ($ejecutados as $row) {
	
	$nomElemento=$row["nomElemento"];
	$codInterno=$row["codInterno"];
	$nomTipMantenimiento=$row["nomTipMantenimiento"];
	$nomProveedor=$row["nomProveedor"];
	$fecEjecutado=$row["fecEjecutado"];
	$procedimiento=$row["procedimiento"];
	$recomendaciones=$row["recomendaciones"];
	$garantia=$row["garantia"];
	$nomPerMantenimiento=$row["nomPerMantenimiento"];
	$cedPerMantenimiento=$row["cedPerMantenimiento"];



	$html .='


<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
<td>'.$nomElemento.'</td>
<td>'.$codInterno.'</td>
<td>'.$nomTipMantenimiento.'</td>
<td>'.$nomProveedor.'</td>
<td>'.$fecEjecutado.'</td>
<td>'.$procedimiento.'</td>
<td>'.$recomendaciones.'</td>
<td>'.$garantia.'</td>
<td>'.$nomPerMantenimiento.'</td>
<td>'.$cedPerMantenimiento.'</td>



				</tr>

			
			</table>	

	';


	
}


$pdf->writeHTML($html, true, 0,true,0);

$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Reporte Mantenimientos Ejecutados.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>