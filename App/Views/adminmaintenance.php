<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Panel del Admin </title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>
    <?php include 'Layouts/navbaradmin.php'; ?>

    <div class="container mx-auto px-4 ">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Mantenimientos</h2>

        </div>

        <!-- Modal usando solo CSS -->
        <input type="checkbox" id="modal-toggle" class="hidden">
        <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" 
             id="modal"
             role="dialog"
             aria-modal="true">
            <div class="modal-content p-6">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Nuevo Mantenimiento</h3>
                    <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </label>
                </div>
                
                <form class="space-y-4 mt-4">
                    <div>
                        <label for="machine_id" class="block text-sm font-medium text-gray-700">ID Máquina</label>
                        <input type="text" name="machine_id" id="machine_id" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="ID de la máquina">
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="title" id="title" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Título del mantenimiento">
                    </div>
                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                        <select name="type" id="type" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Tipo de mantenimiento">
                            <option value="preventivo">Preventivo</option>
                            <option value="correctivo">Correctivo</option>
                            <option value="emergencia">Emergencia</option>
                        </select>
                    </div>
                    <div>
                        <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                        <select name="state" id="state" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Estado del mantenimiento">
                            <option value="cancelado">Cancelado</option>
                            <option value="hecho">Hecho</option>
                            <option value="programado">Programado</option>
                        </select>
                    </div>
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" name="date" id="date" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Fecha del mantenimiento">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea name="description" id="description" rows="4" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Descripción del mantenimiento"></textarea>
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                        <label for="modal-toggle" 
                               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">
                            Cancelar
                        </label>
                        <button type="submit" 
                                class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table 0f mantinances -->

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">

            <div class="table-responsive">

                <table class="min-w-full">

                    <thead class="bg-custom-blue text-white">

                        <tr>

                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">Tipo</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Máquina</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>

                            <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        <?php foreach ($maintenances as $maintenance) { 
                            
                            $date = new DateTime($maintenance["maintentance_date"]);

                            $maintenance["maintentance_date"] = $date->format('d/m/Y');
                
                            ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#MNT-<?= $maintenance["id"] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $maintenance["title"] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    <?= $maintenance["type"] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    <?= $maintenance["state"] ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">MAQ-<?= $maintenance["id_machine"] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900"><?= $maintenance["maintentance_date"] ?></td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/mantenimiento/<?= $maintenance["id"] ?>'" aria-label="Ver detalles del mantemiento #MNT-<?= $maintenance["id"] ?>">
                                        <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                    </button>
                                    <a href="/mantenimiento/editar/<?= $maintenance["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar mantenimiento #MNT-001">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button class="text-red-600 hover:text-red-800" data-id="<?= $maintenance["id"] ?>" id="eliminarMantenimiento" aria-label="Eliminar mantenimiento #MNT-"<?= $maintenance["id"] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>

</body>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>
</html>