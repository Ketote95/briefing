<!DOCTYPE html>
<html lang="es">
    {{-- head tag content --}}
    @include('layouts.head')

    {{-- main content --}}
    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Brief de Pauta<br>por Objetivos</h1>
                </div>
            </div>  

            <div style="text-align: justify" class="alert alert-light mx-5 mb-2 justify-content" role="alert">
                Estimado partner: <br>
                <br>
                Si llegaste hasta aquí, es porque has decidido depositar tu confianza en nuestro equipo y para nosotros eso representa un gran valor y compromiso de éxito.<br>
                <br>
                El propósito de las siguientes preguntas es obtener la mayor cantidad de información referente a tu marca, objetivos y necesidades; permitiéndonos de esta manera, planificar y articular acciones que generen resultados.<br>
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
                    <a style="text-align: center" target="_blank" href="{{ url("/pauta/pdf/") }}" class="alert-link">Descargar PDF</a>
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

            <div class="nav nav-fill px-5 py-2">
                <label style="color: #2F277A" class="nav-link shadow-sm step0">Paso 1</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step1">Paso 2</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step2">Paso 3</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step3">Paso 4</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step4">Paso 5</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step5">Paso 6</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step6">Paso 7</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step7">Paso 8</label>
                <label style="color: #2F277A" class="nav-link shadow-sm step8">Paso 9</label>
            </div>

            <form class="formulario-pautas p-5" action="{{url('brief_pauta_objetivos')}}" method="POST">
                {{-- Campos de información general --}}
                @csrf
                <div class="form-section">
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
                            <label for="servicios" class="form-label">Productos o servicios principales <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="servicios" name="servicios" value="{{ isset($pautas->servicios)?$pautas->servicios:old('servicios') }}" placeholder="Productos o servicios" required>
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="presencia_actual" class="form-label">Presencia digital actual <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="presencia_actual" name="presencia_actual" value="{{ isset($pautas->presencia_actual)?$pautas->presencia_actual:old('presencia_actual') }}" placeholder="Ej: Facebook, Instagram, TikTok, etc." required>
                        </div>
        
                        <div class="col-lg-4 mb-2">
                            <label for="competidores" class="form-label">Principales competidores <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="competidores" name="competidores" value="{{ isset($pautas->competidores)?$pautas->competidores:old('competidores') }}" placeholder="Citar competidores" required>
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
                </div>
                
                <div class="form-section">
                    {{-- Sección de preguntas con Textarea --}}
                    {{-- Objetivos de la campaña --}}
                    <h2 class="subtitle">Objetivos de campaña y contenido</h2>
    
                    <div class="mb-3">
                        <label for="objetivo_general" class="form-label">Objetivo general de la campaña <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="objetivo_general" name="objetivo_general" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->objetivo_general)?$pautas->objetivo_general:old('objetivo_general') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="objetivos_especificos" class="form-label">Objetivos específicos/cuantificables de la campaña <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="objetivos_especificos" name="objetivos_especificos" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->objetivos_especificos)?$pautas->objetivos_especificos:old('objetivos_especificos') }}</textarea>
                    </div>
                </div>

                <div class="form-section">
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
                        <label for="intereses_especificos" class="form-label">¿Cuáles son los intereses específicos del segmento? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="intereses_especificos" name="intereses_especificos" placeholder="Hábitos, costumbres, preferencias, ciclo de vida, gustos, etc.">{{ isset($pautas->intereses_especificos)?$pautas->intereses_especificos:old('intereses_especificos') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="comportamiento_compra" class="form-label">¿Cuál es el comportamiento de compra del segmento? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="comportamiento_compra" name="comportamiento_compra" placeholder="Defina cómo adquiere sus productos o servicios.">{{ isset($pautas->comportamiento_compra)?$pautas->comportamiento_compra:old('comportamiento_compra') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="habitos_digitales" class="form-label">¿Cuáles son los hábitos digitales del segmento? <span style="color: red;">*</span></label><span> (plataformas favoritas, tiempo de uso, etc.)</span>
                        <textarea required maxlength="500" rows="6" class="form-control" id="habitos_digitales" name="habitos_digitales" placeholder="Respuesta máxima de 500 caracteres">{{ isset($pautas->habitos_digitales)?$pautas->habitos_digitales:old('habitos_digitales') }}</textarea>
                    </div>
    
                    {{-- Bases de datos propias --}}
                    <div class="mb-3">
                        <label for="bases_datos" class="form-label">¿Cuentan con bases de datos propias?</label><span> (CRM, ERP, emails, etc.)</span>
                        <div class="col-lg-1">
                            <select name="bases_datos" id="bases_datos" class="form-select">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-section">
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
                            <input class="form-check-input" type="checkbox" id="otras_plataformas" name="plataformas[]" value="">
                            <label for="otras_plataformas" class="form-check-label">Otros</label>
                        </div>
    
                        <div id="text_otras_plataformas" class="col-lg-4" style="display: none;">
                            <input id="input_otras_plataformas" type="text" class="form-control" name="" placeholder="Especificar las plataformas">
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
                            <input id="input_otras_plataformas_mejores" type="text" class="form-control" name="" placeholder="Especificar las plataformas">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    {{-- Análisis de compra e industria --}}
                    <h2 class="subtitle">Análisis de compra e industria</h2>
    
                    <div class="mb-3">
                        <label for="ciclo_compra" class="form-label">¿Es una compra inmediata, por impulso o requiere investigación previa? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="ciclo_compra" name="ciclo_compra" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->ciclo_compra)?$pautas->ciclo_compra:old('ciclo_compra') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="habito_compra" class="form-label">¿Es compra única o rutinaria? Especifique el ciclo y hábito de compra <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="habito_compra" name="habito_compra" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->habito_compra)?$pautas->habito_compra:old('habito_compra') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="cambios_recientes" class="form-label">¿Qué cambios recientes están afectando la industria? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="cambios_recientes" name="cambios_recientes" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->cambios_recientes)?$pautas->cambios_recientes:old('cambios_recientes') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="competidores_directos" class="form-label">¿Quiénes son sus competidores directos? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="competidores_directos" name="competidores_directos" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->competidores_directos)?$pautas->competidores_directos:old('competidores_directos') }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="competidores_indirectos" class="form-label">¿Quiénes son sus competidores indirectos? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="competidores_indirectos" name="competidores_indirectos" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->competidores_indirectos)?$pautas->competidores_indirectos:old('competidores_indirectos') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="alta_baja_competencia" class="form-label">¿Es una industria de alta o baja competencia en plataformas digitales? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="alta_baja_competencia" name="alta_baja_competencia" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->alta_baja_competencia)?$pautas->alta_baja_competencia:old('alta_baja_competencia') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="temporada_clave" class="form-label">¿La campaña coincide con una temporada clave?</label><span> (Black Friday, Navidad, etc.)</span> <span style="color: red;">*</span>
                        <textarea required maxlength="500" rows="6" class="form-control" id="temporada_clave" name="temporada_clave" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->temporada_clave)?$pautas->temporada_clave:old('temporada_clave') }}</textarea>
                    </div>
                </div>

                <div class="form-section">
                    {{-- Presupuesto y recursos --}}
                    <h2 class="subtitle">Presupuesto y recursos</h2>
    
                    <div class="row">
                        <label for="presupuesto_disponible" class="form-label">Presupuesto disponible para la campaña <span style="color: red;">*</span></label>
                        <div class="col-lg-3 mb-2">
                            <input type="number" class="form-control" id="presupuesto_disponible" name="presupuesto_disponible" value="{{ isset($comunicacion->presupuesto_disponible)?$comunicacion->presupuesto_disponible:old('presupuesto_disponible') }}" placeholder="Valor númerico" required>
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
                        <label for="fecha_inicio" class="form-label">Fecha de inicio </label><span style="color: red;">* Campo obligatorio. En caso de no tener fecha definidas, puede colocar plazos tentativos o fechas ficticias</span>
                        <div class="col-lg-3">
                            <input type="date" min="{{ date('Y-m-d') }}" name="fecha_inicio" id="fecha_inicio" class="form-control" title="En caso de no tener fechas definidas, puede colocar plazos tentativos o fechas ficticias" required>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de fin </label><span style="color: red;">* Campo obligatorio. En caso de no tener fecha definidas, puede colocar plazos tentativos o fechas ficticias</span>
                        <div class="col-lg-3">
                            <input type="date" min="{{ date('Y-m-d') }}" name="fecha_fin" id="fecha_fin" class="form-control" title="En caso de no tener fechas definidas, puede colocar plazos tentativos o fechas ficticias" required>
                        </div>
                    </div>
    
                    <div class="mb-3">
                        <label for="distribucion_presupuesto" class="form-label">En caso de ser requerido distribuir el presupuesto en diferentes plataformas, ¿Cuáles serían estas? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="distribucion_presupuesto" name="distribucion_presupuesto" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->distribucion_presupuesto)?$pautas->distribucion_presupuesto:old('distribucion_presupuesto') }}</textarea>
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
                            <input id="input_otros_formatos_campaña" type="text" class="form-control" name="" placeholder="Especificar los formatos">
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    {{-- Factores externos --}}
                    <h2 class="subtitle">Factores externos</h2>
    
                    <div class="mb-3">
                        <label for="restricciones" class="form-label">¿Existen restricciones en la publicidad de la industria? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="restricciones" name="restricciones" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->restricciones)?$pautas->restricciones:old('restricciones') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="vinculacion_campaña" class="form-label">¿La campaña está vinculada a un evento, lanzamiento o fecha importante? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="vinculacion_campaña" name="vinculacion_campaña" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->vinculacion_campaña)?$pautas->vinculacion_campaña:old('vinculacion_campaña') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="condiciones_externas" class="form-label">¿Hay condiciones externas (inflación, crisis, etc.) que puedan influir en el comportamiento del consumidor? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="condiciones_externas" name="condiciones_externas" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->condiciones_externas)?$pautas->condiciones_externas:old('condiciones_externas') }}</textarea>
                    </div>
                </div>

                <div class="form-section">
                    {{-- Propuesta de valor de marca --}}
                    <h2 class="subtitle">Propuesta de valor de marca</h2>
    
                    <div class="mb-3">
                        <label for="producto_unico" class="form-label">¿Qué hace único a su producto? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="producto_unico" name="producto_unico" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->producto_unico)?$pautas->producto_unico:old('producto_unico') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="mensaje_principal" class="form-label">¿Cuál es el mensaje principal que quieren transmitir? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="mensaje_principal" name="mensaje_principal" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->mensaje_principal)?$pautas->mensaje_principal:old('mensaje_principal') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="tono_preferido" class="form-label">¿Cuál es el tono preferido?</label><span> (formal, emocional, humorístico)</span> <span style="color: red;">*</span>
                        <textarea required maxlength="500" rows="6" class="form-control" id="tono_preferido" name="tono_preferido" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->tono_preferido)?$pautas->tono_preferido:old('tono_preferido') }}</textarea>
                    </div>
                </div>

                <div class="form-section">
                    {{-- Criterios de evaluación --}}
                    <h2 class="subtitle">Criterios de evaluación</h2>
    
                    <div class="mb-3">
                        <label for="indicadores_kpis" class="form-label">¿Qué indicadores (KPIS) se determinarán para evaluar el éxito de la campaña? <span style="color: red;">*</span></label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="indicadores_kpis" name="indicadores_kpis" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->indicadores_kpis)?$pautas->indicadores_kpis:old('indicadores_kpis') }}</textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="resultados_concretos" class="form-label">¿Qué resultados concretos les gustaría alcanzar al finalizar la campaña?</label><span> (Ejemplo: X cantidad de visitas, X cantidad de personas impactadas)</span> <span style="color: red;">*</span>
                        <textarea required maxlength="500" rows="6" class="form-control" id="resultados_concretos" name="resultados_concretos" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->resultados_concretos)?$pautas->resultados_concretos:old('resultados_concretos') }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="info_adicional" class="form-label">Información adicional</label>
                        <textarea required maxlength="500" rows="6" class="form-control" id="info_adicional" name="info_adicional" placeholder="Respuesta Máxima de 500 caracteres">{{ isset($pautas->info_adicional)?$pautas->info_adicional:old('info_adicional') }}</textarea>
                    </div>
                </div>

                <div class="linea"></div>

                <div class="form-navigation d-flex flex-row-reverse justify-content-between mb-3">
                    <input id="btnAudiovisual" type="submit" class="btn btn-primary" value="Enviar Brief">
                    <span id="btnSiguiente" class="next btn btn-primary">Siguiente</span>
                    <span id="btnAnterior" class="previous btn btn-primary">Anterior</span>
                </div>
            </form>
        </div>
        
        <button id="Top" onclick="topFunction()"><i class="fa-solid fa-arrow-up fa-fade"></i></button>

        {{-- Bootstrap 5 scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Script para hacer uso de FontAwesome --}}
        <script src="https://kit.fontawesome.com/0b7cc019fd.js" crossorigin="anonymous"></script>

        {{-- Parsley js code --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" src="{{ URL::asset('js/es.js') }}"></script>

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

            // Mostrar input text para los checkboxes
            $("input[type='checkbox']").on("change", function(){
                // Para las plataformas digitales elegidas
                if($('#otras_plataformas').is(':checked')){
                    $("#text_otras_plataformas").slideDown();
                } else {
                    $("#text_otras_plataformas").slideUp();
                }
                $("#input_otras_plataformas").change(function(){
                    $("#otras_plataformas").val($(this).val());
                });

                // Para las plataformas que han dado mejores resultados
                if($('#otras_plataformas_mejores').is(':checked')){
                    $("#text_otras_plataformas_mejores").slideDown();
                } else {
                    $("#text_otras_plataformas_mejores").slideUp();
                }
                $("#input_otras_plataformas_mejores").change(function(){
                    $("#otras_plataformas_mejores").val($(this).val());
                });

                // Para los otros formatos de la campaña
                if($('#otros_formatos_campaña').is(':checked')){
                    $("#text_otros_formatos_campaña").slideDown();
                } else {
                    $("#text_otros_formatos_campaña").slideUp();
                }
                $("#input_otros_formatos_campaña").change(function(){
                    $("#otros_formatos_campaña").val($(this).val());
                });
            });

            // Formulario multipasos de laravel
            var $sections=$('.form-section');

            function navigateTo(index){
                $sections.removeClass('current').eq(index).addClass('current');

                $('.form-navigation .previous').toggle(index>0);
                var atTheEnd = index >= $sections.length - 1;
                $('.form-navigation .next').toggle(!atTheEnd);
                $('.form-navigation [type="submit"]').toggle(atTheEnd);

                const step = document.querySelector('.step'+index);
                step.style.backgroundColor = '#2F277A';
                step.style.color = 'white';

                // Active step
                var $steps = $('.nav-link');
                $steps.removeClass('active').eq(index).addClass('active');
            }

            function curIndex(){
                return $sections.index($sections.filter('.current'));
            }

            $('.form-navigation .previous').click( function(){
                navigateTo(curIndex()-1);
            });

            $('.form-navigation .next').click( function(){
                $('.formulario-pautas').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function(){
                    navigateTo(curIndex()+1);
                })
            });

            $sections.each(function(index, section){
                var $section = $(section);
                $section.find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        </script>        
    </body>
</html>