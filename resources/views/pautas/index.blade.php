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
                    <h1 class="text-center title-brief" >Brief publicitario para evaluación de costos de pauta</h1>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/publicitario/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <form action="{{url('brief_publicitario')}}" method="POST" class="p-5">
                {{-- Campos de información general --}}
                @csrf
                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="empresa" class="form-label">Empresa <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{ isset($pautas->empresa)?$pautas->empresa:old('empresa') }}" placeholder="Nombre de la empresa" required>
                    </div>
                    
                    <div class="col-lg-4 mb-2">
                        <label for="marca" class="form-label">Marca <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="marca" name="marca" value="{{ isset($pautas->marca)?$pautas->marca:old('marca') }}" placeholder="Nombre de la marca" required>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <label for="industria" class="form-label">Industria <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" id="industria" name="industria" value="{{ isset($pautas->industria)?$pautas->industria:old('industria') }}" placeholder="Rubro" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 mb-2">
                        <label for="servicios" class="form-label">Productos o servicios principales</label>
                        <input type="text" class="form-control" id="servicios" name="servicios" value="{{ isset($pautas->servicios)?$pautas->servicios:old('servicios') }}" placeholder="Productos o servicios">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="presencia_actual" class="form-label">Presencia digital actual</label>
                        <input type="text" class="form-control" id="presencia_actual" name="presencia_actual" value="{{ isset($pautas->presencia_actual)?$pautas->presencia_actual:old('presencia_actual') }}" placeholder="Ej: Facebook, Instagram, TikTok, etc.">
                    </div>
    
                    <div class="col-lg-4 mb-2">
                        <label for="competidores" class="form-label">Principales competidores</label>
                        <input type="text" class="form-control" id="competidores" name="competidores" value="{{ isset($pautas->competidores)?$pautas->competidores:old('competidores') }}" placeholder="Citar competidores">
                    </div>
                </div>                           
                
                {{-- Apartado de contacto --}}
                <div class="row mb-3">
                    <label for="contacto" class="form-label">Datos de contacto <span style="color: red;">*</span></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="{{ isset($pautas->nombre_contacto)?$pautas->nombre_contacto:old('nombre_contacto') }}" placeholder="Nombre completo" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <input type="email" class="form-control" id="correo_contacto" name="correo_contacto" value="{{ isset($pautas->correo_contacto)?$pautas->correo_contacto:old('correo_contacto') }}" placeholder="correo@dominio.com" required>
                    </div>    
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="puesto_contacto" name="puesto_contacto" value="{{ isset($pautas->puesto_contacto)?$pautas->puesto_contacto:old('puesto_contacto') }}" placeholder="Cargo del contacto" required>
                    </div>
                    
                    <div class="col-lg-6">
                        <input type="number" class="form-control" id="telefono_contacto" name="telefono_contacto" value="{{ isset($pautas->telefono_contacto)?$pautas->telefono_contacto:old('telefono_contacto') }}" placeholder="Número de teléfono" required>
                    </div>                    
                </div>
                {{-- Fin de campos de texto cortos --}}
                
                <div class="linea"></div>

                {{-- Sección de preguntas con Textarea --}}
                {{-- Objetivos de la campaña --}}
                <h2 class="subtitle">Objetivos de campaña y contenido</h2>

                <div class="mb-3">
                    <label for="objetivo_general" class="form-label">Objetivo general de la campaña</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivo_general" name="objetivo_general" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->objetivo_general)?$pautas->objetivo_general:old('objetivo_general') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="objetivos_especificos" class="form-label">Objetivos específicos/cuantificables de la campaña</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="objetivos_especificos" name="objetivos_especificos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->objetivos_especificos)?$pautas->objetivos_especificos:old('objetivos_especificos') }}</textarea>
                </div>

                {{-- Segmentación de audiencia --}}
                <h2 class="subtitle">Segmentación de audiencia</h2>

                {{-- Edades --}}
                <div class="mb-3">
                    <label for="edades" class="form-label">Rangos de edad</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="13-17">
                        <label for="13-17" class="form-check-label">13-17</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="18-24">
                        <label for="18-24" class="form-check-label">18-24</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="25-34">
                        <label for="25-34" class="form-check-label">25-34</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="35-44">
                        <label for="35-44" class="form-check-label">35-44</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="45-54">
                        <label for="45-54" class="form-check-label">45-54</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value="55-64">
                        <label for="55-64" class="form-check-label">55-64</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="edades[]" value=">65">
                        <label for=">65" class="form-check-label">>65</label>
                    </div>
                </div>

                {{-- Género --}}
                <div class="mb-3">
                    <label for="genero" class="form-label">Género</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="hombres" name="genero[]" value="Hombres">
                        <label for="hombres" class="form-check-label">Hombres</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mujeres" name="genero[]" value="Mujeres">
                        <label for="mujeres" class="form-check-label">Mujeres</label>
                    </div>
                </div>

                {{-- Ubicación --}}
                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="santa_cruz" name="ubicacion[]" value="Santa Cruz">
                        <label for="santa_cruz" class="form-check-label">Santa Cruz</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="la_paz" name="ubicacion[]" value="La Paz">
                        <label for="la_paz" class="form-check-label">La Paz</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="cochabamba" name="ubicacion[]" value="Cochabamba">
                        <label for="cochabamba" class="form-check-label">Cochabamba</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="pando" name="ubicacion[]" value="Pando">
                        <label for="pando" class="form-check-label">Pando</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="beni" name="ubicacion[]" value="Beni">
                        <label for="beni" class="form-check-label">Beni</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="chuquisaca" name="ubicacion[]" value="Chuquisaca">
                        <label for="chuquisaca" class="form-check-label">Chuquisaca</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="oruro" name="ubicacion[]" value="Oruro">
                        <label for="oruro" class="form-check-label">Oruro</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tarija" name="ubicacion[]" value="Tarija">
                        <label for="tarija" class="form-check-label">Tarija</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="potosi" name="ubicacion[]" value="Potosí">
                        <label for="potosi" class="form-check-label">Potosí</label>
                    </div>
                </div>

                {{-- Nivel socioeconomico --}}
                <div class="mb-3">
                    <label for="nivel_socioeconomico" class="form-label">Nivel Socioeconómico</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="alto" name="nivel_socioeconomico[]" value="Alto">
                        <label for="alto" class="form-check-label">Alto</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medio_alto" name="nivel_socioeconomico[]" value="Medio alto">
                        <label for="medio_alto" class="form-check-label">Medio alto</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="medio" name="nivel_socioeconomico[]" value="Medio">
                        <label for="medio" class="form-check-label">Medio</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="bajo" name="nivel_socioeconomico[]" value="Bajo">
                        <label for="bajo" class="form-check-label">Bajo</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="intereses_especificos" class="form-label">¿Cuáles son los interes específicos del segmento?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="intereses_especificos" name="intereses_especificos" placeholder="(Ej. Historia, servicios, trayectoria, productos, equipo de trabajo, valores, etc.)">{{ isset($pautas->intereses_especificos)?$pautas->intereses_especificos:old('intereses_especificos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="comportamiento_compra" class="form-label">¿Cuál es el comportamiento de compra del segmento?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="comportamiento_compra" name="comportamiento_compra" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->comportamiento_compra)?$pautas->comportamiento_compra:old('comportamiento_compra') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="habitos_digitales" class="form-label">¿Cuáles son los hábitos digitales del segmento?</label><span> (plataformas favoritas, tiempo de uso, etc.)</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="habitos_digitales" name="habitos_digitales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->habitos_digitales)?$pautas->habitos_digitales:old('habitos_digitales') }}</textarea>
                </div>

                {{-- Bases de datos propias --}}
                <div class="mb-3">
                    <label for="bases_datos" class="form-label">¿Cuentas con bases de datos propias?</label><span> (CRM, ERP, emails, etc.)</span>
                    <div class="col-lg-1">
                        <select name="bases_datos" id="bases_datos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                {{-- Canales y plataformas --}}
                <h2 class="subtitle">Canales y plataformas</h2>

                {{-- Plataformas digitales elegidas --}}
                <div class="mb-3">
                    <label for="plataformas" class="form-label">Plataformas digitales elegidas para la campaña</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="facebook" name="plataformas[]" value="Facebook">
                        <label for="facebook" class="form-check-label">Facebook</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="instagram" name="plataformas[]" value="Instagram">
                        <label for="instagram" class="form-check-label">Instagram</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="google" name="plataformas[]" value="Google">
                        <label for="google" class="form-check-label">Google</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="youtube" name="plataformas[]" value="YouTube">
                        <label for="youtube" class="form-check-label">YouTube</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiktok" name="plataformas[]" value="TikTok">
                        <label for="tiktok" class="form-check-label">TikTok</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="spotify" name="plataformas[]" value="Spotify">
                        <label for="spotify" class="form-check-label">Spotify</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="linkedin" name="plataformas[]" value="LinkedIn">
                        <label for="linkedin" class="form-check-label">LinkedIn</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_plataformas" name="plataformas[]" value="">
                        <label for="otras_plataformas" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otras_plataformas" class="col-lg-4" style="display: none;">
                        <input id="input_otras_plataformas" type="text" class="form-control" name="" placeholder="Especifique los canales">
                    </div>
                </div>

                {{-- Pauta digital --}}
                <div class="mb-3">
                    <label for="pauta_digital" class="form-label">¿Han trabajado con pauta digital antes?</label>
                    <div class="col-lg-1">
                        <select name="pauta_digital" id="pauta_digital" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                {{-- Plataformas digitales con mejores resultados --}}
                <div class="mb-3">
                    <label for="mejores_plataformas" class="form-label">¿Qué plataformas les han dado mejores resultados?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="facebook" name="mejores_plataformas[]" value="Facebook">
                        <label for="facebook" class="form-check-label">Facebook</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="instagram" name="mejores_plataformas[]" value="Instagram">
                        <label for="instagram" class="form-check-label">Instagram</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="google" name="mejores_plataformas[]" value="Google">
                        <label for="google" class="form-check-label">Google</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="youtube" name="mejores_plataformas[]" value="YouTube">
                        <label for="youtube" class="form-check-label">YouTube</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="tiktok" name="mejores_plataformas[]" value="TikTok">
                        <label for="tiktok" class="form-check-label">TikTok</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="spotify" name="mejores_plataformas[]" value="Spotify">
                        <label for="spotify" class="form-check-label">Spotify</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="linkedin" name="mejores_plataformas[]" value="LinkedIn">
                        <label for="linkedin" class="form-check-label">LinkedIn</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otras_plataformas_mejores" name="mejores_plataformas[]" value="">
                        <label for="otras_plataformas_mejores" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otras_plataformas_mejores" class="col-lg-4" style="display: none;">
                        <input id="input_otras_plataformas_mejores" type="text" class="form-control" name="" placeholder="Especifique los canales">
                    </div>
                </div>

                {{-- Análisis de compra e industria --}}
                <h2 class="subtitle">Análisis de compra e industria</h2>

                <div class="mb-3">
                    <label for="ciclo_compra" class="form-label">¿Es una compra inmediata, por impulso o requiere investigación previa?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="ciclo_compra" name="ciclo_compra" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->ciclo_compra)?$pautas->ciclo_compra:old('ciclo_compra') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="habito_compra" class="form-label">¿Es compra única o rutinaria? Especifique el ciclo y hábito de compra</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="habito_compra" name="habito_compra" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->habito_compra)?$pautas->habito_compra:old('habito_compra') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="cambios_recientes" class="form-label">¿Qué cambios recientes están afectando la industria?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="cambios_recientes" name="cambios_recientes" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->cambios_recientes)?$pautas->cambios_recientes:old('cambios_recientes') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="competidores_directos" class="form-label">¿Quienes son sus competidores directos?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores_directos" name="competidores_directos" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->competidores_directos)?$pautas->competidores_directos:old('competidores_directos') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="competidores_indirectos" class="form-label">¿Quienes son sus competidores indirectos?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="competidores_indirectos" name="competidores_indirectos" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->competidores_indirectos)?$pautas->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="alta_baja_competencia" class="form-label">¿Es una industria de alta o baja competencia en plataformas digitales?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="alta_baja_competencia" name="alta_baja_competencia" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->alta_baja_competencia)?$pautas->alta_baja_competencia:old('alta_baja_competencia') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="temporada_clave" class="form-label">¿La campaña coincide con una temporada clave?</label><span> (Black Friday, Navidad, etc.)</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="temporada_clave" name="temporada_clave" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->temporada_clave)?$pautas->temporada_clave:old('temporada_clave') }}</textarea>
                </div>

                {{-- Presupuesto y recursos --}}
                <h2 class="subtitle">Presupuesto y recursos</h2>

                <div class="row">
                    <label for="presupuesto_disponible" class="form-label">Presupuesto disponible para la campaña</label>
                    <div class="col-lg-3 mb-2">
                        <input type="number" class="form-control" id="presupuesto_disponible" name="presupuesto_disponible" value="{{ isset($comunicacion->presupuesto_disponible)?$comunicacion->presupuesto_disponible:old('presupuesto_disponible') }}" placeholder="Valor númerico">
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

                <div class="mb-3">
                    <label for="distribucion_presupuesto" class="form-label">En caso de ser requerido distribuir el presupuesto en diferentes plataformas, ¿Cuáles serían estas?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="distribucion_presupuesto" name="distribucion_presupuesto" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->distribucion_presupuesto)?$pautas->distribucion_presupuesto:old('distribucion_presupuesto') }}</textarea>
                </div>

                {{-- Recursos creativos --}}
                <div class="mb-3">
                    <label for="recursos_creativos" class="form-label">¿Tiene listos los recursos creativos para la campaña?</label>
                    <div class="col-lg-1">
                        <select name="recursos_creativos" id="recursos_creativos" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                {{-- Desarrollar materiales creativos --}}
                <div class="mb-3">
                    <label for="desarrollar_materiales" class="form-label">¿Requiere que desarrollemos los materiales creativos de la campaña?</label>
                    <div class="col-lg-1">
                        <select name="desarrollar_materiales" id="desarrollar_materiales" class="form-select">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>

                {{-- Formatos para la campaña --}}
                <div class="mb-3">
                    <label for="formatos_campaña" class="form-label">¿Qué formatos se utilizarán para la campaña?</label><span> (Marque todas las requeridas)</span>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="imagenes_estaticas" name="formatos_campaña[]" value="Imágenes estáticas">
                        <label for="imagenes_estaticas" class="form-check-label">Imágenes estáticas</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="videos" name="formatos_campaña[]" value="Videos">
                        <label for="videos" class="form-check-label">Videos</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="carruseles" name="formatos_campaña[]" value="Carruseles">
                        <label for="carruseles" class="form-check-label">Carruseles</label>
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="reels" name="formatos_campaña[]" value="Reels">
                        <label for="reels" class="form-check-label">Reels</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="anuncios_busqueda" name="formatos_campaña[]" value="Anuncios de Búsqueda">
                        <label for="anuncios_busqueda" class="form-check-label">Anuncios de Búsqueda</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="otros_formatos_campaña" name="formatos_campaña[]" value="">
                        <label for="otros_formatos_campaña" class="form-check-label">Otros</label>
                    </div>

                    <div id="text_otros_formatos_campaña" class="col-lg-4" style="display: none;">
                        <input id="input_otros_formatos_campaña" type="text" class="form-control" name="" placeholder="Especifique los canales">
                    </div>
                </div>

                {{-- Expectativas del cliente --}}
                <h2 class="subtitle">Expectativas del cliente</h2>

                <div class="mb-3">
                    <label for="indicadores_exito" class="form-label">¿Qué indicadores definirán el éxito de la campaña?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="indicadores_exito" name="indicadores_exito" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->indicadores_exito)?$pautas->indicadores_exito:old('indicadores_exito') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="resultados_positivos" class="form-label">¿Qué resultados considerarían positivos?</label><span> (Ejemplo: X cantidad de visitas, X cantidad de personas impactadas)</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="resultados_positivos" name="resultados_positivos" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->resultados_positivos)?$pautas->resultados_positivos:old('resultados_positivos') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="resultados_inmediatos" class="form-label">¿Esperan resultados inmediatos o están dispuestos a invertir a mediano/largo plazo?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="resultados_inmediatos" name="resultados_inmediatos" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->resultados_inmediatos)?$pautas->resultados_inmediatos:old('resultados_inmediatos') }}</textarea>
                </div>

                {{-- Factores externos --}}
                <h2 class="subtitle">Factores externos</h2>

                <div class="mb-3">
                    <label for="restricciones" class="form-label">¿Existen restricciones en la publicidad de la industria?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="restricciones" name="restricciones" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->restricciones)?$pautas->restricciones:old('restricciones') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="vinculacion_campaña" class="form-label">¿La campaña está vinculada a un evento, lanzamiento o fecha importante?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="vinculacion_campaña" name="vinculacion_campaña" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->vinculacion_campaña)?$pautas->vinculacion_campaña:old('vinculacion_campaña') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="condiciones_externas" class="form-label">¿Hay condiciones externas (inflación, crisis, etc.) que puedan influir en el comportamiento del consumidor?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="condiciones_externas" name="condiciones_externas" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->condiciones_externas)?$pautas->condiciones_externas:old('condiciones_externas') }}</textarea>
                </div>

                {{-- Propuesta de valor de marca --}}
                <h2 class="subtitle">Propuesta de valor de marca</h2>

                <div class="mb-3">
                    <label for="producto_unico" class="form-label">¿Qué hace único a su producto?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="producto_unico" name="producto_unico" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->producto_unico)?$pautas->producto_unico:old('producto_unico') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="mensaje_principal" class="form-label">¿Cuál es el mensaje principal que quieren transmitir?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="mensaje_principal" name="mensaje_principal" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->mensaje_principal)?$pautas->mensaje_principal:old('mensaje_principal') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tono_preferido" class="form-label">¿Cuál es el tono preferido?</label><span> (formal, emocional, humorístico)</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="tono_preferido" name="tono_preferido" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->tono_preferido)?$pautas->tono_preferido:old('tono_preferido') }}</textarea>
                </div>

                {{-- Criterios de evaluación --}}
                <h2 class="subtitle">Criterios de evaluación</h2>

                <div class="mb-3">
                    <label for="indicadores_kpis" class="form-label">¿Qué indicadores (KPIS) se determinarán para evaluar el éxito de la campaña?</label>
                    <textarea maxlength="500" rows="6" class="form-control" id="indicadores_kpis" name="indicadores_kpis" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->indicadores_kpis)?$pautas->indicadores_kpis:old('indicadores_kpis') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="resultados_concretos" class="form-label">¿Qué resultados concretos les gustaría alcanzar al finalizar la campaña?</label><span> (Ejemplo: X cantidad de visitas, X cantidad de personas impactadas)</span>
                    <textarea maxlength="500" rows="6" class="form-control" id="resultados_concretos" name="resultados_concretos" placeholder="Proporcione enlaces o descripciones">{{ isset($pautas->resultados_concretos)?$pautas->resultados_concretos:old('resultados_concretos') }}</textarea>
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