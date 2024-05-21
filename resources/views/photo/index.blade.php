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
                    <h1 class="text-center title-brief" >Brief de Producción Fotográfica</h1>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/fotografia/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('brief_fotografia')}}" method="POST" class="p-5">
                {{-- Campos de empresa, categoría y marca --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($fotografia->empresa)?$fotografia->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="categoria" class="form-label">Categoría <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ isset($fotografia->categoria)?$fotografia->categoria:old('categoria') }}" placeholder="Sector económico" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="marca" class="form-label">Marca <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($fotografia->marca)?$fotografia->marca:old('marca') }}" placeholder="Nombre de la marca" required>
                    </div>
                </div>

                {{-- Campos de sitio web, facebook e instagram --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="sitio web" class="form-label">Sitio Web</label>
                        <input type="text" class="form-control" id="sitio web" name="sitio_web" value="{{ isset($fotografia->sitio_web)?$fotografia->sitio_web:old('sitio_web') }}" placeholder="URL de su sitio web">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($fotografia->facebook)?$fotografia->facebook:old('facebook') }}" placeholder="Enlace de su perfil de Facebook">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ isset($fotografia->instagram)?$fotografia->instagram:old('instagram') }}" placeholder="Enlace de su perfil de Instagram">
                    </div>
                </div>           
                
                {{-- Campos de tiktok y linkedin --}}
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <label for="tiktok" class="form-label">TikTok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ isset($fotografia->tiktok)?$fotografia->tiktok:old('tiktok') }}" placeholder="Enlace de su perfil de TikTok">
                    </div>
    
                    <div class="col-lg-6 mb-2">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($fotografia->linkedin)?$fotografia->linkedin:old('linkedin') }}" placeholder="Enlace de su perfil de LinkedIn">
                    </div>
                </div>
                {{-- Fin de campos de texto cortos --}}

                <div class="row mb-3">
                    <label for="contacto" class="form-label">Contacto <span style="color: red;">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ isset($fotografia->nombre)?$fotografia->nombre:old('nombre') }}" placeholder="Nombre completo" required>
                    </div>
    
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ isset($fotografia->correo)?$fotografia->correo:old('correo') }}" placeholder="correo@dominio.com" required>
                    </div>    
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="cargo_cliente" name="cargo_cliente" value="{{ isset($fotografia->cargo_cliente)?$fotografia->cargo_cliente:old('cargo_cliente') }}" placeholder="Cargo del cliente" required>
                    </div>

                    <div class="col-lg-6">
                        <input type="number" class="form-control" id="telefono" name="telefono" value="{{ isset($fotografia->telefono)?$fotografia->telefono:old('telefono') }}" placeholder="Número de teléfono" required>
                    </div>                    
                </div>

                <div class="linea"></div>

                {{-- Sección de preguntas con Textarea --}}
                <div class="mb-3">
                    <label for="objetivo_principal" class="form-label">1.	¿Cuál es el propósito principal de la sesión fotográfica?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivo_principal" name="objetivo_principal" placeholder="Respuesta máxima de 500 caracteres">{{ isset($fotografia->objetivo_principal)?$fotografia->objetivo_principal:old('objetivo_principal') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tipos_fotografias" class="form-label">2. ¿Qué tipos de fotografías son necesarias?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="productos" name="tipos_fotografias[]" value="Productos">
                        <label for="productos" class="form-check-label">Productos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="experiencias_lifestyle" name="tipos_fotografias[]" value="Experiencias y Lifestyle">
                        <label for="experiencias_lifestyle" class="form-check-label">Experiencias y Lifestyle</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="alimentos" name="tipos_fotografias[]" value="Alimentos">
                        <label for="alimentos" class="form-check-label">Alimentos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="corporativas" name="tipos_fotografias[]" value="Corporativas">
                        <label for="corporativas" class="form-check-label">Corporativas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="retratos" name="tipos_fotografias[]" value="Retratos">
                        <label for="retratos" class="form-check-label">Retratos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="paisajes" name="tipos_fotografias[]" value="Paisajes">
                        <label for="paisajes" class="form-check-label">Paisajes</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="eventos" name="tipos_fotografias[]" value="Eventos">
                        <label for="eventos" class="form-check-label">Eventos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="arquitectura" name="tipos_fotografias[]" value="Arquitectura">
                        <label for="arquitectura" class="form-check-label">Arquitectura</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="aereas" name="tipos_fotografias[]" value="Aéreas">
                        <label for="aereas" class="form-check-label">Aéreas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_tipos_fotografias" name="tipos_fotografias[]" value="">
                        <label for="otros_tipos_fotografias" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_tipos_fotografias" class="col-lg-4" style="display: none;">
                        <input id="input_tipos_fotografias" type="text" class="form-control" placeholder="Especifique otros tipos de fotografía">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="concepto_referencia" class="form-label">3. ¿Tiene algún concepto definido o de referencia para la producción fotográfica?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="concepto_referencia" name="concepto_referencia" placeholder="Respuesta máxima de 500 caracteres">{{ isset($fotografia->concepto_referencia)?$fotografia->concepto_referencia:old('concepto_referencia') }}</textarea>
                </div>
                
                <div class="col-lg-6 mb-3">
                    <label for="fecha_tentativa" class="form-label">4. ¿Tiene alguna fecha tentativa para la producción fotográfica? <span style="color: red;">*</span></label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_tentativa" id="fecha_tentativa" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="locaciones" class="form-label">5. ¿Tiene alguna locación o locaciones definidas para la producción?</label><span> En caso de responder Sí, por favor bríndenos información respecto a estas locaciones. En caso de responder No, por favor especifique qué tipo de ambientación le gustaría.</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="locaciones" name="locaciones" placeholder="Respuesta máxima de 500 caracteres">{{ isset($fotografia->locaciones)?$fotografia->locaciones:old('locaciones') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="referencias_visuales" class="form-label">6.	¿Tiene referencias visuales o ejemplos específicos que deban aplicarse?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="referencias_visuales" name="referencias_visuales" placeholder="Proporcionar enlaces y/o descripciones. Máximo hasta 500 caracteres">{{ isset($fotografia->referencias_visuales)?$fotografia->referencias_visuales:old('referencias_visuales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="formatos" class="form-label">7. ¿Qué formatos son necesarios para las fotografías?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="vertical" name="formatos[]" value="Vertical (9:16)">
                        <label for="vertical" class="form-check-label">Vertical (9:16)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="horizontal" name="formatos[]" value="Horizontal (16:9)">
                        <label for="horizontal" class="form-check-label">Horizontal (16:9)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cuadrado" name="formatos[]" value="Cuadrado (1:1)">
                        <label for="cuadrado" class="form-check-label">Cuadrado (1:1)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_formatos" name="formatos[]" value="">
                        <label for="otros_formatos" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_formatos" class="col-lg-4" style="display: none;">
                        <input id="input_otros_formatos" type="text" class="form-control" name="" placeholder="Especifique los formatos">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="canales" class="form-label">8.	¿En qué canales se distribuirán estas fotografías?</label><span> (Marque todos las requeridos)</span>
                    <label style="color: #2F277A; font-weight: bold" for="canales-digitales">Uso Digital</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="facebook" name="canales[]" value="Facebook">
                        <label for="facebook" class="form-check-label">Facebook</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="instagram" name="canales[]" value="Instagram">
                        <label for="instagram" class="form-check-label">Instagram</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiktok" name="canales[]" value="TikTok">
                        <label for="tiktok" class="form-check-label">TikTok</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="linkedin" name="canales[]" value="LinkedIn">
                        <label for="linkedin" class="form-check-label">LinkedIn</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="youtube" name="canales[]" value="YouTube">
                        <label for="youtube" class="form-check-label">YouTube</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="sitio_web" name="canales[]" value="Sitio Web">
                        <label for="sitio_web" class="form-check-label">Sitio Web</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mailing" name="canales[]" value="Mailing">
                        <label for="mailing" class="form-check-label">Mailing</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_canales" name="canales[]" value="">
                        <label for="otros_canales" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_canales" class="col-lg-4" style="display: none;">
                        <input id="input_otros_canales" type="text" class="form-control" placeholder="Especifique los canales">
                    </div>

                    <br>

                    <label style="color: #2F277A; font-weight: bold" for="canales-impresos">Impresos</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="vallas" name="canales[]" value="Vallas">
                        <label for="vallas" class="form-check-label">Vallas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="revistas" name="canales[]" value="Revistas">
                        <label for="revistas" class="form-check-label">Revistas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="catalogos" name="canales[]" value="Catálogos">
                        <label for="catalogos" class="form-check-label">Catálogos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="volantes_folletos" name="canales[]" value="Volantes o folletos">
                        <label for="volantes_folletos" class="form-check-label">Volantes o folletos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_canales_impresos" name="canales[]" value="">
                        <label for="otros_canales_impresos" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_canales_impresos" class="col-lg-4" style="display: none;">
                        <input id="input_otros_canales_impresos" type="text" class="form-control" placeholder="Especifique los canales">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="actores" class="form-label">9.  ¿Requiere contratar actores, modelos o figuras públicas para la producción?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="modelo" name="actores[]" value="Modelo">
                        <label for="modelo" class="form-check-label">Modelo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="micro" name="actores[]" value="Micro-influencer">
                        <label for="micro" class="form-check-label">Micro-influencer</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="macro" name="actores[]" value="Macro-influencer">
                        <label for="macro" class="form-check-label">Macro-influencer</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="figura_publica" name="actores[]" value="Figura pública">
                        <label for="figura_publica" class="form-check-label">Figura pública</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="actor" name="actores[]" value="Actor/actriz">
                        <label for="actor" class="form-check-label">Actor/actriz</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_actores" name="actores[]" value="">
                        <label for="otros_actores" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_actores" class="col-lg-4" style="display: none;">
                        <input id="input_otros_actores" type="text" class="form-control" placeholder="Especifique otro tipo de figura púbica">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="perfiles_requeridos" class="form-label">10. De acuerdo a su respuesta anterior, ¿Tiene acuerdos con los perfiles que serán requeridos para la producción?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="perfiles_requeridos" name="perfiles_requeridos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($fotografia->perfiles_requeridos)?$fotografia->perfiles_requeridos:old('perfiles_requeridos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="fecha_limite" class="form-label">11. ¿Cuál es la fecha límite para la entrega de las fotografías?</label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_limite" id="fecha_limite" class="form-control">
                    </div>
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