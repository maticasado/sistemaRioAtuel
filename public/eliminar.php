<?php
require_once '../config/db.php';

$id = $_GET['id'];

$stmt = $conexion->prepare("DELETE FROM inventario_notebooks WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;?>
<head>
    <meta charset="UTF-8">
    <title>Inventario</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
