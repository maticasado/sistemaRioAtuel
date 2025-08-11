<?php
require_once '../config/db.php';

if (isset($_GET['encargado']) && !empty($_GET['encargado'])) {
    $encargado = $_GET['encargado'];
    $stmt = $conexion->prepare("
        SELECT inv.*, prog.nombre AS programa
        FROM inventario_notebooks inv
        LEFT JOIN programas prog ON inv.programa_id = prog.id
        WHERE inv.encargado LIKE ?
    ");
    $stmt->execute(['%' . $encargado . '%']);
    $notebooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<head>
    <meta charset="UTF-8">
    <title>Filtrar por Encargado</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="container">
    <h2>Resultados: Encargado "<?= htmlspecialchars($encargado) ?>"</h2>
    <?php if (!empty($notebooks)): ?>
        <table border="1" cellpadding="5" cellspacing="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Fecha Revisión</th>
                <th>Encargado</th>
                <th>Programa</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($notebooks as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['marca'] ?></td>
                    <td><?= $row['fecha_revision'] ?></td>
                    <td><?= $row['encargado'] ?></td>
                    <td><?= $row['programa'] ?></td>
                    <td>
                        <a href="detalle.php?id=<?= $row['id'] ?>">Ver Detalle</a> |
                        <a href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                        <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar esta notebook?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No se encontraron notebooks para este encargado.</p>
    <?php endif; ?>
    <div class="actions">
        <a href="index.php">Volver</a>
    </div>
</div>
</body>
