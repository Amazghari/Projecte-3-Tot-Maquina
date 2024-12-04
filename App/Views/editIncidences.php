<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Incidencias</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="icon" href="../../logo.png">
</head>
<body class="bg-custom-light-gray">
<div class="flex justify-start mb-4 mt-4">
            <a href="/incidencia" class="nav-button-invertido mr-4">Volver</a>
        </div>
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
        
        <h2 class="text-2xl font-bold text-custom-blue text-center mb-4">Editar Incidencia</h2>

        <form action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $incidence['id'] ?>">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" value="<?= $incidence['name'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                <input type="text" id="state" name="state" value="<?= $incidence['state'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Prioridad</label>
            <input type="text" id="priority" name="priority" value="<?= $incidence['priority'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Descripción</label>
            <input type="text" id="imagen" name="description" value="<?= $incidence['description'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-sm font-medium text-gray-700">Id Máquina</label>
            <input type="text" id="imagen" name="id_machine" value="<?= $incidence['id_machine'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        </form>
    </div>
</body>
<?php include 'Layouts/footer.php'; ?>

</html>