<!---Conexion a base de datos-->
<?php
class mysqlconex
{
    public function conex()
    {
        $enlace = mysqli_connect("localhost", "root", "", "ecolacus");
        return $enlace;
    }
}
?>