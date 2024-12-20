<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Mantenimiento</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>

<body class="bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Editar Mantenimiento</h2>
            <a href="/mantenimientos" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors">
                Volver
            </a>
        </div>

        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
            <form action="/mantenimiento/updateMantenimiento" method="post" class="space-y-4">
                <input type="hidden" name="id" value="<?= $maintenance['id'] ?>">

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="title">Título</label>
                    <input type="text" id="title" name="title" value="<?= $maintenance['title'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 focus:ring-custom-blue" required>
                </div>
 
                <div>
                    <label class="block text-sm font-medium text-gray-700" for="status">Estado</label>
                    <select id="state" name="state" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 focus:ring-custom-blue">
                        <option value="Completado" <?= $maintenance['state'] === 'Completado' ? 'selected' : '' ?>>Hecho</option>
                        <option value="Programado" <?= $maintenance['state'] === 'Programado' ? 'selected' : '' ?>>Programado</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700" for="description">Descripción</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 focus:ring-custom-blue"><?= $maintenance['description'] ?></textarea>
                </div>

                <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                    <a href="/mantenimiento" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors">
                        Cancelar
                    </a>
                    <button type="submit" class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<?php include 'Layouts/footer.php'; ?>

</html>
