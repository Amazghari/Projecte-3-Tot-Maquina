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
        <div class="flex">
            <aside class="bg-custom-light-gray text-black p-4 mt-5">
                <ul>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Usuarios</a></li>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Incidencias</a></li>
                    <li><a href="#" class="block menu-button text-black py-2 px-4 mb-2">Máquinas</a></li>
                </ul>
            </aside>
            <div class="flex-1 p-4 md:p-6">          
                <div class="">
                    <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden w-full mt-5">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Id</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Nom</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Username</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Rol</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-custom-light-gray">
                                <td class="px-4 py-4 text-sm">1</td>
                                <td class="px-4 py-4 text-sm">Nombre 1</td>
                                <td class="px-4 py-4 text-sm">usuario1</td>
                                <td class="px-4 py-4 text-sm">Admin</td>
                                <td class="px-4 py-4 text-sm flex space-x-2">
                                    <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-5">
                                        Eliminar
                                    </button>
                                    <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-5">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-custom-light-gray">
                                <td class="px-4 py-4 text-sm">2</td>
                                <td class="px-4 py-4 text-sm">Nombre 2</td>
                                <td class="px-4 py-4 text-sm">usuario2</td>
                                <td class="px-4 py-4 text-sm">Usuario</td>
                                <td class="px-4 py-4 text-sm flex space-x-2">
                                    <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-5">
                                        Eliminar
                                    </button>
                                    <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-5">
                                        Editar
                                    </button>
                                </td>
                            </tr>
                            <!-- Puedes agregar más filas aquí -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>

</body>
</html>
