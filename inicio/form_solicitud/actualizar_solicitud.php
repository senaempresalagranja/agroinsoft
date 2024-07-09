<?php 


$prioridad=$_POST["prioridad"];
$numeroOrden=$_POST["numeroOrden"];
$traRealizar=$_POST["traRealizar"];
$id_novedad=$_POST["id_novedad"];
$solicitante=$_POST["solicitante"];
$idTipMantenimiento=$_POST["idTipMantenimiento"];
$tipServicio=$_POST["tipServicio"];
$lugar=$_POST["lugar"];
$txtfecha=$_POST["txtfecha"];

$criticidad=$_POST["criticidad"];

$id_solicitud=$_POST["id_solicitud"];


   		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="UPDATE `solicitudes` SET `idNovedad`=$id_novedad, idCriticidad='$criticidad',`numOrden`=$numeroOrden,`solicitante`='$solicitante',`fecSolicitud`='$txtfecha',`traRealizar`='$traRealizar',`idtipMantenimiento`=$idTipMantenimiento,`tipServicio`='$tipServicio',`prioridad`='$prioridad',`lugMantenimiento`='$lugar' WHERE idSolicitudes='$id_solicitud'";
					$resource=mysqli_query($conexion, $insertar);


					if ($resource==true) {
						echo "<script>

alert('Actualizacion Exitosa')
						</script>";
					}else{

					
							echo "<script>

alert('Actualizacion no Exitosa')
						</script>";	
					}
 ?>