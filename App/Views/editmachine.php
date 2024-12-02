<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="icon" href="../../logo.png">
</head>
<body class="bg-custom-light-gray">
<div class="flex justify-start mb-4 mt-4">
            <a href="/inventario" class="nav-button-invertido mr-4">Volver</a>
        </div>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        
        <h2 class="text-2xl font-bold text-custom-blue text-center mb-4">Editar Máquina</h2>

        <form action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $machine['id'] ?>">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="<?= $machine['name'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="serial_num" class="block text-sm font-medium text-gray-700">NºSerie</label>
                <input type="text" id="serial_num" name="serial_num" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Fabricante</label>
            <input type="text" id="manufacturer" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Fecha Instalación</label>
            <input type="date" id="imagen" name="installation_date" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Longitud</label>
            <input type="text" id="imagen" name="longitude" value="<?= $machine['longitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Latitud</label>
            <input type="text" id="imagen" name="latitude" value="<?= $machine['latitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
            <div class="mb-4">
                <label for="model" class="block text-sm font-medium text-gray-700">Modelo</label>
                <input type="text" id="model" name="model" value="<?= $machine['model'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="manufacturer" class="block text-sm font-medium text-gray-700">Fabricante</label>
                <input type="text" id="manufacturer" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>  

            <div class="flex justify-end">
                <button type="submit" class="nav-button-invertido">Guardar Cambios</button>
            </div>
        </form>
    </div>
</body>
<?php include 'Layouts/footer.php'; ?>

</html>