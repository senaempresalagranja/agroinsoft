<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Formulario_Solicitud.xls");

		$conexion=mysqli_connect("localhost","root","", "bdagroinsoft");



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista de Novedades</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="10" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="10"  bgcolor="#99CCFF"><CENTER><strong>FICHA TECNICA AGROINDUSTRIA</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
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
  
<?PHP


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
$criticidad=$_POST["criticidad"];
$prioridad=$_POST["prioridad"];

$conexion=mysqli_connect('localhost','root','','bdagroinsoft');
$query="SELECT novedades.idNovedad, maqyequipo.nomElemento, `tipNovedad`, `fecNovedad`, `perNovedad`, `cedPerNovedad`, `espNovedad`, `prioridad` FROM novedades INNER JOIN maqyequipo ON novedades.idMaqEquipo=maqyequipo.idMaqEquipo WHERE novedades.idNovedad=$id_novedad";
$resource=mysqli_query($conexion,$query);
$fila=mysqli_fetch_row($resource);


$query="SELECT * FROM `criticidad` WHERE idCriticidad=$criticidad";
$resource=mysqli_query($conexion,$query);
$fila1=mysqli_fetch_row($resource);

$query="SELECT * FROM tipmantenimiento WHERE tipmantenimiento.idTipMantenimiento=$idTipMantenimiento";
$resource=mysqli_query($conexion,$query);
$fila2=mysqli_fetch_row($resource);


				

?>  
 <tr>
  <td><?php echo "$fila[1]--$fila[3]"; ?></td> 
  <td><?php echo $fila1[1]; ?></td>
  <td><?php echo $numeroOrden; ?></td>
  <td><?php echo $solicitante; ?></td>
  <td><?php echo $txtfecha; ?></td>
  <td><?php echo $traRealizar; ?></td>
  <td><?php echo $fila2[1]; ?> </td>
  <td><?php echo $tipServicio; ?></td>
  <td><?php echo $prioridad; ?></td> 
  <td><?php echo $lugar;?></td>
                    
 </tr> 

</table>
</body>
</html>