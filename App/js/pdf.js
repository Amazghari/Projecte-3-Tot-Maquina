document.addEventListener('DOMContentLoaded', function () {
console.log("dsadkjasdiuag");
// Esperamos a que el DOM esté completamente cargado
document.getElementById('generate-pdf').addEventListener('click', function () {
    // Usamos jsPDF
    const { jsPDF } = window.jspdf; // Accedemos a jsPDF
    const doc = new jsPDF(); // Creamos un nuevo documento PDF
    
    // Seleccionamos la tabla
    const table = document.getElementById('table-to-pdf'); 
    const rows = table.rows; // Obtenemos las filas de la tabla

    // Empezamos a agregar contenido en el PDF
    let yOffset = 10; // Posición inicial en Y
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        let rowData = [];
        for (let j = 0; j < row.cells.length; j++) {
            rowData.push(row.cells[j].innerText); // Obtenemos el texto de cada celda
        }

        // Agregar el contenido de la fila al PDF
        doc.text(rowData.join(' | '), 10, yOffset);
        yOffset += 10; // Aumentamos la posición Y para la siguiente fila
    }

    // Finalmente, guardamos el archivo PDF
    doc.save('historial_maquinas.pdf');
});

});
