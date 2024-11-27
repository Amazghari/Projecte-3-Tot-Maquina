<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <style>
        #modal-toggle:checked + #modal {
            display: flex !important;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            width: 90%;
            max-width: 500px;
            border-radius: 0.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transform: translateY(0);
            transition: all 0.3s ease-in-out;
        }

        .machine-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        .machine-select option:hover {
            background-color: #003366;
            color: white;
        }

        @media (max-width: 640px) {
            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body class="bg-custom-light-gray">
<?php include 'Layouts/navbar.php'; ?>

    <div class="container mx-auto px-4 pt-20">
        <div class="flex justify-between items-center mb-6 mt-8">
            <h2 class="text-2xl font-bold text-custom-blue">Lista de Mantenimientos</h2>
            <label for="modal-toggle" class="bg-custom-blue text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition-colors cursor-pointer">
                Nuevo Mantenimiento
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
                    <h3 class="text-xl font-semibold text-gray-900">Nuevo Mantenimiento</h3>
                    <label for="modal-toggle" class="cursor-pointer text-gray-600 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </label>
                </div>
                
                <form class="space-y-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Fecha</label>
                        <input type="date" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-custom-blue focus:ring focus:ring-custom-blue focus:ring-opacity-50">
                    </div>
                    
                    <div class="flex justify-end space-x-3 mt-6 pt-4 border-t">
                        <label for="modal-toggle" 
                               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 cursor-pointer">
                            Cancelar
                        </label>
                        <button type="submit" 
                                class="px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de mantenimientos -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="min-w-full">
                    <thead class="bg-custom-blue text-white">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Título</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Tipo</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">ID Máquina</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Fecha</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">#MNT-001</td>
                            <td class="px-6 py-4 text-sm text-gray-900">
                                <p class="truncate max-w-[200px]">Mantenimiento Preventivo Sistema A</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    Preventivo
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Completado
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">MAQ-123</td>
                            <td class="px-6 py-4 text-sm text-gray-900">15/03/2024</td>
                            <td class="px-6 py-4 text-sm">
                                <div class="flex space-x-3">
                                    <button class="text-blue-600 hover:text-blue-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
<!-- Footer -->
<?php include 'Layouts/footer.php'; ?>
</html>