<?php 

$codInterno1=$_POST["codInterno1"];
$fro=$_POST["fro"];

$servidor = "localhost"; 
$usuario = "root"; 
$contraseña = ""; 
$BD = "bdagroinsoft"; 


		$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD) or die ("problemas con la conexion");
		$sql="SELECT * FROM manprogramado WHERE idMaqEquipo='$codInterno1' AND inicio_normal='$fro' ";
		$cs=mysqli_query($conexion, $sql);
		$resource=mysqli_fetch_row($cs);



	echo "<script>

                    var title=document.getElementById('title').value='$resource[2]';
                    var body=document.getElementById('body').value='$resource[3]';                   
                    var tipo=document.getElementById('tipo').value='$resource[5]';                    
                    var fro=document.getElementById('fro').value='$resource[8]';                    
                    var to=document.getElementById('too').value='$resource[9]';




	</script>";

 ?> 