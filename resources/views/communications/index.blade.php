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
                    <h1 class="text-center title-brief" >Brief de Comunicación</h1>
                </div>
            </div>  

            <div class="alert alert-light mx-5 mb-2" role="alert">
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
                <div class="alert alert-success alert-dismissible fade show mx-5" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <h4 class="alert-heading">¡Registro exitoso!</h4>
                    {{Session::get('mensaje')}}
                    <p>Una vez cerrada esta ventana, no es posible volver a generar el enlace.</p>
                    <hr>
                    <a target="_blank" href="{{ url("/comunicacion/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('briefcomunicacion')}}" method="POST" class="p-5">
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
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($comunicacion->marca)?$comunicacion->marca:old('marca') }}" placeholder="Nombre de la marca" required>
                    </div>
                </div>

                {{-- Campos de sitio web, facebook e instagram --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="sitio web" class="form-label">Sitio Web</label>
                        <input type="text" class="form-control" id="sitio web" name="sitio_web" value="{{ isset($comunicacion->sitio_web)?$comunicacion->sitio_web:old('sitio_web') }}" placeholder="URL de su sitio web">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($comunicacion->facebook)?$comunicacion->facebook:old('facebook') }}" placeholder="Enlace de su perfil de Facebook">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ isset($comunicacion->instagram)?$comunicacion->instagram:old('instagram') }}" placeholder="Enlace de su perfil de Instagram">
                    </div>
                </div>           
                
                {{-- Campos de tiktok y linkedin --}}
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <label for="tiktok" class="form-label">TikTok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ isset($comunicacion->tiktok)?$comunicacion->tiktok:old('tiktok') }}" placeholder="Enlace de su perfil de TikTok">
                    </div>
    
                    <div class="col-lg-6 mb-2">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($comunicacion->linkedin)?$comunicacion->linkedin:old('linkedin') }}" placeholder="Enlace de su perfil de LinkedIn">
                    </div>
                </div>
                {{-- Fin de campos de texto cortos --}}

                <div class="row mb-3">
                    <label for="contacto" class="form-label">Contacto <span style="color: red;">*</span></label>
                    <div class="col-lg-4 mb-2">
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ isset($comunicacion->nombre)?$comunicacion->nombre:old('nombre') }}" placeholder="Nombre completo" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ isset($comunicacion->correo)?$comunicacion->correo:old('correo') }}" placeholder="correo@dominio.com" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ isset($comunicacion->telefono)?$comunicacion->telefono:old('telefono') }}" placeholder="Número de teléfono" required>
                    </div>
                </div>

                <div class="linea"></div>

                {{-- Sección de preguntas con Textarea --}}
                <div class="mb-3">
                    <label for="descripcion_empresa" class="form-label">1.	Describa detalladamente su empresa</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="descripcion_empresa" name="descripcion_empresa" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->descripcion_empresa)?$comunicacion->descripcion_empresa:old('descripcion_empresa') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="valores_marca" class="form-label">2. ¿Qué valores definen su marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="valores_marca" name="valores_marca" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->valores_marca)?$comunicacion->valores_marca:old('valores_marca') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="situacion_empresa" class="form-label">3. ¿Cuál es la situación actual de su empresa y marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="situacion_empresa" name="situacion_empresa" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->situacion_empresa)?$comunicacion->situacion_empresa:old('situacion_empresa') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos_marketing" class="form-label">4. OBJETIVOS DE MARKETING Escriba 5 palabras que definan cómo le gustaría que su empresa sea reconocida en el mercado</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos_marketing" name="objetivos_marketing" placeholder="5 palabras separadas por coma">{{ isset($comunicacion->objetivos_marketing)?$comunicacion->objetivos_marketing:old('objetivos_marketing') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos_comerciales" class="form-label">5. OBJETIVOS COMERCIALES ¿Qué quiere lograr en términos de ventas, penetración y posicionamiento?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos_comerciales" name="objetivos_comerciales" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->objetivos_comerciales)?$comunicacion->objetivos_comerciales:old('objetivos_comerciales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="barreras_comerciales" class="form-label">6.	¿Cuáles son sus mayores barreras comerciales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="barreras_comerciales" name="barreras_comerciales" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->barreras_comerciales)?$comunicacion->barreras_comerciales:old('barreras_comerciales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="barreras_marketing" class="form-label">7. ¿Cuáles son sus mayores barreras de marketing y comunicación?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="barreras_marketing" name="barreras_marketing" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->barreras_marketing)?$comunicacion->barreras_marketing:old('barreras_marketing') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="comunicar_servicios" class="form-label">8.	¿Cómo comunica actualmente sus productos o servicios?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="comunicar_servicios" name="comunicar_servicios" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->comunicar_servicios)?$comunicacion->comunicar_servicios:old('comunicar_servicios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="comercializar_servicios" class="form-label">9.	¿Cómo comercializa actualmente sus productos o servicios?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="comercializar_servicios" name="comercializar_servicios" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->comercializar_servicios)?$comunicacion->comercializar_servicios:old('comercializar_servicios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="presencia_online" class="form-label">10. ¿Cuál es su presencia online actual? ¿Tiene sitio web? ¿Presencia en redes sociales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="presencia_online" name="presencia_online" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->presencia_online)?$comunicacion->presencia_online:old('presencia_online') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="retos_digitalizacion" class="form-label">11. ¿Cuáles han sido sus mayores retos en el proceso de digitalización de su empresa? Tanto desde la perspectiva comercial, como de marketing y comunicación.</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="retos_digitalizacion" name="retos_digitalizacion" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->retos_digitalización)?$comunicacion->retos_digitalización:old('retos_digitalización') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="servicios_principales" class="form-label">12. ¿Cuáles son sus productos o servicios principales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="servicios_principales" name="servicios_principales" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->servicios_principales)?$comunicacion->servicios_principales:old('servicios_principales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publico_objetivo" class="form-label">13. Público Objetivo (Defina lo más exacto posible a que clases de clientes se dirige, cuanto más preciso mejor. Pueden ser varios tipos de segmentos según los tipos de productos o servicios que ofrece)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="publico_objetivo" name="publico_objetivo" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->publico_objetivo)?$comunicacion->publico_objetivo:old('publico_objetivo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="necesidades_servicios" class="form-label">14. ¿Qué necesidades satisfacen sus productos o servicios?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="necesidades_servicios" name="necesidades_servicios" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->necesidades_servicios)?$comunicacion->necesidades_servicios:old('necesidades_servicios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="perfil_cliente" class="form-label">15. Describa lo más detallado posible como sería el perfil de su cliente ideal. (Nivel Socioeconómico, Profesión, Ciclo de Vida Familiar, Ingresos Mensuales, etc) (Puede especificar varios perfiles)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="perfil_cliente" name="perfil_cliente" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->perfil_cliente)?$comunicacion->perfil_cliente:old('perfil_cliente') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores_principales" class="form-label">16. ¿Quiénes son sus competidores principales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores_principales" name="competidores_principales" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->competidores_principales)?$comunicacion->competidores_principales:old('competidores_principales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="aspectos_competidores" class="form-label">17. ¿Qué considera que hacen bien y mal sus competidores principales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="aspectos_competidores" name="aspectos_competidores" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->aspectos_competidores)?$comunicacion->aspectos_competidores:old('aspectos_competidores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores_indirectos" class="form-label">18. ¿Quiénes son sus competidores indirectos?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores_indirectos" name="competidores_indirectos" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->competidores_indirectos)?$comunicacion->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="aspectos_competidores_indirectos" class="form-label">19. ¿Qué considera que hacen bien y mal sus competidores indirectos?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="aspectos_competidores_indirectos" name="aspectos_competidores_indirectos" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->competidores_indirectos)?$comunicacion->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="contra_competidores" class="form-label">20. ¿Qué le gustaría hacer que sus competidores no estén haciendo actualmente?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="contra_competidores" name="contra_competidores" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->contra_competidores)?$comunicacion->contra_competidores:old('contra_competidores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="ventajas_competitivas" class="form-label">21. ¿Cuáles son sus principales ventajas competitivas?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="ventajas_competitivas" name="ventajas_competitivas" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->ventajas_competitivas)?$comunicacion->ventajas_competitivas:old('ventajas_competitivas') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="desventajas_competitivas" class="form-label">22. ¿Cuáles son sus principales desventajas competitivas?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="desventajas_competitivas" name="desventajas_competitivas" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->desventajas_competitivas)?$comunicacion->desventajas_competitivas:old('desventajas_competitivas') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="principales_diferenciadores" class="form-label">23. ¿Cuáles son sus principales diferenciadores?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="principales_diferenciadores" name="principales_diferenciadores" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->principales_diferenciadores)?$comunicacion->principales_diferenciadores:old('principales_diferenciadores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="estrategias_comunicacion" class="form-label">24. ¿Ha desarrollado alguna estrategia de comunicación digital previa? En caso que su respuesta sea afirmativa, ¿Qué aspectos considera que han sido positivos y negativos?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="estrategias_comunicacion" name="estrategias_comunicacion" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->estrategias_comunicacion)?$comunicacion->estrategias_comunicacion:old('estrategias_comunicacion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="trabajo_con_agencia" class="form-label">25. ¿Ha trabajado anteriormente con una agencia de comunicación digital? En caso que su respuesta sea afirmativa, ¿Qué aspectos considera que han sido positivos y negativos en el servicio?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="trabajo_con_agencia" name="trabajo_con_agencia" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->trabajo_con_agencia)?$comunicacion->trabajo_con_agencia:old('trabajo_con_agencia') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="nueva_agencia" class="form-label">26. ¿Qué factores lo están motivando a buscar una nueva agencia de comunicación digital?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="nueva_agencia" name="nueva_agencia" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->nueva_agencia)?$comunicacion->nueva_agencia:old('nueva_agencia') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="personalidad_marca" class="form-label">27. ¿Qué personalidad desea darle a su marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="personalidad_marca" name="personalidad_marca" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->personalidad_marca)?$comunicacion->personalidad_marca:old('personalidad_marca') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="lenguaje_marca" class="form-label">28. ¿Cómo le gustaría que sea el lenguaje con el que se expresa su marca en redes sociales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="lenguaje_marca" name="lenguaje_marca" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->lenguaje_marca)?$comunicacion->lenguaje_marca:old('lenguaje_marca') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="presupuesto_anuncios" class="form-label">29. ¿Cuánto es el presupuesto publicitario que tiene destinado para anuncios digitales? Especifique por plataforma</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="presupuesto_anuncios" name="presupuesto_anuncios" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->presupuesto_anuncios)?$comunicacion->presupuesto_anuncios:old('presupuesto_anuncios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="incrementar_presupuesto" class="form-label">30. ¿Existe la posibilidad de incrementar su presupuesto de publicidad digital?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="incrementar_presupuesto" name="incrementar_presupuesto" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->incrementar_presupuesto)?$comunicacion->incrementar_presupuesto:old('incrementar_presupuesto') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="google_ads" class="form-label">31. ¿Utiliza GOOGLE ADS dentro de su estrategia de campañas digitales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="google_ads" name="google_ads" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->google_ads)?$comunicacion->google_ads:old('google_ads') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="conformidad_sitio" class="form-label">32. ¿Cuenta su empresa con un sitio web actualizado que sea de su conformidad?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="conformidad_sitio" name="conformidad_sitio" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->conformidad_sitio)?$comunicacion->conformidad_sitio:old('conformidad_sitio') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="database" class="form-label">33. ¿Cuenta con una base de datos de clientes?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="database" name="database" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->database)?$comunicacion->database:old('database') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="info_importante" class="form-label">34. Agregar toda la información que considere importante resaltar</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="info_importante" name="info_importante" placeholder="Respuesta máxima de 500 caractéres">{{ isset($comunicacion->info_importante)?$comunicacion->info_importante:old('info_importante') }}</textarea>
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