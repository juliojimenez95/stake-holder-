
const select = document.getElementById('mySelect');
select.addEventListener('click', function() {
    // Obtener el archivo seleccionado
    const selectedOption = this.options[this.selectedIndex];
    const filename = selectedOption.getAttribute('data-file');

    if (filename == '#') {

        
    } else {
      window.location.href = '/descargar-pdf/' + filename;
    }

    // Descargar el archivo
});

select.addEventListener('click', function(){
    const cn = document.getElementById("conoce");
    cn.style.display = "none";
});

const button = document.querySelector('#descarga');
button.addEventListener('click', function() {
    // Obtener el archivo PDF correspondiente
    const filename = this.getAttribute('data-file');

    // Descargar el archivo
    window.location.href = '/descargar-pdf/' + filename;
});

