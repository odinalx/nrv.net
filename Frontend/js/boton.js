// Función que alterna la visibilidad de todos los elementos .soiree y main
function toggleDisplay() {
    // Seleccionamos todos los elementos .soiree
    const soireeElements = document.querySelectorAll('.soiree');
    const mainElement = document.querySelector('main');

    // Variable para determinar si al menos un elemento .soiree está visible
    let isAnySoireeVisible = Array.from(soireeElements).some(element => element.style.display === 'flex');

    if (!isAnySoireeVisible) {
        // Si no hay elementos .soiree visibles, mostramos todos y ocultamos main
        soireeElements.forEach(element => {
            element.style.display = 'flex';
        });
        mainElement.style.display = 'none';
    } else {
        // Si hay elementos .soiree visibles, los ocultamos y mostramos main
        soireeElements.forEach(element => {
            element.style.display = 'none';
        });
        mainElement.style.display = 'flex';
    }
}

document.querySelectorAll('.toggle-button').forEach(button => {
    button.addEventListener('click', toggleDisplay);
});
