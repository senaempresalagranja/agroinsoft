<?php

/**
**
**  BY**********************************************************************
**                      REDES SOCIALES                            ****
**********************************************************************
**                                                                ****
** FACEBOOK: https://www.facebook.com/icodeart                    ****
** TWIITER: https://twitter.com/icodeart                          ****
** YOUTUBE: https://www.youtube.com/c/icodeartdeveloper           ****
** GITHUB: https://github.com/icodeart                            ****
** TELEGRAM: https://telegram.me/icodeart                         ****
** EMAIL: info@icodeart.com                                       ****
**                                                                ****
**********************************************************************
**********************************************************************
**/
    
    //incluimos nuestro archivo config
    include 'config.php'; 

    // Incluimos nuestro archivo de funciones
    include 'funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT * FROM manprogramado WHERE id=$id");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];


    $codInterno=$row['idMaqEquipo'];

    $clase=$row['class'];


                        $servidor = "localhost"; 
                        $usuario = "root"; 
                        $contraseña = ""; 
                        $BD = "bdagroinsoft"; 
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
                        $insertar="SELECT * FROM tipmantenimiento WHERE idTipMantenimiento=$clase";
                            $resource=mysqli_query($conexion, $insertar);
                            $fila8=mysqli_fetch_row($resource);



                        $servidor = "localhost"; 
                        $usuario = "root"; 
                        $contraseña = ""; 
                        $BD = "bdagroinsoft"; 
                        $conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
                        $insertar="SELECT * FROM `maqyequipo`INNER JOIN ubicacion ON maqyequipo.idUbicacion=ubicacion.idUbicacion WHERE idMaqEquipo=$codInterno";
                            $resource=mysqli_query($conexion, $insertar);
                            $fila=mysqli_fetch_row($resource);

                      

// Eliminar evento
if (isset($_POST['eliminar_evento'])) 
{
    $id  = evaluar($_GET['id']);
    $sql = "DELETE FROM manprogramado WHERE id = $id";
    if ($conexion->query($sql)) 
    {
        echo "Evento eliminado";
    }
    else
    {
        echo "El evento no se pudo eliminar";
    }
}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$titulo?></title>
</head>
<body>

	 <h3><?=$titulo?></h3>
	 <hr>
     <b>Codigo Interno de la Maquina:</b><?=$fila[3]?><br/>
     <b>Nombre Maquina:</b> <?=$fila[1]?><br/>
     <b>Ubicacion Maquina:</b> <?=$fila[16]?><br/>
     <b>Tipo de Mantenimiento:</b> <?=$fila8[1]?><br/>
     <b>Fecha inicio:</b> <?=$inicio?><br/>
     <b>Fecha termino:</b> <?=$final?><br/>
    <b>Observaciones:</b>:</b> <?=$evento?><br/>


<form action="" method="post" id="formulario">
    <button type="submit" class="btn btn-danger" data-dismiss="modal" name="eliminar_evento">Eliminar</button>
<!--     <input type="button" class="btn btn-success" value="Exportar" onclick="exportar_datos()">

    <script>
                    function exportar_datos() {
    
                     var formulario=document.getElementById('formulario').action='exp_programado.php';

                     $('#formulario').submit();

                    }
    </script> -->
</form>

</body>

</html>
