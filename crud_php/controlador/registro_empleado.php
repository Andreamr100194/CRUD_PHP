<?php
if (!empty($_POST["btnregistrar"])) {
    // Verifica que todos los campos estén completos
    if (!empty($_POST["nombre"]) && !empty($_POST["apellidos"]) && !empty($_POST["dni"]) && !empty($_POST["fecha"]) && !empty($_POST["correo"])) {
        // Asignación de los valores
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $dni = $_POST["dni"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];

        // Realizar la consulta de inserción
        $sql = $conexion->query("INSERT INTO empleados (nombre, apellidos, dni, fecha, email) 
                                 VALUES ('$nombre', '$apellidos', '$dni', '$fecha', '$correo')");

        if ($sql) {
            echo '<div class="alert alert-success">Empleado registrado correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">El empleado no se ha podido registrar</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Revisa los campos</div>';
    }
}
?>
