<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Panel del Admin</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>
    <?php include 'Layouts/navbaradmin.php'; ?>
    <div class="container mx-auto px-4 py-8">

        <h1 class="text-4xl font-bold text-custom-blue text-center mb-6 mt-8">Incidencias por Prioridad</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-4">
            <div class="bg-red-600 text-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold">Prioridad Alta</h3>
                <p class="text-4xl font-bold"><?php echo $totalHighPriorityIncidences; ?></p>
            </div>
            <div class="bg-[#c88802] text-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold">Prioridad Media</h3>
                <p class="text-4xl font-bold"><?php echo $totalMediumPriorityIncidences; ?></p>
            </div>
            <div class="bg-green-600 text-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold">Prioridad Baja</h3>
                <p class="text-4xl font-bold"><?php echo $totalLowPriorityIncidences; ?></p>
            </div>
        </div>
        a
        <h1 class="text-4xl font-bold text-custom-blue text-center mb-6 mt-8">Estadísticas de Uso</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Totales</h2>
                <p class="text-4xl font-bold"><?php echo $totalIncidences; ?></p>        </div> <!-- For get the result of the count -->
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Completadas</h2>
                <p class="text-4xl font-bold"><?php echo $totalCompletedIncidences; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Abiertas</h2>
                <p class="text-4xl font-bold"><?php echo $totalOpenedIncidences; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Mantenimientos Totales</h2>
                <p class="text-4xl font-bold"><?php echo $totalMaintenance; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Mantenimientos Programados</h2>
                <p class="text-4xl font-bold"><?php echo $totalProgrammedMaintenance; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Mantenimientos Completados</h2>
                <p class="text-4xl font-bold"><?php echo $totalCompletedMaintenance; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Usuarios Totales</h2>
                <p class="text-4xl font-bold"><?php echo $totalUsers; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Máquinas Totales</h2>
                <p class="text-4xl font-bold"><?php echo $totalMachines; ?></p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Técnicos Totales</h2>
                <p class="text-4xl font-bold"><?php echo $totalTechnics; ?></p>
            </div>
        </div>

    </div>

    <?php include 'Layouts/footer.php'; ?>
</body>

</html>