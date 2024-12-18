<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="../../uploads/img/logopng.png">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <title>Informacion Maquina</title>
</head>

<?php include 'Layouts/navbar.php'; ?>


<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <div class="container mx-auto px-4 mt-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex flex-col md:flex-row">
                <div class="flex-shrink-0 w-full md:w-1/2">
                    <img src="<?= $machine['image_url'] ?>" alt="Máquina" class="h-auto w-full object-cover rounded-lg">
                </div>

                <div class="ml-4 w-full md:w-1/2 flex flex-col justify-between">
                    <h2 class="text-4xl font-bold text-custom-blue" name="name"><?= $machine['name'] ?></h2>
                    <form id="machineForm" action="/maquina/updateMachine" method="post" class="space-y-4">
                        <input type="hidden" name="machineId" value="<?= $machine['id'] ?>">
                        <div>
                            <label class="text-xl text-gray-600">ID: <span>#MAQ-<?= $machine['id'] ?></span></label>
                        </div>
                        <div>
                            <label class="text-xl text-gray-600">Nombre:</label>
                            <input type="text" name="name" value="<?= $machine['name'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Nombre de la máquina">
                        </div>
                        <div>
                            <label class="text-xl text-gray-600">Modelo:</label>
                            <input type="text" name="model" value="<?= $machine['model'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Modelo de la máquina">
                        </div>
                        <div>
                            <label class="text-xl text-gray-600">Fecha de Instalación:</label>
                            <input type="date" name="installation_date" value="<?= $machine['installation_date'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Fecha de instalación">
                        </div>
                        <div>
                            <label class="text-xl text-gray-600">Técnico Responsable:</label>
                            <input type="text" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Técnico responsable">
                        </div>
                        <div>
                            <label class="text-xl text-gray-600">Número de Incidencias:</label>
                            <span class="text-gray-800">5</span>
                        </div>
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label class="text-xl text-gray-600">Longitud:</label>
                                <input type="text" name="latitude" value="<?= $machine['longitude'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Longitud">
                            </div>
                            <div class="w-1/2">
                                <label class="text-xl text-gray-600">Latitud:</label>
                                <input type="text" name="longitude" value="<?= $machine['latitude'] ?>" class="border rounded p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-500" aria-label="Latitud">
                            </div>
                        </div>
                        <button type="submit" class="mt-4 bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200" aria-label="Guardar cambios">Guardar Cambios</button>
                    </form>
                </div>
            </div>

            <div id="map" class="mt-6 w-full" style="height: 400px;"></div>

            <div class="flex justify-between items-center mb-6 mt-8">
                <h2 class="text-2xl font-bold text-custom-blue">Lista de Incidencias</h2>
                <label class="bg-custom-blue text-white px-4 py-2 rounded-lg">
                    Incidencias completadas: 1
                </label>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="table-responsive">
                    <table class="min-w-full" id="incidents-table">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID Incidencia</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Prioridad</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Trabajador Asignado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($incidences as $incidence) { ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">#INC-<?= $incidence['id'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <p class="truncate max-w-[200px]"><?= $incidence['name'] ?></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['priority'] ?></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['state'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <select name="assignedusers" id="assignedusers"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50"
                                            aria-required="true">
                                            <?php foreach ($incidence["users"] as $user) { ?>
                                                <option value="<?php echo $user['id']; ?>"><?php echo $user['id'] . " - " . $user['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-between items-center mb-6 mt-8">
                <h2 class="text-2xl font-bold text-custom-blue">Lista de Mantenimientos</h2>
                <label class="bg-custom-blue text-white px-4 py-2 rounded-lg">
                    Mantenimientos Completados: 1
                </label>
            </div>

            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="table-responsive">
                    <table class="min-w-full" id="table-to-pdf">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Tipo</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($maintenances as $maintenance) { ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">#MNT-<?= $maintenance['id'] ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <p class="truncate max-w-[200px]"><?= $maintenance['title'] ?></p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800"><?= $maintenance['type'] ?></span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $maintenance['state'] ?></span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900"><?= $maintenance['maintentance_date'] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <button id="generate-pdf" class="mt-4 bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200" aria-label="Generar PDF"">Generar PDF</button>
        </div>
        

    </div>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

                <script>
                   
                   document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('generate-pdf').addEventListener('click', function() {
            const { jsPDF } = window.jspdf; // Accedemos a jsPDF

            // Crear un nuevo PDF
            const pdf = new jsPDF();

            const pageMargin = 0; // Margen de la página (izquierda y derecha)
            const columnWidths = [30, 60, 40, 40, 50]; // Anchos de las columnas
            const rowHeight = 10; // Altura de las filas
            let yOffset = 5; // Margen superior de 5mm
            const headerColor = [28, 44, 86]; // Color de fondo para los encabezados (RGB)

            // Función para agregar una fila de datos al PDF
            function addRow(data, yPosition, isHeader = false) {
                const textColor = isHeader ? [255, 255, 255] : [0, 0, 0]; // Color de texto
                const fillColor = isHeader ? headerColor : [255, 255, 255]; // Fondo de celda

                // Dibuja el fondo de las celdas
                let xOffset = pageMargin; // Comienza desde el margen izquierdo
                data.forEach((text, index) => {
                    pdf.setFillColor(fillColor[0], fillColor[1], fillColor[2]);
                    pdf.rect(xOffset, yPosition, columnWidths[index], rowHeight, 'F');
                    pdf.setTextColor(textColor[0], textColor[1], textColor[2]);
                    pdf.text(text, xOffset + 2, yPosition + rowHeight / 2 + 3); // Ajustar para centrar el texto
                    xOffset += columnWidths[index]; // Mover el xOffset para la siguiente celda
                });
            }

            // Función para agregar una tabla a partir de un elemento HTML
            function addTableFromElement(element, yPosition) {
                const rows = element.querySelectorAll('tr');
                rows.forEach(row => {
                    const cells = row.querySelectorAll('td');
                    const cellValues = Array.from(cells).map(cell => cell.textContent.trim());
                    // Agregar cada fila de datos
                    addRow(cellValues, yPosition);
                    yPosition += rowHeight;

                    // Comprobar si la página se llena
                    if (yPosition > 270) { // Si se alcanza el final de la página A4 (297mm de altura)
                        pdf.addPage();
                        yPosition = 5; // Reiniciar la posición Y en la nueva página (con margen superior de 5mm)
                    }
                });
                return yPosition;
            }

            // 1. Tabla de Mantenimientos
            const table1 = document.getElementById('table-to-pdf'); // Asumimos que la tabla de mantenimientos tiene este id
            const headers1 = ['ID', 'Título', 'Tipo', 'Status', 'Fecha']; // Encabezados para la tabla de mantenimientos
            addRow(headers1, yOffset, true); // Agregar encabezados
            yOffset += rowHeight; // Espacio después de los encabezados

            yOffset = addTableFromElement(table1, yOffset); // Agregar filas de la tabla de mantenimientos

            // Añadir un espacio entre las dos tablas
            yOffset += 10; // Esto es para dar un pequeño espacio entre las dos tablas

            // 2. Tabla de Incidencias
            const table2 = document.getElementById('incidents-table'); // Asumimos que la tabla de incidencias tiene este id
            const headers2 = ['ID', 'Título', 'Tipo', 'Status', 'Fecha']; // Encabezados para la tabla de incidencias
            addRow(headers2, yOffset, true); // Agregar encabezados
            yOffset += rowHeight; // Espacio después de los encabezados

            yOffset = addTableFromElement(table2, yOffset); // Agregar filas de la tabla de incidencias

            // Guardar el PDF
            pdf.save('tabla_combinada.pdf');
        });
    });
                </script>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
                <script src="/js/machine.js"></script>
                <script>
                    // Inicializa el mapa
                    var map = L.map('map').setView([51.505, -0.09], 13); // Cambia las coordenadas a las que necesites

                    // Capa de los tiles
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '© OpenStreetMap'
                    }).addTo(map);

                    // Agregar un marcador
                    var marker = L.marker([51.505, -0.09]).addTo(map); // Cambia las coordenadas del marcador
                    marker.bindPopup('Hola Calvo.').openPopup();
                </script>
                <!-- Footer -->
</body>


<?php include 'Layouts/footer.php'; ?>

</html>