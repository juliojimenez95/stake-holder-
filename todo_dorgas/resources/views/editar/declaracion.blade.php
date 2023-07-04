<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo Drogas</title>
  <script
            src="https://code.jquery.com/jquery-3.6.3.js"
            integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
            crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/declaracion.css') }}">
  <link rel="icon" href="{{ asset('images/fevicon.jpeg') }}" type="image/png" />
</head>
<body>
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="div_main">

            <div class="div_volver mt-3">
                <a href="/cliente/documentos_anexos/{{ $id }}" class="btn btn-success btn_cb_c">
                    <i class="fa-solid fa-arrow-left"></i> Regresar</a>
            </div>
            <div class="">
                <a class="btn btn-success btn_cb" href="/home"
                                 style="margin-top: 25px;">
                    {{ __('Continuar') }}
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="text-center">
          <img src="{{ asset('images/logo_t2.png') }}" class="my-4 img-fluid">
          <h1 class="text-primary p_tit">Declaraciones y Autorizaciones</h1>
        </div>
      </div>
    </div>
    <div class="row ">
      <div class="col-md-12">
        <form action="{{ route('editdeclaracion',$id) }}" method="post">
            @csrf
            @method('put')
        <div class="card text-center bg-light mt-4">
          <div class="card-body">
            <div class="row">

              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3 mb-3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>
                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Autorización para el tratamiento de Datos Personales<span>*</span></p>
                    <strong class="text-primary">
                    <div>
                        <label class="op_cus">Si <input type="radio" name="grupo1" id="grupo1s" value="1" id="grupo1"></label>
                        <label class="op_cus">No <input type="radio" name="grupo1" id="grupo1n" value="0"></label>
                    </div>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal1"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Autorización consulta y reporte en Centrales de Riesgo<span>*</span></p>
                    <br>
                    <strong class="text-primary">
                    <label class="op_cus">Si <input type="radio" name="grupo2" id="grupo2s" value="1"></label>
                    <label class="op_cus">No <input type="radio" name="grupo2" id="grupo2n" value="0"></label>
                    </strong>

                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal2"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Declaración de Origen de Fondos<span>*</span></p>
                    <strong class="text-primary">
                    <br>
                    <label class="op_cus">Si <input type="radio" name="grupo3" id="grupo3s"  value="1"></label>
                    <label class="op_cus">No <input type="radio" name="grupo3" id="grupo3n" value="0"></label>
                    </strong>
                    <br><br><br>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <a class="btn btn-outline-primary mt-3 color_cus color_cus_e" data-toggle="modal" data-target="#declaracionModal3"><strong>Conoce más</strong></a>
                    <br>
                    <p class="text-primary cus_cus" >Cumplimiento, Ética en los negocios, Libre competencia,Conflicto de intereses,Medio ambiente e Integridad<span>*</span></p>
                    <strong class="text-primary">
                    <label class="op_cus">Si <input type="radio" name="grupo4" id="grupo4s" value="1"></label>
                    <label class="op_cus">No <input type="radio" name="grupo4" id="grupo4n" value="0"></label>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
              <div class="col-md-2">
                <div class="card text-center border-0 transparente" >
                  <div class="card-body">
                    <div class="image3">
                      <img src="{{ asset('images/Declaraciones-y-Autorizaciones.png') }}" class="image-clas2" alt="">
                    </div>
                    <br>

                    <a class="btn btn-outline-primary mt-3 color_cus" data-toggle="modal" data-target="#declaracionModal4"><strong>Conoce más</strong></a>
                    <br><br>
                    <p class="text-primary cus_cus" >Cumplimiento Normas Anticorrupción<span>*</span></p>
                    <br>
                    <strong class="text-primary">
                    <label class="op_cus">Si <input type="radio" name="grupo5" id="grupo5s" value="1"></label>
                    <label class="op_cus">No <input type="radio" name="grupo5" id="grupo5n" value="0"></label>
                    </strong>
                    <br><br><br>
                  </div>
                </div>
              </div>
            </div>

              <button class="btn btn-primary text-center  ml-10 btn_finalizar" >FINALIZAR Y ENVIAR</button>

          </div>
        </div>
    </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="declaracionModal" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Autorización para el tratamiento de Datos Personales</h3>
                    </div>
                    <p class="p_cus_c">Como titular de la información, actuando en nombre propio, autorizo de manera previa, expresa e informada a INVERSIONES TODO DROGAS S.A.S. con N.I.T. para que, directamente o a través de sus empleados, consultores, asesores, terceros encargados y/o Entidades Vinculadas (de acuerdo con la definición de la Política de Tratamiento de Datos Personales, la cual podrá ser consultada en la página web www.tododrogas.com.co, en la sección Política de Tratamiento de Datos Personales), a tratar mi información personal. Los Datos Personales incluyen, pero no se limitan a, datos de identificación, información de contacto y de localización, datos inferidos o no, a partir de información observada o entregada directamente por el titular o por terceros, información profesional, datos catalogados como sensibles (tales como fotografías, huella dactilar, datos de salud, video vigilancia, entre otros). Los Datos Personales serán tratados para el cumplimiento de las siguientes finalidades y las que sean análogas o compatibles con las mismas y con las que estén descritas en la Política de Tratamiento de Datos Personales de INVERSIONES TODO DROGAS S.A.S.: a) Gestionar toda la información necesaria para el cumplimiento de las obligaciones tributarias y de registros comerciales, corporativos y contables de INVERSIONES TODO DROGAS S.A.S. b) Cumplir las obligaciones de facturación y obligaciones regulatorias aplicables a la relación entre INVERSIONES TODO DROGAS S.A.S. y el titular del dato. c) Dar cumplimiento a obligaciones regulatorias a cargo de INVERSIONES TODO DROGAS S.A.S., en relación con sus negocios y operación. d) Poner en práctica las políticas corporativas de INVERSIONES TODO DROGAS S.A.S. e) Cumplir con los fines de mi relación comercial con INVERSIONES TODO DROGAS S.A.S., que incluyen, pero no se limitan al cumplimiento de obligaciones legales o contractuales de INVERSIONES TODO DROGAS S.A.S. con terceros. f) Elaborar estudios estadísticos, encuestas (comerciales, académicas, actuariales, etc.), análisis de mercado y de consumo, o para la creación de bases de datos, de acuerdo con las características y perfil financiero y/o comercial de los clientes. g) Desarrollar actividades comerciales, de mercadeo y publicidad, tales como análisis de consumo, perfilamiento, trazabilidad de marca, envío de beneficios, promociones, ofertas, novedades, descuentos, programas de fidelización de clientes, investigación de mercado, generación de campañas y eventos de marcas propias, de aliados o de Entidades Vinculadas a INVERSIONES TODO DROGAS S.A.S. h) Ofrecer y/o reconocer beneficios, hacer tele mercadeo y/o cobranzas relacionadas con INVERSIONES TODO DROGAS S.A.S. o con las Entidades Vinculadas. i) Realizar consultas y Reportes a Centrales de Riesgo y/o cualquier otra base de datos directamente relacionada con el sistema SAGRILAFT j) Implementar programas de inteligencia artificial o cualquier otro que la tecnología y la ley permita. Al aceptar el tratamiento de los datos personales a INVERSIONES TODO DROGAS S.A.S., además, autorizo al responsable a transferir los datos personales a las Entidades Vinculadas para que estas empresas puedan tratar los datos, en su beneficio. Para estos efectos, las Entidades Vinculadas, pueden ser consultadas en la sección “Política de Tratamiento de Datos Personales” de la página web www.tododrogas.com.co Los contactos se podrán realizar a través de diferentes canales, tales como envío de mensajes de texto, correos físicos y/o electrónicos, a través de WhatsApp u otras redes sociales, medios telefónicos o cualquier otro que la tecnología y la ley permita. Como titular de los Datos Personales, acepto y reconozco que he sido informado sobre los derechos a (i) conocer, actualizar y rectificar sus datos personales frente a los responsables o encargados del tratamiento; (ii) solicitar prueba de la autorización otorgada al responsable del tratamiento salvo cuando expresamente se exceptúa como requisito para el tratamiento; (iii) ser informado por el responsable del tratamiento o el encargado del tratamiento, previa solicitud, respecto del uso que le ha dado a mis datos personales; (iv) presentar ante la superintendencia de industria y comercio quejas por infracciones al régimen de protección de datos personales; (v) revocar la autorización y/ o solicitar la supresión del dato personal cuando no exista un deber legal o contractual de permanecer en la base de datos. (vi) acceder en forma gratuita a mis datos personales que hayan sido objeto de Tratamiento; (vii) Tendrá carácter facultativo las respuestas que versen sobre datos sensibles o sobre datos de las niñas y niños y adolescentes; (viii) demás derechos que le correspondan como titular de la información establecidos en la Ley 1581 de 2012 y sus Decretos Reglamentarios. Esto lo podrá realizar a través los siguientes canales: Correo electrónico: protecciondatos@tododrogas.com.co Para obtener más información sobre nuestra política de tratamiento de datos personales, puede consultarla en www.tododrogas.com.co</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="declaracionModal1" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Autorización consulta y reporte en Centrales de Riesgo</h3>
                    </div>
                    <p class="p_cus_c">Autorizo de forma expresa e irrevocable a INVERSIONES TODO DROGAS S.A.S. directamente o a través de sus empleados, consultores, asesores, terceros encargados y/o Entidades Vinculadas (de acuerdo con la definición de la Política de Tratamiento de Datos Personales, la cual podrá ser consultada en la página web www.tododrogas.com.co, en la sección Política de Tratamiento de Datos Personales) para que con fines estadísticos, de control, supervisión y de información comercial, consulte y/o reporte ante la central de información de la Asociación Bancaria (CIFIN) y de Entidades Financieras y a cualquier otra Entidad que maneje bases de datos con los mismos fines, el nacimiento, modificación, extinción de obligaciones directas o indirectas contraídas con anterioridad o que se llegasen a contraer con el sector financiero o real, fruto de cobranzas, contratos, actos o cualquier otra relación comercial o proceso con INVERSIONES TODO DROGAS S.A.S. y/o sus subordinadas o Entidades Vinculadas. Esta autorización comprende la información presente, pasada y futura referente al manejo, estado, cumplimiento de las relaciones, contratos y servicios, obligaciones y a las deudas vigentes o vencidas sin cancelar, etc. Todo lo anterior mientras estén vigentes y adicionalmente por el término máximo de permanencia de los datos en las Centrales de Riesgo, de acuerdo con los pronunciamientos de la Corte Constitucional o de la Ley, contados desde cuando se extinga la obligación o relación. La autorización faculta no solo a INVERSIONES TODO DROGAS S.A.S. para reportar, procesar y divulgar a la Central de información de la Asociación Bancaria o cualquier otra entidad encargada del manejo de los datos comerciales, datos económicos, sino también para que INVERSIONES TODO DROGAS S.A.S. pueda verificar por cualquier medio, la información por mi suministrada y solicitar información sobre mis relaciones comerciales con terceros o con el sistema financiero y para que los datos sobre la empresa que represento y/o sus representantes legales y/o mis datos personales, cuando actúa en nombre propio, reportados sean procesados para el logro del propósito de la central y puedan ser circularizados o divulgados con fines comerciales. Acepto que los registros permanezcan por los términos previstos en los reglamentos de las respectivas centrales de información como representante legal de LA EMPRESA, declaro bajo la gravedad de juramento, que el origen de los recursos de LA EMPRESA, provienen de actividad licitas, que no se encuentra con riesgo negativo en listados de prevención de lavado de activos nacionales o internacionales, ni dentro de una de las dos categorías de lavado de activos (conversión o movimiento), y que en consecuencia LA EMPRESA y el suscrito representante legal, nos obligamos a responder frente a INVERSIONES TODO DROGAS S.A.S. y sus compañías, por todos los perjuicios que se llegaran a causar como consecuencia de esta afirmación. Declaro igualmente, que las conductas de LA EMPRESA se ajustan a la ley y a la ética y, en consecuencia, nos obligamos a implementar las medidas tendientes a evitar que nuestras operaciones puedan ser utilizadas con o sin nuestro consentimiento y conocimiento como instrumento para el ocultamiento, manejo, inversión o aprovechamiento de cualquier forma de dinero y otros bienes provenientes de actividades delictivas, o para dar apariencia de legalidad, estas actividades. En el mismo sentido, como Representante Legal me comprometo a que la compañía actuará dentro del marco legal vigente en Colombia, dando cumplimiento a todos los procedimientos, trámites y obligaciones contempladas en la ley y demás normas pertinentes.</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="declaracionModal2" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Declaración de Origen de Fondos</h3>
                    </div>
                    <p class="p_cus_c">Como representante legal de LA EMPRESA, declaro bajo la gravedad de juramento, que el origen de los recursos de LA EMPRESA, provienen de actividad licitas, que no se encuentra con riesgo negativo en listados de prevención de lavado de activos nacionales o internacionales, ni dentro de una de las dos categorías de lavado de activos (conversión o movimiento), y que en consecuencia LA EMPRESA y el suscrito representante legal, nos obligamos a responder frente a INVERSIONES TODO DROGAS S.A.S y sus compañías, por todos los perjuicios que se llegaran a causar como consecuencia de esta afirmación. Declaro igualmente, que las conductas de LA EMPRESA se ajustan a la ley y a la ética y, en consecuencia, nos obligamos a implementar las medidas tendientes a evitar que nuestras operaciones puedan ser utilizadas con o sin nuestro consentimiento y conocimiento como instrumento para el ocultamiento, manejo, inversión o aprovechamiento de cualquier forma de dinero y otros bienes provenientes de actividades delictivas, o para dar apariencia de legalidad, estas actividades. En el mismo sentido, como Representante Legal me comprometo a que la compañía actuará dentro del marco legal vigente en Colombia, dando cumplimiento a todos los procedimientos, trámites y obligaciones contempladas en la ley y demás normas pertinentes.</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="declaracionModal3" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Cumplimiento, Ética en los negocios, Libre competencia,Conflicto de intereses,Medio ambiente e Integridad</h3>
                    </div>
                    <p class="p_cus_c">Como representante legal de LA EMPRESA me comprometo al estricto cumplimiento de las leyes aplicables en materia laboral, tributaria, ambiental y toda otra norma aplicable a los servicios objeto de este contrato. Así, es obligación de LA EMPRESA que represento: 1. Cumplir con el grado más elevado de ética empresarial. Las políticas, normativa interna y reglas de actuación de LA EMPRESA deberán sustentarse en controles eficaces para evitar que sus trabajadores, colaboradores, representantes o socios incumplan las declaraciones, representaciones, obligaciones y prohibiciones en materia de transparencia y ética empresarial. 2. Prevenir que se realice cualquier actividad o conducta que pueda dar lugar a un soborno y se obliga a no realizar, tolerar, propiciar o encubrir ninguna actividad que pueda ser constitutiva de delito y, muy especialmente, a dar pleno y cabal cumplimiento a los deberes de supervisión y dirección que se le ha impuesto respecto de sus propios trabajadores y colaboradores en cumplimiento de la Política Antisoborno de INVERSIONES TODO DROGAS S.A.S. 3. Competir en forma libre, justa y leal, y cumplir proactivamente las normas aplicables. En tal sentido, INVERSIONES TODO DROGAS S.A.S. ha aprobado la Política de Libre Competencia que rige su actuar y el de sus colaboradores, con el objeto de prevenir cualquier conducta anticompetitiva. LA EMPRESA declara que adopta sus decisiones y ejecuta sus acciones comerciales de manera independiente de sus competidores y proveedores; estableciendo sus precios de acuerdo a su criterio comercial y en forma independiente, sobre la base de información pública disponible en el mercado. Asimismo, LA EMPRESA reconoce la importancia del resguardo de la confidencialidad de la información comercialmente sensible, por lo que sus colaboradores no entregan, dan acceso, o facilitan el intercambio de dicha información; ni intentan acceder a dicha información de terceros. 4. Ejercerá el mayor cuidado y diligencia razonable para prevenir cualesquier acciones o condiciones que pudieren dar como resultado un conflicto de intereses. Esta obligación será aplicable a las actividades de sus empleados y agentes en sus relaciones con los representantes y empleados de la otra Parte, sus familiares, contratistas, subcontratistas y terceros por razón de los servicios contratados. Para ello LA EMPRESA se compromete a no hacer, recibir, proporcionar u ofrecer regalos o atenciones a la otra Parte, excepto lo permitido en las Políticas de Gestión de Conflicto de Intereses, Regalos e Invitaciones con las que cuenta INVERSIONES TODO DROGAS S.A.S. LA EMPRESA debe garantizar el cumplimiento de esta cláusula en todos los subcontratos que celebre para la ejecución de la relación contractual y/o comercial. LA EMPRESA declara que no tienen ningún conflicto de interés que pudiera comprometer su capacidad para ejecutar la relación comercial o contractual. Igualmente, LA EMPRESA declara y garantiza que ni sus socios o accionistas, ni sus dirigentes sociales, ni alguien de su personal desempeña un cargo público, ni es un funcionario del Gobierno o de una entidad controlada por éste o de una Organización Internacional pública. Si, durante la ejecución de la relación comercial o contractual alguna de las personas antes enunciadas llegare a adquirir una de estas calidades, LA EMPRESA se obliga a ponerlo en conocimiento de INVERSIONES TODO DROGAS S.A.S. inmediatamente. En tal caso, podrá solicitarse la desvinculación de esta persona o considerar la terminación de la relación comercial o contractual, sin que por este hecho se cause indemnización alguna a favor de LA EMPRESA. 5. Cumplir con la Política Ambiental y de Cambio Climático de INVERSIONES TODO DROGAS S.A.S. y la Normativa Ambiental que le sea aplicable, adoptando las medidas necesarias para asegurar que sus trabajadores, colaboradores y subcontratistas no incurran en conductas contrarias a dicha normativa. Especialmente, se obliga a no realizar, tolerar, propiciar o encubrir actividades que puedan ser constitutivas de un delito ambiental, por lo que desarrollarán la totalidad de sus servicios siempre con los más altos estándares ambientales, haciendo todos los esfuerzos posibles para reducir su impacto ambiental a lo largo del ciclo de vida del producto o del servicio prestado. 6. Comunicar a través del Canal de Integridad la ocurrencia de hechos que infrinjan lo señalado en los numerales anteriores y cualquier actuación que sea contrario al Código de Integridad de INVERSIONES TODO DROGAS S.A.S. Las vías de comunicación con el Canal de Integridad son: i) por correo electrónico remitido a la dirección lineaetica@tododrogas.com.co; ii) mediante la plataforma en línea que la Contratante ha dispuesto para ello en su página web e intranet; y, iii) presencialmente o mediante videoconferencia con la Gerencia de INVERSIONES TODO DROGAS S.A.S.</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="declaracionModal4" tabindex="-1" aria-labelledby="declaracionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="cont_modal">
                    <div class="sec_cus">
                        <h3>Cumplimiento Normas Anticorrupción</h3>
                    </div>
                    <p class="p_cus_c">Las partes se obligan a cumplir con toda la normatividad anticorrupción, dentro de las que se comprenden de manera enunciativa no más limitativa, las siguientes: Las leyes, normas y reglamentos de cualquiera naturaleza en materia de anti-cohecho, anti-soborno y anticorrupción vigentes en la República de Colombia, así como aquellas que protegen los recursos y patrimonio público, la moral administrativa, la correcta función pública (penales, de control fiscal, disciplinario, administrativo, etc.), tanto a Nivel Nacional, como Departamental, Distrital y/o Municipal. Se consideran actos tipificados de fraude y corrupción (tanto pública como privada) los siguientes: i) Los señalados en la Ley 1474 de 2011, "Estatuto Anticorrupción" y demás disposiciones legales y reglamentarias sobre la materia; ii) Ofrecer, dar, recibir o solicitar, directa o indirectamente, a directivos, administradores, empleados o asesores de la otra Parte, cualquier cosa de valor para influenciar sus acciones; iii) Los actos de corrupción transnacional y en especial por medio de uno o varios de sus empleados, administradores, sean Representantes Legales o no, socios o asociados o intermediarios, indebidamente, dar, ofrecer o prometer a un servidor público extranjero, en provecho de este o de un tercero, directa o indirectamente, sumas de dinero, cualquier objeto de valor pecuniario y otro beneficio o utilidad a cambio de que ese servidor público extranjero realice, omita o retarde cualquier acto relacionado con el ejercicio de sus funciones y en relación con un negocio o transacción internacional. iv) Cualquier acto y omisión, incluyendo la tergiversación de hechos y circunstancias, que engañen, o intenten engañar, a alguna parte para obtener un beneficio económico o de otra naturaleza o para evadir una obligación; v) Perjudicar o causar daño, o amenazar con perjudicar o causar daño, directa o indirectamente, a cualquier parte o a sus bienes para influenciar las acciones de una parte; vi) Colusión o acuerdo entre dos o más partes realizado con la intención de alcanzar un propósito inapropiado, incluyendo influenciar en forma inapropiada las acciones de otra parte; vii) Cualquier otro acto considerado como tal en la legislación vigente. Por lo anterior, LA EMPRESA deberá mantener, libros y registros contables veraces y transparentes de conformidad con los Principios de Contabilidad aceptados en Colombia, para todas las operaciones en materia de la eventual relación comercial y/o contractual con INVERSIONES TODO DROGAS S.A.S. por un plazo de al menos diez (10) años, contados a partir de la fecha de la creación del correspondiente libro o registro contable. Este requisito se aplicará a toda contraprestación que pague INVERSIONES TODO DROGAS S.A.S. (por ejemplo, pagos, honorarios, comisiones, retribuciones, reintegros o cualquier otro pago efectuado por o en nombre de INVERSIONES TODO DROGAS S.A.S. a su favor o de sus propietarios, socios o accionistas). LA EMPRESA declara, garantiza y acepta que ninguna parte del precio o contraprestación y/o retribución o reembolso pactado a su favor como consecuencia de las eventuales relaciones con INVERSIONES TODO DROGAS S.A.S. será utilizada para ninguna medida y/o fin ilícito que constituya o pueda constituir una violación de las Leyes en materia de Anticorrupción. Así mismo EL TERCERO se obliga a cumplir las disposiciones contra la corrupción transnacional y se compromete a abstenerse por medio de sus empleados, administradores o intermediarios indebidamente ofrecer o prometer a un servidor público extranjero, en provecho de éste o de un tercero, directa o indirectamente, sumas de dinero, cualquier objeto de valor pecuniario u otro beneficio o utilidad a cambio de que el servidor público extranjero realice, omita o retarde cualquier acto. LA EMPRESA informará por escrito a INVERSIONES TODO DROGAS S.A.S. S.A cuando tenga conocimiento, si alguno de sus socios o accionistas, miembros de los órganos de administración o personal de manejo y confianza, así como familiares dentro del cuarto grado de consanguinidad, segundo de afinidad o primero civil tienen vínculos con cualquiera de los colaboradores o administradores con cargo de gestión en el presente Convenio o poder de decisión sobre la vinculación y/o selección de LA EMPRESA. Igualmente, LA EMPRESA informará por escrito a INVERSIONES TODO DROGAS S.A.S. cuando tenga conocimiento, si existe entre LA EMPRESA y las mismas personas, enemistad grave, amistad íntima o vínculos laborales o participación en empresas o sociedades comunes. Constituye una causal de terminación de la eventual relación comercial y/o contractual con INVERSIONES TODO DROGAS S.A.S., si se comprueba que alguna de las partes firmantes del presente formato ha incurrido en prácticas de fraude o corrupción, la otra Parte podrá realizar las siguientes actividades según apliquen: i)Terminar la eventual relación comercial y/o contractual por causa imputable a quien cometa la práctica de fraude o corrupción. ii)Remitir los antecedentes de quien esté involucrado en las prácticas de fraude o corrupción, a las instancias correspondientes, a los efectos del inicio de procedimiento para la aplicación de las sanciones previstas. iii)Presentar la denuncia penal ante las instancias correspondientes si el hecho conocido se encuentre tipificado en la legislación penal. Cada una de las Partes se obliga a mantener informada a la otra Parte de cualquier situación que pueda percibirse o denotar un hecho posible o consumado de cualquier violación a la presente Cláusula.</p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        </div>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper-base.min.js"
    integrity="sha384-EQhgPShYZDmf+OWKvoYf70b91G/J0xgfgvbXhNfP60ZQLPv6du/0h0sU6Ygr19d0"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function(){


       $.ajax({
      url: "/declaracioninf/"+{{ Auth::user()->id }},
      dataType: "json",
      type: "GET",
      success: function(response) {
          console.log(response);


          if (response.autorizacion.Autorizacion_datos == 1) {

              $("#grupo1s").prop('checked',true);
          }else if (response.autorizacion.Autorizacion_datos == 0) {
              $("#grupo1n").prop('checked',true);

          }

          if (response.autorizacion.Autorizacion_riesgos == 1) {

               $("#grupo2s").prop('checked',true);
          }else if (response.autorizacion.Autorizacion_riesgos == 0) {
               $("#grupo2n").prop('checked',true);

          }

          if (response.autorizacion.Declaracion_fondos == 1) {

           $("#grupo3s").prop('checked',true);
          }else if (response.autorizacion.Declaracion_fondos == 0) {
              $("#grupo3n").prop('checked',true);

          }

          if (response.autorizacion.Cumplimiento_etico == 1) {

          $("#grupo4s").prop('checked',true);
          }else if (response.autorizacion.Cumplimiento_etico == 0) {
          $("#grupo4n").prop('checked',true);

          }

          if (response.autorizacion.Cumplimiento_anticorrupcion == 1) {

          $("#grupo5s").prop('checked',true);
          }else if (response.autorizacion.Cumplimiento_anticorrupcion == 0) {
          $("#grupo5n").prop('checked',true);

          }

        //  $("#email").val(response.informacion.Email);

      },
      error: function(response) {
          console.log("Ocurrió un error al traer los municipios");
      },
      });
      }

      );

  </script>
</body>
</html>
