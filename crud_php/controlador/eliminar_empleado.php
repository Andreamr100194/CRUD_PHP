<?php


if (!empty($_GET["id"])) {
    $id = intval($_GET["id"]); // Asegúrate de que sea un número
    $stmt = $conexion->prepare("DELETE FROM empleados WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Empleado eliminado correctamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar empleado: ' . $conexion->error . '</div>';
    }
    $stmt->close();
}



?>