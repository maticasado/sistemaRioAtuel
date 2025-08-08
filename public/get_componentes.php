<?php
include 'conexion.php';

if (isset($_GET['proyecto_id'])) {
    $id = intval($_GET['proyecto_id']);

    $sql = "SELECT procesador, ram, almacenamiento, sistema_operativo 
            FROM proyectos 
            WHERE id = $id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode([]);
    }
}
?>
