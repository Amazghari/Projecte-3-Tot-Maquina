<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/js/incidence.js"></script>

    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
</head>
<body class="bg-custom-light-gray">
<?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h1 class="text-2xl font-bold text-custom-blue">Lista de Incidencias</h1>
            <?php if(isset($app_user) && $app_user['role'] != 'usuario'){?>
            <a href="/asignartecnico" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer" aria-label="Asignar Técnico">
                Asignar Técnico
            </a>
            <?php } ?>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Nueva Incidencia
            </label>
        </div>

<!-- Modal usando solo CSS -->
<input type="checkbox" id="modal-toggle" class="hidden">
<div class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" 
     id="modal"
     role="dialog"
     aria-modal="true">
    <div class="modal-content p-6">
        <div class="flex justify-between items-center pb-3 border-b">
            <h3 class="text-xl font-semibold text-gray-900">Nueva Incidencia</h3>
            <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </label>
        </div>
        
        <form id="incident-form" class="space-y-4 mt-4" action="/incidencias/añadir" method="post" enctype="multipart/form-data">
            <div>
                <label class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Prioridad</label>
                <select name="priority" id="priority" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Estado</label>
                <select name="state" id="state" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    <option value="No iniciada">No iniciado</option>
                    <option value="En proceso">En proceso</option>
                    <option value="Finalizado">Finalizado</option>
                    
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Descripción</label>
                <input type="text" name="description" id="description" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Id Maquina</label>
                <input type="text" name="id_machine" id="id_machine"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
            </div>

            <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                <label for="modal-toggle" 
                       class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">
                    Cancelar
                </label>
                <button type="submit" id="submit-button" 
                        class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>
<!-- script to close modal when saving form -->
<script src="js/incidences.js"></script>


        <!-- Incident table -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Incidencia</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Descripcion</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Prioridad</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Estado</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Trabajador</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Nombre Trabajador</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    <?php foreach ($incidences as $incidence) { ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#INC-<?= $incidence['id'] ?></td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $incidence['name'] ?></p>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]"><?= $incidence['description'] ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['priority'] ?></span>
                            </td> 
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800"><?= $incidence['state'] ?></span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900"></td>
                            <td class="px-6 py-4 text-sm text-gray-900"></td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-gray-600 hover:text-gray-800" onclick="window.location='/incidencia/<?= $incidence['id'] ?>'" aria-label="Ver detalles de máquina #MAQ-2">
                                        <strong><i class="bi bi-eye w-5 h-5" aria-hidden="true"></i></strong>
                                    </button>
                                    <a href="/incidencia/editar/<?= $incidence["id"] ?>" class="cursor-pointer text-blue-600 hover:text-blue-800" aria-label="Editar máquina #MAQ-<?= $incidence["id"] ?>">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>

                                        <button class="text-red-600 hover:text-red-800" data-id="<?= $incidence["id"] ?>" id="eliminarIncidencia" aria-label="Eliminar incidencia #INC-<?= $incidence["id"] ?>">

                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />

                                            </svg>

                                        </button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/incidence.js"></script>

</body>
<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>
</html>