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
            <label for="manufacturer" class="block text-sm font-medium text-gray-700">Fabricante</label>
            <input type="text" id="manufacturer" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="installation_date" class="block text-sm font-medium text-gray-700">Fecha Instalación</label>
            <input type="date" id="installation_date" name="installation_date" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitud</label>
            <input type="text" id="longitude" name="longitude" value="<?= $machine['longitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitud</label>
            <input type="text" id="latitude" name="latitude" value="<?= $machine['latitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <button type="button" class="mt-2 px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors" id="open-camera">
                Tomar Foto
            </button>
        </div>  
        <button type="submit" class="nav-button-invertido">Guardar Cambios</button>
    </form>
</div>

<!-- Modal para tomar foto -->
<div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center hidden" id="photo-modal" role="dialog" aria-modal="true">
    <div class="modal-content p-4 bg-white rounded-lg shadow-lg">
        <div class="flex justify-between items-center pb-3 border-b">
            <h3 class="text-xl font-semibold text-gray-900">Tomar Foto</h3>
            <button id="close-modal" class="cursor-pointer text-gray-600 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="flex flex-col items-center">
            <video id="video" class="w-3/4 rounded-md" autoplay></video>
            <button id="capture" class="mt-4 px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">Hacer Foto</button>
            <canvas id="canvas" class="hidden"></canvas>
            <img id="photo" class="mt-4 rounded-md hidden" alt="Captured Photo" />
        </div>

        <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
            <button id="save-photo" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">Guardar Foto</button>
            <button id="cancel-photo" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">Cancelar</button>
        </div>
    </div>
</div>

<?php include 'Layouts/footer.php'; ?>

<script src="/js/bundle.js"></script>

</body>
</html>