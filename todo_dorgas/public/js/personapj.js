

$(document).ready(function(){
    $.ajax({
    url: "/listarpaises",
    dataType: "json",
    type: "GET",
    success: function(response) {

            pais_local = response.pais;
            departamentos_local = response.departamentos;
            municipios_local = response.municipios;

            localStorage.setItem('pais_local', JSON.stringify(pais_local));
            localStorage.setItem('departamentos_local', JSON.stringify(departamentos_local));
            localStorage.setItem('municipios_local', JSON.stringify(municipios_local));

           // console.log("leiton",localStorage.getItem("pais_local"));
            //console.log(localStorage.getItem("departamentos_local"));
            pais_local.forEach(element => {
                $("#pais").append('<option value="' + element.ID + '">' + element.Pais + '</option>')
            });

    },
    error: function(response) {
        console.log("Ocurrió un error al traer los municipios");
    },
});
$("#pais").change(function(e){
   console.log("valor pais",e.target.value);
    $("#departamento").empty();
        let munfiltro1 = JSON.parse(localStorage.getItem('departamentos_local'));
      //  console.log("resultado 2-->",localStorage.getItem('departamentos_local'));
       // console.log("resultado 3-->",munfiltro1);

       let result1 = munfiltro1.filter(function(value){
        return value.ID_Pais == e.target.value;
       });
       if (result1.length != 0) {

        result1.forEach(element => {
            $("#departamento").append('<option value="' + element.Departamento + '">' + element.Departamento + '</option>')
        })
        $("#departamento").change(function(e){
            //alert(e.target.value);

            console.log("aqui entra1");

            $("#municipio").empty();
            let munfiltro = JSON.parse(localStorage.getItem('municipios_local'));
            let result = munfiltro.filter(m=>m.Departamento == e.target.value);

            result.forEach(element => {
                        $("#municipio").append('<option value="' + element.Municipio + '">' + element.Municipio + '</option>')
                    })


        });

       }else{
        console.log("aqui entra1");

        $("#departamento").empty();

        $("#departamento").append('<option value="N/A">' + " " + '</option>')

        $("#municipio").empty();

        $("#municipio").append('<option value="N/A">' + " " + '</option>')

       }


    });
});

