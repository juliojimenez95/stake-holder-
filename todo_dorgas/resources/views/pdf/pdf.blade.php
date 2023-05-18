<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo Drogas</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Agregar el enlace de jquery -->
    <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
    <!-- Agregar el enlace a la hoja de estilo del public -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Agregar el enlace a la hoja de estilo de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
     <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}"   class=" my-4 img-fluid">
        </div>
      </div>
     </div>
        <div class="row d-flex ">
            <div class="col-12 col-lg-6 " style="background-color: #004492; height: 640px; color: white;">
                <div class="d-flex justify-content-center  h-100 flex-column alinear">
                    <h3 class=" datos">Datos personales</h3>
                   <strong> <h2 class=" my-3 persona">Persona</h2></strong>
                   <strong>  <h2 class=" natural ">Natural</h2> </strong> <br> <br>
                  <hr class="underline2">
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">

                        <h1>Información Personal</h1>

                                <div class="row">
                                    <div class="col-md-6">
                                      <p id="Tipodocumento" class="p_ch"> <strong>$data->algo</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="n_documento" class="p_ch"><strong>kabdsbasd</strong></p>
                                    </div>
                                  </div>
                                  {{--<div class="row">
                                    <div class="col-md-6">
                                      <p id="nombres_a" class="p_ch"> <strong>$cliente->Nombre</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="Departamento_p" class="p_ch"><strong>$domicilio->Departamento</strong></p>
                                    </div>
                                  </div>
                                   <div class="row">
                                    <div class="col-md-6">
                                      <p id="cuidad_p" class="p_ch"><strong>$domicilio->Ciudad</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="telefono_p" class="p_ch"> <strong>$domicilio->Telefono</strong></p>

                                    </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                        <p id="direccion_p" class="p_ch"> <strong>$domicilio->Direccion</strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="Actividad_e" class="p_ch"><strong>$cliente->ActividadEconomica</strong></p>
                                      </div>
                                    </div>

                                <h1 class="tit_mod" >Representante</h1>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TR" class="p_ch"><strong>$representante->TipoNit</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="DR" class="p_ch"> <strong>$representante->Nit</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="NR" class="p_ch"><strong>$representante->Nombre1</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p id="TeR" class="p_ch"><strong>$representante->Telefono</strong></p>
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="CR" class="p_ch"><strong>$representante->Cargo</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="ER" class="p_ch"> <strong>$representante->Email</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Rp" class="p_ch"><strong>$representante->ManejoRP</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Rpp" class="p_ch"> <strong>$representante->EjercidoPPOP</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="RRp" class="p_ch"><strong>$representante->Reconocimiento</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Pe" class="p_ch"> <strong>$representante->VincuPExpuesta</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Ot" class="p_ch"><strong>$representante->ObligacionTE</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="oi" class="p_ch"> <strong>$representante->OrganizacionI</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Os" class="p_ch"><strong>$representante->ObligacionP</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-12">
                                          <h5 class="tit_mod">Contacto</h5>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TDC" class="p_ch"><strong>$contacto->TipoNit</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="NDC" class="p_ch"> <strong>$contacto->Nit</strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <p id="NC" class="p_ch"><strong>$contacto->Nombre1</strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="CC" class="p_ch"><strong>$contacto->Cargo</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="EC" class="p_ch"> <strong>$contacto->Email</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TC" class="p_ch"><strong>$contacto->Telefono</strong></p>
                                        </div>
                                      </div>

                            <h1>Información Tributaria</h1>
                            <div class="row">
                                <div class="col-md-6">
                                  <p id='iva' class="p_ch"><strong>$informaciont->ResponsableImpuesto</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id='retencion' class="p_ch"><strong>$informaciont->SujetoRetencion</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="renta" class="p_ch"> <strong>$informaciont->Declarar</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="rst" class="p_ch"><strong>$informaciont->RST</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Aestanpillada" class="p_ch"> <strong>$informaciont->Estampillas</strong></p>
                                  @if ('Si' === 'Si')
                                  <p id ="estanpilla" class="p_ch"> <strong>$informaciont->Observacion1</strong></p>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                  <p id=" contribuyente" class="p_ch"> <strong>$informaciont->GContribuyente</strong></p>

                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='auCorrector' class="p_ch"> <strong>$informaciont->AutorretenedorF</strong></p>
                                </div>

                                <div class="col-md-6">
                                  <p id="ica" class="p_ch"> <strong>$informaciont->AutorretenedorICA</strong></p>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <p id="emailt" class="p_ch"><strong>$informaciont->Email</strong></p>

                                  </div>

                              </div>

                              <h1>Información Financiera</h1>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='Activo' class="p_ch"> <strong>$informacionf->Activo</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Pasivo" class="p_ch"><strong>$informacionf->Pasivo</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Patrimonio" class="p_ch"> <strong>$informacionf->Patrimonio</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Ingresos" class="p_ch"><strong>$informacionf->IngresosTotales</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='Egresos' class="p_ch"> <strong>$informacionf->EgresosTotales</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="p_vinculada" class="p_ch"> <strong>$informacionf->CantidadPersonas</strong></p>

                                </div>
                              </div>
                              <h1>Pagaré</h1>

                              <div class="row">
                                <div class="col-md-6">
                                  <p id="pagare" class="p_ch"> <strong>$pagare->pagare</strong></p>
                                </div>
                              </div>

                              <h1>Información Bancaria</h1>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="banco1" class="p_ch"><strong>$informacionb->Banco</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Tipo1" class="p_ch"><strong>$informacionb->TipoCuenta</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="n_cuenta1" class="p_ch"> <strong>$informacionb->Cuenta</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Cuidad1" class="p_ch"><strong>$informacionb->Ciudad</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Departamento1" class="p_ch"><strong>$informacionb->Departamento</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="pais1" class="p_ch"> <strong>$informacionb->Pais</strong></p>

                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <p id="banco2" class="p_ch"> <strong>$informacionb->Banco2</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="Tipo2" class="p_ch"><strong>$informacionb->TipoCuenta2</strong></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p id="n_cuenta2" class="p_ch"><strong>$informacionb->Cuenta2</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="Cuidad2" class="p_ch"><strong>$informacionb->Ciudad2</strong></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p id="Departamento2" class="p_ch"><strong>$informacionb->Departamento2</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="pais2" class="p_ch"> <strong>$informacionb->Pais2</strong></p>

                                  </div>
                                </div>
                                <h1>Información Socios o Accionistas</h1>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="tablaSocios" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="th_cus">Nombre</th>
                                                    <th class="th_cus">Participación</th>
                                                    <th class="th_cus">Nacionalidad</th>
                                                    <th class="th_cus">PEP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($socios as $socio )
                                                    <td>$socio->Nombres</td>
                                                    <td>$socio->Participacion</td>
                                                    <td>$socio->Nacionalidad</td>
                                                    <td>$socio->PEP</td>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>  --}}
                    </div>
                </div>

            </div>
        </div>
    </div>
        <!-- Agregar el script de JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Agregar el script de JavaScript de la carpeta public -->
    <script src="{{ asset('js/principal.js') }}"></script>
</body>
</html>
