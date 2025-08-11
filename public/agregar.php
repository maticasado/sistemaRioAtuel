<?php
require_once '../config/db.php';

$programas = $conexion->query("SELECT * FROM programas")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conexion->prepare("INSERT INTO inventario_notebooks 
        (marca, fecha_revision, encargado, observaciones, posible_solucion, trabajo_hecho, programa_id, procesador, ram, almacenamiento, sistema_operativo) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['marca'],
        $_POST['fecha_revision'],
        $_POST['encargado'],
        $_POST['observaciones'],
        $_POST['posible_solucion'],
        $_POST['trabajo_hecho'],
        $_POST['programa_id'],
        $_POST['procesador'],
        $_POST['ram'],
        $_POST['almacenamiento'],
        $_POST['sistema_operativo']
    ]);
    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Agregar notebook</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<h2>Agregar nueva notebook</h2>
<form method="post">
    Marca: <input type="text" name="marca" required><br>
    Fecha de revisión: <input type="date" name="fecha_revision" required><br>
    Encargado: <input type="text" name="encargado" required><br>
    Observaciones: <textarea name="observaciones"></textarea><br>
    Posible solución: <textarea name="posible_solucion"></textarea><br>
    Trabajo hecho: <textarea name="trabajo_hecho"></textarea><br>

    Programa/Proyecto:
    <select name="programa_id" id="programaSelect" required>
        <option value="">Seleccione...</option>
        <?php foreach ($programas as $p): ?>
            <option value="<?= $p['id'] ?>"><?= $p['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Procesador: <input type="text" name="procesador" id="procesador"><br>
    RAM: <input type="text" name="ram" id="ram"><br>
    Almacenamiento: <input type="text" name="almacenamiento" id="almacenamiento"><br>
    Sistema Operativo: <input type="text" name="sistema_operativo" id="sistema_operativo"><br>

    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>

<script>
document.getElementById('programaSelect').addEventListener('change', function() {
    var programaId = this.value;

    if (programaId) {
        fetch('get_componentes.php?programa_id=' + programaId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('procesador').value = data.procesador || '';
                document.getElementById('ram').value = data.ram || '';
                document.getElementById('almacenamiento').value = data.almacenamiento || '';
                document.getElementById('sistema_operativo').value = data.sistema_operativo || '';
            });
    } else {
        document.getElementById('procesador').value = '';
        document.getElementById('ram').value = '';
        document.getElementById('almacenamiento').value = '';
        document.getElementById('sistema_operativo').value = '';
    }
});
</script>
