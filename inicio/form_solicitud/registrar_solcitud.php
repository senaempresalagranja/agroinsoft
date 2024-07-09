<?php 

$criticidad=$_POST["criticidad"];
$prioridad=$_POST["prioridad"];
$numeroOrden=$_POST["numeroOrden"];
$traRealizar=$_POST["traRealizar"];
$id_novedad=$_POST["id_novedad"];
$solicitante=$_POST["solicitante"];
$idTipMantenimiento=$_POST["idTipMantenimiento"];
$tipServicio=$_POST["tipServicio"];
$lugar=$_POST["lugar"];
$txtfecha=$_POST["txtfecha"];






   		 		$servidor = "localhost"; 
				$usuario = "root"; 
				$contraseña = ""; 
				$BD = "bdagroinsoft"; 
				$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
				$insertar="INSERT INTO `solicitudes`(`idNovedad`,idCriticidad, `numOrden`, `solicitante`, `fecSolicitud`, `traRealizar`, `idtipMantenimiento`, `tipServicio`, `prioridad`, `lugMantenimiento`) VALUES ($id_novedad,$criticidad,$numeroOrden,'$solicitante','$txtfecha','$traRealizar','$idTipMantenimiento','$tipServicio','$prioridad','$lugar')";
					$resource=mysqli_query($conexion, $insertar);


					if ($resource==true) {
						echo "<script>

alert('Registro exitoso')
						</script>";
					}else{

					
							echo "<script>

alert('Registro no exitoso')
						</script>";	
					}
 ?>