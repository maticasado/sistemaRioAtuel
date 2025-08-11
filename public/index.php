<?php
require_once '../config/db.php';
$stmt = $conexion->query("
    SELECT inv.id, inv.marca, inv.fecha_revision, inv.encargado, prog.nombre AS programa
    FROM inventario_notebooks inv
    LEFT JOIN programas prog ON inv.programa_id = prog.id
");
$notebooks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
    <meta charset="UTF-8">
    <title>Inventario de Notebooks</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
<div class="container">
    <h2>Inventario de Notebooks</h2>

    <!-- Buscar por ID -->
    <form action="buscar.php" method="get" style="margin-bottom: 10px;">
        <label for="id">Buscar por ID:</label>
        <input type="number" name="id" id="id" required>
        <button type="submit">Buscar</button>
    </form>

    <!-- Filtrar por Encargado -->
    <form action="filtrar_encargado.php" method="get" style="margin-bottom: 10px;">
        <label for="encargado">Filtrar por Encargado:</label>
        <input type="text" name="encargado" id="encargado" required>
        <button type="submit">Filtrar</button>
    </form>

    <!-- Filtrar por Programa -->
    <form action="filtrar_programa.php" method="get" style="margin-bottom: 20px;">
        <label for="programa">Filtrar por Programa:</label>
        <input type="text" name="programa" id="programa" required>
        <button type="submit">Filtrar</button>
    </form>

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
                    <a href="editar.php?id=<?= $row['id'] ?>">Editar</a> |
                    <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar esta notebook?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="actions" style="margin-top: 15px;">
        <a href="agregar.php">Agregar Notebook</a>
    </div>
</div>
</body>
