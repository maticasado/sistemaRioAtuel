<?php
require_once '../config/db.php';

if (isset($_GET['id'])) {
    $stmt = $conexion->prepare("SELECT procesador, ram, almacenamiento, sistema_operativo FROM programas WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($data);
}
