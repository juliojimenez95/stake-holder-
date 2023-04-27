$(document).ready(function(){
    $.ajax({
    url: "/listarMunicipios",
    dataType: "json",
    type: "GET",
    success: function(response) {

            departamentos_local = response.departamentos;
            municipios_local = response.municipios;
            localStorage.setItem('departamentos_local', JSON.stringify(departamentos_local));
            localStorage.setItem('municipios_local', JSON.stringify(municipios_local));
            console.log(localStorage.getItem("departamentos_local"));
            departamentos_local.forEach(element => {
                $("#departamento").append('<option value="' + element.Departamento + '">' + element.Departamento + '</option>')
            });

    },
    error: function(response) {
        console.log("Ocurrió un error al traer los municipios");
    },
});
$("#departamento").change(function(e){
    //alert(e.target.value);

    $("#municipio").empty();
    let munfiltro = JSON.parse(localStorage.getItem('municipios_local'));
    let result = munfiltro.filter(m=>m.Departamento == e.target.value);

    result.forEach(element => {
                $("#municipio").append('<option value="' + element.Municipio + '">' + element.Municipio + '</option>')
            })


});
});