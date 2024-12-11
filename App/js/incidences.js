    // Get the form and submit button
    const form = document.getElementById('incident-form');
    const submitButton = document.getElementById('submit-button');

// Add event to save button
    submitButton.addEventListener('click', function() {
         // Validate the form fields
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const priority = document.getElementById('priority').value;
        const status = document.getElementById('status').value;

        // Check that the fields are not empty
        if (title && description && priority && status) {
            // If all fields are complete, submit the form
            form.submit();
        } else {
            // If any field is empty, show alert
            alert('Por favor, completa todos los campos');
        }
    });
