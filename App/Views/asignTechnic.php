<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Asignacion</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue mb-4 md:mb-0">Asignación de Máquinas a Técnicos</h2>
            <button type="submit" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Guardar
            </button>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
            <div class="flex flex-col md:flex-row justify-start items-center">
                <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Máquinas</h2>
            </div>
            <div class="flex flex-col md:flex-row justify-end items-center">
                <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Técnicos</h2>
            </div>
        </div>
        <!-- Container for tables -->
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <!-- Inventory table -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nº serie</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Técnico</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#MAQ-001</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Fresadora 1</p>
                                </td>
                                <td class="px-6 py-4">1231232132</td>
                                <td class="px-6 py-4">
                                    <form class="flex items-center">
                                        <input type="text" placeholder="Asignar técnico" class="border rounded p-1 w-full">
                                    </form>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#MAQ-002</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Fresadora 2</p>
                                </td>
                                <td class="px-6 py-4">9876543210</td>
                                <td class="px-6 py-4">
                                    <form class="flex items-center">
                                        <input type="text" placeholder="Asignar técnico" class="border rounded p-1 w-full">
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- New table next -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Especialidad</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50" draggable="true">
                                <td class="px-6 py-4 text-sm text-gray-900">#TEC-001</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Técnico 1</p>
                                </td>
                                <td class="px-6 py-4">Mecánica</td>
                            </tr>
                            <tr class="hover:bg-gray-50" draggable="true">
                                <td class="px-6 py-4 text-sm text-gray-900">#TEC-002</td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]">Técnico 2</p>
                                </td>
                                <td class="px-6 py-4">Electrónica</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>

</body>

</html>