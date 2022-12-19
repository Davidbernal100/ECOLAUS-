
<?php
include("db.php");
$getmysql = new mysqlconex();
$getconex = $getmysql->conex();

if (isset($_POST["registrar"])) {
    $Cedula = $_POST["Cedula"];
    $Nombres = $_POST["Nombres"];
    $Apellidos = $_POST["Apellidos"];
    $Correo = $_POST["Correo"];
    $Edad = $_POST["Edad"];
    $Password = $_POST["Password"];


    $query = "INSERT INTO usuario (Cedula, Nombres, Apellidos, Correo, Edad, Password) VALUES (?,?,?,?,?,?)";
    $sentencia = mysqli_prepare($getconex, $query);
    mysqli_stmt_bind_param($sentencia, "sss", $Cedula, $Nombres, $Apellidos, $Correo, $Edad, $Password);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] se agrego correctamente'); location.href='dashboard.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no agrego correctamente :( '); location.href='dashboard.php'; </script>";
    }
    mysqli_stmt_close($sentencia);
    mysqli_close($getconex);
}
?>
