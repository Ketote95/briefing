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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        
    </head>

    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Campaña Online</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2 justify-content" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tus necesidades; permitiéndonos de esta manera, planificar y realizar una producción fotográfica que capture de manera precisa y creativa la identidad y visión de tu marca.<br>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/campaña_online/pdf") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('brief_campaña_online')}}" method="POST" class="p-5">
                {{-- Campos de empresa, responsable y campaña --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($online_campaign->empresa)?$online_campaign->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="responsable_empresa" class="form-label">Responsable <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="responsable_empresa" name="responsable_empresa" value="{{ isset($online_campaign->responsable_empresa)?$online_campaign->responsable_empresa:old('responsable_empresa') }}" placeholder="Responsable de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="nombre_campaña" class="form-label">Nombre de la campaña <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="nombre_campaña" name="nombre_campaña" value="{{ isset($online_campaign->nombre_campaña)?$online_campaign->nombre_campaña:old('nombre_campaña') }}" placeholder="Nombre de la campaña publicitaria" required>
                    </div>
                </div>

                {{-- Campos de sitio web, facebook e instagram --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="sitio web" class="form-label">Sitio Web</label>
                        <input type="text" class="form-control" id="sitio web" name="sitio_web" value="{{ isset($online_campaign->sitio_web)?$online_campaign->sitio_web:old('sitio_web') }}" placeholder="URL de su sitio web">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($online_campaign->facebook)?$online_campaign->facebook:old('facebook') }}" placeholder="Enlace de su perfil de Facebook">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ isset($online_campaign->instagram)?$online_campaign->instagram:old('instagram') }}" placeholder="Enlace de su perfil de Instagram">
                    </div>
                </div>           
                
                {{-- Campos de twitter y linkedin --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="twitter" class="form-label">Twitter</label>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ isset($online_campaign->twitter)?$online_campaign->twitter:old('twitter') }}" placeholder="Enlace de su perfil de X (Twitter)">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($online_campaign->linkedin)?$online_campaign->linkedin:old('linkedin') }}" placeholder="Enlace de su perfil de LinkedIn">
                    </div>

                    <div class="col-lg-4 mb-2">
                        <label for="youtube" class="form-label">YouTube</label>
                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{ isset($online_campaign->youtube)?$online_campaign->youtube:old('youtube') }}" placeholder="Enlace de su canal de YouTube">
                    </div>
                </div>

                {{-- Campos de URL destino, descarga de App y competencia directa --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="destino" class="form-label">URL Destino</label>
                        <input type="text" class="form-control" id="destino" name="destino" value="{{ isset($online_campaign->destino)?$online_campaign->destino:old('destino') }}" placeholder="URL destino de la campaña">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="app" class="form-label">URL App</label>
                        <input type="text" class="form-control" id="app" name="app" value="{{ isset($online_campaign->app)?$online_campaign->app:old('app') }}" placeholder="URL de descarga de la App">
                    </div>

                    <div class="col-lg-4 mb-2">
                        <label for="competencia_directa" class="form-label">Competencia directa</label>
                        <input type="text" class="form-control" id="competencia_directa" name="competencia_directa" value="{{ isset($online_campaign->competencia_directa)?$online_campaign->competencia_directa:old('competencia_directa') }}" placeholder="Su competidor directo">
                    </div>
                </div>
                
                {{-- Campos de contacto y objetivos de la campaña --}}
                <div class="row mb-3">
                    <label for="campaña" class="form-label">Campaña <span style="color: red;">*</span></label>
                    <div class="col-lg-4 mb-2">
                        <input type="email" class="form-control" id="email" name="email" value="{{ isset($online_campaign->email)?$online_campaign->email:old('email') }}" placeholder="Mail de contacto" required>
                    </div>
                    
                    <div class="col-lg-4 mb-2">
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ isset($online_campaign->telefono)?$online_campaign->telefono:old('telefono') }}" placeholder="Teléfono de contacto" required>
                    </div>
                    
                    <div class="col-lg-4 mb-2">
                        <input type="text" class="form-control" id="objetivo_campaña" name="objetivo_campaña" value="{{ isset($online_campaign->objetivo_campaña)?$online_campaign->objetivo_campaña:old('objetivo_campaña') }}" placeholder="Objetivo de la campaña" required>
                    </div>
                </div>
                {{-- Fin de campos de texto cortos --}}

                <div class="linea"></div>

                {{-- Sección de preguntas para contenido y material --}}
                <h2 class="subtitle">CONTENIDO Y MATERIAL</h2>

                <div class="mb-3">
                    <label for="recursos_graficos" class="form-label">¿Cuenta con recursos gráficos? (PSD, JPG, GIF, PNG, etc)</label>
                    <div class="col-lg-1">
                        <select name="recursos_graficos" id="recursos_graficos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="recursos_audiovisuales" class="form-label">¿Cuenta con recursos audiovisuales? (Videos)</label>
                    <div class="col-lg-1">
                        <select name="recursos_audiovisuales" id="recursos_audiovisuales" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                {{-- Sección de preguntas para los tiempos --}}
                <h2 class="subtitle">TIEMPOS</h2>

                <div class="mb-3">
                    <label for="fecha_inicio" class="form-label">Fecha de inicio</label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_inicio" id="fecha_inicio" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fecha_fin" class="form-label">Fecha de fin</label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_fin" id="fecha_fin" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 mb-2">
                        <label for="presupuesto_campaña" class="form-label">Presupuesto de la campaña<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="presupuesto_campaña" name="presupuesto_campaña" value="{{ isset($comunicacion->presupuesto_campaña)?$comunicacion->presupuesto_campaña:old('presupuesto_campaña') }}" placeholder="Valor númerico">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="moneda" class="form-label">Moneda</label>
                    <div class="col-lg-1">
                        <select name="moneda" id="moneda" class="form-select">
                            <option value="USD">USD</option>
                            <option value="Bs">Bs</option>
                        </select>
                    </div>
                </div>

                {{-- Sección de preguntas para las segmentaciones --}}
                <h2 class="subtitle">SEGMENTACIONES</h2>

                <div class="mb-3">
                    <label for="pais" class="form-label">País</label>
                    <div class="col-lg-1">
                        <select name="pais" id="pais" class="form-select">
                            <option value="Bolivia">Bolivia</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="USA">USA</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <label for="ciudades" class="form-label">CIUDAD(ES) <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="ciudades" name="ciudades" value="{{ isset($online_campaign->ciudades)?$online_campaign->ciudades:old('ciudades') }}" placeholder="Ciudades en las que se realizara la campaña" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <label for="edades" class="form-label">EDADES <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="edades" name="edades" value="{{ isset($online_campaign->edades)?$online_campaign->edades:old('edades') }}" placeholder="Rangos de edades separados por comas" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="generos" class="form-label">GÉNEROS <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="generos" name="generos" value="{{ isset($online_campaign->generos)?$online_campaign->generos:old('generos') }}" placeholder="Hombres, mujeres o ambos" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <label for="descripcion_publico" class="form-label">Descripción del público objetivo</label>
                        <input type="text" class="form-control" id="descripcion_publico" name="descripcion_publico" value="{{ isset($online_campaign->descripcion_publico)?$online_campaign->descripcion_publico:old('descripcion_publico') }}" placeholder="Describa el público objetivo">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 mb-2">
                        <label for="plataformas" class="form-label">PLATAFORMAS <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="plataformas" name="plataformas" value="{{ isset($online_campaign->plataformas)?$online_campaign->plataformas:old('plataformas') }}" placeholder="Facebook, instagram, X, tiktok, etc" required>
                    </div>
                </div>

                {{-- Sección de preguntas para la etapa de embudo --}}
                <h2 class="subtitle">FUNNEL STAGE / ETAPA DE EMBUDO</h2>

                <div class="mb-3">
                    <label for="funnel_stage" class="form-label">Funnel Stage</label>
                    <div class="col-lg-4">
                        <select name="funnel_stage" id="funnel_stage" class="form-select">
                            <option value="Visibilidad">Visibilidad - Reconocimiento de marca</option>
                            <option value="Consideración">Consideración - Interés de compra</option>
                            <option value="Conversión">Conversión</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="info_adicional" class="form-label">INFORMACIÓN ADICIONAL. Por favor agregue cualquier información o aclaración adicional que sea relevante para la elaboración de la propuesta.</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="info_adicional" name="info_adicional" placeholder="Respuesta máxima de 500 caracteres">{{ isset($comunicacion->info_adicional)?$comunicacion->info_adicional:old('info_adicional') }}</textarea>
                </div>

                <button id="btnFotografia" type="submit" class="btn btn-primary">Enviar Brief</button>
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

            // Mostrar input text para los chackboxes
            $("input[type='checkbox']").on("change", function(){
                // Para los tipos de fotografías que necesiten
                if($('#otros_tipos_fotografias').is(':checked')){
                    $("#text_tipos_fotografias").slideDown();
                } else {
                    $("#text_tipos_fotografias").slideUp();
                }
                $("#input_tipos_fotografias").change(function(){
                    $("#otros_tipos_fotografias").val($(this).val());
                });

                // Para los formatos de las fotografías
                if($('#otros_formatos').is(':checked')){
                    $("#text_otros_formatos").slideDown();
                } else {
                    $("#text_otros_formatos").slideUp();
                }
                $("#input_otros_formatos").change(function(){
                    $("#otros_formatos").val($(this).val());
                });
                
                // Para los canales de distribución digitales de las fotografías
                if($('#otros_canales').is(':checked')){
                    $("#text_otros_canales").slideDown();
                } else {
                    $("#text_otros_canales").slideUp();
                }
                $("#input_otros_canales").change(function(){
                    $("#otros_canales").val($(this).val());
                });

                // Para los canales de distribución impresos de las fotografías
                if($('#otros_canales_impresos').is(':checked')){
                    $("#text_otros_canales_impresos").slideDown();
                } else {
                    $("#text_otros_canales_impresos").slideUp();
                }
                $("#input_otros_canales_impresos").change(function(){
                    $("#otros_canales_impresos").val($(this).val());
                });

                // Para los actores
                if($('#otros_actores').is(':checked')){
                    $("#text_otros_actores").slideDown();
                } else {
                    $("#text_otros_actores").slideUp();
                }
                $("#input_otros_actores").change(function(){
                    $("#otros_actores").val($(this).val());
                });
            });
        </script>        
    </body>
</html>