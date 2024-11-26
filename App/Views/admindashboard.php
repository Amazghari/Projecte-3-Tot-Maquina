<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="main.css" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen flex flex-col items-center">

    <!-- Barra de navegación fija -->
    <nav class="w-full bg-blue-800 text-white py-4 shadow-md fixed top-0 z-50">
        <div class="text-center font-semibold text-lg">Nav</div>
    </nav>

    <!-- Espaciado para compensar la barra fija -->
    <div class="w-3/4 max-w-4xl mt-16">
        <!-- Contenedor principal -->
        <div class="bg-white p-6 shadow-lg rounded-md mt-8">
            <!-- Tabla de encabezado -->
            <div class="bg-custom-blue text-white font-bold py-2 px-4 rounded-md flex justify-between">
                <span>Id</span>
                <span>Nom</span>
                <span>Username</span>
                <span>Rol</span>
            </div>

            <!-- Acciones -->
            <div class="flex justify-end mt-6 space-x-4">
                <!-- Botón Eliminar -->
                <button class="bg-custom-blue text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">Eliminar</button>
                <!-- Botón Editar -->
                <button class="bg-custom-blue text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">Editar</button>
            </div>
        </div>
    </div>

</body>
</html>
