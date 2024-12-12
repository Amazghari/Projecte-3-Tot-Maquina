<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Mantenimiento</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-custom-blue mt-8">Detalles del Mantenimiento</h2>

        <div class="bg-white rounded-lg shadow-lg p-6 mt-4">
            <form id="maintenanceForm" action="/mantenimiento/hoursImputed" method="post" class="space-y-4">
                <input type="hidden" name="id" value="<?= $maintenance['id'] ?>">
                <h3 class="text-lg font-semibold text-gray-800"><?= $maintenance['title'] ?></h3>
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
                    <label class="text-sm font-medium text-gray-700">Estado</label>
                    <label class="block text-sm font-medium text-gray-700"><?= $maintenance['state'] ?></label>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" required><?= $maintenance['description'] ?></textarea>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Usuario que ha creado el mantenimiento</h3>
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
                    <label class="block text-sm font-medium text-gray-700"><?= $maintenance['maintentance_date'] ?></label>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Máquina Vinculada</label>
                    <label name="linked_machine" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                        <?php foreach ($machines as $machine) {
                            if ($machine['id'] == $maintenance['id_machine']) { ?>
                                <option value="<?php echo $machine['id']; ?>" selected><?php echo $machine['id'] . " - " . $machine['name']; ?></option>
                            <?php } }?>
                    </label>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipo de Mantenimiento</label>
                    <label class="block text-sm font-medium text-gray-700"><?= $maintenance['type'] ?></label>
                </div>
            </form>
        </div>
    </div>



</body>
<?php include 'Layouts/footer.php'; ?>

</html>