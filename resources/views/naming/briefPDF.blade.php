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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF DE NAMING</p>

        {{-- Fila de rubro de la empresa y los productos/servicios que ofrece --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>
        
        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Rubro de la empresa</th>
                    <th>Productos o servicios</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['rubro']}}</td>
                    <td>{{$data['productos_servicios']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A">INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['historia'])
                    <tr>
                        <td><li><span>¿Cuál es la historia de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['historia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mensaje_global'])
                    <tr>
                        <td><li><span>¿Cuál es el mensaje global que desea transmitir a través de tu nombre?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mensaje_global']}}</td>
                    </tr>                    
                @endisset

                @isset($data['principales_atributos'])
                    <tr>
                        <td><li><span>Mencione los principales atributos de su empresa</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['principales_atributos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['nombre_asociado'])
                    <tr>
                        <td><li><span>¿Cómo le gustaría que sea asociado el nombre de su empresa? (Ejemplos: joven, tradicional, moderna, serio, versátil, etc.)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['nombre_asociado']}}</td>
                    </tr>                    
                @endisset

                @isset($data['valores_asociacion'])
                    <tr>
                        <td><li><span>Mencione los valores con los que le gustaría que asociaran su nombre (Ejemplo: calidad, innovación, únicos, etc.)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['valores_asociacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mision'])
                    <tr>
                        <td><li><span>¿Cuál es la misión de su empresa? (La razón de ser de su organización)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mision']}}</td>
                    </tr>                    
                @endisset

                @isset($data['vision'])
                    <tr>
                        <td><li><span>¿Cuál es la visión de su empresa? (Su aspiración, deseo, proyección, metas a largo plazo)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['vision']}}</td>
                    </tr>                    
                @endisset

                @isset($data['publico_objetivo'])
                    <tr>
                        <td><li><span>Describa los diferentes segmentos y/o públicos objetivos a los que se dirige su empresa</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['publico_objetivo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['caracteristicas'])
                    <tr>
                        <td><li><span>¿Cuáles son las características demográficas de su segmento?(Género, edad, ubicación, estilo de vida, etc.)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['caracteristicas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['consideraciones'])
                    <tr>
                        <td><li><span>¿Qué elementos o consideraciones son imprescindibles tomar en cuenta para el proceso de construcción del nombre de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['consideraciones']}}</td>
                    </tr>                    
                @endisset

                @isset($data['preferencia_elementos'])
                    <tr>
                        <td><li><span>¿Tiene alguna PREFERENCIA de elementos, denominaciones, distintivos y/o palabras clave que deban ir obligatoriamente en el nombre de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['preferencia_elementos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['restriccion_elementos'])
                    <tr>
                        <td><li><span>¿Tiene alguna RESTRICCIÓN de elementos, denominaciones, distintivos y/o palabras que NO deban ir en el nombre de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['restriccion_elementos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['lista_competidores'])
                    <tr>
                        <td><li><span>Por favor, desarrolle una lista con los nombres de sus competidores directos e indirectos</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['lista_competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['nombre_empresas_agrado'])
                    <tr>
                        <td><li><span>Por favor, desarrolle una lista de nombres de empresas (sin importar el rubro), que sean de su agrado</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['nombre_empresas_agrado']}}</td>
                    </tr>                    
                @endisset

                @isset($data['nombre_empresas_desagrado'])
                    <tr>
                        <td><li><span>Por favor, desarrolle una lista de nombres de empresas (sin importar el rubro), que NO sean de su agrado</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['nombre_empresas_desagrado']}}</td>
                    </tr>                    
                @endisset

                @isset($data['referencias_naming'])
                    <tr>
                        <td><li><span>A continuación, dejamos algunas referencias y categorizaciones de naming. Por favor deje únicamente hasta máximo 2 elecciones que sean de su agrado y elimine las demás.</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['referencias_naming']}}</td>
                    </tr>                    
                @endisset

                @isset($data['informacion_importante'])
                    <tr>
                        <td><li><span>Por favor, añada toda la información que considere importante complementar al presente brief</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['informacion_importante']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>