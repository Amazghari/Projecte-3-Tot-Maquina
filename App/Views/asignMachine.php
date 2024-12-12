<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Asignacion</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <form action="/asignarmaquinatecnico" method="post">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
                <h2 class="text-2xl font-bold text-custom-blue mb-4 md:mb-0">Asignación de Maquinas a Técnicos</h2>
                <button type="submit" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                    Guardar
                </button>
            </div>
            <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
                <div class="flex flex-col md:flex-row justify-start items-center">
                    <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Maquinas</h2>
                </div>
                <div class="flex flex-col md:flex-row justify-end items-center">
                    <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Técnicos</h2>
                </div>
            </div>
            <!-- Contenedor para las tablas -->
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                <!-- Tabla de inventario -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                    <div class="table-responsive">
                        <table class="min-w-full">
                            <thead class="bg-custom-blue text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Nº serie</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Técnico</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach($machines as $machine){ ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900">#MAQ-<?php echo $machine['id']; ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <p class="truncate max-w-[200px]"><?php echo $machine['name']; ?></p>
                                    </td>
                                    <td class="px-6 py-4"><?php echo $machine['serial_num']; ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <input type="text" name="tech_id[]" placeholder="Asignar técnico" class="border rounded p-1 w-full"
                                            ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <input type="hidden" name="machine_id[]" value="<?php echo $machine['id']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Nueva tabla al lado -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                    <div class="table-responsive">
                        <table class="min-w-full">
                            <thead class="bg-custom-blue text-white">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold">Especialidad</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php foreach($techs as $tech){ ?>
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-sm text-gray-900" draggable="true" ondragstart="drag(event)"><?php echo $tech['id']; ?></td>
                                    <td class="px-6 py-4 text-sm text-gray-900">
                                        <p class="truncate max-w-[200px]" ><?php echo $tech['name']; ?></p>
                                    </td>
                                    <td class="px-6 py-4">Mecánica</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/machine.js"></script>

</body>

</html>