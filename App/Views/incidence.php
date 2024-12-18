<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Incidencia</title>
    <link href="/main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>

<body class="bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-custom-blue mt-8">Detalles de la Incidencia</h2>

        <div class="bg-white rounded-lg shadow-lg p-6 mt-4">
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Prioridad</label>
                    <select name="priority" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                        <option value="Baja" <?= $incidence['priority'] === 'Baja' ? 'selected' : '' ?>>Baja</option>
                        <option value="Media" <?= $incidence['priority'] === 'Media' ? 'selected' : '' ?>>Media</option>
                        <option value="Alta" <?= $incidence['priority'] === 'Alta' ? 'selected' : '' ?>>Alta</option>
                    </select>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Información del Técnico</h3>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                        <div class="table-responsive">
                            <table class="min-w-full">
                                <thead class="bg-custom-blue text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">ID Usuario</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Apellido</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre de Usuario</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">#USR-001</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">Juan</td>
                                        <td class="px-6 py-4">Pérez</td>
                                        <td class="px-6 py-4">
                                            <p class="truncate max-w-[200px]">juan.perez@example.com</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Técnico</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">juanp</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Estado</h3>
                    <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                        <option value="No iniciada" <?= $incidence['state'] === 'No iniciada' ? 'selected' : '' ?>>No iniciada</option>
                        <option value="En proceso" <?= $incidence['state'] === 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                        <option value="Finalizado" <?= $incidence['state'] === 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tiempo de Respuesta</label>
                    <input type="datetime-local" name="response_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" required><?= $incidence['description'] ?></textarea>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Usuario que ha creado la incidencia</h3>
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden mt-8">
                        <div class="table-responsive">
                            <table class="min-w-full">
                                <thead class="bg-custom-blue text-white">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">ID Usuario</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Apellido</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                                        <th class="px-6 py-3 text-left text-sm font-semibold">Nombre de Usuario</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">#USR-001</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">Juan</td>
                                        <td class="px-6 py-4">Pérez</td>
                                        <td class="px-6 py-4">
                                            <p class="truncate max-w-[200px]">juan.perez@example.com</p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Técnico</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">juanp</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
                    <input type="date" name="start_date" value="<?= $incidence['starting_date'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Horas Totales Imputadas</label>
                    <input type="time" name="total_input_hours" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" readonly>
                </div>

                <div class="flex items-center space-x-3">
                    <label class="block text-sm font-medium text-gray-700">Añadir Más Horas Imputadas</label>
                    <input type="number" name="input_hours" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" placeholder="Horas" required>
                    <button type="button" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                        Añadir
                    </button>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">#MAQ-<?= $incidence['id_machine'] ?></label>
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                    <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">
                        Cancelar
                    </button>
                    <button type="submit" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include 'Layouts/footer.php'; ?>
</body>

</html>