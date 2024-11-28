    // Obtener el formulario y el botón de envío
    const form = document.getElementById('incident-form');
    const submitButton = document.getElementById('submit-button');

    // Añadir evento al botón de guardar
    submitButton.addEventListener('click', function() {
        // Validar los campos del formulario
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const priority = document.getElementById('priority').value;
        const status = document.getElementById('status').value;

        // Comprobar que los campos no estén vacíos
        if (title && description && priority && status) {
            // Si todos los campos están completos, enviar el formulario
            form.submit();
        } else {
            // Si algún campo está vacío, mostrar alerta
            alert('Por favor, completa todos los campos');
        }
    });
