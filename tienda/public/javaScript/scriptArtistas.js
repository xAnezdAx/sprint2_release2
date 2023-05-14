function validateName() {
    var nameField = document.getElementById("name");
    var nameValue = nameField.value;

    // Expresión regular para validar el campo "Nombre"
    var regex = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ\s]+$/;

    if (!nameValue.trim()) {
        alert("El campo 'Nombre' no puede estar vacío.");
        nameField.focus();
        return false;
    }

    if (!regex.test(nameValue)) {
        alert("El campo 'Nombre' no puede contener caracteres especiales.");
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


