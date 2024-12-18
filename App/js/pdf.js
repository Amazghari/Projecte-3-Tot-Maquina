document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('generate-pdf').addEventListener('click', () => {
      const { jsPDF } = window.jspdf;
      const pdf = new jsPDF();
  
      const pageMargin = 0; // Margen de la página en mm
      const columnWidths = [30, 60, 40, 40, 50]; // Anchos de las columnas en mm
      const rowHeight = 10; // Altura de las filas en mm
      const headerColor = [28, 44, 86]; // Color de fondo para los encabezados (RGB)
      const textColor = [0, 0, 0]; // Color de texto para las filas de datos
      const headerTextColor = [255, 255, 255]; // Color de texto para los encabezados
      let yOffset = 20; // Posición vertical inicial en mm
  
      /**
       * Agrega una fila al PDF.
       * @param {string[]} data - Contenido de las celdas.
       * @param {number} yPosition - Posición vertical de la fila.
       * @param {boolean} isHeader - Indica si la fila es un encabezado.
       */
      const addRow = (data, yPosition, isHeader = false) => {
        const fillColor = isHeader ? headerColor : [255, 255, 255];
        const currentTextColor = isHeader ? headerTextColor : textColor;
  
        let xOffset = pageMargin;
        data.forEach((text, index) => {
          pdf.setFillColor(...fillColor);
          pdf.rect(xOffset, yPosition, columnWidths[index], rowHeight, 'F');
          pdf.setTextColor(...currentTextColor);
          pdf.text(text, xOffset + 2, yPosition + rowHeight / 2 + 3);
          xOffset += columnWidths[index];
        });
      };
  
      /**
       * Agrega una tabla al PDF a partir de un elemento HTML.
       * @param {HTMLElement} tableElement - Elemento de la tabla HTML.
       * @param {number} startY - Posición vertical inicial para la tabla.
       * @returns {number} - Nueva posición vertical después de la tabla.
       */
      const addTableFromElement = (tableElement, startY) => {
        const rows = tableElement.querySelectorAll('tr');
        rows.forEach((row) => {
          const cells = row.querySelectorAll('td');
          const cellValues = Array.from(cells).map((cell) => cell.textContent.trim());
          addRow(cellValues, startY);
          startY += rowHeight;
  
          // Verificar si se requiere una nueva página
          if (startY > pdf.internal.pageSize.height - pageMargin) {
            pdf.addPage();
            startY = pageMargin;
          }
        });
        return startY;
      };
  
      // Agregar título y logo
      pdf.setFontSize(16);
      pdf.text('Reporte de Mantenimientos e Incidencias', pageMargin, yOffset);
      yOffset += 10;
  
      // Agregar título de la primera tabla
      pdf.setFontSize(14);
      pdf.text('Tabla de Mantenimientos', pageMargin, yOffset);
      yOffset += 10;
  
      // Agregar tabla de Mantenimientos
      const maintenanceTable = document.getElementById('table-to-pdf');
      addRow(['ID', 'Título', 'Tipo', 'Status', 'Fecha'], yOffset, true);
      yOffset += rowHeight;
      yOffset = addTableFromElement(maintenanceTable, yOffset);
  
      // Espacio entre tablas
      yOffset += 20;
  
      // Agregar título de la segunda tabla
      pdf.setFontSize(14);
      pdf.text('Tabla de Incidencias', pageMargin, yOffset);
      yOffset += 10;
  
      // Agregar tabla de Incidencias
      const incidentsTable = document.getElementById('incidents-table');
      addRow(['ID', 'Título', 'Tipo', 'Status', 'Fecha'], yOffset, true);
      yOffset += rowHeight;
      yOffset = addTableFromElement(incidentsTable, yOffset);
  
      // Guardar el PDF
      pdf.save('historial de mantenimiento.pdf');
    });
  });