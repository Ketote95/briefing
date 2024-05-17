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

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['objetivo_principal'])
                    <tr>
                        <td><li><span>¿Cuál es el propósito principal de la sesión fotográfica?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivo_principal']}}</td>
                    </tr>                    
                @endisset

                @isset($data['tipos_fotografias'])
                    <tr>
                        <td><li><span>¿Qué tipos de fotografías son necesarias?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['tipos_fotografias']}}</td>
                    </tr>                    
                @endisset

                @isset($data['concepto_referencia'])
                    <tr>
                        <td><li><span>¿Tiene algún concepto definido o de referencia para la producción fotográfica?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['concepto_referencia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['fecha_tentativa'])
                    <tr>
                        <td><li><span>¿Tiene alguna fecha tentativa para la producción fotográfica?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fecha_tentativa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['locaciones'])
                    <tr>
                        <td><li><span>¿Tiene alguna locación o locaciones definidas para la producción?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['locaciones']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>

        <p class="titulos" style="margin-top: 30px; color: #2F277A"> ESPECIFICACIONES TÉCNICAS</p>
        <table>
            <tbody>
                @isset($data['referencias_visuales'])
                    <tr>
                        <td><li><span>¿Tiene referencias visuales o ejemplos específicos que deban aplicarse?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['referencias_visuales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['formatos'])
                    <tr>
                        <td><li><span>¿Qué formatos son necesarios para las fotografías?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['formatos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['canales'])
                    <tr>
                        <td><li><span>¿En qué canales se distribuirán estas fotografías?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['canales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['actores'])
                    <tr>
                        <td><li><span>¿Requiere contratar actores, modelos o figuras públicas para la producción?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['actores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['perfiles_requeridos'])
                    <tr>
                        <td><li><span>De acuerdo a su respuesta anterior, ¿Tiene acuerdos con los perfiles que serán requeridos para la producción?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['perfiles_requeridos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['fecha_limite'])
                    <tr>
                        <td><li><span>¿Cuál es la fecha límite para la entrega de las fotografías?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fecha_limite']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>