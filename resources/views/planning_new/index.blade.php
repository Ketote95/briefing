<!DOCTYPE html>
<html lang="es">
    {{-- head tag content --}}
    @include('layouts.head')

    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Planning Digital</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2 justify-content" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tus necesidades; permitiéndonos de esta manera, planificar y configurar una campaña publicitaria precisa que permita alcanzar los objetivos que sean planteados.<br>
                <br>
                Por tal motivo, es de gran importancia que te tomes el tiempo suficiente para completar cada una de ellas.
            </div>

            {{-- Sección de la notificación --}}
            @if (Session::has('mensaje'))
                <div style="text-align: justify" class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4 class="alert-heading">¡Registro exitoso!</h4>
                    {{Session::get('mensaje')}}
                    <br><p>Una vez cerrada esta ventana, no es posible volver a generar el enlace.</p>
                    <hr>
                    <a style="text-align: center" target="_blank" href="{{ url("/planning_new/pdf/") }}" class="alert-link">Descargar PDF</a>
                </div>
            @endif

            {{-- Notificación de error --}}
            @if (count($errors)>0)
                <div class="alert alert-danger mx-5" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="nav nav-fill px-5 py-2">
                <label style="color: #2F277A" class="nav-link shadow-sm step0">Paso 1</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step1">Paso 2</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step2">Paso 3</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step3">Paso 4</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step4">Paso 5</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step5">Paso 6</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step6">Paso 7</label>
            </div>

            <form action="{{url('brief_planning_new')}}" method="POST" class="formulario p-5">
                {{-- Campos de empresa, categoría y marca --}}
                @csrf
                <div class="form-section">
                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($planning_new->empresa)?$planning_new->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="categoria" class="form-label">Categoría <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="categoria" name="categoria" value="{{ isset($planning_new->categoria)?$planning_new->categoria:old('categoria') }}" placeholder="Sector económico" required>
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="marca" class="form-label">Marca <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($planning_new->marca)?$planning_new->marca:old('marca') }}" placeholder="Nombre de la marca" required>
                        </div>
                    </div>
    
                    {{-- Campos de sitio web, facebook e instagram --}}
                    <div class="row">
                        <div class="col-lg-4 mb-2">
                            <label for="sitio web" class="form-label">Sitio Web</label>
                            <input type="text" class="form-control" id="sitio web" name="sitio_web" value="{{ isset($planning_new->sitio_web)?$planning_new->sitio_web:old('sitio_web') }}" placeholder="URL de su sitio web">
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($planning_new->facebook)?$planning_new->facebook:old('facebook') }}" placeholder="Enlace de su perfil de Facebook">
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ isset($planning_new->instagram)?$planning_new->instagram:old('instagram') }}" placeholder="Enlace de su perfil de Instagram">
                        </div>
                    </div>           
                    
                    {{-- Campos de tiktok y linkedin --}}
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <label for="tiktok" class="form-label">TikTok</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ isset($planning_new->tiktok)?$planning_new->tiktok:old('tiktok') }}" placeholder="Enlace de su perfil de TikTok">
                        </div>
        
                        <div class="col-lg-6 mb-2">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($planning_new->linkedin)?$planning_new->linkedin:old('linkedin') }}" placeholder="Enlace de su perfil de LinkedIn">
                        </div>
                    </div>
                    {{-- Fin de campos de texto cortos --}}
    
                    <div class="row mb-3">
                        <label for="contacto" class="form-label">Contacto <span style="color: red;">*</span></label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ isset($planning_new->nombre)?$planning_new->nombre:old('nombre') }}" placeholder="Nombre completo" required>
                        </div>
        
                        <div class="col-lg-6">
                            <input type="email" class="form-control" id="correo" name="correo" value="{{ isset($planning_new->correo)?$planning_new->correo:old('correo') }}" placeholder="correo@dominio.com" required>
                        </div>    
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="cargo_cliente" name="cargo_cliente" value="{{ isset($planning_new->cargo_cliente)?$planning_new->cargo_cliente:old('cargo_cliente') }}" placeholder="Cargo del cliente" required>
                        </div>
    
                        <div class="col-lg-6">
                            <input type="number" class="form-control" id="telefono" name="telefono" value="{{ isset($planning_new->telefono)?$planning_new->telefono:old('telefono') }}" placeholder="Número de teléfono" required>
                        </div>                    
                    </div>
                </div>

                {{-- Sección de preguntas con Textarea --}}
                {{-- Empresa --}}
                <div class="form-section">
                    <h2 class="subtitle">Empresa</h2>
    
                    <div class="mb-3">
                        <label for="descripcion_empresa" class="form-label">1. Describa detalladamente su empresa</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="descripcion_empresa" name="descripcion_empresa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->descripcion_empresa)?$planning_new->descripcion_empresa:old('descripcion_empresa') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="competidores_directos" class="form-label">2. ¿Quiénes son sus competidores directos?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="competidores_directos" name="competidores_directos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->competidores_directos)?$planning_new->competidores_directos:old('competidores_directos') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="competidores_indirectos" class="form-label">3.	¿Quiénes son sus competidores indirectos?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="competidores_indirectos" name="competidores_indirectos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->competidores_indirectos)?$planning_new->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="ventajas_competitivas" class="form-label">4.	¿Cuáles son sus principales ventajas competitivas?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="ventajas_competitivas" name="ventajas_competitivas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->ventajas_competitivas)?$planning_new->ventajas_competitivas:old('ventajas_competitivas') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="desventajas_competitivas" class="form-label">5.	¿Cuáles son sus principales desventajas competitivas?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="desventajas_competitivas" name="desventajas_competitivas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->desventajas_competitivas)?$planning_new->desventajas_competitivas:old('desventajas_competitivas') }}</textarea>
                    </div>
                </div>

                {{-- Productos y/o servicios --}}
                <div class="form-section">
                    <h2 class="subtitle">Productos/servicios</h2>
    
                    <div class="mb-3">
                        <label for="productos_servicios" class="form-label">6.	¿Cuáles son los productos o servicios que deberán ser impulsados a través de la presente campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="productos_servicios" name="productos_servicios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->productos_servicios)?$planning_new->productos_servicios:old('productos_servicios') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="comunicacion_servicios" class="form-label">7.	¿Cómo comunica actualmente estos productos o servicios?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="comunicacion_servicios" name="comunicacion_servicios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->comunicacion_servicios)?$planning_new->comunicacion_servicios:old('comunicacion_servicios') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="comercializacion_servicios" class="form-label">8.	¿Cómo comercializa actualmente estos productos o servicios?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="comercializacion_servicios" name="comercializacion_servicios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->comercializacion_servicios)?$planning_new->comercializacion_servicios:old('comercializacion_servicios') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="diferenciadores" class="form-label">9. ¿Cuáles son las características más importantes y diferenciadores que tienen los productos o servicios que serán impulsados mediante la presente campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="diferenciadores" name="diferenciadores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->diferenciadores)?$planning_new->diferenciadores:old('diferenciadores') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="precio_promedio" class="form-label">10. ¿Cuál es el precio promedio de los productos o servicios que serán parte de la presente campaña?</label>
                        <input type="text" name="precio_promedio" id="precio_promedio" class="form-control" placeholder="800 Bs" value="{{ isset($planning_new->precio_promedio)?$planning_new->precio_promedio:old('precio_promedio') }}">
                    </div>
                </div>

                {{-- Público objetivo --}}
                <div class="form-section">
                    <h2 class="subtitle">Publico objetivo</h2>
    
                    <div class="mb-3">
                        <label for="tipos_clientes" class="form-label">11. Describa lo más detallado posible a sus diferentes tipos de clientes.</label><span> (Nivel socioeconómico, profesión, ciclo de vida familiar, ingresos mensuales, etc.) (Especifique todos los perfiles)</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="tipos_clientes" name="tipos_clientes" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->tipos_clientes)?$planning_new->tipos_clientes:old('tipos_clientes') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="necesidades_publico" class="form-label">12. ¿Qué necesidades o problemas de estos públicos resuelven los productos o servicios de la presente campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="necesidades_publico" name="necesidades_publico" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->necesidades_publico)?$planning_new->necesidades_publico:old('necesidades_publico') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="zonas_geograficas" class="form-label">13. ¿A qué zonas geográficas deberíamos llegar mediante la presente campaña?</label><span> Especifique el porcentaje de esfuerzos que le asignaría a cada región</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="zonas_geograficas" name="zonas_geograficas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->zonas_geograficas)?$planning_new->zonas_geograficas:old('zonas_geograficas') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="habito_compra" class="form-label">14. ¿Cuál es el hábito y comportamiento de compra que tienen sus clientes potenciales para este tipo de productos o servicios?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="habito_compra" name="habito_compra" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->habito_compra)?$planning_new->habito_compra:old('habito_compra') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="frecuencia_promedio_compra" class="form-label">15. ¿Con qué frecuencia promedio sus clientes efectúan la compra de sus productos / servicios?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="frecuencia_promedio_compra" name="frecuencia_promedio_compra" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->frecuencia_promedio_compra)?$planning_new->frecuencia_promedio_compra:old('frecuencia_promedio_compra') }}</textarea>
                    </div>
                </div>

                {{-- Objetivos de la campaña --}}
                <div class="form-section">
                    <h2 class="subtitle">Objetivos de la campaña</h2>
    
                    <div class="mb-3">
                        <label for="objetivo_principal" class="form-label">16. ¿Cuál es su objetivo principal para esta campaña?</label><span> (Ej: Generar leads, reconocimiento de marca, tráfico web, ventas, etc.)</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="objetivo_principal" name="objetivo_principal" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->objetivo_principal)?$planning_new->objetivo_principal:old('objetivo_principal') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="objetivo_secundario" class="form-label">17. ¿Cuál es su objetivo secundario para esta campaña? </label><span> (Ej. Impulsar el engagement en redes sociales, incrementar comunidades, etc.)</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="objetivo_secundario" name="objetivo_secundario" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->objetivo_secundario)?$planning_new->objetivo_secundario:old('objetivo_secundario') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="duracion_estimada" class="form-label">18. ¿Cuál será la duración estimada de la presente campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="duracion_estimada" name="duracion_estimada" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->duracion_estimada)?$planning_new->duracion_estimada:old('duracion_estimada') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="mensajes_clave" class="form-label">19. ¿Qué mensajes clave queremos que recuerden las personas después de interactuar con esta campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="mensajes_clave" name="mensajes_clave" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->mensajes_clave)?$planning_new->mensajes_clave:old('mensajes_clave') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="preferencias_formato" class="form-label">20. ¿Tiene alguna preferencia de los formatos de anuncios que deban aplicarse para la presente campaña?</label><span> (Ej. Videos, Fotografía de productos, anuncios de texto, etc.)</span>
                        <input type="text" name="preferencias_formato" id="preferencias_formato" class="form-control" placeholder="Formatos separadaos por comas" value="{{ isset($planning_new->preferencias_formato)?$planning_new->preferencias_formato:old('preferencias_formato') }}">
                    </div>
                </div>

                {{-- Indicadores de éxito, objetivos cuantitativos y presupuesto --}}
                <div class="form-section">
                    <h2 class="subtitle">Indicadores de éxito objetivos cuantitativos y presupuesto</h2>
    
                    <div class="mb-3">
                        <label for="metricas_clave" class="form-label">21. ¿Cuáles serán las métricas clave que se utilizarán para medir el éxito de la campaña?</label><span> (Ej. CTR, Ventas, Conversion Rate, CPA, CPL, Alcance, etc.)</span>
                        <input type="text" name="metricas_clave" id="metricas_clave" class="form-control" placeholder="Métricas separadas por comas" value="{{ isset($planning_new->metricas_clave)?$planning_new->metricas_clave:old('metricas_clave') }}">
                    </div>
    
                    <div class="mb-3">
                        <label for="objetivos_cuantitativos" class="form-label">22. ¿Cuáles son los Objetivos Cuantitativos? Métricas numéricas específicas.</label><span> (Ej. 10.000 visitas al sitio web, 500 leads generados,  300 ventas del producto A,  $us. 15.000 en ingresos, etc.)</span>
                        <input type="text" name="objetivos_cuantitativos" id="objetivos_cuantitativos" class="form-control" placeholder="Objetivos separados por comas" value="{{ isset($planning_new->objetivos_cuantitativos)?$planning_new->objetivos_cuantitativos:old('objetivos_cuantitativos') }}">
                    </div>
    
                    <div class="mb-3">
                        <label for="presupuesto_total" class="form-label">23. ¿Cuál es el presupuesto total disponible para la campaña?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="presupuesto_total" name="presupuesto_total" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->presupuesto_total)?$planning_new->presupuesto_total:old('presupuesto_total') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="temporalidad" class="form-label">24. ¿Cuál será la temporalidad para la ejecución de la presente campaña?</label><span> (Especifique rangos de fecha específicos)</span>
                        <div class="col-lg-3">
                            <input type="text" name="temporalidad" id="temporalidad" class="form-control" placeholder="Marcar rango de fecha" value="{{ isset($planning_new->temporalidad)?$planning_new->temporalidad:old('temporalidad') }}">
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="canales" class="form-label">25. ¿Cuáles serán los canales elegidos para la presente campaña?</label>
                        <input type="text" name="canales" id="canales" class="form-control" placeholder="Canales separados por comas" value="{{ isset($planning_new->canales)?$planning_new->canales:old('canales') }}">
                    </div>
                </div>

                {{-- Consideraciones adicionales --}}
                <div class="form-section">
                    <h2 class="subtitle">Consideraciones adicionales</h2>
                    
                    <div class="mb-3">
                        <label for="restriccion" class="form-label">26. ¿Cuenta con alguna restricción que deba considerarse para la presente campaña?</label><span> (Legales, comunicacionales, presupuestarias, etc.)</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="restriccion" name="restriccion" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->restriccion)?$planning_new->restriccion:old('restriccion') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="basedatos_clientes" class="form-label">27. ¿Cuenta con una base de datos de clientes?</label>
                        <div class="col-lg-1">
                            <select name="basedatos_clientes" id="basedatos_clientes" class="form-select">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="info_adicional" class="form-label">28. Notas Adicionales</label><span> (Información extra que pueda ser relevante para la campaña)</span>
                        <textarea maxlength="500" rows="6" class="form-control" id="info_adicional" name="info_adicional" placeholder="Respuesta máxima de 500 caracteres">{{ isset($planning_new->info_adicional)?$planning_new->info_adicional:old('info_adicional') }}</textarea>
                    </div>
                </div>

                <div class="linea"></div>
                
                <div class="form-navigation d-flex flex-row-reverse justify-content-between mb-3">
                    <input id="btnAudiovisual" type="submit" class="btn btn-primary" value="Enviar Brief">
                    <span id="btnSiguiente" class="next btn btn-primary">Siguiente</span>
                    <span id="btnAnterior" class="previous btn btn-primary">Anterior</span>
                </div>
            </form>
        </div>
        
        <button id="Top" onclick="topFunction()"><i class="fa-solid fa-arrow-up fa-fade"></i></button>

        {{-- Bootstrap 5 scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Librería para rango de fecha --}}
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

        {{-- Script para hacer uso de FontAwesome --}}
        <script src="https://kit.fontawesome.com/0b7cc019fd.js" crossorigin="anonymous"></script>

        {{-- Parsley js code --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="{{ URL::asset('js/es.js') }}"></script>

        <script>
            // Deshabilitar Enter en los campos tipo Text
            $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
                if(e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });

            // Deshabilitar Enter en los campos tipo Email
            $(document).on('keyup keypress', 'form input[type="email"]', function(e) {
                if(e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });

            //Inicio de To Top
            //Obtener el botón:
            let mybutton = document.getElementById("Top");

            //Mostrar el botón cuando el usuario baje al menos 20px
            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            //Desplazamiento hacia arriba cuando el usuario haga clic en el botón
            function topFunction() {
                document.body.scrollTop = 0; //Safari
                document.documentElement.scrollTop = 0; //Chrome, Firefox, IE y Opera
            }
            //Fin de To Top

            // Rango de fechas para campo de temporalidad
            $('input[name="temporalidad"]').daterangepicker({
                autoUpdateInput: false,
                minDate: moment(),
                "locale": {
                    "applyLabel": "Marcar",
                    "cancelLabel": "Cancelar",
                    "fromLabel": "Desde",
                    "toLabel": "Hasta",
                    "weekLabel": "Sem",
                    "daysOfWeek": [
                        "Dom",
                        "Lun",
                        "Mar",
                        "Mie",
                        "Jue",
                        "Vie",
                        "Sab"
                    ],
                    "monthNames": [
                        "Enero",
                        "Febrero",
                        "Marzo",
                        "Abril",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre"
                    ],
                    "firstDay": 1,
                },
            });

            $('input[name="temporalidad"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            // Formulario multipasos de laravel
            var $sections=$('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');

                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type="submit"]').toggle(atTheEnd);

                const step = document.querySelector('.step'+index);
                step.style.backgroundColor = '#2F277A';
                step.style.color = 'white';

                // Active step
                var $steps = $('.nav-link');
                $steps.removeClass('active').eq(index).addClass('active');
            }

            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click( function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click( function(){
                $('.formulario').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                })
            });

            $sections.each(function(index, section){
                var $section = $(section);
                $section.find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        </script>        
    </body>
</html>