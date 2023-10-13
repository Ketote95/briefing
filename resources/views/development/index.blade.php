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
                    <h1 class="text-center title-brief" >Brief de Desarrollo Web</h1>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/comunicacion/pdf/") }}" class="alert-link">Descargar PDF</a>
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
                    <textarea maxlength="500" rows="6" class="form-control" id="descripcion_empresa" name="descripcion_empresa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->descripcion_empresa)?$comunicacion->descripcion_empresa:old('descripcion_empresa') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="valores_marca" class="form-label">2. ¿Qué valores definen su marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="valores_marca" name="valores_marca" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->valores_marca)?$comunicacion->valores_marca:old('valores_marca') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="situacion_empresa" class="form-label">3. ¿Cuál es la situación actual de su empresa y marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="situacion_empresa" name="situacion_empresa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->situacion_empresa)?$comunicacion->situacion_empresa:old('situacion_empresa') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos_marketing" class="form-label">4. OBJETIVOS DE MARKETING Escriba 5 palabras que definan cómo le gustaría que su empresa sea reconocida en el mercado</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos_marketing" name="objetivos_marketing" placeholder="Escriba 5 palabras">{{ isset($comunicacion->objetivos_marketing)?$comunicacion->objetivos_marketing:old('objetivos_marketing') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos_comerciales" class="form-label">5. OBJETIVOS COMERCIALES ¿Qué quiere lograr en términos de ventas, penetración y posicionamiento?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos_comerciales" name="objetivos_comerciales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->objetivos_comerciales)?$comunicacion->objetivos_comerciales:old('objetivos_comerciales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="barreras_comerciales" class="form-label">6.	¿Cuáles son sus mayores barreras comerciales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="barreras_comerciales" name="barreras_comerciales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->barreras_comerciales)?$comunicacion->barreras_comerciales:old('barreras_comerciales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="barreras_marketing" class="form-label">7. ¿Cuáles son sus mayores barreras de marketing y comunicación?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="barreras_marketing" name="barreras_marketing" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->barreras_marketing)?$comunicacion->barreras_marketing:old('barreras_marketing') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="comunicar_servicios" class="form-label">8.	¿Cómo comunica actualmente sus productos o servicios?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="comunicar_servicios" name="comunicar_servicios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->comunicar_servicios)?$comunicacion->comunicar_servicios:old('comunicar_servicios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="comercializar_servicios" class="form-label">9.	¿Cómo comercializa actualmente sus productos o servicios?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="comercializar_servicios" name="comercializar_servicios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->comercializar_servicios)?$comunicacion->comercializar_servicios:old('comercializar_servicios') }}</textarea>
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