<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Admin Dashboard</title>
</head>
<body class="flex bg-custom-light-gray">
    <!-- Menú lateral con margen -->
    <aside class="bg-white w-40 h-screen p-4 shadow-lg">
        <h2 class="text-2xl font-bold mb-4 text-custom-blue">Menú</h2>
        <ul>
            <li class="mb-2"><a href="#" class="hover:underline">Inicio</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Inventario</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Usuarios</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Configuraciones</a></li>
            <li class="mb-2"><a href="#" class="hover:underline">Reportes</a></li>
        </ul>
    </aside>

    <div class="flex-1 p-6">
        <div class="bg-custom-blue text-white p-4 rounded-lg mb-4">
            <h1 class="text-2xl">Nav</h1>
        </div>
        <div class="">
            <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-custom-blue text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Id</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Username</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover-bg-custom-light-gray">
                        <td class="px-6 py-4 text-sm">1</td>
                        <td class="px-6 py-4 text-sm">Nombre 1</td>
                        <td class="px-6 py-4 text-sm">usuario1</td>
                        <td class="px-6 py-4 text-sm">Admin</td>
                        <td class="px-4 py-4 text-sm flex space-x-4">
                            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-2">
                                Eliminar
                            </button>
                            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-2">
                                Editar
                            </button>
                        </td>
                    </tr>
                    <tr class="hover-bg-custom-light-gray">
                        <td class="px-6 py-4 text-sm">2</td>
                        <td class="px-6 py-4 text-sm">Nombre 2</td>
                        <td class="px-6 py-4 text-sm">usuario2</td>
                        <td class="px-6 py-4 text-sm">Usuario</td>
                        <td class="px-4 py-4 text-sm flex space-x-4">
                            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-2">
                                Eliminar
                            </button>
                            <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors m-2">
                                Editar
                            </button>
                        </td>
                    </tr>
                    <!-- Puedes agregar más filas aquí -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
