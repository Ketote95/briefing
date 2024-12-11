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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF DE PRODUCCIÓN FOTOGRÁFICA</p>

        {{-- Fila de empresa, responsable y nombre de la campaña --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>

        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">            
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Responsable de la empresa</th>
                    <th>Nombre de la campaña</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['responsable_empresa']}}</td>
                    <td>{{$data['nombre_campaña']}}</td>
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

                        @if (isset($data['destino']))
                            <th>URL destino</th>                            
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

                        @if (isset($data['destino']))
                            <td>{{$data['destino']}}</td>                        
                        @endif
                    </tr>
                </tbody>
            </table>            
        @endif

        {{-- Fila de twitter, linkedin y youtube--}}
        @if (isset($data['twitter']) or isset($data['youtube']) or isset($data['linkedin']))
            <table style="border-bottom: 1px dotted #2F277A;" class="table">
                <thead>
                    <tr>
                        @if (isset($data['twitter']))
                            <th>Twitter</th>
                        @endif

                        @if (isset($data['linkedin']))
                            <th>LinkedIn</th>
                        @endif

                        @if (isset($data['youtube']))
                            <th>YouTube</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        @if (isset($data['twitter']))
                            <td>{{$data['twitter']}}</td>                            
                        @endif

                        @if (isset($data['linkedin']))
                            <td>{{$data['linkedin']}}</td>                            
                        @endif

                        @if (isset($data['youtube']))
                            <td>{{$data['youtube']}}</td>                            
                        @endif
                    </tr>
                </tbody>
            </table>            
        @endif
        
        {{-- Datos de contacto --}}
        <table style="border-bottom: 2px solid #35DE92;" class="table" >
            <thead>
                <tr>
                    <th>Correo de contacto</th>
                    <th>Teléfono de contacto</th>
                    <th>Objetivo de la campaña</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['email']}}</td>
                    <td>{{$data['telefono']}}</td>
                    <td>{{$data['objetivo_campaña']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Datos de URL de la App y competencia directa --}}
        <table style="border-bottom: 2px solid #35DE92;" class="table" >
            <thead>
                <tr>
                    <th>URL App</th>
                    <th>Competencia directa</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['app']}}</td>
                    <td>{{$data['competencia_directa']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de contenido y material --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> CONTENIDO Y MATERIAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['recursos_graficos'])
                    <tr>
                        <td><li><span>Recursos gráficos</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['recursos_graficos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['recursos_audiovisuales'])
                    <tr>
                        <td><li><span>Recursos audiovisuales</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['recursos_audiovisuales']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de tiempos --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> TIEMPOS</p>

        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['fecha_inicio'])
                    <tr>
                        <td><li><span>Fecha de inicio</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fecha_inicio']}}</td>
                    </tr>
                @endisset

                @isset($data['fecha_fin'])
                    <tr>
                        <td><li><span>Fecha de fin</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fecha_fin']}}</td>
                    </tr>
                @endisset

                @isset($data['presupuesto_campaña'])
                    <tr>
                        <td><li><span>Presupuesto de la campaña</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['moneda']}} {{$data['presupuesto_campaña']}}</td>
                    </tr>
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de segmentaciones --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> SEGMENTACIONES</p>
        <table>
            <tbody>
                @isset($data['pais'])
                    <tr>
                        <td><li><span>País</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['pais']}}</td>
                    </tr>                    
                @endisset

                @isset($data['ciudades'])
                    <tr>
                        <td><li><span>Ciudades</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['ciudades']}}</td>
                    </tr>                    
                @endisset

                @isset($data['edades'])
                    <tr>
                        <td><li><span>Rango de edades</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['edades']}}</td>
                    </tr>                    
                @endisset

                @isset($data['generos'])
                    <tr>
                        <td><li><span>Generos</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['generos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['descripcion_publico'])
                    <tr>
                        <td><li><span>Descripción del publico objetivo</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['descripcion_publico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['plataformas'])
                    <tr>
                        <td><li><span>Plataformas</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['plataformas']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        {{-- Las preguntas de la etapa de embudo --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> FUNNEL STAGE / ETAPA DE EMBUDO</p>
        <table>
            <tbody>
                @isset($data['funnel_stage'])
                    <tr>
                        <td><li><span>Etapa de embudo</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['funnel_stage']}}</td>
                    </tr>                    
                @endisset

                @isset($data['info_adicional'])
                    <tr>
                        <td><li><span>Comentarios adicionales</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['info_adicional']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>