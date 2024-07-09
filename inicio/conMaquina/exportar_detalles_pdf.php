<?php 

require_once('../Exp_pdf/tcpdf.php');


// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL

$pdf = new TCPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


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


$id_maquinaria=$_POST["id_maquinaria"];

$connection=mysqli_connect("localhost","root","","bdagroinsoft");
							$query="SELECT maqyequipo.idMaqEquipo, `nomElemento`, `codInventario`, `codInterno`, `marElemento`, `seriale`, `modelo`, `capacidad`, `fecAdquisicion`,  `estElemento`,imagen, `numFicTecnica`, clasificacion.nomClasificacion, ubicacion.nomUbicacion FROM `maqyequipo` INNER JOIN clasificacion ON maqyequipo.idClasificacion=clasificacion.idClasificacion INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion WHERE maqyequipo.idMaqEquipo=$id_maquinaria order by nomElemento";
							$resource=mysqli_query($connection,$query);
							$fila=mysqli_fetch_row($resource);
$url_imgen=$fila[10];
							$query1="SELECT `funUsos`, `desFisica`, `espTecnica`, `conSeguridad`, `alistamiento`, `verCalibracion`, `instrucciones`, `condiciones`, `mantenimiento`, `limDesinfeccion`, `conManejo` FROM `fictecnica` WHERE idMaqEquipo=$id_maquinaria";
							$resource1=mysqli_query($connection,$query1);
							$fila1=mysqli_fetch_row($resource1);


	// &nbsp;&nbsp;  &nbsp;&nbsp;
// CONTENIDO DE HTML
				
$html = <<<EOD

	<style>   

	*{
				font-family: arial;
	}
h1, img{
position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 17pt;
text-align: center;


}
table,tr,td{

	border:1px solid black;
	border-collapse:collapse;
}


	</style>


<br>
<h1>$fila[1]</h1>

<img src="../form_maquina/imagenes/$url_imgen" style="width:300px;border:1px solid black; min-width:300px;" alt="">
<p></p>
<table>
	<tr>
		<td>Codigo Inventario</td>
		<td>Codigo Interno</td>
		<td>Serial</td>
		<td>Capacidad</td>
		<td>Fecha Adquisicion</td>
		<td>Clasificacion</td>
		<td>Ubicacion</td>
		<td>Estado</td>
	</tr>
	<tr>
		<td>$fila[2]</td>
		<td>$fila[3]</td>
		<td>$fila[3]</td>
		<td>$fila[4]</td>
		<td>$fila[5]</td>
		<td>$fila[6]</td>
		<td>$fila[7]</td>
		<td>$fila[9]</td>
	</tr>
</table>

	<p></p>
<h1>FICHA TECNICA</h1>

<p><b>Funciones y Usos:</b>$fila1[0]</p>
<p><b>Descripcion Fisica:</b>$fila1[1]</p>
<p><b>Especificaciones Tecnicas:</b>$fila1[3]</p>
<p><b>Condiciones de Seguridad:</b>$fila1[4]</p>
<p><b>Alistamiento:</b>$fila1[5]</p>
<p><b>Verificacion o Calibracion:</b>$fila1[6]</p>
<p><b>Instrucciones de Uso:</b>$fila1[7]</p>
<p><b>Condiciones del Equipo:</b>$fila1[8]</p>
<p><b>Mantenimiento:</b>$fila1[9]</p>
<p><b>Limpieza:</b>$fila1[10]</p>
EOD;



// ESCRIBO EL CONTENIDP AL LA PAGINA
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->AddPage("L");
// // // AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT * FROM `novedades`  WHERE idMaqEquipo=$id_maquinaria";
$lotes= $mysqli->query($sql);
$html='
	<style>   

	*{
				font-family: arial;
	}
h1, img{
position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 17pt;
text-align: center;


}
table,tr,td{

	border:1px solid black;
	border-collapse:collapse;
}


	</style>


<br>

<h1>NOVEDADES</h1>
<p></p>
<table >
			<tr>
				<td>Tipo Novedad</td>
				<td>Fecha de Novedad</td>
				<td>Prioridad</td>
				<td>Responsable Novedad</td>
				<td>Cedula Responsable</td>
				<td colspan="3">Especificaciones</td>

			</tr>
			</table>';
$item=1;
foreach ($lotes as $row) {
	$tipNovedad=$row["tipNovedad"];
	$fecNovedad=$row["fecNovedad"];
	$perNovedad=$row["perNovedad"];
	$cedPerNovedad=$row["cedPerNovedad"];
	$espNovedad=$row["espNovedad"];
	$prioridad=$row["prioridad"];



	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
					<td>'.$tipNovedad.'</td>
					<td>'.$fecNovedad.'</td>
					<td>'.$prioridad.'</td>
					<td>'.$perNovedad.'</td>
					<td>'.$cedPerNovedad.'</td>
					<td colspan="3">'.$espNovedad.'</td>

				</tr>

			
			</table>	

	';


	$item=$item+1;
}


