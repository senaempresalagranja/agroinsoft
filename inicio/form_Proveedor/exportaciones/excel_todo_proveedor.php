<?php

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Reporte Proveedores.xls");

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
    <td colspan="5" bgcolor="#F5FFFA"><CENTER><strong>AGROINSOFT 2.0</strong></CENTER>
    <CENTER><strong>Sistema de Información para el Control de Mantenimientos Correctivos y Preventivos</strong></CENTER>

    </td>
    <td >
    	<img src="logo.png"/>
    </td>
  </tr>
  <tr>
    <td colspan="6"  bgcolor="#99CCFF"><CENTER><strong>LISTADO DE PROVEEDORES</strong></CENTER></td>
  </tr>
  <tr  bgcolor="silver">
    <td><strong>NOMBRE</strong></td>
    <td><strong>NIT</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>DIRECCION</strong></td>
    <td><strong>EMAIL</strong></td>
    <td><strong>SITIO WEB</strong></td>
  </tr>
  
<?PHP
		
$sql=mysqli_query($conexion, "SELECT * FROM proveedor ");


while($res=mysqli_fetch_array($sql)){		

  $nomProveedor=$res["nomProveedor"];
  $nitProveedor=$res["nitProveedor"];
  $telProveedor=$res["telProveedor"];
  $dirProveedor=$res["dirProveedor"];
  $emaProveedor=$res["emaProveedor"];
  $sitWebProveedor=$res["sitWebProveedor"]; 		

?>  
 <tr>
  <td><?php echo $nomProveedor; ?></td>
  <td><?php echo $nitProveedor; ?></td>
  <td><?php echo $telProveedor; ?></td>
  <td><?php echo $dirProveedor; ?></td>
  <td><?php echo $emaProveedor; ?></td>
  <td><?php echo $sitWebProveedor; ?></td>                   
 </tr> 
  <?php
}
  ?>
</table>
</body>
</html>