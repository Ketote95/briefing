<!DOCTYPE html>
<html lang="es">
    {{-- head tag content --}}
    @include('layouts.head')

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
                    <a style="text-align: center" target="_blank" href="{{ url("/desarrollo/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('briefdesarrollo')}}" method="POST" class="p-5">
                {{-- Campos de nombre, tamaño y presencia --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <label for="empresa" class="form-label">Nombre <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($campaign->empresa)?$campaign->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
    
                    <div class="col-lg-4 mb-4">
                        <label for="tamaño" class="form-label">Tamaño de la empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="tamaño" name="tamaño" value="{{ isset($campaign->tamaño)?$campaign->tamaño:old('tamaño') }}" placeholder="Más de 50 empleados" required>
                    </div>
    
                    <div class="col-lg-4 mb-4">
                        <label for="presencia" class="form-label">Ciudades o países en los que tiene presencia <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="presencia" name="presencia" value="{{ isset($campaign->presencia)?$campaign->presencia:old('presencia') }}" placeholder="Toda latinoamérica" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <label for="inicio_desarrollo" class="form-label">Fecha tentativa de inicio del desarrollo del sitio web <span style="color: red;">*</span></label>
                        <select name="inicio_desarrollo" id="inicio_desarrollo" class="form-select">
                            <option value="En las próximas 3 semanas">En las próximas 3 semanas</option>
                            <option value="En las próximas 6 semanas">En las próximas 6 semanas</option>
                            <option value="Aún no hay fecha de inicio">Aún no hay fecha de inicio</option>
                        </select>
                    </div>
    
                    <div class="col-lg-6 mb-4">
                        <label for="tipo_desarrollo" class="form-label">Tipo de desarrollo <span style="color: red;">*</span></label>
                        <select name="tipo_desarrollo" id="tipo_desarrollo" class="form-select">
                            <option value="Creación de sitio web corporativo">Creación de sitio web corporativo</option>
                            <option value="Creación de landing page">Creación de landing page</option>
                            <option value="Creación de sistema intranet/extranet">Creación de sistema intranet/extranet</option>
                            <option value="Crear una tienda online eCommerce">Crear una tienda online eCommerce</option>
                        </select>
                    </div>
                </div>
                {{-- Fin de respuestas cortas --}}
                
                <div class="linea"></div>

                {{-- Sección de preguntas con respuestas largas --}}
                <div class="row">
                    <label for="año_diseño" class="form-label">¿En qué año se diseñó su sitio web actual?</label>
                    <div class="col-lg-2 mb-3">
                        <input type="number" class="form-control" id="año_diseño" name="año_diseño" placeholder="2020">{{ isset($campaign->año_diseño)?$campaign->año_diseño:old('año_diseño') }}
                    </div>
                </div>

                <div class="mb-3">
                    <label for="aspectos_positivos" class="form-label">¿Cuáles son los aspectos positivos de su sitio web actual?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="aspectos_positivos" name="aspectos_positivos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->aspectos_positivos)?$campaign->aspectos_positivos:old('aspectos_positivos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="aspectos_negativos" class="form-label">¿Cuáles son los aspectos negativos de su sitio web actual?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="aspectos_negativos" name="aspectos_negativos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->aspectos_negativos)?$campaign->aspectos_negativos:old('aspectos_negativos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="manual_identidad" class="form-label">¿Cuenta con un manual de identidad corporativa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="manual_identidad" name="manual_identidad" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->manual_identidad)?$campaign->manual_identidad:old('manual_identidad') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores" class="form-label">¿Quiénes son sus competidores?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores" name="competidores" placeholder="competidor #1, competidor #2, competidor #3...">{{ isset($campaign->competidores)?$campaign->competidores:old('competidores') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="sitios_inspiracion" class="form-label">Sitios web que consideren como inspiración para el diseño web (Sean o no del sector)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="sitios_inspiracion" name="sitios_inspiracion" placeholder="www.ejemplo-1.com, www.ejemplo-2.com, www.ejemplo-3.com">{{ isset($campaign->sitios_inspiracion)?$campaign->sitios_inspiracion:old('sitios_inspiracion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="estilo_sitio_web" class="form-label">Estilo que desea para la nueva imagen de su sitio web</label>
                    <select name="estilo_sitio_web" id="estilo_sitio_web" class="form-select">
                        <option value="Estilo natural">Estilo natural: colores claros, simple y sencilla</option>
                        <option value="Estilo tradicional">Estilo tradicional: colores tradicionales, cuadrada y muy exacta</option>
                        <option value="Estilo elegante">Estilo elegante: colores obscuros, bien proporcionada y poco texto</option>
                        <option value="Estilo romántico">Estilo romántico: colores pastel, un poco más libre en estructura</option>
                        <option value="Estilo seductor">Estilo seductor: colores cálidos</option>
                        <option value="Estilo creativo">Estilo creativo: colores adicionales a la paleta de color, con estructuras libres y diferentes</option>
                        <option value="Estilo dramático">Estilo dramático: colores fuertes y llamativos, sin temor al ridículo, simplemente impactar</option>
                    </select>
                </div>

                <div class="row">
                    <label for="fotos" class="form-label">¿Poseen fotografías propias para incluir en su sitio web?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="fotos" id="fotos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="plan_fotos" class="form-label">¿Desean adquirir fotografías de stock?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="plan_fotos" id="plan_fotos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="sesion_fotos" class="form-label">¿Existe el plan de desarrollar una sesión fotográfica / shooting?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="sesion_fotos" id="sesion_fotos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="imagenes_referenciales" class="form-label">¿Poseen imágenes referenciales para representar sus productos o servicios?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="imagenes_referenciales" id="imagenes_referenciales" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="videos" class="form-label">¿Poseen vídeos propios para incluir en su sitio web?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="videos" id="videos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="row">
                    <label for="videos_stock" class="form-label">¿Desean adquirir vídeos de stock?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="videos_stock" id="videos_stock" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="plan_videos" class="form-label">¿Existe el plan de desarrollar una producción audiovisual de su empresa?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="plan_videos" id="plan_videos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cambios_logo" class="form-label">¿El logo sufrirá cambios durante el desarrollo del sitio web?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="cambios_logo" name="cambios_logo" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->cambios_logo)?$campaign->cambios_logo:old('cambios_logo') }}</textarea>
                </div>

                <div class="row">
                    <label for="archivo_logo" class="form-label">¿Poseen el logo en alta calidad o poseen el archivo editable?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="archivo_logo" id="archivo_logo" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tipografia" class="form-label">¿Poseen una o varias tipografías específicas asociadas al logotipo o imagen corporativa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="tipografia" name="tipografia" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->tipografia)?$campaign->tipografia:old('tipografia') }}</textarea>
                </div>

                <div class="row">
                    <label for="archivos_tipografia" class="form-label">¿Poseen la fuente o archivos de las tipografías?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="archivos_tipografia" id="archivos_tipografia" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="paleta_colores" class="form-label">¿Cuentan con la paleta exacta de colores corporativos?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="paleta_colores" id="paleta_colores" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="cambios_colores" class="form-label">¿Habrá cambios en los colores corporativos durante el desarrollo del sitio web?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="cambios_colores" id="cambios_colores" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="contenido_web" class="form-label">¿Cuenta con el contenido que irá en el sitio web ya redactado en formato de texto (Word)?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="contenido_web" id="contenido_web" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="agencia_contenido" class="form-label">¿Requiere que la agencia desarrolle contenido?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="agencia_contenido" id="agencia_contenido" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="herramientas_web" class="form-label">¿Desea que su sitio web tenga alguna funcionalidad o herramienta en particular?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="herramientas_web" name="herramientas_web" placeholder="Asistente en línea, chatbot, botón de redireccionamiento WhatsApp...">{{ isset($campaign->herramientas_web)?$campaign->herramientas_web:old('herramientas_web') }}</textarea>
                </div>

                <div class="row">
                    <label for="sistemas_terceros" class="form-label">¿Tiene aplicaciones o sistemas de terceros que desee implementar?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="sistemas_terceros" id="sistemas_terceros" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="info_sistemas" class="form-label">En caso que la respuesta anterior sea afirmativa, requerimos que pueda brindarnos información acerca del nombre de la o las herramientas que desea integrar y una breve descripción de las mismas</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="info_sistemas" name="info_sistemas" placeholder="Respuesta máxima de 500 caracteres">{{ isset($campaign->info_sistemas)?$campaign->info_sistemas:old('info_sistemas') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="redes_sociales" class="form-label">Links de Redes Sociales y otras plataformas (Un enlace por línea)</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="redes_sociales" name="redes_sociales" placeholder="Facebook: https://facebook.com/mipágina">{{ isset($campaign->redes_sociales)?$campaign->redes_sociales:old('redes_sociales') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="estructura_web" class="form-label">¿Cuál es la estructura, categorías y subcategorías deseadas para su sitio web?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="estructura_web" name="estructura_web" placeholder="Ejemplo: Inicio, Quienes Somos, Productos, Contacto...">{{ isset($campaign->estructura_web)?$campaign->estructura_web:old('estructura_web') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="campos_formulario" class="form-label">Formularios: En caso de incluirse un formulario en el sitio web. ¿Qué campos requiere que tenga?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="campos_formulario" name="campos_formulario" placeholder="Ejemplo: Nombre, correo electrónico, celular...">{{ isset($campaign->campos_formulario)?$campaign->campos_formulario:old('campos_formulario') }}</textarea>
                </div>

                <div class="row">
                    <label for="correo_formularios" class="form-label">¿A qué dirección de correo electrónico desea que lleguen estos formularios?</label>
                    <div class="col-lg-3 mb-3">
                        <input type="email" class="form-control" id="correo_formularios" name="correo_formularios" placeholder="correo@dominio.com">{{ isset($campaign->correo_formularios)?$campaign->correo_formularios:old('correo_formularios') }}
                    </div>
                </div>

                <div class="row">
                    <label for="dominio-web" class="form-label">¿Cuenta con un dominio.com para su sitio web?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="dominio_web" id="dominio_web" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="compra_dominio" class="form-label">En caso que la respuesta anterior sea negativa, ¿Desea que realicemos la compra de algún dominio? En caso de ser así, por favor especifiquemos el nombre para el dominio</label>
                    <div class="col-lg-2 mb-3">
                        <select name="compra_dominio" id="compra_dominio" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="credenciales_dominio" class="form-label">Si la respuesta es positiva, ¿Cuáles serían las credenciales de acceso a su dominio?</label>
                    <textarea maxlength="100" rows="2" class="form-control" id="credenciales_dominio" name="credenciales_dominio" placeholder="Usuario: admin / Contraseña: admin">{{ isset($campaign->credenciales_dominio)?$campaign->credenciales_dominio:old('credenciales_dominio') }}</textarea>
                </div>

                <div class="row">
                    <label for="hosting" class="form-label">¿Cuenta ya con un servicio de web hosting contratado para  su sitio web?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="hosting" id="hosting" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="compra_hosting" class="form-label">En caso que la respuesta anterior sea negativa, ¿Desea que realicemos la suscripción de algún servicio de web hosting?</label>
                    <div class="col-lg-2 mb-3">
                        <select name="compra_hosting" id="compra_hosting" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="credenciales_hosting" class="form-label">Si la respuesta es positiva, ¿Cuáles serían las credenciales de acceso a su servidor?</label>
                    <textarea maxlength="100" rows="2" class="form-control" id="credenciales_hosting" name="credenciales_hosting" placeholder="Usuario: admin / Contraseña: admin">{{ isset($campaign->credenciales_hosting)?$campaign->credenciales_hosting:old('credenciales_hosting') }}</textarea>
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