<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Panel del Admin</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">

    <?php include 'Layouts/navbar.php'; ?>
    <?php include 'Layouts/navbaradmin.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Maquinaria</h2>
            <a href="/asignar" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer" aria-label="Asignar técnico">
                Asignar Técnico
            </a>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer" aria-label="Nueva máquina">
                Nueva Máquina
            </label>
        </div>

        <!-- table of inventary -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full" role="table">
                    <caption class="sr-only">Lista de maquinaria disponible</caption>
                    <thead class="bg-custom-blue text-white">
                        <tr role="row">
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nº serie</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">ID Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Nombre Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold" scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php foreach ($machines as $machine) { ?>
                            <tr id="machine<?= $machine["id"] ?>" class="hover:bg-gray-50" role="row">
                                <td class="px-6 py-4 text-sm text-gray-900" role="cell">#MAQ-<?= $machine["id"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900" role="cell">
                                    <p class="truncate max-w-[200px]"><?= $machine["name"] ?></p>
                                </td>
                                <td class="px-6 py-4" role="cell"><?= $machine["serial_num"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900" role="cell">USR-123</td>
                                <td class="px-6 py-4 text-sm text-gray-900" role="cell">Miguelito</td>
                                <td class="px-6 py-4 text-sm" role="cell">
                                    <div class="flex space-x-3">
                                        <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/maquina/<?= $machine["id"] ?>'" aria-label="Ver detalles de máquina #MAQ-<?= $machine["id"] ?>">
                                            <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                        </button>
                                        <a href="/inventario/editar/<?= $machine["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar máquina #MAQ-<?= $machine["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800" data-id="<?= $machine["id"] ?>" id="eliminarMaquina-<?= $machine["id"] ?>" aria-label="Eliminar máquina #MAQ-<?= $machine["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                        <div>
                                            <button class="focus:outline-none" onclick="openModal('<?= $machine['id'] ?>')">
                                                Abrir QR Code
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal for displaying QR code -->
    <div id="qrModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center" role="dialog" aria-modal="true">
        <div class="modal-content p-4">
            <span class="close-modal cursor-pointer text-gray-600 hover:text-gray-800" aria-label="Close modal">&times;</span>
            <div class="flex justify-center">
                <img id="modalQrImage" src="" alt="Código QR" class="max-w-full h-auto">
            </div>
        </div>
    </div>


    <!-- Modal para editar -->
    <?php if (isset($machine)) { ?>
        <?php foreach ($machines as $machine) { ?>
            <input type="checkbox" id="modal-editar-<?= $machine['id'] ?>" class="hidden">
            <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal-<?= $machine['id'] ?>" role="dialog" aria-modal="true">
                <div class="modal-content p-4 mt-20">
                    <div class="flex justify-between items-center pb-3 border-b">
                        <h3 class="text-xl font-semibold text-gray-900">Editar Máquina</h3>
                        <label for="modal-editar-<?= $machine['id'] ?>" class="cursor-pointer text-gray-600 hover:text-gray-800" aria-label="Cerrar modal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </label>
                    </div>
                    <form class="space-y-4 mt-4" action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $machine['id'] ?>">
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="name-<?= $machine['id'] ?>">Nombre</label>
                            <input type="text" name="name" id="name-<?= $machine['id'] ?>" value="<?= $machine['name'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="serial_num-<?= $machine['id'] ?>">Nº Serie</label>
                            <input type="text" name="serial_num" id="serial_num-<?= $machine['id'] ?>" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="model-<?= $machine['id'] ?>">Modelo</label>
                            <input type="text" name="model" id="model-<?= $machine['id'] ?>" value="<?= $machine['model'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="manufacturer-<?= $machine['id'] ?>">Fabricante</label>
                            <input type="text" name="manufacturer" id="manufacturer-<?= $machine['id'] ?>" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="installation_date-<?= $machine['id'] ?>">Fecha instalación</label>
                            <input type="date" name="installation_date" id="installation_date-<?= $machine['id'] ?>" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="location-<?= $machine['id'] ?>">Localización</label>
                            <input type="text" name="location" id="location-<?= $machine['id'] ?>" value="<?= $machine['location'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-required="true">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="image-<?= $machine['id'] ?>">Imagen</label>
                            <input type="file" name="image" id="image-<?= $machine['id'] ?>" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                        </div>

                        <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                            <label for="modal-editar-<?= $machine['id'] ?>" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer" aria-label="Cancelar">Cancelar</label>
                            <button type="submit" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors" aria-label="Guardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } ?>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/js/machine.js"></script>

</body>

</html>