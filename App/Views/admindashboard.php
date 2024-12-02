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
                <p class="text-4xl font-bold">10</p>
            </div>
            <div class="bg-yellow-600 text-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold">Prioridad Media</h3>
                <p class="text-4xl font-bold">15</p>
            </div>
            <div class="bg-green-600 text-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h3 class="text-xl font-semibold">Prioridad Baja</h3>
                <p class="text-4xl font-bold">5</p>
            </div>
        </div>
        
        <h1 class="text-4xl font-bold text-custom-blue text-center mb-6 mt-8">Estadísticas de Uso</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Totales</h2>
                <p class="text-4xl font-bold">150</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Completadas</h2>
                <p class="text-4xl font-bold">120</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Incidencias Abiertas</h2>
                <p class="text-4xl font-bold">30</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Mantenimientos Totales</h2>
                <p class="text-4xl font-bold">75</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Mantenimientos Completados</h2>
                <p class="text-4xl font-bold">50</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Usuarios Totales</h2>
                <p class="text-4xl font-bold">200</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Máquinas Totales</h2>
                <p class="text-4xl font-bold">50</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Máquinas Fuera de Servicio</h2>
                <p class="text-4xl font-bold">5</p>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 text-center transition-transform transform hover:scale-105">
                <h2 class="text-xl font-semibold text-custom-blue">Máquinas Operativas</h2>
                <p class="text-4xl font-bold">45</p>
            </div>
        </div>

    </div>

    <?php include 'Layouts/footer.php'; ?>
</body>

</html>