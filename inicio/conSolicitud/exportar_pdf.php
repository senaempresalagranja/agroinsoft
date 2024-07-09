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

// $fecha1=date("d-m-Y",strtotime($fecha1)); 

// $fecha2=date("d-m-Y",strtotime($fecha2));
// AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT `idSolicitudes`, novedades.fecNovedad,maqyequipo.nomElemento, criticidad.nomCriticidad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, tipmantenimiento.nomTipMantenimiento, `tipServicio`, solicitudes.prioridad, `lugMantenimiento` FROM `solicitudes` INNER JOIN novedades ON solicitudes.idNovedad=novedades.idNovedad INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo inner JOIN criticidad ON solicitudes.idCriticidad=criticidad.idCriticidad INNER JOIN tipmantenimiento ON solicitudes.idtipMantenimiento=tipmantenimiento.idTipMantenimiento WHERE  maqyequipo.nomElemento LIKE '%$nombre_maquina%' OR maqyequipo.codInterno LIKE '%$codigo_interno%' OR solicitudes.fecSolicitud BETWEEN '$fecha1' AND '$fecha2' ORDER BY solicitudes.fecSolicitud";
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
<h1>CONSULTA SOLICITUD MANTENIMIENTO</h1>
<table >
			<tr>
				<td>Novedad</td>
				<td>Criticidad</td>
					<td># Orden</td>
					<td>Solicitante</td>
					<td>Fecha Solicitud</td>
					<td>Trabajos Realizados</td>
					<td>Tipo Mantenimiento</td>
					<td>Tipo Servicio</td>
					<td>Prioridad</td>
					<td>Lugar Mantenimiento</td>



			</tr>
			</table>';
$item=0;

foreach ($lotes as $row) {
	$fecNovedad=$row["fecNovedad"];
	$nomElemento=$row["nomElemento"];
	$nomCriticidad=$row["nomCriticidad"];
	$numOrden=$row["numOrden"];
	$solicitante=$row["solicitante"];
	$fecSolicitud=$row["fecSolicitud"];
	$traRealizar=$row["traRealizar"];
	$nomTipMantenimiento=$row["nomTipMantenimiento"];
	$tipServicio=$row["tipServicio"];
	$prioridad=$row["prioridad"];
		$lugMantenimiento=$row["lugMantenimiento"];



	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
<td>'.$fecNovedad.'-- '.$nomElemento.'</td>
<td>'.$nomCriticidad.'</td>
<td>'.$numOrden.'</td>
<td>'.$solicitante.'</td>
<td>'.$fecSolicitud.'</td>
<td>'.$traRealizar.'</td>
<td>'.$nomTipMantenimiento.'</td>
<td>'.$tipServicio.'</td>
<td>'.$prioridad.'</td>
<td>'.$lugMantenimiento.'</td>





				</tr>

			
			</table>	

	';


	
}

$pdf->writeHTML($html, true, 0,true,0);

$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Consulta_Solicitudes.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>