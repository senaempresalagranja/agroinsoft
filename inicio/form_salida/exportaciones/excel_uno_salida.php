<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Salida.xls");

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
    <td colspan="7" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="8"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE SALIDAS</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>CODIGO INTERNO</strong></td>
    <td><strong>NOMBRE MAQUINA</strong></td>
    <td><strong>FECHA SALIDA </strong></td>
    <td><strong>FECHA REGRESO</strong></td>
    <td><strong>PROVEEDOR</strong></td>
    <td><strong>UBICACION</strong></td>
    <td><strong>CUENTADANTE</strong></td>
    <td><strong>DESTINO</strong></td>
  </tr>
  
<?PHP


$id_maquina=$_POST["id_maquina"];
$fecSalida=$_POST["fecSalida"];
$fecLimRegreso=$_POST["fecLimRegreso"];
$idProveedor=$_POST["idProveedor"];
$idUbicacion=$_POST["idUbicacion"];
$idCuentadante=$_POST["idCuentadante"];
$destino=$_POST["destino"]; 

$sql=mysqli_query($conexion, "SELECT nomElemento, codInterno, fecSalida, fecLimRegreso, nomProveedor, nomUbicacion, nomCuentadante, apeCuentadante, destino FROM `salidas` INNER JOIN maqyequipo ON salidas.idMaqEquipo=maqyequipo.idMaqEquipo INNER JOIN proveedor ON salidas.idProveedor=proveedor.idProveedor INNER JOIN ubicacion ON salidas.idUbicacion=ubicacion.idUbicacion INNER JOIN cuentadante ON salidas.idCuentadante=cuentadante.idCuentadante where salidas.idMaqEquipo=$id_maquina ");

          $fila=mysqli_fetch_array($sql);


				

?>  
 <tr>
  <td><?php echo $fila[1]; ?></td>
  <td><?php echo $fila[0]; ?></td> 
  <td><?php echo $fecSalida; ?></td>
  <td><?php echo $fecLimRegreso; ?></td>
  <td><?php echo $fila[4]; ?></td>
  <td><?php echo $fila[5]; ?></td>
  <td><?php echo $fila[6], ' ',$fila[7]; ?></td>
  <td><?php echo $destino; ?></td>                     
 </tr> 

</table>
</body>
</html>