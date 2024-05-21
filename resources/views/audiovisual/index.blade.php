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

        <style>
            /* Ocultar indicadores de número en Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }
        </style>
        
    </head>

    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Producción Audiovisual</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2 justify-content" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tus necesidades; permitiéndonos de esta manera, planificar y realizar una producción audiovisual que capture de manera precisa y creativa la identidad y visión de tu marca.<br>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/audiovisual/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('brief_audiovisual')}}" method="POST" class="p-5">
                {{-- Campos de empresa, categoría y marca --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($audiovisual->empresa)?$audiovisual->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="categoria" class="form-label">Categoría <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ isset($audiovisual->categoria)?$audiovisual->categoria:old('categoria') }}" placeholder="Sector económico" required>
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="marca" class="form-label">Marca <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($audiovisual->marca)?$audiovisual->marca:old('marca') }}" placeholder="Nombre de la marca" required>
                    </div>
                </div>

                {{-- Campos de sitio web, facebook e instagram --}}
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="sitio web" class="form-label">Sitio Web</label>
                        <input type="text" class="form-control" id="sitio web" name="sitio_web" value="{{ isset($audiovisual->sitio_web)?$audiovisual->sitio_web:old('sitio_web') }}" placeholder="URL de su sitio web">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ isset($audiovisual->facebook)?$audiovisual->facebook:old('facebook') }}" placeholder="Enlace de su perfil de Facebook">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="instagram" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ isset($audiovisual->instagram)?$audiovisual->instagram:old('instagram') }}" placeholder="Enlace de su perfil de Instagram">
                    </div>
                </div>           
                
                {{-- Campos de tiktok y linkedin --}}
                <div class="row">
                    <div class="col-lg-6 mb-2">
                        <label for="tiktok" class="form-label">TikTok</label>
                        <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ isset($audiovisual->tiktok)?$audiovisual->tiktok:old('tiktok') }}" placeholder="Enlace de su perfil de TikTok">
                    </div>
    
                    <div class="col-lg-6 mb-2">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ isset($audiovisual->linkedin)?$audiovisual->linkedin:old('linkedin') }}" placeholder="Enlace de su perfil de LinkedIn">
                    </div>
                </div>
                {{-- Fin de campos de texto cortos --}}

                <div class="row mb-3">
                    <label for="contacto" class="form-label">Contacto <span style="color: red;">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" value="{{ isset($audiovisual->nombre)?$audiovisual->nombre:old('nombre') }}" placeholder="Nombre completo" required>
                    </div>
    
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="correo" name="correo" value="{{ isset($audiovisual->correo)?$audiovisual->correo:old('correo') }}" placeholder="correo@dominio.com" required>
                    </div>    
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="cargo_cliente" name="cargo_cliente" value="{{ isset($audiovisual->cargo_cliente)?$audiovisual->cargo_cliente:old('cargo_cliente') }}" placeholder="Cargo del cliente" required>
                    </div>

                    <div class="col-lg-6">
                        <input type="number" class="form-control" id="telefono" name="telefono" value="{{ isset($audiovisual->telefono)?$audiovisual->telefono:old('telefono') }}" placeholder="Número de teléfono" required>
                    </div>                    
                </div>

                <div class="linea"></div>

                {{-- Sección de preguntas con Textarea --}}
                <div class="mb-3">
                    <label for="objetivo_principal" class="form-label">1.	¿Cuál es el objetivo principal del video?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivo_principal" name="objetivo_principal" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->objetivo_principal)?$audiovisual->objetivo_principal:old('objetivo_principal') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivo_secundario" class="form-label">2. ¿Cuáles son los objetivos secundarios del video?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivo_secundario" name="objetivo_secundario" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->objetivo_secundario)?$audiovisual->objetivo_secundario:old('objetivo_secundario') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publico" class="form-label">3. ¿A qué público está dirigido?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="publico" name="publico" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->publico)?$audiovisual->publico:old('publico') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo_video" class="form-label">4. ¿Cuál es el tipo de video requerido?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="comercial" name="tipo_video" value="Comercial">
                        <label for="comercial" class="form-check-label">Comercial</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="corporativo" name="tipo_video" value="Corporativo">
                        <label for="corporativo" class="form-check-label">Corporativo</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="entrevista" name="tipo_video" value="Entrevista">
                        <label for="entrevista" class="form-check-label">Entrevista</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="testimonial" name="tipo_video" value="Testimonial">
                        <label for="testimonial" class="form-check-label">Testimonial</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="storytelling" name="tipo_video" value="Storytelling">
                        <label for="storytelling" class="form-check-label">Storytelling</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="tutorial" name="tipo_video" value="Tutorial">
                        <label for="tutorial" class="form-check-label">Tutorial (Humnanizado, motion graphics, etc)</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="social_media" name="tipo_video" value="Social Media">
                        <label for="social_media" class="form-check-label">Social Media</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="cobertura_eventos" name="tipo_video" value="Cobertura de eventos">
                        <label for="cobertura_eventos" class="form-check-label">Cobertura de eventos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="podcast" name="tipo_video" value="Podcast">
                        <label for="podcast" class="form-check-label">Podcast</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="otro" name="tipo_video" value="Otro">
                        <label for="otro" class="form-check-label">Otro</label>
                    </div>

                    <div id="otro_tipo_video" class="col-lg-4" style="display: none;">
                        <input id="input_otro_video" type="text" class="form-control" name="" placeholder="Especifique">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tono_deseado" class="form-label">5. ¿Cuál es el tono deseado para el video?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="formal" name="tono_deseado[]" value="Formal">
                        <label for="formal" class="form-check-label">Formal</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="informal" name="tono_deseado[]" value="Informal">
                        <label for="informal" class="form-check-label">Informal</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="comercial" name="tono_deseado[]" value="Comercial">
                        <label for="comercial" class="form-check-label">Comercial</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="inspirador" name="tono_deseado[]" value="Inspirador">
                        <label for="inspirador" class="form-check-label">Inspirador</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="emotivo" name="tono_deseado[]" value="Emotivo">
                        <label for="emotivo" class="form-check-label">Emotivo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="informativo" name="tono_deseado[]" value="Informativo">
                        <label for="informativo" class="form-check-label">Informativo</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="didactico" name="tono_deseado[]" value="Didáctico">
                        <label for="didactico" class="form-check-label">Didáctico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="emotivo" name="tono_deseado[]" value="Humorístico">
                        <label for="emotivo" class="form-check-label">Humorístico</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="musical" name="tono_deseado[]" value="Musical">
                        <label for="musical" class="form-check-label">Musical</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="infantil" name="tono_deseado[]" value="Infantil">
                        <label for="infantil" class="form-check-label">Infantil</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otro_tono" name="tono_deseado[]" value="">
                        <label for="otro_tono" class="form-check-label">Otro</label>
                    </div>

                    <div id="otro_tono_deseado" class="col-lg-4" style="display: none;">
                        <input id="input_otro_tono" type="text" class="form-control" name="" placeholder="Especifique el tono">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pilares" class="form-label">6. ¿Qué pilares comunicacionales son indispensables en el guión del video?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="pilares" name="pilares" placeholder="(Ej. Historia, servicios, trayectoria, productos, equipo de trabajo, valores, etc.)">{{ isset($audiovisual->pilares)?$audiovisual->pilares:old('pilares') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cantidad_videos" class="form-label">7. ¿Cuántos videos le gustaría desarrollar?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="cantidad_videos" name="cantidad_videos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->cantidad_videos)?$audiovisual->cantidad_videos:old('cantidad_videos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="duracion_videos" class="form-label">8. ¿Qué duración le gustaría que tuviera el / los videos?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="15_segs" name="duracion_videos" value="Entre 15 y 30 segundos">
                        <label for="15_segs" class="form-check-label">Entre 15 y 30 segundos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="30_segs" name="duracion_videos" value="Entre 30 y 45 segundos">
                        <label for="30_segs" class="form-check-label">Entre 30 y 45 segundos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="1_min" name="duracion_videos" value="Entre 1 y 2 minutos">
                        <label for="1_min" class="form-check-label">Entre 1 y 2 minutos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="2_min" name="duracion_videos" value="Entre 2 y 5 minutos">
                        <label for="2_min" class="form-check-label">Entre 2 y 5 minutos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="otra_duracion" name="duracion_videos" value="">
                        <label for="otra_duracion" class="form-check-label">Otro</label>
                    </div>

                    <div id="text_otra_duracion" class="col-lg-9" style="display: none;">
                        <input id="input_otra_duracion" type="text" class="form-control" name="" placeholder="En caso de que sea más de 1 video, especifique la duración de cada uno (Este texto va en otros)">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="locaciones" class="form-label">9. ¿Tiene locaciones previstas para la producción? Por favor, especifique cada una de ellas. En caso de no tener locaciones definidas, describa el tipo de ambientación deseado</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="locaciones" name="locaciones" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->locaciones)?$audiovisual->locaciones:old('locaciones') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="referencias_visuales" class="form-label">10. ¿Existen referencias visuales o ejemplos específicos que deban seguirse? </label>
                    <textarea maxlength="500" rows="6" class="form-control" id="referencias_visuales" name="referencias_visuales" placeholder="Proporcione enlaces o descripciones">{{ isset($audiovisual->referencias_visuales)?$audiovisual->referencias_visuales:old('referencias_visuales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="canales" class="form-label">11. ¿En qué canales se distribuirá el video?</label><span> (Marque todas las requeridas)</span>
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
                        <input class="form-check-input" type="checkbox" id="tv" name="canales[]" value="TV">
                        <label for="tv" class="form-check-label">TV</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cine" name="canales[]" value="Cine">
                        <label for="cine" class="form-check-label">Cine</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pantallas_gigantes" name="canales[]" value="Pantallas Gigantes">
                        <label for="pantallas_gigantes" class="form-check-label">Pantallas Gigantes</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_canales" name="canales[]" value="">
                        <label for="otros_canales" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_canales" class="col-lg-4" style="display: none;">
                        <input id="input_otros_canales" type="text" class="form-control" name="" placeholder="Especifique los canales">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dimensiones" class="form-label">12. ¿Cuáles son las dimensiones de video requeridas?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="vertical" name="dimensiones[]" value="Vertical (9:16)">
                        <label for="vertical" class="form-check-label">Vertical (9:16)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="horizontal" name="dimensiones[]" value="Horizontal (16:9)">
                        <label for="horizontal" class="form-check-label">Horizontal (16:9)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cuadrado" name="dimensiones[]" value="Cuadrado (1:1)">
                        <label for="cuadrado" class="form-check-label">Cuadrado (1:1)</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otras_dimensiones" name="dimensiones[]" value="">
                        <label for="otras_dimensiones" class="form-check-label">Otras</label>
                    </div>

                    <div id="text_otras_dimensiones" class="col-lg-4" style="display: none;">
                        <input id="input_otras_dimensiones" type="text" class="form-control" name="" placeholder="Especifique las dimensiones">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="presupuesto_estimado" class="form-label">13. ¿Tiene algún presupuesto estimado para esta producción?</label>
                    <input type="text" name="presupuesto_estimado" id="presupuesto_estimado" class="form-control" placeholder="75000 Bs" value="{{ isset($audiovisual->presupuesto_estimado)?$audiovisual->presupuesto_estimado:old('presupuesto_estimado') }}">
                </div>

                <div class="mb-3">
                    <label for="fecha_tentativa" class="form-label">14. ¿Tiene alguna fecha prevista para la ejecución de la producción?</label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_tentativa" id="fecha_tentativa" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fecha_materiales" class="form-label">15. ¿Cuál es la fecha límite para la entrega de los materiales?</label>
                    <div class="col-lg-3">
                        <input type="date" min="{{ date('Y-m-d') }}" name="fecha_materiales" id="fecha_materiales" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="dias_horarios" class="form-label">16. ¿Tiene definido días y horarios específicos para el rodaje?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="dias_horarios" name="dias_horarios" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->dias_horarios)?$audiovisual->dias_horarios:old('dias_horarios') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="formatos" class="form-label">17. ¿Qué formatos de sonido y musicalización desea aplicar para los materiales?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="voz_enoff" name="formatos[]" value="Voz en off">
                        <label for="voz_enoff" class="form-check-label">Voz en off</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="musica" name="formatos[]" value="Música libre de derechos">
                        <label for="musica" class="form-check-label">Música libre de derechos</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="jingles" name="formatos[]" value="Jingles">
                        <label for="jingles" class="form-check-label">Jingles</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="doblaje" name="formatos[]" value="Doblaje">
                        <label for="doblaje" class="form-check-label">Doblaje</label>
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
                    <label for="voz_off" class="form-label">18. En caso de requerir voz en off, esta debe ser:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="masculina" name="voz_off" value="Masculina">
                        <label for="masculina" class="form-check-label">Masculina</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="femenina" name="voz_off" value="Femenina">
                        <label for="femenina" class="form-check-label">Femenina</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="indiferente" name="voz_off" value="Me es indiferente">
                        <label for="indiferente" class="form-check-label">Me es indiferente</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="no_necesito" name="voz_off" value="No necesito">
                        <label for="no_necesito" class="form-check-label">No necesito</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="genero_musical" class="form-label">19. ¿Qué género musical debe llevar el video?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="genero_musical" name="genero_musical" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->competidores_indirectos)?$audiovisual->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="actores" class="form-label">20. ¿Requiere contratar actores, modelos o figuras públicas para la producción?</label><span> (Marque todas las requeridas)</span>
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
                    <label for="perfiles_requeridos" class="form-label">21. De acuerdo a su respuesta anterior, ¿Tiene acuerdos con los perfiles que serán requeridos para la producción?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="perfiles_requeridos" name="perfiles_requeridos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->perfiles_requeridos)?$audiovisual->perfiles_requeridos:old('perfiles_requeridos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tomas_aereas" class="form-label">22. ¿Se requieren tomas aéreas en esta producción?</label>
                    <div class="col-lg-1">
                        <select name="tomas_aereas" id="tomas_aereas" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="elementos_visuales" class="form-label">23. ¿Existen elementos visuales o gráficos que se deban incorporar obligatoriamente?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="elementos_visuales" name="elementos_visuales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->elementos_visuales)?$audiovisual->elementos_visuales:old('elementos_visuales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="subtitulos" class="form-label">24. ¿El video debe llevar subtítulos?</label>
                    <div class="col-lg-1">
                        <select name="subtitulos" id="subtitulos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="restricciones_legales" class="form-label">25. ¿Existen restricciones o consideraciones legales específicas?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="restricciones_legales" name="restricciones_legales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->restricciones_legales)?$audiovisual->restricciones_legales:old('restricciones_legales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="info_adicional" class="form-label">26. Para finalizar, ¿algún otro detalle o consideración que desee agregar?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="info_adicional" name="info_adicional" placeholder="Respuesta máxima de 500 caracteres">{{ isset($audiovisual->info_adicional)?$audiovisual->info_adicional:old('info_adicional') }}</textarea>
                </div>

                <button id="btnAudiovisual" type="submit" class="btn btn-primary">Enviar Brief</button>
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

            // Mostrar input text para los radiobutton
            $("input[type='radio']").on("change", function(){
                // Para el tipo de video
                if($('#otro').is(':checked')){
                    $("#otro_tipo_video").slideDown();
                    $('#input_otro_video').attr('name', 'tipo_video');
                } else {
                    $("#otro_tipo_video").slideUp();
                    $('#input_otro_video').attr('name', '');
                }
                // Para la duración de los videos
                if($('#otra_duracion').is(':checked')){
                    $("#text_otra_duracion").slideDown();
                    $('#input_otra_duracion').attr('name', 'duracion_videos');
                } else {
                    $("#text_otra_duracion").slideUp();
                    $('#input_otra_duracion').attr('name', '');
                }
            });

            // Mostrar input text para los chackboxes
            $("input[type='checkbox']").on("change", function(){
                // Para el tipo de tono de voz deseado
                if($('#otro_tono').is(':checked')){
                    $("#otro_tono_deseado").slideDown();
                } else {
                    $("#otro_tono_deseado").slideUp();
                }
                $("#input_otro_tono").change(function(){
                    $("#otro_tono").val($(this).val());
                });

                // Para los canales de distribución de video
                if($('#otros_canales').is(':checked')){
                    $("#text_otros_canales").slideDown();
                } else {
                    $("#text_otros_canales").slideUp();
                }
                $("#input_otros_canales").change(function(){
                    $("#otros_canales").val($(this).val());
                });

                // Para las otras dimensiones de video
                if($('#otras_dimensiones').is(':checked')){
                    $("#text_otras_dimensiones").slideDown();
                } else {
                    $("#text_otras_dimensiones").slideUp();
                }
                $("#input_otras_dimensiones").change(function(){
                    $("#otras_dimensiones").val($(this).val());
                });
                
                // Para los otros formatos de sonido y musicalización
                if($('#otros_formatos').is(':checked')){
                    $("#text_otros_formatos").slideDown();
                } else {
                    $("#text_otros_formatos").slideUp();
                }
                $("#input_otros_formatos").change(function(){
                    $("#otros_formatos").val($(this).val());
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