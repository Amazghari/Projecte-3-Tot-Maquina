<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Asignacion</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <form action="/asignarincidenciatecnico" method="post">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue mb-4 md:mb-0">Asignación de Incidencias a Técnicos</h2>
            <button type="submit" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Guardar
            </button>
        </div>
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 mt-8">
            <div class="flex flex-col md:flex-row justify-start items-center">
                <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Incidencias</h2>
            </div>
            <div class="flex flex-col md:flex-row justify-end items-center">
                <h2 class="text-2xl font-bold text-custom-blue md:mb-0">Técnicos</h2>
            </div>
        </div>
        <!-- Container for tables -->
        <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
            <!-- Inventory table -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Descripcion</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Asignar Tecnico</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($incidences as $incidence) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-900">#INC-<?= $incidence["id"]?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $incidence["name"]?></p>
                                </td>
                                <td class="px-6 py-4"><?= $incidence["description"]?></td>
                                <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <input type="text" name="tech_id[]" placeholder="Asignar técnico" class="border rounded p-1 w-full"
                                            ondrop="drop(event)" ondragover="allowDrop(event)">
                                            <input type="hidden" name="incidence_id[]" value="<?php echo $incidence['id']; ?>">
                                        </div>
                                    </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- New table next -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden flex-1">
                <div class="table-responsive">
                    <table class="min-w-full">
                        <thead class="bg-custom-blue text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php foreach ($techs as $tech){ ?>
                            <tr class="hover:bg-gray-50" >
                                <td class="px-6 py-4 text-sm text-gray-900" draggable="true" ondragstart="drag(event)"><?= $tech["id"]?></td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <p class="truncate max-w-[200px]"><?= $tech["name"]?></p>
                                </td>
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
    <script src="/js/incidence.js"></script>
</body>

</html>