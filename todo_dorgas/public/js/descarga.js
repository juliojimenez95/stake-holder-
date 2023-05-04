
const select = document.getElementById('mySelect');
select.addEventListener('change', function() {
    // Obtener el archivo seleccionado
    const selectedOption = this.options[this.selectedIndex];
    const filename = selectedOption.getAttribute('data-file');

    // Descargar el archivo
    window.location.href = '/descargar-pdf/' + filename;
});

const button = document.querySelector('#descarga');
button.addEventListener('click', function() {
    // Obtener el archivo PDF correspondiente
    const filename = this.getAttribute('data-file');

    // Descargar el archivo
    window.location.href = '/descargar-pdf/' + filename;
});

