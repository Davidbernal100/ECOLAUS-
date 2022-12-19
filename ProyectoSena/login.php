<?php

  require "db.php";

  session_start();

  if($_POST){

    $usuario = $_POST['usuario'];
    $password = $_POST['Password'];

    $sql = "SELECT id, password, nombre, FROM usuarios WHERE usuario='$usuario'";

    $resultado = $mysqli->query($sql);
    $num = $resultado->num_rows;

    if ($num > 0) {
      
      $row = $resultado->fetch_assoc();
      $password_bd = $row['password'];

      $pass_c = sha1($password);

      if ($password_bd == $pass_c) {
        
        $_SESSION['Cedula'] = $row['Cedula'];
        $_SESSION['Nombres'] = $row['Nombres'];

        header("Location: dashboard.php");

      }else{

        echo "La contraseña no coincide";

      }

    }else{

      echo "No existe el usuario";

    }

  }

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario CSS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">
            
        </div>

        <form action="validar.php" method="post">
            <div class="texto-formulario">
                <h2>Bienvenido de nuevo</h2>
                <p>Inicia sesión con tu cuenta</p>
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" id="usuario">
            </div>
            <div class="input">
                <label for="password">Contraseña</label>
                <input placeholder="Ingresa tu password" type="password" id="password">
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>

</body>

</html>