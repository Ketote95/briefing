<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Briefing</title>

        {{-- Bootstrap 5 styles --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        
        {{-- Fontawesome 6 styles --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <h1 class="text-center title-brief" >Brief de Creación de Marca</h1>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/branding/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('briefbranding')}}" method="POST" class="p-5">
                {{-- Campos de nombre, naming y categoría --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <label for="empresa" class="form-label">¿Cómo se llama la empresa / organización? <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($marca->empresa)?$marca->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-4">
                        <label for="naming" class="form-label">El nombre que aparecerá en el logo (naming) <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="naming" name="naming" value="{{ isset($marca->naming)?$marca->naming:old('naming') }}" placeholder="Nombre" required>
                    </div>
    
                    <div class="col-lg-4 mb-4">
                        <label for="categoria" class="form-label">¿A qué categoría pertenece su marca? <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="categoria" name="categoria" value="{{ isset($marca->categoria)?$marca->categoria:old('categoria') }}" placeholder="Tecnología" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="diferencia" class="form-label">¿Qué diferencia a su empresa de las demás? <span style="color: red;">*</span></label>
                        <textarea maxlength="500" rows="6" class="form-control" id="diferencia" name="diferencia" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->diferencia)?$marca->diferencia:old('diferencia') }}</textarea>
                    </div>
    
                    <div class="col-lg-6 mb-4">
                        <label for="servicios_productos" class="form-label">¿Qué servicios o productos proporciona su empresa? <span style="color: red;">*</span></label>
                        <textarea maxlength="500" rows="6" class="form-control" id="servicios_productos" name="servicios_productos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->servicios_productos)?$marca->servicios_productos:old('servicios_productos') }}</textarea>
                    </div>
                </div>
                {{-- Fin de respuestas cortas --}}
                
                <div class="linea"></div>

                {{-- Sección de preguntas con respuestas largas --}}
                <div class="mb-3">
                    <label for="eleccion_empresa" class="form-label">¿Por qué debería elegir su empresa y no a la competencia?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="eleccion_empresa" name="eleccion_empresa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->eleccion_empresa)?$marca->eleccion_empresa:old('eleccion_empresa') }}</textarea>
                </div>

                <div class="row">
                    <label for="años" class="form-label">¿Cuántos años tiene la empresa en el mercado?</label>
                    <div class="col-lg-3 mb-3">
                        <select name="años" id="años" class="form-select">
                            <option value="Menos de 1 año">Menos de 1 año</option>
                            <option value="1-3 años">1-3 años</option>
                            <option value="3-5 años">3-5 años</option>
                            <option value="5-10 años">5-10 años</option>
                            <option value="Más de 10 años">Más de 10 años</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="fortalezas_debilidades" class="form-label">¿Cuáles son las fortalezas y debilidades de tu empresa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="fortalezas_debilidades" name="fortalezas_debilidades" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->fortalezas_debilidades)?$marca->fortalezas_debilidades:old('fortalezas_debilidades') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="vision" class="form-label">¿Cuál es la visión de la empresa a mediano y largo plazo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="vision" name="vision" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->vision)?$marca->vision:old('vision') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores_principales" class="form-label">¿Quiénes son sus 3 competidores principales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores_principales" name="competidores_principales" placeholder="competidor #1, competidor #2, competidor #3...">{{ isset($marca->competidores_principales)?$marca->competidores_principales:old('competidores_principales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="motivo" class="form-label">¿Qué lo motivó a empezar este negocio / organización?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="motivo" name="motivo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->motivo)?$marca->motivo:old('motivo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Si tuviera que describir su empresa, en una palabra, ¿cuál sería? ¿por qué?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="descripcion" name="descripcion" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->descripcion)?$marca->descripcion:old('descripcion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="valores" class="form-label">¿Cuáles son los valores y/o pilares que definen su empresa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="valores" name="valores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->valores)?$marca->valores:old('valores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="asociacion" class="form-label">¿De qué forma NO desea que sea asociada su empresa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="asociacion" name="asociacion" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->asociacion)?$marca->asociacion:old('asociacion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="definicion_unapalabra" class="form-label">Si sus clientes tuvieran que describir su empresa, en una palabra, ¿cuál sería? ¿por qué?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="definicion_unapalabra" name="definicion_unapalabra" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->definicion_unapalabra)?$marca->definicion_unapalabra:old('definicion_unapalabra') }}</textarea>
                </div>

                <div class="row">
                    <label for="logotipo" class="form-label">¿Tiene un logotipo actualmente?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="logotipo" id="logotipo" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="elementos_logotipo" class="form-label">(Si la respuesta anterior es afirmativa) ¿Qué elementos de su logotipo anterior le gustaría conservar?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="elementos_logotipo" name="elementos_logotipo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->elementos_logotipo)?$marca->elementos_logotipo:old('elementos_logotipo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="rediseño_logo" class="form-label">¿Cuál es la razón de la modificación o rediseño de su logo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="rediseño_logo" name="rediseño_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->rediseño_logo)?$marca->rediseño_logo:old('rediseño_logo') }}</textarea>
                </div>

                <div class="row">
                    <label for="años_logo" class="form-label">¿Cuántos años tiene su logo actual?</label>
                    <div class="col-lg-3 mb-3">
                        <select name="años_logo" id="años_logo" class="form-select">
                            <option value="Menos de 1 año">Menos de 1 año</option>
                            <option value="1-3 años">1-3 años</option>
                            <option value="3-5 años">3-5 años</option>
                            <option value="5-10 años">5-10 años</option>
                            <option value="Más de 10 años">Más de 10 años</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="mision" class="form-label">¿Cuál es el posicionamiento o la misión de su empresa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="mision" name="mision" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->mision)?$marca->mision:old('mision') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="slogan" class="form-label">¿Su empresa tiene un lema o slogan que se debe incluir con el logo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="slogan" name="slogan" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->slogan)?$marca->slogan:old('slogan') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="reconocimiento" class="form-label">¿Con qué espera que sea conocida tu empresa o marca?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="reconocimiento" name="reconocimiento" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->reconocimiento)?$marca->reconocimiento:old('reconocimiento') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="reconocimiento_logotipo" class="form-label">¿Qué es lo que sus clientes reconocen primero cuando ven su logotipo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="reconocimiento_logotipo" name="reconocimiento_logotipo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->reconocimiento_logotipo)?$marca->reconocimiento_logotipo:old('reconocimiento_logotipo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="uso_colores" class="form-label">¿Por qué su empresa utiliza esos colores, fuentes, formas etc.? </label>
                    <textarea maxlength="500" rows="6" class="form-control" id="uso_colores" name="uso_colores" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->uso_colores)?$marca->uso_colores:old('uso_colores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="paletas" class="form-label">¿Qué paletas / gama de colores prefiere? ¿Por qué?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="paletas" name="paletas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->paletas)?$marca->paletas:old('paletas') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="uso_logotipo" class="form-label">¿Dónde se utilizará principalmente el logotipo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="uso_logotipo" name="uso_logotipo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->uso_logotipo)?$marca->uso_logotipo:old('uso_logotipo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="adicion_logo" class="form-label">¿Hay algún elemento que quiera que aparezca en el logo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="adicion_logo" name="adicion_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->adicion_logo)?$marca->adicion_logo:old('adicion_logo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="definicion_logotipo" class="form-label">En su opinión, ¿qué define un logotipo bien diseñado?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="definicion_logotipo" name="definicion_logotipo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->definicion_logotipo)?$marca->definicion_logotipo:old('definicion_logotipo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="preferencias_iconos" class="form-label">¿Cuál es su preferencia, en referencia a los iconos, tipografía, colores etc.?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="preferencias_iconos" name="preferencias_iconos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->preferencias_iconos)?$marca->preferencias_iconos:old('preferencias_iconos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="gustos_logo" class="form-label">¿Qué le gustaría que contenga su logo de forma mandatoria?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="gustos_logo" name="gustos_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->gustos_logo)?$marca->gustos_logo:old('gustos_logo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="restricciones_logo" class="form-label">¿Qué restricciones, en su caso, podría existir sobre el logo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="restricciones_logo" name="restricciones_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->restricciones_logo)?$marca->restricciones_logo:old('restricciones_logo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="aplicaciones_logo" class="form-label">¿Cuáles son las posibles aplicaciones en las que se utilizará este logo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="aplicaciones_logo" name="aplicaciones_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->aplicaciones_logo)?$marca->aplicaciones_logo:old('aplicaciones_logo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="referencias_logo" class="form-label">¿Qué referencias estéticas de logotipos tiene?  (Logotipos que son de su agrado)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="referencias_logo" name="referencias_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->referencias_logo)?$marca->referencias_logo:old('referencias_logo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="publico_objetivo" class="form-label">¿Quién es el público objetivo principal? (Describa brevemente el target de su marca?)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="publico_objetivo" name="publico_objetivo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->publico_objetivo)?$marca->publico_objetivo:old('publico_objetivo') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="utilizacion_producto" class="form-label">¿Quién utiliza actualmente el producto / servicio más?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="utilizacion_producto" name="utilizacion_producto" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->utilizacion_producto)?$marca->utilizacion_producto:old('utilizacion_producto') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="concentracion_producto" class="form-label">¿Cómo planea concentrarse en su público objetivo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="concentracion_producto" name="concentracion_producto" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->concentracion_producto)?$marca->concentracion_producto:old('concentracion_producto') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="formas_publicidad" class="form-label">¿Cuáles son sus principales formas de hacer publicidad?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="formas_publicidad" name="formas_publicidad" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->formas_publicidad)?$marca->formas_publicidad:old('formas_publicidad') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="conocer_empresa" class="form-label">¿Cómo se enteran la mayoría de sus clientes acerca de su empresa / servicio o producto?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="conocer_empresa" name="conocer_empresa" placeholder="Respuesta máxima de 500 caracteres">{{ isset($marca->conocer_empresa)?$marca->conocer_empresa:old('conocer_empresa') }}</textarea>
                </div>
                
                <div class="row">
                    <label for="ingresos_promedio_publico" class="form-label">¿Cuál es el nivel de ingresos promedio de su público objetivo?</label>
                    <div class="col-md-3 mb-5">
                        <input type="number" class="form-control" id="ingresos_promedio_publico" name="ingresos_promedio_publico" placeholder="Valor entero en USD">{{ isset($marca->ingresos_promedio_publico)?$marca->ingresos_promedio_publico:old('ingresos_promedio_publico') }}
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