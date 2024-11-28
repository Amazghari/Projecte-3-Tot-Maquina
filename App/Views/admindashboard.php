<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Admin Dashboard</title>
</head> 
<body class="flex flex-col min-h-screen bg-custom-light-gray">
<?php include 'Layouts/navbar.php'; ?>
        <!-- <div class="flex"> -->
            <aside class="bg-custom-light-gray text-black p-4 mt-5">
                <ul>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Usuarios</a></li>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Incidencias</a></li>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Máquinas</a></li>
                </ul>
            </aside>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nºserie</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Encargado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#MAQ-001</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]">Fresadora</p>
                            </td>
                            <td class="px-6 py-4">1231232132</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Operativa</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">USR-123</td>
                            <td class="px-6 py-4 text-sm text-gray-900">Miguelito</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>

</body>
</html>
