<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
    <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">

                        <h1>Información Personal</h1>

                                <div class="row">
                                    <div class="col-md-6">
                                      <p id="Tipodocumento" class="p_ch"> <strong>Tipo de documento: <span>{{ $cliente->TipoNit }}</span></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="n_documento" class="p_ch"><strong>Numero de Documento: <span>{{ $cliente->Nit }}</span></strong></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p id="nombres_a" class="p_ch"> <strong>Nombre: <span>{{ $cliente->Nombre }}</span></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="Departamento_p" class="p_ch"><strong>Departamento: <span>{{ $domicilio->Departamento }}</span></strong></p>
                                    </div>
                                  </div>
                                   <div class="row">
                                    <div class="col-md-6">
                                      <p id="cuidad_p" class="p_ch"><strong>Municipio: <span>{{ $domicilio->Ciudad }}</span></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="telefono_p" class="p_ch"> <strong>Telefono: <span>{{ $domicilio->Telefono }}</span></strong></p>

                                    </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                        <p id="direccion_p" class="p_ch"> <strong>Dirección: <span>{{ $domicilio->Direccion }}</span></strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="Actividad_e" class="p_ch"><strong>Actividad economica: <span>{{ $cliente->ActividadEconomica }}</span></strong></p>
                                      </div>
                                    </div>

                                  <h1 class="tit_mod" >Representante</h1>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TR" class="p_ch"><strong>Tipo de Documento: <span>{{ $representante->TipoNit }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="DR" class="p_ch"> <strong>Numero de documento: <span>{{ $representante->Nit }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="NR" class="p_ch"><strong>Nombre: <span>{{ $representante->Nombre1 }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                            <p id="TeR" class="p_ch"><strong>Telefono : <span>{{ $representante->Telefono }}</span></strong></p>
                                          </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="CR" class="p_ch"><strong>Cargo: <span>{{ $representante->Cargo }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="ER" class="p_ch"> <strong>Email: {{ $representante->Email }}</strong></p>
                                        </div>
                                      </div>

                                       <div class="row">
                                        <div class="col-md-6">
                                          <p id="Rp" class="p_ch"><strong>{{ $representante->ManejoRP }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Rpp" class="p_ch"> <strong>{{ $representante->EjercidoPPOP }}</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="RRp" class="p_ch"><strong>{{ $representante->Reconocimiento }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Pe" class="p_ch"> <strong>{{ $representante->VincuPExpuesta }}</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Ot" class="p_ch"><strong>{{ $representante->ObligacionTE }}</strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="oi" class="p_ch"> <strong>{{ $representante->OrganizacionI }}</strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Os" class="p_ch"><strong>{{ $representante->ObligacionP }}</strong></p>
                                        </div>
                                      </div>

                                       <h1>Contacto</h1>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TDC" class="p_ch"><strong>Tipo de Documento: <span>{{ $contacto->TipoNit }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="NDC" class="p_ch"> <strong>Numero de Documento: <span> {{ $contacto->Nit }}</span></strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-12">
                                          <p id="NC" class="p_ch"><strong>Nombre: <span>{{ $contacto->Nombre1 }}</span></strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="CC" class="p_ch"><strong>Cargo : <span>{{ $contacto->Cargo }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="EC" class="p_ch"> <strong>Email: <span>{{ $contacto->Email }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="TC" class="p_ch"><strong>Telefono: <span>{{ $contacto->Telefono }}</span></strong></p>
                                        </div>
                                      </div>

                             <h1>Información Tributaria</h1>
                            <div class="row">
                                <div class="col-md-6">
                                  <p id='iva' class="p_ch"><strong>Impuestos: <span>{{ $informaciont->ResponsableImpuesto }}</span></strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id='retencion' class="p_ch"><strong>Retencion en la fuente: <span> {{ $informaciont->SujetoRetencion }}</span></strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="renta" class="p_ch"><strong>Delcaracion: <span>{{ $informaciont->Declarar }}</span></strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="rst" class="p_ch"><strong>{{ $informaciont->RST }}</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Aestanpillada" class="p_ch"> <strong>{{ $informaciont->Estampillas }}</strong></p>
                                  @if ('Si' === 'Si')
                                  <p id ="estanpilla" class="p_ch"> <strong>{{ $informaciont->Observacion1 }}</strong></p>
                                  @endif
                                </div>
                                <div class="col-md-6">
                                  <p id=" contribuyente" class="p_ch"> <strong>{{ $informaciont->GContribuyente }}</strong></p>

                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='auCorrector' class="p_ch"> <strong>{{ $informaciont->AutorretenedorF }}</strong></p>
                                </div>

                                <div class="col-md-6">
                                  <p id="ica" class="p_ch"> <strong>{{ $informaciont->AutorretenedorICA }}</strong></p>
                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <p id="emailt" class="p_ch"><strong>{{ $informaciont->Email }}</strong></p>

                                  </div>

                              </div>

                             <h1>Información Financiera</h1>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='Activo' class="p_ch"> <strong>{{ $informacionf->Activo }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Pasivo" class="p_ch"><strong>{{ $informacionf->Pasivo }}</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Patrimonio" class="p_ch"> <strong>{{ $informacionf->Patrimonio }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Ingresos" class="p_ch"><strong>{{ $informacionf->IngresosTotales }}</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id='Egresos' class="p_ch"> <strong>{{ $informacionf->EgresosTotales }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="p_vinculada" class="p_ch"> <strong>{{ $informacionf->CantidadPersonas }}</strong></p>

                                </div>
                              </div>
                               <h1>Pagaré</h1>

                              <div class="row">
                                <div class="col-md-6">
                                  <p id="pagare" class="p_ch"> <strong>{{ $pagare->pagare }}</strong></p>
                                </div>
                              </div>

                               <h1>Información Bancaria</h1>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="banco1" class="p_ch"><strong>{{ $informacionb->Banco }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Tipo1" class="p_ch"><strong>{{ $informacionb->TipoCuenta }}</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="n_cuenta1" class="p_ch"> <strong>{{ $informacionb->Cuenta }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="Cuidad1" class="p_ch"><strong>{{ $informacionb->Ciudad }}</strong></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <p id="Departamento1" class="p_ch"><strong>{{ $informacionb->Departamento }}</strong></p>
                                </div>
                                <div class="col-md-6">
                                  <p id="pais1" class="p_ch"> <strong>{{ $informacionb->Pais }}</strong></p>

                                </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <p id="banco2" class="p_ch"> <strong>{{ $informacionb->Banco2 }}</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="Tipo2" class="p_ch"><strong>{{ $informacionb->TipoCuenta2 }}</strong></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p id="n_cuenta2" class="p_ch"><strong>{{ $informacionb->Cuenta2 }}</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="Cuidad2" class="p_ch"><strong>{{ $informacionb->Ciudad2 }}</strong></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <p id="Departamento2" class="p_ch"><strong>{{ $informacionb->Departamento2 }}</strong></p>
                                  </div>
                                  <div class="col-md-6">
                                    <p id="pais2" class="p_ch"> <strong>{{ $informacionb->Pais2 }}</strong></p>

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
                                                    <td>{{ $socio->Nombres }}</td>
                                                    <td>{{ $socio->Participacion }}</td>
                                                    <td>{{ $socio->Nacionalidad }}</td>
                                                    <td>{{ $socio->PEP }}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                    </div>
                </div>

            </div>

</body>
</html>
