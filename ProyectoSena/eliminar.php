
<?php
include("db.php");
$getmysql = new mysqlconex();
$getconext = $getmysql->conex();


if (isset($_POST["eliminar"])) {
    $Cedula = $_POST["Cedula"];
    $Nombres = $_POST["Nombres"];
    $Apellidos = $_POST["Apellidos"];
    $Correo = $_POST["Correo"];
    $Edad = $_POST["Edad"];
    $Password = $_POST["Password"];


    $query = "DELETE FROM usuario WHERE Cedula=?";
    $sentencia = mysqli_prepare($getconext, $query);
    mysqli_stmt_bind_param($sentencia, "i", $Cedula);
    mysqli_stmt_execute($sentencia);
    $afectado = mysqli_stmt_affected_rows($sentencia);
    if ($afectado == 1) {
        echo "<script> alert('El empleado [$nombre] se elimino correctamente'); location.href='dashboard.php'; </script>";
    } else {
        echo "<script> alert('El empleado [$nombre] no elimino correctamente :( '); location.href='dashboard.php'; </script>";
    }
}
?>