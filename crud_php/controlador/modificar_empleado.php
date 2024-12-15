

<?php
if (!empty($_POST["btnactualizar"])) {

    // Obtener datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $fecha = $_POST["fecha"];
    $email = $_POST["correo"];

    // Validar que no haya datos vacíos
    if (empty($id) || empty($nombre) || empty($apellidos) || empty($dni) || empty($fecha) || empty($email)) {
        echo "<div class='alert alert-warning'>Por favor, completa todos los campos</div>";
    } else {
        // Preparar consulta SQL utilizando sentencias preparadas para mayor seguridad
        $stmt = $conexion->prepare("UPDATE empleados SET nombre = ?, apellidos = ?, dni = ?, fecha = ?, email = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $nombre, $apellidos, $dni, $fecha, $email, $id);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir si todo fue exitoso
            header("Location: index.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Error al modificar los datos: " . $stmt->error . "</div>";
        }

        // Cerrar la sentencia
        $stmt->close();
    }
}
?>


