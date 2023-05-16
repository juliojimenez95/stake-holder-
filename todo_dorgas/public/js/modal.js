function dataPersonal(id){
    $.ajaxSetup({
    headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $.ajax({

        url: "/admin/InformacionP",
        dataType: "json",
        type: "POST",
        data: {
            id:id,
        },
        success: function(response) {

        if (response.user.rol == 1) {

        if (response.cliente.Natural == 1) {

            $('#Tipodocumento').empty();
            $('#n_documento').empty();
            $('#nombres_a').empty();
            $('#Departamento_p').empty();
            $('#cuidad_p').empty();
            $('#telefono_p').empty();
            $('#direccion_p').empty();
            $('#Actividad_e').empty();
            $('#TR').empty();
            $('#DR').empty();
            $('#NR').empty();
            $('#TeR').empty();
            $('#CR').empty();
            $('#ER').empty();
            $('#Rp').empty();
            $('#Rpp').empty();
            $('#RRp').empty();
            $('#Pe').empty();
            $('#Ot').empty();
            $('#oi').empty();
            $('#Os').empty();

            $('#NDC').empty();
            $('#NC').empty();
            $('#CC').empty();
            $('#EC').empty();
            $('#TC').empty();

            $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.cliente.TipoNit+"</span>");
            $('#n_documento').append("Numero documento: "+"<span>"+response.cliente.Nit+"</span>");
            $('#nombres_a').append("Nombre: "+"<span>"+response.cliente.Nombre+"</span>");
            $('#Departamento_p').append("Departamento: "+"<span>"+response.domicilio.Departamento+"</span>");
            $('#cuidad_p').append("Cuidad: "+"<span>"+response.domicilio.Ciudad+"</span>");
            $('#telefono_p').append("Telefono: "+"<span>"+response.domicilio.Telefono+"</span>");
            $('#direccion_p').append("Direccion: "+"<span>"+response.domicilio.Direccion+"</span>");
            $('#Actividad_e').append("Actividad economica: "+"<span>"+response.cliente.ActividadEconomica+"</span>");

            $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
            $('#DR').append("Numero documento: "+"<span>"+response.representante.Nit+"</span>");
            $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
            $('#TeR').append("Telefono: "+"<span>"+response.representante.Telefono+"</span>");
            $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
            $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
            $('#Rp').append("Manejo recursos publicos: "+"<span>"+response.representante.ManejoRP+"</span>");
            $('#Rpp').append("Poder político o públicos: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

            $('#RRp').append("Reconocimiento político o públicos: "+"<span>"+response.representante.Reconocimiento+"</span>");
            $('#Pe').append("Vinculo con la persona exxpuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
            $('#Ot').append("Tributa en otro pais: "+"<span>"+response.representante.ObligacionTE+"</span>");
            $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
            $('#Os').append("Obligada a tener un programa: "+"<span>"+response.representante.ObligacionP+"</span>");

            $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
            $('#NDC').append("Numero de documento: "+"<span>"+response.contacto.Nit+"</span>");
            $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
            $('#TC').append("Telfono: "+"<span>"+response.contacto.Telefono+"</span>");


            $("#modalInformacionPersonal").modal("show");

        }else{

            $('#Tipodocumento').empty();
            $('#n_documento').empty();
            $('#nombres_a').empty();
            $('#Departamento_p').empty();
            $('#cuidad_p').empty();
            $('#telefono_p').empty();
            $('#direccion_p').empty();
            $('#Actividad_e').empty();
            $('#TR').empty();
            $('#DR').empty();
            $('#NR').empty();
            $('#TeR').empty();
            $('#CR').empty();
            $('#ER').empty();
            $('#Rp').empty();
            $('#Rpp').empty();
            $('#RRp').empty();
            $('#Pe').empty();
            $('#Ot').empty();
            $('#oi').empty();
            $('#Os').empty();

            $('#NDC').empty();
            $('#NC').empty();
            $('#CC').empty();
            $('#EC').empty();
            $('#TC').empty();

            $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.cliente.TipoNit+"</span>");
            $('#n_documento').append("Numero documento: "+"<span>"+response.cliente.Nit+"</span>");
            $('#nombres_a').append("Nombre: "+"<span>"+response.cliente.Nombre+"</span>");
            $('#Departamento_p').append("Departamento: "+"<span>"+response.domicilio.Departamento+"</span>");
            $('#cuidad_p').append("Cuidad: "+"<span>"+response.domicilio.Ciudad+"</span>");
            $('#telefono_p').append("Telefono: "+"<span>"+response.domicilio.Telefono+"</span>");
            $('#direccion_p').append("Direccion: "+"<span>"+response.domicilio.Direccion+"</span>");
            $('#Actividad_e').append("Actividad economica: "+"<span>"+response.cliente.ActividadEconomica+"</span>");

            $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
            $('#DR').append("Numero documento: "+"<span>"+response.representante.Nit+"</span>");
            $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
            $('#TeR').append("Telefono: "+"<span>"+response.representante.Telefono+"</span>");
            $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
            $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
            $('#Rp').append("Manejo recursos publicos: "+"<span>"+response.representante.ManejoRP+"</span>");
            $('#Rpp').append("Poder político o públicos: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

            $('#RRp').append("Reconocimiento político o públicos: "+"<span>"+response.representante.Reconocimiento+"</span>");
            $('#Pe').append("Vinculo con la persona exxpuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
            $('#Ot').append("Tributa en otro pais: "+"<span>"+response.representante.ObligacionTE+"</span>");
            $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
            $('#Os').append("Obligada a tener un programa: "+"<span>"+response.representante.ObligacionP+"</span>");

            $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
            $('#NDC').append("Numero de documento: "+"<span>"+response.contacto.Nit+"</span>");
            $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
            $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
            $('#TC').append("Telfono: "+"<span>"+response.contacto.Telefono+"</span>");


            $("#modalInformacionPersonal").modal("show");
            }


        }

        if (response.user.rol == 2) {

            if (response.Proveedor.Natural == 1) {

                $('#Tipodocumento').empty();
                $('#n_documento').empty();
                $('#nombres_a').empty();
                $('#Departamento_p').empty();
                $('#cuidad_p').empty();
                $('#telefono_p').empty();
                $('#direccion_p').empty();
                $('#Actividad_e').empty();
                $('#TR').empty();
                $('#DR').empty();
                $('#NR').empty();
                $('#TeR').empty();
                $('#CR').empty();
                $('#ER').empty();
                $('#Rp').empty();
                $('#Rpp').empty();
                $('#RRp').empty();
                $('#Pe').empty();
                $('#Ot').empty();
                $('#oi').empty();
                $('#Os').empty();

                $('#NDC').empty();
                $('#NC').empty();
                $('#CC').empty();
                $('#EC').empty();
                $('#TC').empty();

                $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.Proveedor.TipoNit+"</span>");
                $('#n_documento').append("Numero documento: "+"<span>"+response.Proveedor.Nit+"</span>");
                $('#nombres_a').append("Nombre: "+"<span>"+response.Proveedor.Nombre+"</span>");
                $('#Departamento_p').append("Departamento: "+"<span>"+response.Proveedor.Departamento+"</span>");
                $('#cuidad_p').append("Cuidad: "+"<span>"+response.Proveedor.Ciudad+"</span>");
                $('#telefono_p').append("Telefono: "+"<span>"+response.Proveedor.Telefono+"</span>");
                $('#direccion_p').append("Direccion: "+"<span>"+response.Proveedor.Direccion+"</span>");
                $('#Actividad_e').append("Actividad economica: "+"<span>"+response.Proveedor.ActividadEconomica+"</span>");

                $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
                $('#DR').append("Numero documento: "+"<span>"+response.representante.Nit+"</span>");
                $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
                $('#TeR').append("Telefono: "+"<span>"+response.representante.Telefono+"</span>");
                $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
                $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
                $('#Rp').append("Manejo recursos publicos: "+"<span>"+response.representante.ManejoRP+"</span>");
                $('#Rpp').append("Poder político o públicos: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

                $('#RRp').append("Reconocimiento político o públicos: "+"<span>"+response.representante.Reconocimiento+"</span>");
                $('#Pe').append("Vinculo con la persona exxpuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
                $('#Ot').append("Tributa en otro pais: "+"<span>"+response.representante.ObligacionTE+"</span>");
                $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
                $('#Os').append("Obligada a tener un programa: "+"<span>"+response.representante.ObligacionP+"</span>");

                $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
                $('#NDC').append("Numero de documento: "+"<span>"+response.contacto.Nit+"</span>");
                $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
                $('#TC').append("Telfono: "+"<span>"+response.contacto.Telefono+"</span>");


                $("#modalInformacionPersonal").modal("show");

            }else{

                $('#Tipodocumento').empty();
                $('#n_documento').empty();
                $('#nombres_a').empty();
                $('#Departamento_p').empty();
                $('#cuidad_p').empty();
                $('#telefono_p').empty();
                $('#direccion_p').empty();
                $('#Actividad_e').empty();
                $('#TR').empty();
                $('#DR').empty();
                $('#NR').empty();
                $('#TeR').empty();
                $('#CR').empty();
                $('#ER').empty();
                $('#Rp').empty();
                $('#Rpp').empty();
                $('#RRp').empty();
                $('#Pe').empty();
                $('#Ot').empty();
                $('#oi').empty();
                $('#Os').empty();

                $('#NDC').empty();
                $('#NC').empty();
                $('#CC').empty();
                $('#EC').empty();
                $('#TC').empty();

                $('#Tipodocumento').append("Tipo documento: "+"<span>"+response.Proveedor.TipoNit+"</span>");
                $('#n_documento').append("Numero documento: "+"<span>"+response.Proveedor.Nit+"</span>");
                $('#nombres_a').append("Nombre: "+"<span>"+response.Proveedor.Nombre+"</span>");
                $('#Departamento_p').append("Departamento: "+"<span>"+response.Proveedor.Departamento+"</span>");
                $('#cuidad_p').append("Cuidad: "+"<span>"+response.Proveedor.Ciudad+"</span>");
                $('#telefono_p').append("Telefono: "+"<span>"+response.Proveedor.Telefono+"</span>");
                $('#direccion_p').append("Direccion: "+"<span>"+response.Proveedor.Direccion+"</span>");
                $('#Actividad_e').append("Actividad economica: "+"<span>"+response.Proveedor.ActividadEconomica+"</span>");

                $('#TR').append("Tipo documento: "+"<span>"+response.representante.TipoNit+"</span>");
                $('#DR').append("Numero documento: "+"<span>"+response.representante.Nit+"</span>");
                $('#NR').append("Nombre: "+"<span>"+response.representante.Nombre1+"</span>");
                $('#TeR').append("Telefono: "+"<span>"+response.representante.Telefono+"</span>");
                $('#CR').append("Cargo: "+"<span>"+response.representante.Cargo+"</span>");
                $('#ER').append("Email: "+"<span>"+response.representante.Email+"</span>");
                $('#Rp').append("Manejo recursos publicos: "+"<span>"+response.representante.ManejoRP+"</span>");
                $('#Rpp').append("Poder político o públicos: "+"<span>"+response.representante.EjercidoPPOP+"</span>");

                $('#RRp').append("Reconocimiento político o públicos: "+"<span>"+response.representante.Reconocimiento+"</span>");
                $('#Pe').append("Vinculo con la persona exxpuesta: "+"<span>"+response.representante.VincuPExpuesta+"</span>");
                $('#Ot').append("Tributa en otro pais: "+"<span>"+response.representante.ObligacionTE+"</span>");
                $('#oi').append("Tiene funciones en una O.I: "+"<span>"+response.representante.OrganizacionI+"</span>");
                $('#Os').append("Obligada a tener un programa: "+"<span>"+response.representante.ObligacionP+"</span>");

                $('#TDC').append("Tipo documento: "+"<span>"+response.contacto.TipoNit+"</span>");
                $('#NDC').append("Numero de documento: "+"<span>"+response.contacto.Nit+"</span>");
                $('#NC').append("Nombre: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#CC').append("Cargo: "+"<span>"+response.contacto.Cargo+"</span>");
                $('#EC').append("Email: "+"<span>"+response.contacto.Email+"</span>");
                $('#TC').append("Telfono: "+"<span>"+response.contacto.Telefono+"</span>");


                $("#modalInformacionPersonal").modal("show");
                }


            }

        },
        error: function(response) {
            console.log(response);
        },
    });
    }
