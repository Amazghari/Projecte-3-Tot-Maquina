<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Perfil</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="flex justify-center mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
            <div class="flex flex-col items-center">
                <img src="uploads/img/perfil.png" alt="Foto de perfil" class="w-32 h-32 rounded-full border-4 border-custom-blue mb-4">
                <div class="flex space-x-2 mb-4">
                    <button class="nav-button-custom flex items-center justify-center">Cambiar Foto de Perfil</button>
                    <a href="/logout" class="nav-button-logout flex items-center justify-center"><button>Cerrar Sesión</button></a>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" aria-label="Nombre" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Miguelito" required>
                </div>
                <div class="flex-1">
                    <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
                    <input type="text" id="apellido" aria-label="Apellido" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Sanchez" required>
                </div>
            </div>
            <div class="mb-4 flex space-x-4">
                <div class="flex-1">
                    <label for="username" class="block text-sm font-medium text-gray-700">Nombre de Usuario</label>
                    <input type="text" id="username" aria-label="Nombre de Usuario" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Xx_Ermigueh_xX" required>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Rol</label>
                    <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100" value="administrador" readonly aria-label="Rol" aria-readonly="true">
                </div>
            </div>
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">ID de Usuario</label>
                <input type="text" id="user_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100" value="USR-123" readonly aria-label="ID de Usuario" aria-readonly="true">
            </div>
            <div class="flex justify-center mt-4">
                <button class="nav-button-custom flex items-center justify-center">Guardar</button>
            </div>
        </div>
    </div>

    <!-- Footer -->
</body>
<?php include 'Layouts/footer.php'; ?>
</html>