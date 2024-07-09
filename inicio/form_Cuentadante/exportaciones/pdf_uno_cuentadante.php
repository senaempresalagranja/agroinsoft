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
						$tipDocumento=$_POST["tipDocumento"];
						$numDocumento=$_POST["numDocumento"];
						$nomCuentadante=$_POST["nomCuentadante"];
  						$apeCuentadante=$_POST["apeCuentadante"];
  						$fecNacimiento=$_POST["fecNacimiento"];
  						$idCargo=$_POST["idCargo"];
  						$telCuentadante=$_POST["telCuentadante"];
  						$emaCuentadante=$_POST["emaCuentadante"];
  						$dirCuentadante=$_POST["dirCuentadante"];


					$connection=mysqli_connect("localhost","root","","bdagroinsoft");
					$query="SELECT * FROM `cuentadante` INNER JOIN cargo ON cuentadante.idCargo=cargo.idCargo WHERE cuentadante.numDocumento='$numDocumento' ";
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
<h1>DATOS CUENTADANTE</h1>
<table>
<tr><td><b>TIPO DOCUMENTO: </b>$fila[1] </td></tr>
<tr><td><b>NUMERO DOCUMENTO: </b>$fila[2]</td></tr>
<tr><td><b>NOMBRES: </b>$fila[3] </td></tr>
<tr><td><b>APELLIDOS: </b>$fila[4] </td></tr>
<tr><td><b>FECHA NACIMIENTO: </b>$fila[5]</td></tr>
<tr><td><b>CARGO: </b>$fila[11]</td></tr>
<tr><td><b>TELEFONO:</b> $fila[6]</td></tr>
<tr><td><b>EMAIL: </b>$fila[7]</td></tr>
<tr><td><b>DIRECCION:</b> $fila[8]</td></tr>
<p></p>

</table>

 <hr/>
<p></p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Reporte Cuentadante.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
