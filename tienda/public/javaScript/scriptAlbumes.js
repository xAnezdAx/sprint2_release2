function validateName() {
    var nameField = document.getElementById("titulo");
    var nameValue = nameField.value;

    // Expresión regular para validar el campo "Nombre"
    var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$/;

    if (!nameValue.trim()) {
        alert("El campo 'titulo' no puede estar vacío.");
        nameField.focus();
        return false;
    }

    if (!regex.test(nameValue)) {
        alert("El campo 'Titulo' no puede contener caracteres especiales.");
        nameField.focus();
        return false;
    }

    return true;
}

function validateDescription() {
    var descriptionField = document.getElementById("description");
    var descriptionValue = descriptionField.value;

    if (!descriptionValue.trim()) {
        alert("El campo 'Descripción' no puede estar vacío.");
        descriptionField.focus();
        return false;
    }
    if (descriptionValue.length > 255) {
        alert("El campo 'Descripción' no puede exceder los 255 caracteres.");
        descriptionField.focus();
        return false;
    }

    return true;
}

function validateForm() {
    return validateName() && validateDescription();
}


function updateDescriptionCounter() {
    var maxLength = 255;
    var descriptionField = document.getElementById("description");
    var descriptionValue = descriptionField.value;
    var counter = document.getElementById("description-counter");
    var used = descriptionValue.length;
    var remaining = maxLength - used;
    counter.innerHTML = used + "/" + maxLength + " caracteres utilizados.";
}

document.addEventListener("DOMContentLoaded", function () {
    var descriptionField = document.getElementById("description");
    descriptionField.addEventListener("input", updateDescriptionCounter);
    updateDescriptionCounter();
});


$('.custom-file-input').on('change', function () {
    var fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

// Seleccionar el input de precio por su ID
const precioInput = document.getElementById('precio');

// Agregar un listener al formulario para validar el precio antes de enviarlo
document.querySelector('form').addEventListener('submit', (event) => {
    // Obtener el valor del precio como número
    const precioValue = Number(precioInput.value);

    // Validar que el valor del precio sea un número
    if (isNaN(precioValue)) {
        // Prevenir el envío del formulario y mostrar un mensaje de error
        event.preventDefault();
        alert('El precio debe ser un número válido');
    }
});
