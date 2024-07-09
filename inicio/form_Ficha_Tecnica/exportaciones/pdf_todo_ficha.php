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


// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL

$pdf = new TCPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('SIFFA');
$pdf->SetTitle('SIFFA');
$pdf->SetSubject('JERR');
$pdf->SetKeywords('EXPORTAR CULTIVOS');

// $pdf->SetPrintHeader(false); AQUI ES PARA QUE NO IMPRIMAR CABECERA
// $pdf->SetPrintFooter(false); AQUI ES PARA QUE NO SE IMPRIMA EL PIE DE PAGINA OSEA EL NUMERO DE LA PAGINA


// AQUI ES PARA LAS MARGENES EN LA HOJA PONGO 20 PORQUE SON MILIMETROS LO QUE PUSIMOS ARRIBA mm LAS MEDIDAS QUE VASMOS A UTILIZAR 
$pdf->SetMargins(20,20,20, false); 


// ------IMPORTANTE AQUI ABAJO NO TOCAR: AQUI ABAJO ES SI EN ALGUN CASO LLEGO A ESCRIBIR MUCHO CODIGO HTML Y SOBRE PASA LA HOJA SIMPLEMENTE ME PONGA OTRA HOJA COMO EN WORD VOY ESCRIBIENDO Y ME SACA OTRA HOJA SI AQUI ABAJO PONGO false NO ME VA SA LIR OTRA HOJA SI NO QUE EL CONTENIDO DE QUE SOBREPASE LA HOJA SE VA A PERDER
$pdf->SetAutoPageBreak(true, 20);

// NO TOCA AQUI ARRIBA ^^^^^^


// HEADER LOGO ES PARA PONER EL LOGO PARA CAMBIARLO TOCA A IR A AUTO CONFIGURADO Y CAMBIAR ESO POR DEFECTO CAMBIAR LA CARPTEA Y CAMBIAR LA IMAGEN
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'AGROINSOFT 2.0', 'Sistema de Información para Control de Mantenimientos Correctivos y Preventivos', array(0,64,255), array(0,64,128));


$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);


$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}


$pdf->SetFont('dejavusans', '', 9);

// PONEMOS UNA PAGINA SI PONGO OTRO AddPage PONGO OTRA PAGINA ES DECIR SON PAGINAS
$pdf->AddPage();




	
// CONTENIDO DE HTML
	


// AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT nomElemento, codInterno, codInventario, marElemento, seriale, modelo, capacidad, fecAdquisicion, nomUbicacion, estElemento, nomCuentadante, apeCuentadante, numFicTecnica, nomClasificacion, imagen, funUsos, desFisica, espTecnica, conSeguridad, alistamiento, verCalibracion, instrucciones, condiciones, mantenimiento, limDesinfeccion, conManejo FROM `maqyequipo` INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion INNER JOIN cuentadante ON maqyequipo.idCuentadante=cuentadante.idCuentadante INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN fictecnica ON maqyequipo.idMaqEquipo=fictecnica.idMaqEquipo";
$ficha= $mysqli->query($sql);
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
<h1>LISTADO FICHAS TECNICAS</h1>
';
$item=0;
foreach ($ficha as $row) {

        $nomElemento=$row["nomElemento"];
        $codInterno=$row['codInterno'];
        $codInventario=$row['codInventario'];
        $marElemento=$row['marElemento'];
        $seriale=$row['seriale'];
        $modelo=$row['modelo'];
        $capacidad=$row['capacidad'];
        $fecAdquisicion=$row['fecAdquisicion'];
        $nomUbicacion=$row['nomUbicacion'];
        $estElemento=$row['estElemento'];
        $nomCuentadante=$row['nomCuentadante'];
        $apeCuentadante=$row['apeCuentadante'];
        $numFicTecnica=$row['numFicTecnica'];
        $nomClasificacion=$row['nomClasificacion'];
        $imagen=$row['imagen'];
        $funUsos=$row["funUsos"];
        $desFisica=$row["desFisica"];
        $espTecnica=$row["espTecnica"];
        $conSeguridad=$row["conSeguridad"];
        $alistamiento=$row["alistamiento"];
        $verCalibracion=$row["verCalibracion"];
        $instrucciones=$row["instrucciones"];
        $condiciones=$row["condiciones"];
        $mantenimiento=$row["mantenimiento"];
        $limDesinfeccion=$row["limDesinfeccion"];
        $conManejo=$row["conManejo"];	




	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>
	<tr><td colspan="2" style="text-align:center"><b>DATOS BASICOS</b></td></tr>

  	<tr><td> <b>NOMBRE ELEMENTO</b>  '.$nomElemento.' </td><td><b>CODIGO INTERNO</b> '.$codInterno.' </td></tr>
    <tr><td> <b>CODIGO INVENTARIO</b> '.$codInventario.' 	</td><td> <b>MARCA</b> '.$marElemento.' </td></tr>	
    <tr><td> <b>SERIAL</b> '.$seriale.' 	</td><td> <b>MODELO</b> '.$modelo.'</td></tr> 	
    <tr><td> <b>CAPACIDAD</b> '.$capacidad.' 	</td><td> <b>FECHA ADQUISICION</b> '.$fecAdquisicion.' </td></tr>	
    <tr><td> <b>UBICACION</b> '.$nomUbicacion.' 	</td><td> <b>ESTADO ELEMENTO</b> '.$estElemento.' </td></tr>	
    <tr><td> <b>CUENTADANTE</b> '.$nomCuentadante.'  '.$apeCuentadante.' 	</td><td> <b>N. FICHA</b> '.$numFicTecnica.' </td></tr>	
    <tr><td> <b>CLASIFICACION</b> '.$nomClasificacion.' 	</td><td> <b>IMAGEN</b> '.$imagen.' </td></tr>

	<tr><td colspan="2" style="text-align:center" ><b>ESPECIFICACIONES TECNICAS</b></td></tr>

    <tr><td colspan="2"><b>FUNCIONES Y USOS</b> '.$funUsos.' </td></tr>	
    <tr><td colspan="2"><b>DESCRIPCION FISICA</b> '.$desFisica.' 	</td></tr>
    <tr><td colspan="2"><b>ESPECIFICACIONES TECNICAS</b> '.$espTecnica.' </td></tr>	
    <tr><td colspan="2"><b>CONDICIONES DE SEGURIDAD</b> '.$conSeguridad.' </td></tr>	
    <tr><td colspan="2"><b>ALISTAMIENTO</b> '.$alistamiento.' 	</td></tr>
    <tr><td colspan="2"><b>VERIFICACION Y/O CALIBRACION</b> '.$verCalibracion.' </td></tr>	
    <tr><td colspan="2"><b>INSTRUCCIONES</b> '.$instrucciones.' 	</td></tr>
    <tr><td colspan="2"><b>CONDICIONES DE USO</b> '.$condiciones.' </td></tr>	
    <tr><td colspan="2"><b>ALISTAMIENTO</b> '.$mantenimiento.' 	</td></tr>
    <tr><td colspan="2"><b>LIMPIEZA Y DESINFECCION</b> '.$limDesinfeccion.' </td></tr>	
    <tr><td colspan="2"><b>CONDICIONES DE MANEJO</b> '.$conManejo.' 	</td></tr>	


</table>			
 <hr/>
<p></p>	
			
		

	';


	
}


$pdf->writeHTML($html, true, 0,true,0);

$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Listado Fichas Tecnicas Agroindustria.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>