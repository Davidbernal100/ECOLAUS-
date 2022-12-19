<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
	<form action="insertar.php" method="POST">
	<label for="Cedula">Cedula:</label><input type="text" name="Cedula" id="Cedula">

	<label for="Nombres">Nombre:</label><input type="text" name="Nombres" id="Nombres">

	<label for="Apellidos">Apellido:</label><input type="text" name="Apellidos" id="Apellidos">

	<label for="Correo">Correo:</label><input type="text" name="Correo" id="Correo">

	<label for="Edad">Edad:</label><input type="text" name="Edad" id="Edad">
	
	<label for="Password">password:</label><input type="text" name="Password" id="Password">

	<input type="submit" name="registrar" value="registrar">
</form>
	<table>
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Edad</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include("db.php");
			$getmysql = new mysqlconex();
            $getconex = $getmysql->conex();

            $consulta = "SELECT * FROM usuario";
            $resultado = mysqli_query($getconex, $consulta);
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila["Cedula"] . "</td>";
                echo "<td>" . $fila["Nombres"] . "</td>";
                echo "<td>" . $fila["Apellidos"] . "</td>";
                echo "<td>" . $fila["Correo"] . "</td>";
				echo "<td>" . $fila["Edad"] . "</td>";
                echo "<td>" . $fila["Password"] . "</td>";

                echo "<td>
                        <form action='eliminar.php' method='POST'>
                        <input type='hidden' name='Cedula' value='" . $fila["Cedula"] . "'>
                        <input type='hidden' name='Nombres' value='" . $fila["Nombres"] . "'>
						<input type='hidden' name='Apellidos' value='" . $fila["Apellidos"] . "'>
						<input type='hidden' name='Correo' value='" . $fila["Correo"] . "'>
						<input type='hidden' name='Edad' value='" . $fila["Edad"] . "'>
						<input type='hidden' name='Password' value='" . $fila["Password"] . "'>
						
                        <input type='submit' name='eliminar' value='eliminar' onclick='return confirmacion()'>
                        </form>
                    </td>";
                echo "<td>
                    <form action='editar.php' method='POST'>
                    <input type='hidden' name='Cedula' value='" . $fila["Cedula"] . "'>
                    <input type='hidden' name='Nombres' value='" . $fila["Nombres"] . "'>
                    <input type='hidden' name='Apellidos' value='" . $fila["Apellidos"] . "'>
                    <input type='hidden' name='Correo' value='" . $fila["Correo"] . "'>
					<input type='hidden' name='Edad' value='" . $fila["Edad"] . "'>
					<input type='hidden' name='Password' value='" . $fila["Password"] . "'>
                    <input type='submit' name='editar' value='editar' '>
                    </form>
                </td>";
                echo "</tr>";
            }
            mysqli_close($getconex);
            ?>
		</tbody>
	</table>
</body>
</html>