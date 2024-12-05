<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="main.css" rel="stylesheet">
  <link rel="icon" href="/uploads/img/logopng.png" type="image/x-icon">
  
  <title>Acceso al sistema</title>
</head>

<body class="bg-custom-light-gray flex items-center justify-center h-screen"> 
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h1 class="text-center text-xl font-bold mb-4">Acceso al sistema</h1>
    <img src="/uploads/img/logopng.png" alt="Logo" class="w-16 mx-auto mb-4">
    <form action="/login" method="post">
      <div class="mb-4">
        <label class="block text-gray-700" for="username">Usuario</label>
        <input class="border border-gray-300 rounded w-full p-2" type="text" id="username" name="username" placeholder="Ingrese su usuario">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700" for="password">Contraseña</label>
        <input class="border border-gray-300 rounded w-full p-2" type="password" id="password" name="password" placeholder="Ingrese su contraseña">
      </div>
      <button class="bg-custom-blue text-white rounded w-full p-2 hover:bg-custom-blue" type="submit">Inicio Sesión</button>
    </form>
    <p class="text-center text-gray-600 mt-4">
      <a href="#" class="text-custom-blue hover:underline">¿Olvidó su contraseña?</a>
    </p>
  </div>
</body>

</html>