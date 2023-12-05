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

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>

    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Naming</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2 justify-content" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tu empresa; ayudándonos a comprender su situación actual, valores, fortalezas, oportunidades, objetivos y desventajas; permitiéndonos de esta manera, articular acciones acertadas, que  aporten valor y crecimiento.<br>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/naming/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('briefnaming')}}" method="POST" class="p-5">
                {{-- Campos de nombre de la empresa, rubro y productos/servicios --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-3">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($naming->empresa)?$naming->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <label for="rubro" class="form-label">¿A qúe se dedica su empresa? <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="rubro" name="rubro" value="{{ isset($naming->rubro)?$naming->rubro:old('rubro') }}" placeholder="Rubro de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-3">
                        <label for="productos_servicios" class="form-label">¿Qué productos o servicios ofrece? <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="productos_servicios" name="productos_servicios" value="{{ isset($naming->productos_servicios)?$naming->productos_servicios:old('productos_servicios') }}" placeholder="Respuesta corta" required>
                    </div>
                </div>
                {{-- Fin de respuestas cortas --}}
                
                <div class="linea"></div>

                {{-- Sección de preguntas con respuestas largas --}}
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="historia" class="form-label">¿Cuál es la historia de su empresa?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="historia" name="historia" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->historia)?$naming->historia:old('historia') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="mensaje_global" class="form-label">¿Cuál es el mensaje global que desea transmitir a través de tu nombre?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="mensaje_global" name="mensaje_global" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->mensaje_global)?$naming->mensaje_global:old('mensaje_global') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="principales_atributos" class="form-label">Mencione los principales atributos de su empresa</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="principales_atributos" name="principales_atributos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->principales_atributos)?$naming->principales_atributos:old('principales_atributos') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="nombre_asociado" class="form-label">¿Cómo le gustaría que sea asociado el nombre de su empresa? (Ejemplos: joven, tradicional, moderna, serio, versátil, etc.)</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="nombre_asociado" name="nombre_asociado" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->nombre_asociado)?$naming->nombre_asociado:old('nombre_asociado') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="valores_asociacion" class="form-label">Mencione los valores con los que le gustaría que asociaran su nombre (Ejemplo: calidad, innovación, únicos, etc.)</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="valores_asociacion" name="valores_asociacion" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->valores_asociacion)?$naming->valores_asociacion:old('valores_asociacion') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="mision" class="form-label">¿Cuál es la misión de su empresa? (La razón de ser de su organización)</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="mision" name="mision" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->mision)?$naming->mision:old('mision') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="vision" class="form-label">¿Cuál es la visión de su empresa? (Su aspiración, deseo, proyección, metas a largo plazo)</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="vision" name="vision" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->vision)?$naming->vision:old('vision') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12 mb-3">
                        <label for="publico_objetivo" class="form-label">Describa los diferentes segmentos y/o públicos objetivos a los que se dirige su empresa</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="publico_objetivo" name="publico_objetivo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->publico_objetivo)?$naming->publico_objetivo:old('publico_objetivo') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="caracteristicas" class="form-label">¿Cuáles son las características demográficas de su segmento?(Género, edad, ubicación, estilo de vida, etc.)</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->caracteristicas)?$naming->caracteristicas:old('caracteristicas') }}</textarea>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="consideraciones" class="form-label">¿Qué elementos o consideraciones son imprescindibles tomar en cuenta para el proceso de construcción del nombre de su empresa?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="consideraciones" name="consideraciones" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->consideraciones)?$naming->consideraciones:old('consideraciones') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="preferencia_elementos" class="form-label">¿Tiene alguna PREFERENCIA de elementos, denominaciones, distintivos y/o palabras clave que deban ir obligatoriamente en el nombre de su empresa?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="preferencia_elementos" name="preferencia_elementos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->preferencia_elementos)?$naming->preferencia_elementos:old('preferencia_elementos') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="restriccion_elementos" class="form-label">¿Tiene alguna RESTRICCIÓN de elementos, denominaciones, distintivos y/o palabras que NO deban ir en el nombre de su empresa?</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="restriccion_elementos" name="restriccion_elementos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->restriccion_elementos)?$naming->restriccion_elementos:old('restriccion_elementos') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="lista_competidores" class="form-label">Por favor, desarrolle una lista con los nombres de sus valores_asociacion directos e indirectos</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="lista_competidores" name="lista_competidores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->lista_competidores)?$naming->lista_competidores:old('lista_competidores') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="nombres_empresas_agrado" class="form-label">Por favor, desarrolle una lista de nombres de empresas (sin importar el rubro), que sean de su agrado.</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="nombres_empresas_agrado" name="nombres_empresas_agrado" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->nombres_empresas_agrado)?$naming->nombres_empresas_agrado:old('nombres_empresas_agrado') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="nombres_empresas_desagrado" class="form-label">Por favor, desarrolle una lista de nombres de empresas (sin importar el rubro), que NO sean de su agrado.</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="nombres_empresas_desagrado" name="nombres_empresas_desagrado" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->nombres_empresas_desagrado)?$naming->nombres_empresas_desagrado:old('nombres_empresas_desagrado') }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="referencias_naming" class="form-label">A continuación, dejamos algunas referencias y categorizaciones de naming. Por favor deje únicamente hasta máximo 2 elecciones que sean de su agrado y elimine las demás.</label>
                    <div class="col-lg-12">
                        <select name="referencias_naming[]" id="referencias_naming" class="form-select select2" multiple>
                            <option value="Compuestos">Compuestos (Ej: KissMetrics, Coca cola, La Caixa, La casera, PayPal, Pizza Hut, Red Bull, Don Limpio)</option>
                            <option value="Frases">Frases (Ej.: La nevera roja, El armario de la tele)</option>                            
                            <option value="Asociativos">Asociativos (Ej.: North Face, Imaginarium, Movistar, Mercadona, Bankia, Pronovias)</option>                            
                            <option value="Onomatopeyas">Onomatopeyas (Ej.: Yahoo!, Kit kat, Boing, Zas, Crunch, Croak)</option>                            
                            <option value="Otros idiomas">Otros idiomas (Ej.: Veritas, Stella Artois, Apple, Miss Sixty)</option>                            
                            <option value="Nombre propio">Nombre propio (Ej.: Neil Patel, Carolina Herrera, Vilma Nuñez, Gillete, MacDonalds)</option>                            
                            <option value="Acrónimos">Acrónimos (Ej.: LG, BBVA, NBA, DIA, IBM, P&G, ebay)</option>                            
                            <option value="Numerales">Numerales (Ej.: 7UP, 5 à Sec, Forever 21)</option>                            
                            <option value="Inventados">Inventados (Ej.: Vibbo, Wallapop, Oysho, Bershka, Tumblr, Vimeo)</option>                            
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-12">
                        <label for="informacion_importante" class="form-label">Por favor, añada toda la información que considere importante complementar al presente brief</label>
                        <textarea maxlength="500" rows="6" class="form-control" id="informacion_importante" name="informacion_importante" placeholder="Respuesta máxima de 500 caracteres">{{ isset($naming->informacion_importante)?$naming->informacion_importante:old('informacion_importante') }}</textarea>
                    </div>
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
        
        {{-- Estilos y comportamiento para el Select2 pillbox --}}                
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.form-select').select2({
                    placeholder: "Seleccionar 2",
                    maximumSelectionLength: 2
                });
            });

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
        </script>        
    </body>
</html>