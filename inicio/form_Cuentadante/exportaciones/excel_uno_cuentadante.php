<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Cuentadante.xls");

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
    <td colspan="8" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="9"  bgcolor="#99CCFF"><CENTER><strong>DATOS CUENTADANTE</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>TIPO DOCUMENTO</strong></td>
    <td><strong>NUMERO</strong></td>
    <td><strong>NOMBRES</strong></td>
    <td><strong>APELLIDOS</strong></td>
    <td><strong>FECHA NACIMIENTO</strong></td>
    <td><strong>CARGO</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>EMAIL</strong></td>
    <td><strong>DIRECCION</strong></td>
  </tr>
  
<?PHP


  $tipDocumento=$_POST["tipDocumento"];
  $numDocumento=$_POST["numDocumento"];
  $nomCuentadante=$_POST["nomCuentadante"];
  $apeCuentadante=$_POST["apeCuentadante"];
  $fecNacimiento=$_POST["fecNacimiento"];
  $idCargo=$_POST["idCargo"];
  $emaCuentadante=$_POST["emaCuentadante"];
  $dirCuentadante=$_POST["dirCuentadante"];  

$sql=mysqli_query($conexion, "SELECT tipDocumento, numDocumento, nomCuentadante, apeCuentadante, fecNacimiento, nomCargo, telCuentadante, emaCuentadante, dirCuentadante FROM `cuentadante` INNER JOIN cargo ON cuentadante.idCargo=cargo.idCargo WHERE numDocumento='$numDocumento' ");

          $fila=mysqli_fetch_array($sql);


				

?>  
 <tr>
  <td><?php echo $fila[0]; ?></td>
  <td><?php echo $fila[1]; ?></td> 
  <td><?php echo $fila[2]; ?></td>
  <td><?php echo $fila[3]; ?></td>
  <td><?php echo $fila[4]; ?></td>
  <td><?php echo $fila[5]; ?></td>
  <td><?php echo $fila[6]; ?></td>
  <td><?php echo $fila[7]; ?></td>  
  <td><?php echo $fila[8]; ?></td>                    
 </tr> 

</table>
</body>
</html>