<?php
include("conex.php");
session_start();
$sql = "Select * From usuarios Where nom_usu='".$_POST['usuario']."' and cont_usu = '".$_POST['clave']."'";
$consulta = mysqli_query($enlace, $sql);
if ($datos=mysqli_fetch_assoc($consulta)){
$_SESSION["autentificado"] = "SI";
$_SESSION["nombre"]= $datos['nom_usu'] ;
$_SESSION["nombre "].=", ".$datos['ape_usu'] ;
$_SESSION["nivel"]= $datos['niv_usu'] ;


switch( $_SESSION['nivel'] ) {
case '255':
header( 'Location: administrador.php' );
break;
case '10':
header( 'Location: trabajador.php' );
break;
case '1';
header('Location: estudiante.php');
break;
}
}else {
header("Location: acceder.php?m=5&error=1");
}

?>
