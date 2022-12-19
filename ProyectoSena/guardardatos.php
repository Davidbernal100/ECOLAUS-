<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include('db.php');

$cedula=$_POST['textCedula';]
$nombre=$_POST['textNombre';]
$apellido=$_POST['textApellido';]
$correo=$_POST['textCorreo';]
$edad=$_POST['textEdad';]
$password=$_POST['textPassword';]

$consulta="INSERT INTO `usuario` (`Cedula`, `Nombres`, `Apellidos`, `Correo`, `Edad`, `Password`) 
VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$edad', '$password');"

$resultado=mysqli_query($con, $consulta) or die("Error de regitro");

echo "Registro exitoso";

mysqli_close($con);
?>