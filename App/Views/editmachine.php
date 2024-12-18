<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Máquina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/main.css">
    <link rel="icon" href="../../logo.png">
</head>
<body class="bg-custom-light-gray">
<div class="flex justify-start mb-4 mt-4">
    <a href="/inventario" class="nav-button-invertido mr-4">Volver</a>
</div>
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md mt-8">
    
    <h2 class="text-2xl font-bold text-custom-blue text-center mb-4">Editar Máquina</h2>

    <form action="/inventario/updateMachine" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $machine['id'] ?>">

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input type="text" id="name" name="name" value="<?= $machine['name'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="serial_num" class="block text-sm font-medium text-gray-700">NºSerie</label>
            <input type="text" id="serial_num" name="serial_num" value="<?= $machine['serial_num'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="manufacturer" class="block text-sm font-medium text-gray-700">Fabricante</label>
            <input type="text" id="manufacturer" name="manufacturer" value="<?= $machine['manufacturer'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="installation_date" class="block text-sm font-medium text-gray-700">Fecha Instalación</label>
            <input type="date" id="installation_date" name="installation_date" value="<?= $machine['installation_date'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitud</label>
            <input type="text" id="longitude" name="longitude" value="<?= $machine['longitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitud</label>
            <input type="text" id="latitude" name="latitude" value="<?= $machine['latitude'] ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
        <button type="button" class="mt-2 px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors" id="open-camera">Tomar Foto</button>        

            <label for="image" class="block text-sm font-medium text-gray-700">Imagen</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
           
            <button type="submit" class="nav-button-invertido mt-4">Guardar Cambios</button>

            <!-- Modal to take photo -->
            <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center hidden" id="photo-modal" role="dialog">
                <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
                    <div class="flex flex-col items-center">
                        <video id="video" class="w-full rounded-md border-2 border-gray-300" autoplay></video>
                        <p id="capture" class="mt-4 px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors cursor-pointer">Hacer Foto</p>
                        <canvas id="canvas" class="hidden"></canvas>
                        <img id="photo" class="mt-4 rounded-md hidden border-2 border-gray-300" alt="Captured Photo" />
                    </div>

                    <div class="flex justify-between space-x-3 mt-6 pt-4 border-t">
                        <button id="save-photo" class="flex-1 px-4 py-2 bg-custom-blue text-white rounded-md hover:bg-blue-800 transition-colors">Guardar Foto</button>
                        <button class="flex-1 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition-colors" onclick="document.getElementById('photo-modal').classList.add('hidden');">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="/js/bundle.js"></script>
<script>
document.getElementById('open-camera').addEventListener('click', function () {
    // Show the modal to capture the photo
    document.getElementById('photo-modal').classList.remove('hidden');

    // Access the video and canvas elements to capture the photo
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('capture');

    // Access the device's camera
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
            video.srcObject = stream;
        })
        .catch(err => {
            console.log("Error accessing the camera:", err);
        });

    captureButton.addEventListener('click', function () {
        // Set the canvas size to match the video size
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;

        // Draw the image from the video onto the canvas
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert the canvas to base64 and display the image
        const imageData = canvas.toDataURL('image/png');
        const photo = document.getElementById('photo');
        photo.src = imageData;
        photo.classList.remove('hidden');

        // Convert the base64 image to a Blob
        fetch(imageData)
            .then(res => res.blob())
            .then(blob => {
                // Create a Blob image file
                const file = new File([blob], "photo.png", { type: "image/png" });

                // Assign the file to the file input element
                const inputImage = document.getElementById('image');
                const dataTransfer = new DataTransfer(); // Object to simulate a selected file
                dataTransfer.items.add(file); // Add the file to the input
                inputImage.files = dataTransfer.files; // Assign the files to the input
            });
    });
});

// Save the captured photo in the form
document.getElementById('save-photo').addEventListener('click', function (e) {
    e.preventDefault();

    const canvas = document.getElementById('canvas');
    canvas.toBlob(function (blob) {
        const formData = new FormData();
        formData.append('image', blob, 'photo.png');

        // Add other form fields to the FormData
        const formElements = document.querySelector('form').elements;
        for (let i = 0; i < formElements.length; i++) {
            const el = formElements[i];
            if (el.name && el.type !== 'file') {
                formData.append(el.name, el.value);
            }
        }

        // Send the FormData with fetch
        fetch('/inventario/updateMachine', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error saving the photo.');
        });
    }, 'image/png');
});

// Close the modal after saving the photo
document.getElementById('save-photo').addEventListener('click', function () {
    document.getElementById('photo-modal').classList.add('hidden');
});
</script>

<script>
// Function to close the modal and stop the camera
// Function to close the modal
function closeModal() {
    const modal = document.getElementById('photo-modal');
    modal.classList.add('hidden'); // Add 'hidden' class to hide the modal
}

// Function to handle the "Save Photo" event
document.getElementById('save-photo').addEventListener('click', function () {
    // Show the alert

    // Close the modal after the user closes the alert
    closeModal();
});
</script>

</body>
</html>