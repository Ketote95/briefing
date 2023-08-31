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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF CREATIVO Y DE CAMPAÑAS</p>

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

        {{-- Fila de sub-marca, plazo y duración --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            <thead>
                <tr>
                    <th>Sub-marca</th>
                    <th>Plazo</th>
                    <th>Duración</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['sub_marca']}}</td>
                    <td>{{$data['plazo']}}</td>
                    <td>{{$data['duracion']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Fila de presupuesto --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            <thead>
                <tr>
                    <th>Presupuesto</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['presupuesto']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['antecedentes'])
                    <tr>
                        <td><li><span>Describa detalladamente su empresa</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['antecedentes']}}</td>
                    </tr>                    
                @endisset

                @isset($data['justificacion'])
                    <tr>
                        <td><li><span>¿Qué valores definen su marca?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['justificacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['descripcion_servicio'])
                    <tr>
                        <td><li><span>¿Cuál es la situación actual de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['descripcion_servicio']}}</td>
                    </tr>                    
                @endisset

                @isset($data['publico'])
                    <tr>
                        <td><li><span>5 palabras que definan cómo le gustaría que su empresa sea reconocida en el mercado</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['publico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['promesa'])
                    <tr>
                        <td><li><span>¿Qué quiere lograr en términos de ventas, penetración y posicionamiento?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['promesa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivos'])
                    <tr>
                        <td><li><span>¿Cuáles son sus mayores barreras comerciales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['linea_comunicacional'])
                    <tr>
                        <td><li><span>¿Cuáles son sus mayores barreras de marketing y comunicación?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['linea_comunicacional']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores'])
                    <tr>
                        <td><li><span>¿Cómo comunica actualmente sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['servicios_competidores'])
                    <tr>
                        <td><li><span>¿Cómo comercializa actualmente sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['servicios_competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['atributos'])
                    <tr>
                        <td><li><span>¿Cuál es su presencia online actual? ¿Tiene sitio web? ¿Presencia en redes sociales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['atributos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['medios'])
                    <tr>
                        <td><li><span>¿Cuáles han sido sus mayores retos en el proceso de digitalización de su empresa? Tanto desde la perspectiva comercial, como de marketing y comunicación</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['medios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['entregables'])
                    <tr>
                        <td><li><span>¿Cuáles son sus productos o servicios principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['entregables']}}</td>
                    </tr>                    
                @endisset

                @isset($data['plazos'])
                    <tr>
                        <td><li><span>Público Objetivo (Defina lo más exacto posible a que clases de clientes se dirige, cuanto más preciso mejor. Pueden ser varios tipos de segmentos según los tipos de productos o servicios que ofrece)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['plazos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['voz'])
                    <tr>
                        <td><li><span>¿Qué necesidades satisfacen sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['voz']}}</td>
                    </tr>                    
                @endisset

                @isset($data['condicionantes'])
                    <tr>
                        <td><li><span>Describa lo más detallado posible como sería el perfil de su cliente ideal. (Nivel Socioeconómico, Profesión, Ciclo de Vida Familiar, Ingresos Mensuales, etc) (Puede especificar varios perfiles)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['condicionantes']}}</td>
                    </tr>                    
                @endisset

                @isset($data['info_adicional'])
                    <tr>
                        <td><li><span>¿Quiénes son sus competidores principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['info_adicional']}}</td>
                    </tr>                    
                @endisset                
            </tbody>
        </table>
    </body>
</html>