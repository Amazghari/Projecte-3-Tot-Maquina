<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Panel del Admin </title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>
    <?php include 'Layouts/navbaradmin.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Usuarios</h2>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Nuevo Usuario
            </label>
        </div>

        <!-- Modal usando solo CSS -->
        <input type="checkbox" id="modal-toggle" class="hidden">
        <div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" 
             id="modal"
             role="dialog"
             aria-modal="true">
            <div class="modal-content p-6">
                <div class="flex justify-between items-center pb-3 border-b">
                    <h3 class="text-xl font-semibold text-gray-900">Nuevo Usuario</h3>
                    <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </label>
                </div>
                
                <form id="incident-form" action="/adminusarios/añadir" class="space-y-4 mt-4" method="post">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" name="first_name" id="first_name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Nombre del usuario">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Apellido</label>
                        <input type="text" name="last_name" id="last_name" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Apellido del usuario">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Email del usuario">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Rol</label>
                        <select name="role" id="role" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Rol del usuario">
                            <option value="administrator">Admin</option>
                            <option value="usuario">Usuario</option>
                            <option value="tecnico">Técnico</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                        <input type="text" name="username" id="username" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Nombre de usuario">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" name="passwordUser" id="passwordUser" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50" aria-label="Contraseña del usuario">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors" aria-label="Guardar nuevo usuario">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- script para cerrar modal al guardar form -->
        <script src="js/incidences.js"></script>

        <!-- Tabla de users -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Usuario</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Apellido</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Rol</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre d'Usuario</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                        <?php foreach($users as $user) { ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#USR-<?= $user["id"] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $user["name"] ?></p>
                            </td>
                            <td class="px-6 py-4"><?= $user["surname"] ?></td>
                            <td class="px-6 py-4">
                                <p class="truncate max-w-[200px]"><?= $user["email"] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $user["role"] ?></span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900"><?= $user["username"] ?></td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800" aria-label="Editar usuario #USR-<?= $user["id"] ?>">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <a href="/adminusuarios/eliminar/<?= $user["id"] ?>" aria-label="Eliminar usuario #USR-<?= $user["id"] ?>">
                                        <button class="text-red-600 hover:text-red-800" aria-label="Eliminar usuario #USR-<?= $user["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>
</html>