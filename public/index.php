<?php
require_once '../config/db.php';

$stmt = $conexion->query("
    SELECT inv.*, prog.nombre AS programa
    FROM inventario_notebooks inv
    LEFT JOIN programas prog ON inv.programa_id = prog.id
    ORDER BY fecha_revision DESC
");
$notebooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
    <meta charset="UTF-8">
    <title>Inventario de Notebooks</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<h1>Inventario de Notebooks del Laboratorio</h1>
<a href="agregar.php">+ Agregar notebook</a>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Marca</th>
        <th>Fecha Revisión</th>
        <th>Encargado</th>
        <th>Observaciones</th>
        <th>Programa</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($notebooks as $row): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['marca'] ?></td>
            <td><?= $row['fecha_revision'] ?></td>
            <td><?= $row['encargado'] ?></td>
            <td><?= $row['observaciones'] ?></td>
            <td><?= $row['programa'] ?></td>
            <td>
                <a href="detalle.php?id=<?= $row['id'] ?>">Ver</a> |
                <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
