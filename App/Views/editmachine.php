<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>
<body>
    <form class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md" action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
        <h2 class="text-2xl font-bold mb-4">Editar Máquina</h2>
        
        <input type="hidden" name="id" value="<?= $machine['id'] ?>">

        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name" value="<?= $machine['name'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="nombre" class="block text-sm font-medium text-gray-700">NºSerie</label>
            <input type="text" id="serial_num" name="serial_num" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
            <input type="text" id="modelo" name="model" value="<?= $machine['model'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Fabricante</label>
            <input type="text" id="manufacturer" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Localización</label>
            <input type="text" id="imagen" name="location" value="<?= $machine['location'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="imagen" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>  

        <div class="flex justify-end">
            <button type="submit" class="nav-button">Guardar Cambios</button>
        </div>
    </form>
</body>
</html>