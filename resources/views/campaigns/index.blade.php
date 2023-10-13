<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Briefing</title>

        {{-- Bootstrap 5 styles --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- Poppins Font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        
    </head>

    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Campañas</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tu empresa; ayudándonos a comprender su situación actual, fortalezas, oportunidades, objetivos y desventajas; permitiéndonos de esta manera, articular estrategias de comunicación que aporten valor y crecimiento.<br>
                <br>
                Por tal motivo, es de gran importancia que te tomes el tiempo suficiente para completar cada una de ellas.
            </div>

            {{-- Sección de la notificación --}}
            @if (Session::has('mensaje'))
                <div style="text-align: justify" class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4 class="alert-heading">¡Registro exitoso!</h4>
                    {{Session::get('mensaje')}}
                    <p>Una vez cerrada esta ventana, no es posible volver a generar el enlace.</p>
                    <hr>
                    <a style="text-align: center" starget="_blank" href="{{ url("/Comunicación/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('BriefCreativo')}}" method="POST" class="p-5">
                {{-- Campos de empresa, categoría y marca --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($comunicacion->empresa)?$comunicacion->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="categoria" class="form-label">Categoría <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ isset($comunicacion->categoria)?$comunicacion->categoria:old('categoria') }}" placeholder="Sector económico" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="marca" class="form-label">Marca <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($comunicacion->marca)?$comunicacion->marca:old('marca') }}" placeholder="Marca con la que trabaja" required>
                    </div>
                </div>

                {{-- Campos de sub-marca, plazo y duración --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="sub_marca" class="form-label">Sub-marca / productos / servicios<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="sub_marca" name="sub_marca" value="{{ isset($comunicacion->sub_marca)?$comunicacion->sub_marca:old('sub_marca') }}" placeholder="Sub-marca, productos o servicios" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="plazo" class="form-label">Plazo <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="plazo" name="plazo" value="{{ isset($comunicacion->plazo)?$comunicacion->plazo:old('plazo') }}" placeholder="Plazo para planificación" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="duracion" class="form-label">Duración de la campaña<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="duracion" name="duracion" value="{{ isset($comunicacion->duracion)?$comunicacion->duracion:old('duracion') }}" placeholder="Tiempo en días" required>
                    </div>
                </div>           
                
                {{-- Campo de presupuesto general para campaña --}}
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <label for="presupuesto" class="form-label">Presupuesto<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="presupuesto" name="presupuesto" value="{{ isset($comunicacion->presupuesto)?$comunicacion->presupuesto:old('presupuesto') }}" placeholder="Presupuesto en bolivianos" required>
                    </div>
                </div>

                <div class="linea"></div>

                {{-- Sección de preguntas con Textarea --}}
                <div class="mb-3">
                    <label for="antecedentes" class="form-label">ANTECEDENTES, ¿Cuál es la situación de partida?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="antecedentes" name="antecedentes" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->antecedentes)?$comunicacion->antecedentes:old('antecedentes') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="justificacion" class="form-label">JUSTIFICACIÓN DE CAMPAÑA, ¿Por qué necesitamos ejecutar esta actividad? ¿Qué busca conseguir?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="justificacion" name="justificacion" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->justificacion)?$comunicacion->justificacion:old('justificacion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="descripcion_servicio" class="form-label">PRODUCTO O SERVICIO. Haga una descripción breve acerca del producto o servicio en cuestión</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="descripcion_servicio" name="descripcion_servicio" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->descripcion_servicio)?$comunicacion->descripcion_servicio:old('descripcion_servicio') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publico" class="form-label">PÚBLICO OBJETIVO, ¿A qué segmento/s desea dirigirse? Se debe determinar variables Geográficas, Demográficas, Comportamientos, Nivel Socio económico, etc. (Sea lo más preciso posible.). En caso de ser varios públicos, favor ordenarlos por relevancia</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="publico" name="publico" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->publico)?$comunicacion->publico:old('publico') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="promesa" class="form-label">PROMESA. Por favor describa la promesa racional (Características y beneficios técnicos) y la promesa emocional (Valor aspiracional) de su producto, marca y/o servicio.</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="promesa" name="promesa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->promesa)?$comunicacion->promesa:old('promesa') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos" class="form-label">OBJETIVOS COMERCIALES, ¿Cuál es el Objetivo Comercial más importante para esta campaña?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos" name="objetivos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->objetivos)?$comunicacion->objetivos:old('objetivos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="linea_comunicacional" class="form-label">LÍNEA COMUNICACIONAL, ¿Qué desea comunicar con esta campaña?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="linea_comunicacional" name="linea_comunicacional" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->linea_comunicacional)?$comunicacion->linea_comunicacional:old('linea_comunicacional') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores" class="form-label">MARCAS COMPETIDORAS, ¿Quiénes son sus competidores? Diferencie entre competidores directos e indirectos</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores" name="competidores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->competidores)?$comunicacion->competidores:old('competidores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="servicios_competidores" class="form-label">PRODUCTOS / SERVICIOS COMPETIDORES. Por favor mencione los productos o servicios que sean competidores directos</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="servicios_competidores" name="servicios_competidores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->servicios_competidores)?$comunicacion->servicios_competidores:old('servicios_competidores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="atributos" class="form-label">ATRIBUTOS COMERCIALES, ¿Qué diferencia su marca, producto/s o servicio/s de la competencia? ¿Cuáles son sus atributos más destacables?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="atributos" name="atributos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->atributos)?$comunicacion->atributos:old('atributos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="medios" class="form-label">MEDIOS / CANALES. Especifique los medios que pretende utilizar para la comunicación de la presente campaña</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="medios" name="medios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->medios)?$comunicacion->medios:old('medios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="entregables" class="form-label">ENTREGABLES, ¿Cuáles son las piezas o materiales para desarrollar en la presente campaña? (Artes de Prensa, Cuñas Radiales, Comunicación en RRSS, etc.)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="entregables" name="entregables" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->entregables)?$comunicacion->entregables:old('entregables') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="plazos" class="form-label">PLAZOS, ¿Cuál será el plazo de ejecución de la presente campaña?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="plazos" name="plazos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->plazos)?$comunicacion->plazos:old('plazos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="voz" class="form-label">TONO DE VOZ. Resuma con 3 adjetivos el estilo que desea que tenga su comunicación</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="voz" name="voz" placeholder="Escriba 3 adjetivos">{{ isset($comunicacion->voz)?$comunicacion->voz:old('voz') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="condicionantes" class="form-label">Describa lo más detallado posible como sería el perfil de su cliente ideal. (Nivel Socioeconómico, Profesión, Ciclo de Vida Familiar, Ingresos Mensuales, etc) (Puede especificar varios perfiles)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="condicionantes" name="condicionantes" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->condicionantes)?$comunicacion->condicionantes:old('condicionantes') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="info_adicional" class="form-label">INFORMACIÓN ADICIONAL. Por favor agregue cualquier información o aclaración adicional que sea relevante para la elaboración de la propuesta.</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="info_adicional" name="info_adicional" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->info_adicional)?$comunicacion->info_adicional:old('info_adicional') }}</textarea>
                </div>
                
                <button id="btnDesarrollo" type="submit" class="btn btn-primary">Enviar Brief</button>
            </form>
        </div>

        <button id="Top" onclick="topFunction()"><i class="fa-solid fa-arrow-up fa-fade"></i></button>

        {{-- Bootstrap 5 scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Script para hacer uso de FontAwesome --}}
        <script src="https://kit.fontawesome.com/0b7cc019fd.js" crossorigin="anonymous"></script>

        <script>
            $(document).on('keyup keypress', 'form input[type="text"]', function(e) {
                if(e.keyCode == 13) {
                    e.preventDefault();
                    return false;
                }
            });

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
        </script>
    </body>
</html>