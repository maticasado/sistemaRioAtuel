document.addEventListener("DOMContentLoaded", function() {
    const programaSelect = document.getElementById("programaSelect");

    programaSelect.addEventListener("change", function() {
        const idPrograma = this.value;
        if (!idPrograma) return;

        fetch(`get_programa.php?id=${idPrograma}`)
            .then(res => res.json())
            .then(data => {
                document.getElementById("procesador").value = data.procesador;
                document.getElementById("ram").value = data.ram;
                document.getElementById("almacenamiento").value = data.almacenamiento;
                document.getElementById("so").value = data.sistema_operativo;
            });
    });
});
