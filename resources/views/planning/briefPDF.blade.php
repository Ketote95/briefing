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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF DE PLANNING DIGITAL</p>

        {{-- Fila de empresa, categoría y marca --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>

        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">            
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Categoría</th>
                    <th>Marca</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['categoria']}}</td>
                    <td>{{$data['marca']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Fila de sitio web, facebook e instagram --}}
        @if (isset($data['sitio_web']) or isset($data['facebook']) or isset($data['instagram']))
            <table style="border-bottom: 1px dotted #2F277A;" class="table">
                <thead>
                    <tr>
                        @if (isset($data['sitio_web']))
                            <th>Sitio Web</th>                            
                        @endif

                        @if (isset($data['facebook']))
                            <th>Facebook</th>                            
                        @endif

                        @if (isset($data['instagram']))
                            <th>Instagram</th>                            
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        @if (isset($data['sitio_web']))
                            <td>{{$data['sitio_web']}}</td>
                        @endif
                            
                        @if (isset($data['facebook']))                            
                            <td>{{$data['facebook']}}</td>
                        @endif

                        @if (isset($data['instagram']))
                            <td>{{$data['instagram']}}</td>                        
                        @endif
                    </tr>
                </tbody>
            </table>            
        @endif

        {{-- Fila de tiktok y linkedin --}}
        @if (isset($data['tiktok']) or isset($data['linkedin']))
            <table style="border-bottom: 1px dotted #2F277A;" class="table">
                <thead>
                    <tr>
                        @if (isset($data['tiktok']))
                            <th>TikTok</th>                            
                        @endif

                        @if (isset($data['linkedin']))
                            <th>LinkedIn</th>                            
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        @if (isset($data['tiktok']))
                            <td>{{$data['tiktok']}}</td>                            
                        @endif

                        @if (isset($data['linkedin']))
                            <td>{{$data['linkedin']}}</td>                            
                        @endif
                    </tr>
                </tbody>
            </table>            
        @endif
        
        {{-- Datos de contacto --}}
        <table style="border-bottom: 2px solid #35DE92;" class="table" >
            <thead>
                <tr>
                    <th>Nombre Completo</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono</th>
                    <th>Cargo</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['nombre_completo']}}</td>
                    <td>{{$data['correo']}}</td>
                    <td>{{$data['telefono']}}</td>
                    <td>{{$data['cargo_cliente']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de productos/servicios --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> PRODUCTOS / SERVICIOS</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['productos_servicios'])
                    <tr>
                        <td><li><span>¿Cuáles son los productos o servicios que deberán ser impulsados a través de la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['productos_servicios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['diferenciadores'])
                    <tr>
                        <td><li><span>¿Cuáles son las características más importantes y diferenciadores que tienen sus productos o servicios que serán impulsados mediante la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['diferenciadores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['precio_promedio'])
                    <tr>
                        <td><li><span>¿Cuál es el precio promedio de los productos o servicios que serán parte de la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['precio_promedio']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Preguntas del público objetivo --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> PÚBLICO OBJETIVO</p>

        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['tipos_clientes'])
                    <tr>
                        <td><li><span>Describa lo más detallado posible a sus diferentes tipos de clientes.</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['tipos_clientes']}}</td>
                    </tr>                    
                @endisset

                @isset($data['necesidades_publico'])
                    <tr>
                        <td><li><span>¿Qué necesidades o problemas de estos públicos resuelven los productos o servicios de la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['necesidades_publico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['zonas_geograficas'])
                    <tr>
                        <td><li><span>¿A qué zonas geográficas deberíamos llegar mediante la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['zonas_geograficas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['habito_compra'])
                    <tr>
                        <td><li><span>¿Cuál es el hábito y comportamiento de compra que tienen sus clientes potenciales para este tipo de productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['habito_compra']}}</td>
                    </tr>                    
                @endisset

                @isset($data['frecuencia_promedio_compra'])
                    <tr>
                        <td><li><span>¿Con qué frecuencia promedio sus clientes efectúan la compra de sus productos / servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['frecuencia_promedio_compra']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Objetivos de la campaña --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> OBJETIVOS DE LA CAMPAÑA</p>

        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['objetivo_principal'])
                    <tr>
                        <td><li><span>¿Cuál es su objetivo principal para esta campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivo_principal']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivo_secundario'])
                    <tr>
                        <td><li><span>¿Cuál es su objetivo secundario para esta campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivo_secundario']}}</td>
                    </tr>                    
                @endisset

                @isset($data['duracion_estimada'])
                    <tr>
                        <td><li><span>¿Cuál será la duración estimada de la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['duracion_estimada']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mensajes_clave'])
                    <tr>
                        <td><li><span>¿Qué mensajes clave queremos que recuerden las personas después de interactuar con esta campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mensajes_clave']}}</td>
                    </tr>                    
                @endisset

                @isset($data['preferencia_formatos'])
                    <tr>
                        <td><li><span>¿Tiene alguna preferencia de los formatos de anuncios que deban aplicarse para la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['preferencia_formatos']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Indicadores de exito, objetivos cuantitativos y presupuesto --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> INDICADORES DE ÉXITO, OBJETIVOS CUANTITATIVOS Y PRESUPUESTO</p>

        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['metricas_clave'])
                    <tr>
                        <td><li><span>¿Cuáles serán las métricas clave que se utilizarán para medir el éxito de la campa</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['metricas_clave']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivos_cuantitativos'])
                    <tr>
                        <td><li><span>¿Cuáles son los Objetivos Cuantitativos? Métricas numéricas específicas.</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivos_cuantitativos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['presupuesto_total'])
                    <tr>
                        <td><li><span>¿Cuál es el presupuesto total disponible para la campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['presupuesto_total']}}</td>
                    </tr>                    
                @endisset
                
                @isset($data['temporalidad'])
                <tr>
                    <td><li><span>¿Cuál será la temporalidad para la ejecución de la presente campaña?</span></li></td>
                </tr>
                <tr>
                    <td>{{$data['temporalidad']}}</td>
                </tr>                    
                @endisset
                
                @isset($data['canales'])
                <tr>
                    <td><li><span>¿Cuáles serán los canales elegidos para la presente campaña?</span></li></td>
                </tr>
                <tr>
                    <td>{{$data['canales']}}</td>
                </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Consideraciones adicionales --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> CONSIDERACIONES ADICIONALES</p>

        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['restriccion'])
                    <tr>
                        <td><li><span>¿Cuenta con alguna restricción que deba considerarse para la presente campaña?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['restriccion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['basedatos_clientes'])
                    <tr>
                        <td><li><span>¿Cuenta con una base de datos de clientes?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['basedatos_clientes']}}</td>
                    </tr>                    
                @endisset

                @isset($data['info_adicional'])
                    <tr>
                        <td><li><span>Notas Adicionales (Información extra que pueda ser relevante para la campaña)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['info_adicional']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>