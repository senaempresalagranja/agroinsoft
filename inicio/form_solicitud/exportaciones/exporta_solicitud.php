<?php 


require_once('../../Exp_pdf/tcpdf.php');


// P ORIENTACION VERTICA
// L ORIENTACION HORIZONTAL
$pdf = new TCPDF("L", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AGROINSOFT');
$pdf->SetTitle('AGROINSOFT');
$pdf->SetSubject('JERR');
$pdf->SetKeywords('JERR');

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

$prioridad=$_POST["prioridad"];
$numeroOrden=$_POST["numeroOrden"];
$traRealizar=$_POST["traRealizar"];
$id_novedad=$_POST["id_novedad"];
$traRealizar=$_POST["traRealizar"];
$solicitante=$_POST["solicitante"];
$idTipMantenimiento=$_POST["idTipMantenimiento"];
$tipServicio=$_POST["tipServicio"];
$lugar=$_POST["lugar"];
$txtfecha=$_POST["txtfecha"];
// $criticidad=$_POST["criticidad"];
$prioridad=$_POST["prioridad"];


$conexion=mysqli_connect('localhost','root','','bdagroinsoft');
$query="SELECT novedades.idNovedad, maqyequipo.nomElemento, `tipNovedad`, `fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM novedades INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE novedades.idNovedad=$id_novedad";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


// $query="SELECT * FROM `criticidad` WHERE idCriticidad=$criticidad";
// $resource=mysqli_query($conexion,$query);
// $fila1=mysqli_fetch_row($resource);

$query="SELECT * FROM tipmantenimiento WHERE tipmantenimiento.idTipMantenimiento=$idTipMantenimiento";
$resource=mysqli_query($conexion,$query);
$fila2=mysqli_fetch_row($resource);

// CONTENIDO DE HTML

// TERMINANDO EL HPT DOCUMENTO ME DI CUENTA QUE SE PUEDE HACER ESPACIADOS EN PDF NO SE PUEDEN HACER ESPACIADOS O CON CSS LEFT O RIGTH O MOVER ETC.. POR ESTA RAZON LO ESTABA HACIENDO HACIA ABAJO PERO ME PUSE HA ANALIZAR EL EJEMPLO 21 QUE HABIAN ESPACIADOS Y MIRE COMO SE HACIAS Y LO HICE Y NO ME FUNCIONO PORQUE LO HACIA CON <P> Y ESTA ETIQUETA HTML DA UN SALTO DE LINEA AUTOMATICO EL CODIGO PARA EL ESPACIADO ES ESTE PONERLO PARA REALIZAR DOS TABULADORES "&nbsp;  &nbsp;&nbsp;" CREO QUE TRES PERO MENOS MAL ME DI CUENTA XD JERR
					
$html = <<<EOD

	<style>   

	*{
				font-family: arial;
	}
h1{
position: relative;
display: block; 
	color: red;
		font-family: arial;
		font-size: 20pt;
text-align: center;


}
table,tr,td{

	border:1px solid black;
	border-collapse:collapse;
}
.titulo_tabla{

	position: relative;
	display: block;
	text-align: center;
}

	</style>

<br>
<h1>SOLICITUD</h1>


<table class="table table-bordered">
				<tr>
					<td>Novedad</td>
					
					<td># Orden</td>
					<td>Solicitante</td>
					<td>Fecha Solicitud</td>
					<td>Trabajos Realizados</td>
					<td>Tipo Mantenimiento</td>
					<td>Tipo Servicio</td>
					<td>Prioridad</td>
					<td>Lugar Mantenimiento</td>
				</tr>


				<tr>
					<td>$fila[1]--$fila[3]</td>
				
					<td>$numeroOrden</td>
					<td>$solicitante</td>
					<td>$txtfecha</td>
					<td>$traRealizar</td>
					<td>$fila2[1]</td>
					<td>$tipServicio</td>
					<td>$prioridad</td>
					<td>$lugar</td>
				</tr>
			
			</table>			
		








EOD;


// ESCRIBO EL CONTENIDP AL LA PAGINA
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);


$pdf->lastPage();

// ---------------------------------------------------------

// NOMBRE DEL ARCHIVO
$pdf->Output('Formulario_Solicitud.pdf', 'D');


// AQUI EN I ( I ES PARA VISUALIZACION EN LINEA PARA QUE SE ABRA EL PDF EN EL NACEGADOR Y "D" DESCARGA AUTOMATICA ) 




 ?>