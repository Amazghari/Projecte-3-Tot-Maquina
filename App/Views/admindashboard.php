<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <link rel="icon" href="../../uploads/img/logopng.png">
    <title>Admin Dashboard</title>
</head>

<body class="flex flex-col min-h-screen bg-custom-light-gray">
    <?php include 'Layouts/navbar.php'; ?>

    <div class="flex justify-center mt-5 w-full space-x-4">
        <a href="/incidencias" class="nav-button-custom w-1/4 focus:outline-none">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span>Incidencias</span>
        </a>
        <a href="/maquinas" class="nav-button-custom w-1/4 focus:outline-none">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zM12 2a10 10 0 00-10 10c0 1.5.3 2.9.8 4.2l-1.5 1.5a1 1 0 000 1.4l1.4 1.4a1 1 0 001.4 0l1.5-1.5A9.95 9.95 0 0012 22a10 10 0 0010-10 10 10 0 00-10-10z" />
            </svg>
            <span>Máquinas</span>
        </a>
        <a href="/mantenimiento" class="nav-button-custom w-1/4 focus:outline-none">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2v20m10-10H2" />
            </svg>
            <span>Mantenimiento</span>
        </a>
        <a href="/usuarios" class="nav-button-custom w-1/4 focus:outline-none">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-4.41 0-8 2.69-8 6v2h16v-2c0-3.31-3.59-6-8-6z" />
            </svg>
            <span>Usuarios</span>
        </a>
    </div>

    <!-- Footer -->
    <?php include 'Layouts/footer.php'; ?>

</body>

</html>