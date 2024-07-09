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

$sql="SELECT `idNovedad`, maqyequipo.nomElemento, `tipNovedad`,`fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM `novedades` INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo  WHERE maqyequipo.codInterno like '%$codigo_interno%' OR maqyequipo.nomElemento like '%$nombre_maquina%' OR novedades.fecNovedad BETWEEN '$fecha1' AND '$fecha2'";
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
<h1>CONSULTA NOVEDADES</h1>
<table >
			<tr>
				<td><b>Nombre Maquina</b></td>
				<td><b>Tipo Novedad</b></td>
				<td><b>Fecha Novedad</b></td>
				<td><b>Responsable novedad</b></td>
				<td><b>Cedula Responsable</b></td>
				<td><b>Prioridad</b></td>
				<td colspan="3"><b>Especificaciones</b></td>


			</tr>
			</table>';
$item=0;

foreach ($lotes as $row) {
	$NOMBRE=$row["nomElemento"];
	$tipNovedad=$row["tipNovedad"];
	$fecNovedad=$row["fecNovedad"];
	$perNovedad=$row["perNovedad"];
	$cedPerNovedad=$row["cedPerNovedad"];
	$prioridad=$row["prioridad"];
	$espNovedad=$row["espNovedad"];



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
<td>'.$tipNovedad.'</td>
<td>'.$fecNovedad.'</td>
<td>'.$perNovedad.'</td>
<td>'.$cedPerNovedad.'</td>
<td>'.$prioridad.'</td>
<td colspan="3">'.$espNovedad.'</td>



				</tr>

			
			</table>	

	';


	
}

$pdf->writeHTML($html, true, 0,true,0);

$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Consulta_Novedad.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>