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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Maquinaria</h2>
            <input type="text" id="search" placeholder="Buscar máquinas..." class="border rounded-md px-4 py-2" />
            <a href="/asignar" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Asignar Tecnico
            </a>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Nueva Maquina
            </label>
        </div>

        <!-- Tabla de inventario -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nºserie</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    <?php foreach ($machines as $machine) { ?>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 cursor-pointer" onclick="window.location='/maquina/<?= $machine["id"] ?>'">
                                <td class="px-6 py-4 text-sm text-gray-900">#MAQ-<?= $machine["id"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $machine["name"] ?></p>
                                </td>
                                <td class="px-6 py-4"><?= $machine["serial_num"] ?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">USR-123</td>
                                <td class="px-6 py-4 text-sm text-gray-900">Miguelito</td>
                                <td class="px-6 py-4 text-sm">
                                    <div class="flex space-x-3">
                                        <input type="checkbox" id="modal-editar" class="hidden">
                                        <a href="/inventario/editar/<?= $machine["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <button class="text-red-600 hover:text-red-800 " data-id="<?= $machine["id"] ?>" id="eliminarMaquina">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" >
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal usando solo CSS -->
    <input type="checkbox" id="modal-toggle" class="hidden">
    <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal" role="dialog" aria-modal="true">
        <div class="modal-content p-4 mt-20">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Nueva Maquina</h3>
                <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>

            <form class="space-y-4 mt-4" action="/inventario/añadir" method="post" enctype="multipart/form-data">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="machineName" id="machineName" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nº Serie</label>
                    <input type="text" name="serialNumber" id="serialNumber" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" name="model" id="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fabricante</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha instalación</label>
                    <input type="date" name="installationDate" id="installationDate" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Longitud</label>
                    <input type="text" name="longitude" id="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Latitud</label>
                    <input type="text" name="latitude" id="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50 bg-custom-light-gray" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
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

    <!-- Modal para editar -->
    <?php if (isset($machine)) { ?>
        <?php foreach ($machines as $machine) { ?>
    <input type="checkbox" id="modal-editar" class="hidden">
    <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal" role="dialog" aria-modal="true">
        <div class="modal-content p-4 mt-20">
            <div class="flex justify-between items-center pb-3 border-b">
                <h3 class="text-xl font-semibold text-gray-900">Editar Maquina</h3>
                <label for="modal-editar" class="cursor-pointer text-gray-600 hover:text-gray-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </label>
            </div>
            <form class="space-y-4 mt-4" action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $machine['id'] ?>">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="<?= $machine['name'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nº Serie</label>
                    <input type="text" name="serial_num" id="serial_num" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Modelo</label>
                    <input type="text" name="model" id="model" value="<?= $machine['model'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fabricante</label>
                    <input type="text" name="manufacturer" id="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha instalación</label>
                    <input type="date" name="installation_date" id="installation_date" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Localización</label>
                    <input type="text" name="location" id="location" value="<?= $machine['location'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Imagen</label>
                    <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                    <label for="modal-editar"
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
        <?php } ?>
    <?php } ?>

    <script>
        $(document).ready(function () {
            $("#search").on("input", function () {
                var searchValue = $(this).val();
                if (searchValue.length >= 3) {
                    $.ajax({
                        type: "GET",
                        url: "/inventario/buscar", // Cambia esta URL según tu ruta
                        data: { query: searchValue },
                        success: function (data) {
                            // Limpiar la tabla actual
                            $("#DataSearching").html("");
                            // Agregar los resultados a la tabla
                            if (data.length > 0) {
                                $.each(data, function (index, machine) {
                                    var row = "<tr class='hover:bg-gray-50'>" +
                                        "<td class='px-6 py-4 text-sm text-gray-900'>#MAQ-" + machine.id + "</td>" +
                                        "<td class='px-6 py-4 text-sm text-gray-900'><p class='truncate max-w-[200px]'>" + machine.name + "</p></td>" +
                                        "<td class='px-6 py-4'>" + machine.serial_num + "</td>" +
                                        "<td class='px-6 py-4 text-sm text-gray-900'>USR-123</td>" +
                                        "<td class='px-6 py-4 text-sm text-gray-900'>Miguelito</td>" +
                                        "<td class='px-6 py-4 text-sm'>" +
                                        "<div class='flex space-x-3'>" +
                                        "<a href='/inventario/editar/" + machine.id + "' class='cursor-pointer text-blue-600 hover:text-blue-800'>" +
                                        "<svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>" +
                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'/>" +
                                        "</svg></a>" +
                                        "<button class='text-red-600 hover:text-red-800' data-id='" + machine.id + "'>" +
                                        "<svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24'>" +
                                        "<path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16' />" +
                                        "</svg></button>" +
                                        "</div></td></tr>";
                                    $("#DataSearching").append(row);
                                });
                            } else {
                                $("#DataSearching").html('<tr style="color:red"><td colspan="6">No se encontraron resultados</td></tr>');
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>

</html>