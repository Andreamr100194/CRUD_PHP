<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud PHP/MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d90e9c49da.js" crossorigin="anonymous"></script>
</head>
<body>

    
    <h1 class="text-center p-3">CRUD APP EMPLEADOS</h1>
    <?php
    include "modelo/conexion.php";
    include "controlador/eliminar_empleado.php"
    ?>
    <!-- Contenedor principal -->
    <div class="container-fluid row">
        <!-- Formulario de Registro -->
        <form class="col-md-3 p-4 ms-4 border" method="POST">
            <h3 class="text-center text-secondary">Registro de empleados</h3>
            <?php
            
            include "controlador/registro_empleado.php";
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo">
            </div>
            <button type="submit" class="btn btn-primary w-100" name="btnregistrar" value="ok">Registrar</button>
        </form>

        <!-- Tabla de empleados -->
        <div class="col-md-8 p-3 ms-4">
            <table class="table">
                <thead style="background-color: #0d6efd; color: white;">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NAC</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM empleados");
                    while($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellidos ?></td>
                            <td><?= $datos->dni ?></td>
                            <td><?= $datos->fecha ?></td>
                            <td><?= $datos->email ?></td>
                            <td>
                                <a href="modificar.php?id=<?= $datos->id?>" class="btn btn-small btn-warning">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger">
                                    <i class="fa-solid fa-eraser"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
