document.getElementById("toggleDescriptionBtn").addEventListener("click", function() {
    const description = document.getElementById("descriptionContent");

    if (description.style.maxHeight) {
        description.style.maxHeight = null;
        this.textContent = "Ver Descripción";
    } else {
        description.style.maxHeight = description.scrollHeight + "px";
        this.textContent = "Ocultar Descripción";
    }
});