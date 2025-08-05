<?php
require_once '../config/db.php';

$stmt = $conexion->query("SELECT * FROM inventario_notebooks ORDER BY fecha_revision DESC");
$notebooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<h1>Inventario de Notebooks Rio Atuel</h1>
<a href="agregar.php">+ Agregar notebook</a>
<img class="Logo" src="../img/Logo-Atuel.jfif" alt="Logo Atuel">
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Fecha Revisión</th>
        <th>Encargado</th>
        <th>Observaciones</th>
        <th>Posible Solución</th>
        <th>Trabajo Hecho</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($notebooks as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['marca'] ?></td>
            <td><?= $row['fecha_revision'] ?></td>
            <td><?= $row['encargado'] ?></td>
            <td><?= $row['observaciones'] ?></td>
            <td><?= $row['posible_solucion'] ?></td>
            <td><?= $row['trabajo_hecho'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
