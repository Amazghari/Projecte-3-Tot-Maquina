<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Acceso al sistema</title>
</head>

<body class="bg-gray-200 flex items-center justify-center h-screen">
  <div class="bg-white rounded-lg shadow-lg p-6 w-96">
    <h2 class="text-center text-xl font-bold mb-4">Acceso al sistema</h2>
    <form>
      <div class="mb-4">
        <label class="block text-gray-700" for="usuario">Usuario</label>
        <input class="border border-gray-300 rounded w-full p-2" type="text" id="usuario" placeholder="Ingrese su usuario">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700" for="contrasena">Contraseña</label>
        <input class="border border-gray-300 rounded w-full p-2" type="password" id="contrasena" placeholder="Ingrese su contraseña">
      </div>
      <button class="bg-blue-500 text-white rounded w-full p-2 hover:bg-blue-600" type="submit">Inicio Sesión</button>
    </form>
    <p class="text-center text-gray-600 mt-4">
      <a href="#" class="text-blue-500 hover:underline">¿Olvidó su contraseña?</a>
    </p>
  </div>
</body>

</html>