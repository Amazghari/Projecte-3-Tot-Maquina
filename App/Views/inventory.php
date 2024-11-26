<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet">
    <title>Inventory</title>
</head>
<body class="bg-custom-light-gray">

    <div class="container mx-auto mt-5">
        <div class=" m-5">
            <div class="bg-custom-blue text-white p-4 rounded-t-lg flex items-center">
                <img src="/uploads/img/logopng.png" alt="Inventory" class="w-10 h-10 rounded-full mr-2">
                <h1 class="text-xl font-bold ml-2">Inventario</h1>
            </div>
            <div class="flex justify-between p-4">
                <div class="flex items-center">
                </div>
            </div>
            <table class="min-w-full bg-white">
                <thead>
                    <tr class="bg-custom-blue uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left text-white">Model</th>
                        <th class="py-3 px-6 text-left text-white">Manufacturer</th>
                        <th class="py-3 px-6 text-left text-white">Serial No.</th>
                        <th class="py-3 px-6 text-left text-white">Install Date</th>
                        <th class="py-3 px-6 text-left text-white">Location</th>
                        <th class="py-3 px-6 text-left text-white">Image</th>
                        <th class="py-3 px-6 text-left text-white">Worker</th>
                        <th class="py-3 px-6 text-left text-white">ID</th>
                        <th class="py-3 px-6 text-left pr-10 text-white">Users</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <tr class="border-b bg-white hover-bg-custom-light-gray">
                        <td class="py-3 px-6">Model 1</td>
                        <td class="py-3 px-6">Manufacturer 1</td>
                        <td class="py-3 px-6">12345</td>
                        <td class="py-3 px-6">01/01/2021</td>
                        <td class="py-3 px-6">Location 1</td>
                        <td class="py-3 px-6"><img src="path/to/image1.jpg" alt="Image 1" class="w-10 h-10"></td>
                        <td class="py-3 px-6">Worker 1</td>
                        <td class="py-3 px-6">1</td>
                        <td class="py-3 px-6">User 1</td>
                    </tr>
                    <tr class="border-b bg-white hover-bg-custom-light-gray">
                        <td class="py-3 px-6">Model 2</td>
                        <td class="py-3 px-6">Manufacturer 2</td>
                        <td class="py-3 px-6">67890</td>
                        <td class="py-3 px-6">02/01/2021</td>
                        <td class="py-3 px-6">Location 2</td>
                        <td class="py-3 px-6"><img src="path/to/image2.jpg" alt="Image 2" class="w-10 h-10"></td>
                        <td class="py-3 px-6">Worker 2</td>
                        <td class="py-3 px-6">2</td>
                        <td class="py-3 px-6">User 2</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
