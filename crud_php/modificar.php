<?php
include "modelo/conexion.php";

// Obtener el ID del parámetro de la URL
$id = $_GET["id"];

// Realizar la consulta para obtener los datos del empleado
$sql = $conexion->query("SELECT * FROM empleados WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<!-- Formulario para modificar el empleado -->
<form class="col-4 p-3 m-auto" method="POST">
    <h5 class="text-center alert alert-secondary">Modificar empleado</h5>
    <!-- Campo oculto para enviar el ID -->
    <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

    <?php
    // Recuperar los datos del empleado de la base de datos
    while ($datos = $sql->fetch_object()) { ?>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
        </div>
        <div class="mb-3">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" class="form-control" name="apellidos" value="<?= $datos->apellidos ?>">
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" name="dni" value="<?= $datos->dni ?>">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="fecha" value="<?= $datos->fecha ?>">
        </div>
        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" class="form-control" name="correo" value="<?= $datos->email ?>">
        </div>
    <?php } ?>
    
    <button type="submit" class="btn btn-primary w-100" name="btnactualizar" value="ok">Actualizar</button>
</form>



</body>
</html>

