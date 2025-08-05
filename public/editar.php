<?php
require_once '../config/db.php';

$id = $_GET['id'];
$stmt = $conexion->prepare("SELECT * FROM inventario_notebooks WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conexion->prepare("UPDATE inventario_notebooks SET marca = ?, fecha_revision = ?, encargado = ?, observaciones = ?, posible_solucion = ?, trabajo_hecho = ? WHERE id = ?");
    $stmt->execute([
        $_POST['marca'],
        $_POST['fecha_revision'],
        $_POST['encargado'],
        $_POST['observaciones'],
        $_POST['posible_solucion'],
        $_POST['trabajo_hecho'],
        $id
    ]);
    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<h2>Editar notebook</h2>
<form method="post">
    Marca: <input type="text" name="marca" value="<?= $row['marca'] ?>" required><br>
    Fecha de revisión: <input type="date" name="fecha_revision" value="<?= $row['fecha_revision'] ?>" required><br>
    Encargado: <input type="text" name="encargado" value="<?= $row['encargado'] ?>" required><br>
    Observaciones: <textarea name="observaciones"><?= $row['observaciones'] ?></textarea><br>
    Posible solución: <textarea name="posible_solucion"><?= $row['posible_solucion'] ?></textarea><br>
    Trabajo hecho: <textarea name="trabajo_hecho"><?= $row['trabajo_hecho'] ?></textarea><br>
    <button type="submit">Actualizar</button>
</form>
<a href="index.php">Volver</a>
