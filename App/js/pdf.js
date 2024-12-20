document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('generate-pdf').addEventListener('click', () => {
    try {
      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF();

      // Configuración inicial
      const pageMargin = 10;
      const rowHeight = 10;
      const headerColor = [41, 128, 185]; // Azul para encabezados
      const headerTextColor = [255, 255, 255]; // Blanco
      const textColor = [0, 0, 0]; // Negro
      const columnWidths = [20, 50, 40, 40, 40]; // Anchuras de columnas

      let startY = 20;

      // Función para agregar una fila al PDF
      const addRow = (data, yPosition, isHeader = false) => {
        const fillColor = isHeader ? headerColor : [255, 255, 255];
        const currentTextColor = isHeader ? headerTextColor : textColor;

        let xOffset = pageMargin;

        data.forEach((text, index) => {
          const columnWidth = columnWidths[index] || 0; // Asegura que haya un valor válido
          if (typeof columnWidth !== 'number' || columnWidth <= 0) {
            console.error(`Ancho de columna inválido para el índice ${index}:`, columnWidth);
            return; // Salta esta celda
          }

          if (typeof xOffset !== 'number' || typeof yPosition !== 'number') {
            console.error('Coordenadas inválidas:', { xOffset, yPosition });
            return; // Salta esta fila
          }

          // Dibuja el rectángulo de la celda
          pdf.setFillColor(...fillColor);
          pdf.rect(xOffset, yPosition, columnWidth, rowHeight, 'F');

          // Agrega texto a la celda
          pdf.setTextColor(...currentTextColor);
          pdf.text(text || '', xOffset + 2, yPosition + rowHeight / 2 + 3);

          xOffset += columnWidth;
        });
      };

      // Función para agregar tablas desde un elemento HTML
      const addTableFromElement = (tableElement, startY) => {
        const rows = tableElement.querySelectorAll('tr');
        if (!rows.length) {
          console.warn('La tabla no contiene filas.');
          return startY;
        }

        rows.forEach((row, rowIndex) => {
          const cells = row.querySelectorAll('td, th');
          if (!cells.length) {
            console.warn('La fila no contiene celdas:', row);
            return;
          }

          const cellValues = Array.from(cells).map((cell) => cell.textContent.trim() || ' ');
          const isHeader = rowIndex === 0;

          addRow(cellValues, startY, isHeader);
          startY += rowHeight;

          // Verificar si se requiere una nueva página
          if (startY > pdf.internal.pageSize.height - pageMargin) {
            pdf.addPage();
            startY = pageMargin;
          }
        });

        return startY;
      };

      // Título principal
      pdf.setFontSize(16);
      pdf.text('Reporte de Mantenimientos e Incidencias', pageMargin, startY);
      startY += 10;

      // Procesar la tabla de mantenimientos
      const maintenanceTable = document.getElementById('table-to-pdf');
      if (maintenanceTable) {
        pdf.setFontSize(14);
        pdf.text('Tabla de Mantenimientos', pageMargin, startY);
        startY += 10;

        startY = addTableFromElement(maintenanceTable, startY);
      } else {
        console.warn('No se encontró la tabla de mantenimientos.');
      }

      // Espacio entre tablas
      startY += 10;

      // Procesar la tabla de incidencias
      const incidentsTable = document.getElementById('incidents-table');
      if (incidentsTable) {
        pdf.setFontSize(14);
        pdf.text('Tabla de Incidencias', pageMargin, startY);
        startY += 10;

        startY = addTableFromElement(incidentsTable, startY);
      } else {
        console.warn('No se encontró la tabla de incidencias.');
      }

      // Guardar el PDF
      pdf.save('historial_de_mantenimiento.pdf');
    } catch (error) {
      console.error('Error al generar el PDF:', error);
    }
  });
});
