<?php
require_once '../config/db.php';

if (isset($_GET['programa_id'])) {
    $id = intval($_GET['programa_id']);

    $stmt = $conexion->prepare("SELECT procesador, ram, almacenamiento, sistema_operativo 
                                 FROM programas 
                                 WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    } else {
        echo json_encode([]);
    }
}
?>
