
// // Access the camera
const video = document.getElementById('video');
const photoModal = document.getElementById('photo-modal');
const openCameraButton = document.getElementById('open-camera');
const closeModalButton = document.getElementById('close-modal');
const cancelPhotoButton = document.getElementById('cancel-photo');
const capture = document.getElementById('capture');
const savephoto = document.getElementById('save-photo');

if (openCameraButton != null){
    openCameraButton.addEventListener('click', async () => {
        photoModal.classList.remove('hidden');
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.srcObject = stream;
    });
}

// Capture the photo
if (capture != null){
    capture.addEventListener('click', () => {
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        context.drawImage(video, 0, 0, canvas.width, canvas.height);
        const dataUrl = canvas.toDataURL('image/png');
        document.getElementById('photo').src = dataUrl;
        document.getElementById('photo').classList.remove('hidden');
    });
}

// save the photo
if (savephoto != null){
    savephoto.addEventListener('click', async () => {
    const dataUrl = document.getElementById('photo').src;

    // Send image to server
    const response = await fetch('/upload.php', {
        method: 'POST',
        body: JSON.stringify({ image: dataUrl }),
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const result = await response.json();
    if (result.success) {
        document.getElementById('image').value = result.filePath; // Assign the image path to the input
        photoModal.classList.add('hidden'); // close el modal
    } else {
        alert('Error al guardar la imagen');
    }
});

}

// close  modal
if (closeModalButton != null){
    closeModalButton.addEventListener('click', () => {
        photoModal.classList.add('hidden'); // close modal
    });
}

if (cancelPhotoButton != null){
    cancelPhotoButton.addEventListener('click', () => {
        photoModal.classList.add('hidden'); // close  modal
    });
}