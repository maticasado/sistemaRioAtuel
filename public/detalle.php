<?php
require_once '../config/db.php';

$id = $_GET['id'];
$stmt = $conexion->prepare("
    SELECT inv.*, prog.nombre AS programa, prog.procesador, prog.ram, prog.almacenamiento, prog.sistema_operativo
    FROM inventario_notebooks inv
    LEFT JOIN programas prog ON inv.programa_id = prog.id
    WHERE inv.id = ?
");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<head>
    <meta charset="UTF-8">
    <title>Detalle de Notebook</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="container">
    <h2>Detalle de la Notebook</h2>
    <p><strong>Marca:</strong> <?= $row['marca'] ?></p>
    <p><strong>Fecha Revisión:</strong> <?= $row['fecha_revision'] ?></p>
    <p><strong>Encargado:</strong> <?= $row['encargado'] ?></p>
    <p><strong>Observaciones:</strong> <?= $row['observaciones'] ?></p>
    <p><strong>Posible solución:</strong> <?= $row['posible_solucion'] ?></p>
    <p><strong>Trabajo hecho:</strong> <?= $row['trabajo_hecho'] ?></p>
    <p><strong>Programa:</strong> <?= $row['programa'] ?></p>
    <p><strong>Procesador:</strong> <?= $row['procesador'] ?></p>
    <p><strong>RAM:</strong> <?= $row['ram'] ?></p>
    <p><strong>Almacenamiento:</strong> <?= $row['almacenamiento'] ?></p>
    <p><strong>Sistema Operativo:</strong> <?= $row['sistema_operativo'] ?></p>

    <div class="actions">
        <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
        <a href="index.php">Volver</a>
    </div>
</div>
</body>
