<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>

<body class="bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex flex-col items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue text-center">Lista de Maquinaria</h2>
            
            <!-- Search bar -->
            <div class="mt-4 w-full max-w-md">
                <input type="text" id="search" name="search" placeholder="Buscar máquinas..." class="border rounded-md px-4 py-2 w-full" />
            </div>

            <!-- Buttons -->
            <div class="mt-4 flex space-x-4">
                <?php if (isset($app_user) && $app_user["role"] != "usuario") { ?>
                    <a href="/asignar" class="nav-button-custom">Asignar Técnico</a>
                    <label for="modal-toggle" class="nav-button-custom cursor-pointer">Nueva Máquina</label>
                <?php } ?>
            </div>
            <!-- CSV import button -->
            <?php if(isset($app_user) && 
            ($app_user['role'] == 'administrator' || 
             $app_user['role'] == 'supervisor')) { ?>
            <form action="/inventar/importar" method="post" enctype="multipart/form-data" class="mt-4">
                <label for="csvFile" class="nav-button-custom cursor-pointer">Seleccionar CSV</label>
                <input type="file" name="csvFile" id="csvFile" accept=".csv" class="hidden" required>
                <button type="submit" class="nav-button-custom">Guardar </button>
            </form>
            <?php } ?>
        </div>

        <!-- Inventory table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nºserie</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-200" id="default">
                        <?php foreach ($machines as $machine) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#MAQ-<?= $machine["id"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $machine["name"] ?></p>
                                </td>
                                <td class="px-6 py-4"><?= $machine["serial_num"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">Miguelito</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-3">
                                        <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/maquina/<?= $machine["id"] ?>'" aria-label="Ver detalles de máquina #MAQ-<?= $machine["id"] ?>">
                                            <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                        </button>
                                        <a href="/inventario/editar/<?= $machine["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar máquina #MAQ-<?= $machine["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" data-id="<?= $machine["id"] ?>" id="eliminarMaquina" aria-label="Eliminar máquina #MAQ-<?= $machine["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tbody class="divide-y divide-gray-200" id="datasearch">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal  -->
    <input type="checkbox" id="modal-toggle" class="hidden">
    <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal" role="dialog" aria-modal="true">
        <div class="modal-content p-4 mt-7">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Nueva Máquina</h3>
                <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>

            <form class="space-y-4 mt-4" action="/inventario/añadir" method="post" enctype="multipart/form-data">
                <div>
                    <label for="machineName" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="machineName" id="machineName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="serialNumber" class="block text-sm font-medium text-gray-700">Nº Serie</label>
                    <input type="text" name="serialNumber" id="serialNumber" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" name="model" id="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="manufacturer" class="block text-sm font-medium text-gray-700">Fabricante</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="installationDate" class="block text-sm font-medium text-gray-700">Fecha instalación</label>
                    <input type="date" name="installationDate" id="installationDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="longitude" class="block text-sm font-medium text-gray-700">Longitud</label>
                    <input type="text" name="longitude" id="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="latitude" class="block text-sm font-medium text-gray-700">Latitud</label>
                    <input type="text" name="latitude" id="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" capture="camera" required>
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

    <!-- Modal to edit -->
    <?php if (isset($machine)) { ?>
        <input type="checkbox" id="modal-editar-<?= $machine['id'] ?>" class="hidden">
        <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal-editar-<?= $machine['id'] ?>" role="dialog" aria-modal="true">
            <div class="modal-content p-4 mt-20">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Editar Máquina</h3>
                    <label for="modal-editar-<?= $machine['id'] ?>" class="cursor-pointer text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </label>
                </div>
                <form class="space-y-4 mt-4" action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $machine['id'] ?>">
                    <div>
                        <label for="editMachineName-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="editMachineName-<?= $machine['id'] ?>" value="<?= $machine['name'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editSerialNumber-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Nº Serie</label>
                        <input type="text" name="serial_num" id="editSerialNumber-<?= $machine['id'] ?>" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editModel-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Modelo</label>
                        <input type="text" name="model" id="editModel-<?= $machine['id'] ?>" value="<?= $machine['model'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editManufacturer-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Fabricante</label>
                        <input type="text" name="manufacturer" id="editManufacturer-<?= $machine['id'] ?>" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editInstallationDate-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Fecha instalación</label>
                        <input type="date" name="installation_date" id="editInstallationDate-<?= $machine['id'] ?>" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editLocation-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Localización</label>
                        <input type="text" name="location" id="editLocation-<?= $machine['id'] ?>" value="<?= $machine['location'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="editImage-<?= $machine['id'] ?>" class="block text-sm font-medium text-gray-700">Imagen</label>
                        <input type="file" name="image" id="editImage-<?= $machine['id'] ?>" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                        <label for="modal-editar-<?= $machine['id'] ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">Cancelar</label>
                        <button type="submit" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/machine.js"></script>
</body>

<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>

</html>