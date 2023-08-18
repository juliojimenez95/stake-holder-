<!DOCTYPE html>
<html>
<head>
    <title>inFormacion Persona</title>

</head>
<body>
{{--
    <div class="row mb-5">
        <div class="col-md-12">
          <div class="text-center">
            <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          </div>
        </div>
      </div>--}}
    <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center">
            <div class="card formulario w-100 " style="border-radius: 50px;">
                    <div class="card-body">

                        <h1>Información Personal</h1>

                                <div class="row">
                                    <div class="col-md-6">
                                      <p id="Tipodocumento" class="p_ch"> <strong>Tipo de documento: <span>{{ $Proveedor->TipoID }}</span></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="n_documento" class="p_ch"><strong>Número de Documento: <span>{{ strval($Proveedor->ID) }}</span></strong></p>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <p id="nombres_a" class="p_ch"> <strong>Nombre: <span>{{ $Proveedor->Nombre }}</span></strong></p>
                                    </div>
                                    <div class="col-md-6">
                                      <p id="Departamento_p" class="p_ch"><strong>Departamento: <span>{{ $Proveedor->Departamento }}</span></strong></p>
                                    </div>
                                  </div>
                                   <div class="row">
                                    <div class="col-md-6">
                                      <p id="cuidad_p" class="p_ch"><strong>Municipio: <span>{{ $Proveedor->Ciudad }}</span></strong></p>
                                    </div>
                                    @if ($Proveedor->Telefono1 != null && $Proveedor->Telefono1 != "" )
                                    <div class="col-md-6">
                                        <p id="telefono_p" class="p_ch"> <strong>Teléfono: <span>{{ $Proveedor->Telefono1 }}</span></strong></p>

                                      </div>
                                    @else
                                    <div class="col-md-6">
                                        <p id="telefono_p" class="p_ch"> <strong>Teléfono: <span>{{ "N/A" }}</span></strong></p>

                                      </div>
                                    @endif

                                  </div>

                                  <div class="row">
                                      <div class="col-md-6">
                                        <p id="direccion_p" class="p_ch"> <strong>Dirección: <span>{{ $Proveedor->Direccion }}</span></strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="Actividad_e" class="p_ch"><strong>Actividad economica: <span>{{ $Proveedor->ActividadEconomica }}</span></strong></p>
                                      </div>
                                    </div>
                                    @if ($user->Natural == 1)

                                    <div class="row">
                                        <div class="col-md-6">
                                          <p id="Rp" class="p_ch"><strong>¿Por su cargo o actividad maneja o a manejado recursos públicos?: <span> {{ $user->ManejoRP }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Rpp" class="p_ch"> <strong>¿Por su cargo o actividad ejerce o ha ejercido algún grado de poder político o público? <span>{{ $user->EjercidoPPOP }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="RRp" class="p_ch"><strong>¿Por su actividad u oficio goza usted de reconocimiento político o público? <span>{{ $user->Reconocimiento }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Pe" class="p_ch"> <strong>¿Existe algún vinculo entre usted y una persona considerada públicamente expuesta? <span>{{ $user->VincuPExpuesta }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Ot" class="p_ch"><strong>¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países? <span>{{ $user->ObligacionTE }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="oi" class="p_ch"> <strong>¿Ejerce o ha ejercido funciones directivas en una organización internacional <br> tales como ONG, ONU, UNICEF, etc.? <span>{{ $user->OrganizacionI }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Os" class="p_ch"><strong>¿La compañía que representa esta obligada a tener un programa de SAGRILAFT, SIPLAFT, SARLAFT o equivalentes? <span> {{ $user->ObligacionP }}</span></strong></p>
                                        </div>
                                      </div>

                                    @else

                                    @if ($representante)

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
                                          <p id="ER" class="p_ch"> <strong>Email: <span>{{ $representante->Email }}</span></strong></p>
                                        </div>
                                      </div>

                                       <div class="row">
                                        <div class="col-md-6">
                                          <p id="Rp" class="p_ch"><strong>¿Por su cargo o actividad maneja o a manejado recursos públicos?: <span> {{ $representante->ManejoRP }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Rpp" class="p_ch"> <strong>¿Por su cargo o actividad ejerce o ha ejercido algún grado de poder político o público? <span>{{ $representante->EjercidoPPOP }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="RRp" class="p_ch"><strong>¿Por su actividad u oficio goza usted de reconocimiento político o público? <span>{{ $representante->Reconocimiento }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Pe" class="p_ch"> <strong>¿Existe algún vinculo entre usted y una persona considerada públicamente expuesta? <span>{{ $representante->VincuPExpuesta }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Ot" class="p_ch"><strong>¿Es usted sujeto de obligaciones tributarias en otro país o grupo de países? <span>{{ $representante->ObligacionTE }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="oi" class="p_ch"> <strong>¿Ejerce o ha ejercido funciones directivas en una organización internacional <br> tales como ONG, ONU, UNICEF, etc.? <span>{{ $representante->OrganizacionI }}</span></strong></p>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Os" class="p_ch"><strong>¿La compañía que representa esta obligada a tener un programa de SAGRILAFT, SIPLAFT, SARLAFT o equivalentes? <span> {{ $representante->ObligacionP }}</span></strong></p>
                                        </div>
                                      </div>
                                      @else

                                      <h1>Representante</h1>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                          </div>

                                      </div>

                                      @endif

                                    @endif



                                      @if ($contacto)

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
                                     @else

                                       <h1>Contacto</h1>
                                       <div class="row">
                                           <div class="col-md-6">
                                           <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                           </div>

                                       </div>

                                       @endif

                                      @if ($informaciont)
                                      <h1>Información Tributaria</h1>
                                      <div class="row">
                                          <div class="col-md-6">
                                            <p id='iva' class="p_ch"><strong>¿Es usted responsable del impuesto a la venta I.V.A.? <span>{{ $informaciont->ResponsableImpuesto }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                            <p id='retencion' class="p_ch"><strong>¿Está usted sujeto a retención? <span> {{ $informaciont->SujetoRetencion }}</span></strong></p>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <p id="renta" class="p_ch"><strong>¿Está usted obligado a Declarar Renta? <span>{{ $informaciont->Declarar }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                            <p id="rst" class="p_ch"><strong>¿Es usted R.S.T. Régimen Simple de Tributación? <span>{{ $informaciont->RST }}</span></strong></p>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <p id="Aestanpillada" class="p_ch"><strong> ¿Usted aplica estampillas? <span>{{ $informaciont->Estampillas }}</span></strong></p>
                                            @if ('Si' === 'Si')
                                            <p id ="estanpilla" class="p_ch"><strong> ¿Cuáles estampillas aplica? <span>{{ $informaciont->Observacion1 }}</span></strong></p>
                                            @endif
                                          </div>
                                          <div class="col-md-6">
                                            <p id=" contribuyente" class="p_ch"><strong>¿Es usted Gran Contribuyente? <span>{{ $informaciont->GContribuyente }}</span></strong></p>

                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <p id='auCorrector' class="p_ch"> <strong>¿Es usted Autorretenedor en la Fuente? <span>{{ $informaciont->AutorretenedorF }}</span></strong></p>
                                          </div>

                                          <div class="col-md-6">
                                            <p id="ica" class="p_ch"> <strong>¿Es usted Autorretenedor de ICA? <span>{{ $informaciont->AutorretenedorICA }}</span></strong></p>
                                          </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                              <p id="emailt" class="p_ch"><strong>Email: <span>{{ $informaciont->Email }}</span></strong></p>

                                            </div>

                                        </div>
                                      @else

                                      <h1>Información Tributaria</h1>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                          </div>

                                      </div>

                                      @endif

                                      @if ($informacionf)
                                      <h1>Información Financiera</h1>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id='Activo' class="p_ch"> <strong>Activos Totales: <span>{{ $informacionf->Activo }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Pasivo" class="p_ch"><strong>Pasivos Totales: <span>{{ $informacionf->Pasivo }}</span></strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id="Patrimonio" class="p_ch"> <strong>Patrimonio: <span>{{ $informacionf->Patrimonio }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="Ingresos" class="p_ch"><strong>Ingresos Totales: <span>{{ $informacionf->IngresosTotales }}</span></strong></p>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6">
                                          <p id='Egresos' class="p_ch"> <strong>Egresos Totales: <span>{{ $informacionf->EgresosTotales }}</span></strong></p>
                                        </div>
                                        <div class="col-md-6">
                                          <p id="p_vinculada" class="p_ch"> <strong>Número de personal con vinculación: <span>{{ $informacionf->CantidadPersonas }}</span></strong></p>

                                        </div>
                                      </div>
                                      @else
                                      <h1>Información Financiera</h1>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                          </div>
                                      </div>

                                      @endif
                                    <h1> Información Pagaré</h1>

                                    <div class="row">
                                        <div class="col-md-6">
                                            @if ($pagare != null)
                                            <p id="pagare" class="p_ch">
                                                <strong>{{ $pagare->pagare }}</strong>
                                            </p>
                                            @else
                                                <p id="pagare" class="p_ch">
                                                    <strong>N/A</strong>
                                                </p>
                                            @endif
                                        </div>
                                    </div>

                                    @if ($informacionb)
                                    <h1>Información Bancaria</h1>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <p id="banco1" class="p_ch"><strong>Nombre de la Entidad Bancaria <span>{{ $informacionb->Banco }}</span></strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="Tipo1" class="p_ch"><strong>Tipo de Cuenta: <span> {{ $informacionb->TipoCuenta }}</span></strong></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <p id="n_cuenta1" class="p_ch"> <strong>Número de Cuenta: <span>{{ $informacionb->Cuenta }}</span></strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="Cuidad1" class="p_ch"><strong>Ciudad: <span>{{ $informacionb->Ciudad }}</span></strong></p>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <p id="Departamento1" class="p_ch"><strong>Departamento: <span>{{ $informacionb->Departamento }}</span></strong></p>
                                      </div>
                                      <div class="col-md-6">
                                        <p id="pais1" class="p_ch"> <strong>Pais: <span>{{ $informacionb->Pais }}</span></strong></p>

                                      </div>
                                    </div>

                                    @if ($informacionb->Banco2 == " ")
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="banco2" class="p_ch"> <strong>Nombre de la Entidad Bancaria: <span>{{ "N/A" }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="Tipo2" class="p_ch"><strong>Tipo de Cuenta: <span>{{ "N/A" }}</span></strong></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="n_cuenta2" class="p_ch"><strong>Número de Cuenta: <span>{{ "N/A" }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="Cuidad2" class="p_ch"><strong>Ciudad: <span>{{ "N/A" }}</span></strong></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="Departamento2" class="p_ch"><strong>Departamento: <span>{{ "N/A" }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="pais2" class="p_ch"> <strong>Pais: <span>{{ "N/A" }}</span></strong></p>

                                          </div>
                                      </div>
                                    @else
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="banco2" class="p_ch"> <strong>Nombre de la Entidad Bancaria: <span>{{ $informacionb->Banco2 }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="Tipo2" class="p_ch"><strong>Tipo de Cuenta: <span>{{ $informacionb->TipoCuenta2 }}</span></strong></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="n_cuenta2" class="p_ch"><strong>Número de Cuenta: <span>{{ $informacionb->Cuenta2 }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="Cuidad2" class="p_ch"><strong>Ciudad: <span>{{ $informacionb->Ciudad2 }}</span></strong></p>
                                          </div>
                                      </div>
                                      <div class="row">
                                          <div class="col-md-6">
                                          <p id="Departamento2" class="p_ch"><strong>Departamento: <span>{{ $informacionb->Departamento2 }}</span></strong></p>
                                          </div>
                                          <div class="col-md-6">
                                          <p id="pais2" class="p_ch"> <strong>Pais: <span>{{ $informacionb->Pais2 }}</span></strong></p>

                                          </div>
                                      </div>

                                    @endif

                                    @else
                                    <h1>Información Bancaria</h1>
                                    <div class="row">
                                        <div class="col-md-6">
                                        <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($autorizacion)

                                     <h1>Autorizaciones</h1>
                                        @if ($autorizacion->Autorizacion_datos == 1)
                                            <div class="row">
                                                <div class="col-md-6">
                                                <p id="TDC" class="p_ch"><strong>Tratamiento de Datos Personales: <span>Si</span></strong></p>
                                                </div>
                                        @else
                                        <div class="row">
                                            <div class="col-md-6">
                                              <p id="TDC" class="p_ch"><strong>Tratamiento de Datos Personales: <span>No</span></strong></p>
                                            </div>

                                        @endif

                                        @if ($autorizacion->Autorizacion_riesgos == 1)
                                        <div class="col-md-6">
                                            <p id="NDC" class="p_ch"> <strong>Consulta y reporte en Centrales de Riesgo: <span>Si</span></strong></p>
                                          </div>
                                        </div>

                                        @else
                                        <div class="col-md-6">
                                            <p id="NDC" class="p_ch"> <strong>Consulta y reporte en Centrales de Riesgo: <span>No</span></strong></p>
                                          </div>
                                        </div>

                                        @endif

                                      @if ($autorizacion->Declaracion_fondos == 1)
                                      <div class="row">
                                        <div class="col-md-12">
                                          <p id="NC" class="p_ch"><strong>Declaración de Origen de Fondos: <span>Si</span></strong></p>
                                        </div>
                                      </div>
                                      @else
                                      <div class="row">
                                        <div class="col-md-12">
                                          <p id="NC" class="p_ch"><strong>Declaración de Origen de Fondos: <span>No</span></strong></p>
                                        </div>
                                      </div>
                                      @endif

                                      @if ($autorizacion->Cumplimiento_etico == 1)
                                        <div class="row">
                                        <div class="col-md-6">
                                          <p id="CC" class="p_ch"><strong>Cumplimiento, Ética en los negocios : <span>Si</span></strong></p>
                                        </div>
                                        </div>
                                      @else

                                       <div class="row">
                                            <div class="col-md-6">
                                            <p id="CC" class="p_ch"><strong>Cumplimiento, Ética en los negocios : <span>No</span></strong></p>
                                            </div>
                                        </div>

                                      @endif

                                        @if ($autorizacion->Cumplimiento_anticorrupcion == 1)
                                            <div class="row">

                                            <div class="col-md-6">
                                            <p id="EC" class="p_ch"> <strong>Cumplimiento Normas Anticorrupción: <span> Si</span></strong></p>
                                          </div>
                                        </div>
                                        @else
                                         <div class="row">
                                                <div class="col-md-6">
                                                <p id="EC" class="p_ch"> <strong>Cumplimiento Normas Anticorrupción: <span> No</span></strong></p>
                                            </div>
                                            </div>
                                        @endif
                                    @else

                                        <h1>Autorizaciones</h1>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <p id='iva' class="p_ch"><strong>No hay registro </strong></p>
                                            </div>
                                        </div>

                                        @endif


                                 <h1>Información Socios o Accionistas</h1>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="tablaSocios" class="" style="border: 1px solid black; width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr style="border: 1px solid black ">
                                                    <th class="th_cus">Nombre</th>
                                                    <th class="th_cus">Documento</th>
                                                    <th class="th_cus">N° Documento</th>
                                                    <th class="th_cus">Participación %</th>
                                                    <th class="th_cus">Nacionalidad</th>
                                                    <th class="th_cus">PEP</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($socios as $socio )
                                                <tr>
                                                    <td>{{ $socio->Nombres }}</td>
                                                    <td>{{ $socio->TipoNit }}</td>
                                                    <td>{{ $socio->Nit }}</td>
                                                    <td>{{ $socio->Participacion }}</td>
                                                    <td>{{ $socio->Nacionalidad }}</td>
                                                    @if ($socio->PEP == 0)
                                                    <td>No</td>
                                                    @else
                                                    <td>Si</td>
                                                    @endif
                                                </tr>
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
