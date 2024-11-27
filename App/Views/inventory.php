<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Inventario</title>
</head>
<body class="bg-custom-light-gray">

<!-- Navbar superior -->
<?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto mt-5">
        <div class=" m-5">
            <div class="bg-custom-blue text-white p-4 rounded-t-lg flex items-center">
                <img src="/uploads/img/logopng.png" alt="Inventory" class="w-10 h-10 rounded-full mr-2">
                <h1 class="text-xl font-bold ml-2">Inventario</h1>
            </div>
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-custom-blue"></h2>
                <button class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors mt-5">
                    Crear Máquina
                </button>
            </div>
            <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-custom-blue text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Modelo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Fabricante</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">N.Serie</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Data Inst.</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Ubicación</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Trabajador</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold">Usuarios</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">ID</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="hover:bg-custom-light-gray">
                        <td class="px-6 py-4 text-sm">Model 1</td>
                        <td class="px-6 py-4 text-sm">Manufacturer 1</td>
                        <td class="px-6 py-4 text-sm">12345</td>
                        <td class="px-6 py-4 text-sm">01/01/2021</td>
                        <td class="px-6 py-4 text-sm">Location 1</td>
                        <td class="px-6 py-4 text-sm">Worker 1</td>
                        <td class="px-6 py-4 text-sm">
                            <select class="border border-gray-300 rounded-md">
                                <option value="usuario1">Usuario 1</option>
                                <option value="usuario2">Usuario 2</option>
                                <option value="usuario3">Usuario 3</option>
                                <option value="usuario4">Usuario 4</option>
                            </select>
                        </td>
                        <td class="px-4 py-4 text-sm">1</td>
                    </tr>
                    <tr class="hover:bg-custom-light-gray">
                        <td class="px-6 py-4 text-sm">Model 2</td>
                        <td class="px-6 py-4 text-sm">Manufacturer 2</td>
                        <td class="px-6 py-4 text-sm">67890</td>
                        <td class="px-6 py-4 text-sm">02/01/2021</td> 
                        <td class="px-6 py-4 text-sm">Location 2</td> 
                        <td class="px-6 py-4 text-sm">Worker 2</td>
                        <td class="px-6 py-4 text-sm">
                            <select class="border border-gray-300 rounded-md">
                                <option value="usuario1">Usuario 1</option>
                                <option value="usuario2">Usuario 2</option>
                                <option value="usuario3">Usuario 3</option>
                                <option value="usuario4">Usuario 4</option>
                            </select>
                        </td>
                        <td class="px-4 py-4 text-sm">2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>
</body>
</html>
