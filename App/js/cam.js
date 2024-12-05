// Acceder a la cámara
const video = document.getElementById('video');
const photoModal = document.getElementById('photo-modal');
const openCameraButton = document.getElementById('open-camera');
const closeModalButton = document.getElementById('close-modal');
const cancelPhotoButton = document.getElementById('cancel-photo');

openCameraButton.addEventListener('click', async () => {
    photoModal.classList.remove('hidden');
    const stream = await navigator.mediaDevices.getUserMedia({ video: true });
    video.srcObject = stream;
});

// Capturar la foto
document.getElementById('capture').addEventListener('click', () => {
    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);
    const dataUrl = canvas.toDataURL('image/png');
    document.getElementById('photo').src = dataUrl;
    document.getElementById('photo').classList.remove('hidden');
});

// Guardar la foto
document.getElementById('save-photo').addEventListener('click', async () => {
    const dataUrl = document.getElementById('photo').src;

    // Enviar la imagen al servidor
    const response = await fetch('/upload.php', {
        method: 'POST',
        body: JSON.stringify({ image: dataUrl }),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const result = await response.json();
    if (result.success) {
        document.getElementById('image').value = result.filePath; // Asignar la ruta de la imagen al input
        photoModal.classList.add('hidden'); // Cerrar el modal
    } else {
        alert('Error al guardar la imagen');
    }
});

// Cerrar el modal
closeModalButton.addEventListener('click', () => {
    photoModal.classList.add('hidden'); // Cerrar el modal
});

cancelPhotoButton.addEventListener('click', () => {
    photoModal.classList.add('hidden'); // Cerrar el modal
});