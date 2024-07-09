<?php 

require_once('../Exp_pdf/tcpdf.php');


// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL

$pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AGROINSOFT');
$pdf->SetTitle('AGROINSOFT');
$pdf->SetSubject('AGROINSOFT');
$pdf->SetKeywords('EXPORTAR MAQUINARIA');

// $pdf->SetPrintHeader(false); AQUI ES PARA QUE NO IMPRIMAR CABECERA
// $pdf->SetPrintFooter(false); AQUI ES PARA QUE NO SE IMPRIMA EL PIE DE PAGINA OSEA EL NUMERO DE LA PAGINA


// AQUI ES PARA LAS MARGENES EN LA HOJA PONGO 20 PORQUE SON MILIMETROS LO QUE PUSIMOS ARRIBA mm LAS MEDIDAS QUE VASMOS A UTILIZAR 
$pdf->SetMargins(20,20,20, false); 


// ------IMPORTANTE AQUI ABAJO NO TOCAR: AQUI ABAJO ES SI EN ALGUN CASO LLEGO A ESCRIBIR MUCHO CODIGO HTML Y SOBRE PASA LA HOJA SIMPLEMENTE ME PONGA OTRA HOJA COMO EN WORD VOY ESCRIBIENDO Y ME SACA OTRA HOJA SI AQUI ABAJO PONGO false NO ME VA SA LIR OTRA HOJA SI NO QUE EL CONTENIDO DE QUE SOBREPASE LA HOJA SE VA A PERDER
$pdf->SetAutoPageBreak(true, 20);

// NO TOCA AQUI ARRIBA ^^^^^^


// HEADER LOGO ES PARA PONER EL LOGO PARA CAMBIARLO TOCA A IR A AUTO CONFIGURADO Y CAMBIAR ESO POR DEFECTO CAMBIAR LA CARPTEA Y CAMBIAR LA IMAGEN
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'AGROINSOFT V2', '');


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


$pdf->SetFont('helvetica', '', 9);

// PONEMOS UNA PAGINA SI PONGO OTRO AddPage PONGO OTRA PAGINA ES DECIR SON PAGINAS
$pdf->AddPage();



// CONTENIDO DE HTML
$nombre_maquina=$_POST["nombre_maquina"];
$codigo_interno=$_POST["codigo_interno"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];


// AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT `idEntradas`, maqyequipo.nomElemento , `fecEntrada`, `estMaqEntrada`, ubicacion.nomUbicacion, `procedimiento`, `nomPer`, `cedPer` FROM `entradas` INNER JOIN maqyequipo ON entradas.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN ubicacion ON entradas.idUbicacion=ubicacion.idUbicacion WHERE maqyequipo.codInterno LIKE '%$codigo_interno%' AND maqyequipo.nomElemento LIKE '%$nombre_maquina%' AND entradas.fecEntrada BETWEEN '02/05/201' AND '$fecha2'";
$lotes= $mysqli->query($sql);
$html='
<style>


	h1{

	position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 20pt;
text-align: center;
	}
</style>
<p></p>
<h1>CONSULTA ENTRDAS MAQUINARIA</h1>
<table >
			<tr>
<td>Nombre Maquinaria</td>
<td>Fecha Entrada</td>
<td>Estado Maquinaria</td>
<td>Ubicacion de Entrada</td>
<td>Nombre Responsable</td>
<td>Cedula Responsable</td>
<td colspan="3">Procedimiento</td>



			</tr>
			</table>';
$item=0;

foreach ($lotes as $row) {
	$NOMBRE=$row["nomElemento"];
	$fecEntrada=$row["fecEntrada"];
	$estMaqEntrada=$row["estMaqEntrada"];
	$nomUbicacion=$row["nomUbicacion"];
	$procedimiento=$row["procedimiento"];
$nomPer=$row["nomPer"];
$cedPer=$row["cedPer"];




	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
<td>'.$NOMBRE.'</td>
<td>'.$fecEntrada.'</td>
<td>'.$estMaqEntrada.'</td>
<td>'.$nomUbicacion.'</td>
<td>'.$nomPer.'</td>
<td>'.$cedPer.'</td>
<td colspan="3">'.$procedimiento.'</td>





				</tr>

			
			</table>	

	';


	
}

$pdf->writeHTML($html, true, 0,true,0);

$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Consulta_Entradas.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>