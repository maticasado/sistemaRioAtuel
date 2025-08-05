<?php
$host = "localhost";
$dbname = "laboratorio_inventario";
$user = "root";
$pass = ""; 

try {
    $conexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
