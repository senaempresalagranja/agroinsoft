<?php 
$id_solicitud=$_POST["id_solicitud"];
    		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$query="SELECT `idSolicitudes`, `idNovedad`,idCriticidad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, `idtipMantenimiento`, `tipServicio`, `prioridad`, `lugMantenimiento` FROM `solicitudes` WHERE idSolicitudes=$id_solicitud";
				$resource=mysqli_query($conexion,$query);
	$fila=mysqli_fetch_row($resource);

	echo "<script>

 var id_novedad=document.getElementById('id_novedad').style.opacity=1;
 var id_novedad=document.getElementById('id_novedad').value='$fila[1]';
 var numeroOrden=document.getElementById('numeroOrden').value='$fila[2]';
var criticidad=document.getElementById('criticidad').value='$fila[3]';
validar_criticidad();
var solicitante=document.getElementById('solicitante').value='$fila[4]';
var txtfecha=document.getElementById('txtfecha').value='$fila[5]';
var traRealizar=document.getElementById('traRealizar').value='$fila[6]';
var idTipMantenimiento=document.getElementById('idTipMantenimiento').value='$fila[7]';
var tipServicio=document.getElementById('tipServicio').value='$fila[8]';
var prioridad=document.getElementById('prioridad').value='$fila[9]';
var lugar=document.getElementById('lugar').value='$fila[10]';

	</script>";
 ?>