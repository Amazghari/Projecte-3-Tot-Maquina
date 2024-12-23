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
            <form class="space-y-4" action="/incidencia/hoursImputed" method="POST">
                <input type="hidden" name="id" value="<?= $incidence['id'] ?>">
                <div>
                    <label for="priority" class="block text-sm font-medium text-gray-700">Prioridad</label>
                    <select name="priority" id="priority" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Prioridad de la incidencia">
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
                                    <?php foreach ($userIncidence as $userIncidence) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">#USR-<?=  $userIncidence['id'] ?></td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?= $userIncidence['name'] ?></td>
                                        <td class="px-6 py-4"><?= $userIncidence['surname'] ?></td>
                                        <td class="px-6 py-4">
                                            <p class="truncate max-w-[200px]"><?= $userIncidence['email'] ?></p>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $userIncidence['role'] ?></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900"><?= $userIncidence['username']  ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                    <select name="state" id="state" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Estado de la incidencia">
                        <option value="No iniciada" <?= $incidence['state'] === 'No iniciada' ? 'selected' : '' ?>>No iniciada</option>
                        <option value="En proceso" <?= $incidence['state'] === 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                        <option value="Finalizado" <?= $incidence['state'] === 'Finalizado' ? 'selected' : '' ?>>Finalizado</option>
                    </select>
                </div>

                <div>
                    <label for="response_time" class="block text-sm font-medium text-gray-700">Tiempo de Respuesta</label>
                    <input type="date" name="first_answer" id="first_answer" value="<?= $incidence['first_answer'] ?>" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Tiempo de respuesta">
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea id="description" name="description" rows="4" required
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Descripción de la incidencia"><?= $incidence['description'] ?></textarea>
                </div>

                <div>
                    <label for="input_hours" class="block text-sm font-medium text-gray-700">Horas Imputadas</label>
                    <input type="number" id="input_hours" name="input_hours"  value="<?= $incidence['imputed_hours'] ?>" require
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Horas imputadas">
                </div>

                <div>
                    <label for="input_hours" class="block text-sm font-medium text-gray-700">Data Final</label>
                    <input type="date" id="end_date" name="end_date"  value="<?= $incidence['end_date'] ?>" require
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Horas imputadas">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">#MAQ-<?= $incidence['id_machine'] ?></label>
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
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