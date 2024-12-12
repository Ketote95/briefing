<!DOCTYPE html>
<html lang="es">
    <head>
        <meta chartset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Brief - Dosis ({{$data['empresa']}}) {{$data['created_at']}}</title>

        {{-- CSS Bootstrap 5 --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            /** Define the margins of your page **/
            @page {
                margin: 0cm 0cm;
            }

            /* Define the margins for every page in the pdf */
            body {
                margin: 2.7cm 2cm 3cm 2cm;
                font-family: 'Poppins', sans-serif;
                font-size: 16px;
                color: #1c1b1b;
            }
            
            li {
                color: #2F277A;
                margin-left: 15px;
                /* Bullet Color */
            }
            
            li span {
                color: #1c1b1b;
                font-size: 16px;
                font-weight: bold;
            }

            header {
                position: fixed;
                
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/

                /* background-color: #35D084; */
                /* background-color: #1c1b1b; */
                /* background-image: url('vendor\adminlte\dist\img\Dosis Isotipo-Color primario-verde-RGB.png'); */
                /* color: white; */
                /* text-align: center; */
                /* line-height: 35px; */
            }

            footer {
                position: fixed; 
                bottom: 0px; 
                left: 0px; 
                right: 0px;
                height: 1cm; 
                /* font-size: 20px !important; */

                /** Extra personal styles **/

                /* background-color: #35D084;
                color: white;
                text-align: center;
                line-height: 35px; */
            }

            .titulos{
                font-size: 22px;
                font-weight: bolder;
                color: #242424;
            }

            tbody>tr>td {
                padding-bottom: 20px
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/storage/images/Top.png';?>" width="100%" alt="Membrete top dosis">
            {{-- Dosis Agency: Marketing y Comunicación --}}
        </header>

        <footer>
            <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/storage/images/Bottom.png';?>" width="100%" alt="Membrete bot dosis">
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF PUBLICITARIO PARA EVALUACIÓN DE COSTOS DE PAUTA</p>

        {{-- Fila de empresa, categoría y marca --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>

        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">            
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Industria</th>
                    <th>Marca</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['industria']}}</td>
                    <td>{{$data['marca']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Fila de servicios, presencia digital y competidores --}}
        @if (isset($data['servicios']) or isset($data['presencia_actual']) or isset($data['competidores']))
            <table style="border-bottom: 1px dotted #2F277A;" class="table">
                <thead>
                    <tr>
                        @if (isset($data['servicios']))
                            <th>Servicios / Productos</th>                            
                        @endif

                        @if (isset($data['presencia_actual']))
                            <th>Presencia actual</th>                            
                        @endif

                        @if (isset($data['competidores']))
                            <th>Competidores</th>                            
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        @if (isset($data['servicios']))
                            <td>{{$data['servicios']}}</td>
                        @endif
                            
                        @if (isset($data['presencia_actual']))                            
                            <td>{{$data['presencia_actual']}}</td>
                        @endif

                        @if (isset($data['competidores']))
                            <td>{{$data['competidores']}}</td>                        
                        @endif
                    </tr>
                </tbody>
            </table>            
        @endif
        
        {{-- Datos de contacto --}}
        <table style="border-bottom: 2px solid #35DE92;" class="table" >
            <thead>
                <tr>
                    <th>Nombre de contacto</th>
                    <th>Cargo de contacto</th>
                    <th>Teléfono de contacto</th>
                    <th>Correo de contacto</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['nombre_contacto']}}</td>
                    <td>{{$data['puesto_contacto']}}</td>
                    <td>{{$data['telefono_contacto']}}</td>
                    <td>{{$data['correo_contacto']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> OBJETIVOS DE CAMPAÑA Y CONTENIDO</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['objetivo_general'])
                    <tr>
                        <td><li><span>Objetivo general de la campaña</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivo_general']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivos_especificos'])
                    <tr>
                        <td><li><span>Objetivos específicos de la campaña</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivos_especificos']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de segmentación --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> SEGMENTACIÓN DE AUDIENCIA</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['edades'])
                    <tr>
                        <td><li><span>Edades</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['edades']}}</td>
                    </tr>                    
                @endisset

                @isset($data['genero'])
                    <tr>
                        <td><li><span>Género</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['genero']}}</td>
                    </tr>                    
                @endisset

                @isset($data['ubicacion'])
                    <tr>
                        <td><li><span>Ubicación</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['ubicacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['nivel_socioeconomico'])
                    <tr>
                        <td><li><span>Nivel socioeconómico</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['nivel_socioeconomico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['intereses_específicos'])
                    <tr>
                        <td><li><span>¿Cuáles son los interes específicos del segmento?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['intereses_específicos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['comportamiento_compra'])
                    <tr>
                        <td><li><span>¿Cuál es el comportamiento de compra del segmento?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['comportamiento_compra']}}</td>
                    </tr>                    
                @endisset

                @isset($data['habitos_digitales'])
                    <tr>
                        <td><li><span>¿Cuáles son los hábitos digitales del segmento?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['habitos_digitales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['bases_datos'])
                    <tr>
                        <td><li><span>¿Cuentas con bases de datos propias?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['bases_datos']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de canales y plataformas --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> CANALES Y PLATAFORMAS</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['plataformas'])
                    <tr>
                        <td><li><span>Plataformas digitales elegidas para la campaña</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['plataformas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['pauta_digital'])
                    <tr>
                        <td><li><span>¿Han trabajado con pauta digital antes?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['pauta_digital']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mejores_plataformas'])
                    <tr>
                        <td><li><span>¿Qué plataformas les han dado mejores resultados?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mejores_plataformas']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de análisis de compra e industria --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> ANÁLISIS DE COMPRA E INDUSTRIA</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['ciclo_compra'])
                    <tr>
                        <td><li><span>¿Es una compra inmediata, por impulso o requiere investigación previa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['ciclo_compra']}}</td>
                    </tr>                    
                @endisset

                @isset($data['habito_compra'])
                    <tr>
                        <td><li><span>¿Es compra única o rutinaria? Especifique el ciclo y hábito de compra</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['habito_compra']}}</td>
                    </tr>                    
                @endisset

                @isset($data['cambios_recientes'])
                    <tr>
                        <td><li><span>¿Qué cambios recientes están afectando la industria?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['cambios_recientes']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores_directos'])
                    <tr>
                        <td><li><span>¿Quienes son sus competidores directos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores_directos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores_indirectos'])
                    <tr>
                        <td><li><span>¿Quienes son sus competidores indirectos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores_indirectos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['alta_baja_competencia'])
                    <tr>
                        <td><li><span>¿Es una industria de alta o baja competencia en plataformas digitales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['alta_baja_competencia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['temporada_clave'])
                    <tr>
                        <td><li><span>¿La campaña coincide con una temporada clave?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['temporada_clave']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de presupuesto y recursos --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> PRESUPUESTO Y RECURSOS</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['presupuesto_disponible'])
                    <tr>
                        <td><li><span>Presupuesto disponible para la campaña</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['moneda']}} {{$data['presupuesto_disponible']}}</td>
                    </tr>                    
                @endisset

                @isset($data['fecha_inicio'])
                    <tr>
                        <td><li><span>Fecha de inicio - fecha de fin</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fecha_inicio']}} - {{$data['fecha_fin']}}</td>
                    </tr>                    
                @endisset

                @isset($data['distribucion_presupuesto'])
                    <tr>
                        <td><li><span>En caso de ser requerido distribuir el presupuesto en diferentes plataformas, ¿Cuáles serían estas?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['distribucion_presupuesto']}}</td>
                    </tr>                    
                @endisset

                @isset($data['recursos_creativos'])
                    <tr>
                        <td><li><span>¿Tiene listos los recursos creativos para la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['recursos_creativos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['desarrollar_materiales'])
                    <tr>
                        <td><li><span>¿Requiere que desarrollemos los materiales creativos de la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['desarrollar_materiales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['formatos_campaña'])
                    <tr>
                        <td><li><span>¿Qué formatos se utilizarán para la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['formatos_campaña']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de expectativas del cliente --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> EXPECTATIVAS DEL CLIENTE</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['indicadores_exito'])
                    <tr>
                        <td><li><span>¿Qué indicadores definirán el éxito de la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['indicadores_exito']}}</td>
                    </tr>                    
                @endisset

                @isset($data['resultados_positivos'])
                    <tr>
                        <td><li><span>¿Qué resultados considerarían positivos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['resultados_positivos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['resultados_inmediatos'])
                    <tr>
                        <td><li><span>¿Esperan resultados inmediatos o están dispuestos a invertir a mediano/largo plazo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['resultados_inmediatos']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de factores externos --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> FACTORES EXTERNOS</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['restricciones'])
                    <tr>
                        <td><li><span>¿Existen restricciones en la publicidad de la industria?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['restricciones']}}</td>
                    </tr>                    
                @endisset

                @isset($data['vinculacion_campaña'])
                    <tr>
                        <td><li><span>¿La campaña está vinculada a un evento, lanzamiento o fecha importante?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['vinculacion_campaña']}}</td>
                    </tr>                    
                @endisset

                @isset($data['condiciones_externas'])
                    <tr>
                        <td><li><span>¿Hay condiciones externas (inflación, crisis, etc.) que puedan influir en el comportamiento del consumidor?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['condiciones_externas']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de propuesta de valor de marca --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> PROPUESTA DE VALOR DE MARCA</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['producto_unico'])
                    <tr>
                        <td><li><span>¿Qué hace único a su producto?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['producto_unico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mensaje_principal'])
                    <tr>
                        <td><li><span>¿Cuál es el mensaje principal que quieren transmitir?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mensaje_principal']}}</td>
                    </tr>                    
                @endisset

                @isset($data['tono_preferido'])
                    <tr>
                        <td><li><span>¿Cuál es el tono preferido?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['tono_preferido']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de criterios de evaluación --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> CRITERIOS DE EVALUACIÓN</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['indicadores_kpis'])
                    <tr>
                        <td><li><span>¿Qué indicadores (KPIS) se determinarán para evaluar el éxito de la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['indicadores_kpis']}}</td>
                    </tr>                    
                @endisset

                @isset($data['resultados_concretos'])
                    <tr>
                        <td><li><span>¿Qué resultados concretos les gustaría alcanzar al finalizar la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['resultados_concretos']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>