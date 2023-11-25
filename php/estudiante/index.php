<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require_once('estudianteModel.php');
$object = new estudianteModel();
$rows = $object->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
</head>
<body>
    <?php
        require_once('../navbar.php');
        ?>
        <section class = "intro">
    <div class="container">
    <div class="mb-3">
        <h2>Listado de Estudiantes</h2>
    </div>
    <div class="container">
        <div class="table-responsive table-table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height:700px;">
            <table class="table table-striped mb-0">
            <thead style="background-color: #002d72;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php if (is_array($rows) && count($rows) > 0) { ?>
    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?=$row['idEstudiante']?></td>
            <td><?=$row['nombre']?></td>
            <td><?=$row['apellido']?></td>
            <td>
                <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#idver<?=$row['idEstudiante']?>">Ver</a>
                <a class="btn btn-warning" href="">Editar</a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#iddel<?=$row['idEstudiante']?>">Eliminar</a>

                <!-- modal para ver y del-->
                <?php
                    include ('viewModal.php');
                    include ('deleteModal.php');
                ?>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="4">No hay datos disponibles</td>
    </tr>
<?php } ?>

           </tbody>
        </table>
    </div>
    </div>
            </section>
</body>
<script src="../../js/bootstrap.bundle.min.js"></script>
</html>