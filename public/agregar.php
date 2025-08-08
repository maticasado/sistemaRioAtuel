<?php
require_once '../config/db.php';

$programas = $conexion->query("SELECT * FROM programas")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conexion->prepare("INSERT INTO inventario_notebooks (marca, fecha_revision, encargado, observaciones, posible_solucion, trabajo_hecho, programa_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['marca'],
        $_POST['fecha_revision'],
        $_POST['encargado'],
        $_POST['observaciones'],
        $_POST['posible_solucion'],
        $_POST['trabajo_hecho'],
        $_POST['programa_id']
    ]);
    header("Location: index.php");
    exit;
}
?>
<head>
    <meta charset="UTF-8">
    <title>Agregar notebook</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="js/autocompletar.js" defer></script>
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
        <script>
document.querySelector('select[name="proyecto_id"]').addEventListener('change', function() {
    var proyectoId = this.value;

    if (proyectoId) {
        fetch('get_componentes.php?proyecto_id=' + proyectoId)
            .then(response => response.json())
            .then(data => {
                document.querySelector('input[name="procesador"]').value = data.procesador || '';
                document.querySelector('input[name="ram"]').value = data.ram || '';
                document.querySelector('input[name="almacenamiento"]').value = data.almacenamiento || '';
                document.querySelector('input[name="sistema_operativo"]').value = data.sistema_operativo || '';
            });
    }
});
</script>

        <option value="">Seleccione...</option>
        <?php foreach ($programas as $p): ?>
            <option value="<?= $p['id'] ?>"><?= $p['nombre'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Procesador: <input type="text" id="procesador" readonly><br>
    RAM: <input type="text" id="ram" readonly><br>
    Almacenamiento: <input type="text" id="almacenamiento" readonly><br>
    Sistema Operativo: <input type="text" id="so" readonly><br>

    <button type="submit">Guardar</button>
</form>
<a href="index.php">Volver</a>