$pdf->writeHTML($html, true, 0,true,0);

$pdf->AddPage("L");
// // // AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT `id`, `idMaqEquipo`, `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal` FROM `manprogramado` where idMaqEquipo=$id_maquinaria";
$lotes= $mysqli->query($sql);
$html='
	<style>   

	*{
				font-family: arial;
	}
h1, img{
position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 17pt;
text-align: center;


}
table,tr,td{

	border:1px solid black;
	border-collapse:collapse;
}


	</style>


<br>

<h1>MANTENIMIENTO PROGRAMADOS</h1>
<p></p>
<table >
			<tr>
				<td>TITULO</td>
				<td>Prioridad</td>
				<td>Fecha Inicio</td>
				<td>Fecha Fin</td>
				<td colspan="3">Especificaiones</td>


			</tr>
			</table>';
$item=1;
foreach ($lotes as $row) {
	$title=$row["title"];
	$inicio_normal=$row["inicio_normal"];
	$final_normal=$row["final_normal"];
	$body=$row["body"];




	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
					<td>'.$title.'</td>
					<td>'.$prioridad.'</td>
					<td>'.$inicio_normal.'</td>
					<td>'.$final_normal.'</td>
					<td colspan="3">'.$body.'</td>

				</tr>

			
			</table>	

	';


	$item=$item+1;
}


$pdf->writeHTML($html, true, 0,true,0);

$pdf->AddPage("L");
// // // AQUI ABAJO LE ESTOY ANEXANDO UN foreach ES UN CICLO EN POCAS PALABRAS WHILE PERO EN PHP ES foreach PARA PONER NUMERO DE LOTES QUE HAY EN LA BASE D EDATOS ES DECIR QUE SEHA DINAMICO SI SE ACTUALIZA ME GENERA MAS
$mysqli=new mysqli("localhost", "root", "", "bdagroinsoft");

$sql="SELECT `idManEjecutado`, manejecutado.id, tipmantenimiento.nomTipMantenimiento, proveedor.nomProveedor, `fecEjecutado`, `procedimiento`, `recomendaciones`, `garantia`, `nomPerMantenimiento`, `cedPerMantenimiento` FROM `manejecutado` INNER JOIN manprogramado ON manejecutado.id=manprogramado.id INNER JOIN tipmantenimiento ON manejecutado.idTipMantenimiento=tipmantenimiento.idTipMantenimiento INNER JOIN proveedor ON manejecutado.idProveedor=proveedor.idProveedor WHERE manprogramado.idMaqEquipo=$id_maquinaria";
$lotes= $mysqli->query($sql);
$html='
	<style>   

	*{
				font-family: arial;
	}
h1, img{
position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 17pt;
text-align: center;


}
table,tr,td{

	border:1px solid black;
	border-collapse:collapse;
}


	</style>


<br>

<h1>MANTENIMIENTO EJECUTADOS</h1>
<p></p>
<table >
			<tr>
				<td>Tipo Mantenimiento</td>
				<td>Proveedor</td>
				<td>Fecha Ejecutada</td>
				<td>Garantia</td>
				<td>Responsable</td>
				<td>Cedula</td>
				<td colspan="3">Procedimiento</td>
				<td colspan="3">Recomendaciones</td>

			</tr>
			</table>';
$item=1;
foreach ($lotes as $row) {
	$nomTipMantenimiento=$row["nomTipMantenimiento"];
	$nomProveedor=$row["nomProveedor"];
	$fecEjecutado=$row["fecEjecutado"];
	$garantia=$row["garantia"];
	$nomPerMantenimiento=$row["nomPerMantenimiento"];
	$cedPerMantenimiento=$row["cedPerMantenimiento"];
	$procedimiento=$row["procedimiento"];
	$recomendaciones=$row["recomendaciones"];




	$html .='
<style>
	table,td{

	border:0px solid black;
	border-collapse:collapse;
}



</style>

<table>

				<tr>
					<td>'.$nomTipMantenimiento.'</td>
					<td>'.$nomProveedor.'</td>
					<td>'.$fecEjecutado.'</td>
					<td>'.$garantia.'</td>
					<td >'.$nomPerMantenimiento.'</td>
					<td >'.$cedPerMantenimiento.'</td>
					<td  colspan="3">'.$procedimiento.'</td>
					<td  colspan="3">'.$recomendaciones.'</td>

				</tr>

			
			</table>	

	';


	$item=$item+1;
}


$pdf->writeHTML($html, true, 0,true,0);
$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('MAQUINA.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>