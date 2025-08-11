<?php
require_once '../config/db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexion->prepare("
        SELECT inv.*, prog.nombre AS programa
        FROM inventario_notebooks inv
        LEFT JOIN programas prog ON inv.programa_id = prog.id
        WHERE inv.id = ?
    ");
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<head>
    <meta charset="UTF-8">
    <title>Resultado de búsqueda</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="container">
    <h2>Resultado de búsqueda</h2>
    <?php if ($row): ?>
        <p><strong>ID:</strong> <?= $row['id'] ?></p>
        <p><strong>Marca:</strong> <?= $row['marca'] ?></p>
        <p><strong>Fecha Revisión:</strong> <?= $row['fecha_revision'] ?></p>
        <p><strong>Encargado:</strong> <?= $row['encargado'] ?></p>
        <p><strong>Programa:</strong> <?= $row['programa'] ?></p>

        <div class="actions">
            <a href="detalle.php?id=<?= $row['id'] ?>">Ver Detalle</a> |
            <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
            <a href="index.php">Volver</a>
        </div>
    <?php else: ?>
        <p>No se encontró ninguna notebook con el ID ingresado.</p>
        <div class="actions">
            <a href="index.php">Volver</a>
        </div>
    <?php endif; ?>
</div>
</body>
