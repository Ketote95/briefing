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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF CREACIÓN DE MARCA</p>

        {{-- Fila de nombre de la empresa, naming y categoría --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>
        
        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">
            <thead>
                <tr>
                    <th>Nombre empresa</th>
                    <th>Naming</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['naming']}}</td>
                    <td>{{$data['categoria']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A">INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['diferencia'])
                    <tr>
                        <td><li><span>¿Qué diferencia a su empresa de las demás?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['diferencia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['servicios_productos'])
                    <tr>
                        <td><li><span>¿Qué servicios o productos proporciona su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['servicios_productos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['elección_empresa'])
                    <tr>
                        <td><li><span>¿Por qué debería elegir su empresa y no a la competencia?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['elección_empresa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['años'])
                    <tr>
                        <td><li><span>¿Cuántos años tiene la empresa en el mercado?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['años']}}</td>
                    </tr>                    
                @endisset

                @isset($data['fortalezas_debilidades'])
                    <tr>
                        <td><li><span>¿Cuáles son las fortalezas y debilidades de tu empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fortalezas_debilidades']}}</td>
                    </tr>                    
                @endisset

                @isset($data['vision'])
                    <tr>
                        <td><li><span>¿Cuál es la visión de la empresa a mediano y largo plazo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['vision']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores_principales'])
                    <tr>
                        <td><li><span>¿Quiénes son sus 3 competidores principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores_principales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['motivo'])
                    <tr>
                        <td><li><span>¿Qué lo motivó a empezar este negocio / organización?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['motivo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['descripcion'])
                    <tr>
                        <td><li><span>Si tuviera que describir su empresa, en una palabra, ¿cuál sería? ¿por qué?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['descripcion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['valores'])
                    <tr>
                        <td><li><span>¿Cuáles son los valores y/o pilares que definen su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['valores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['asociacion'])
                    <tr>
                        <td><li><span>¿De qué forma NO desea que sea asociada su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['asociacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['descripcion_unapalabra'])
                    <tr>
                        <td><li><span>Si sus clientes tuvieran que describir su empresa, en una palabra, ¿cuál sería? ¿por qué?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['descripcion_unapalabra']}}</td>
                    </tr>                    
                @endisset

                @isset($data['logotipo'])
                    <tr>
                        <td><li><span>¿Tiene un logotipo actualmente?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['logotipo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['elementos_logotipo'])
                    <tr>
                        <td><li><span>(Si la respuesta anterior es afirmativa) ¿Qué elementos de su logotipo anterior le gustaría conservar?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['elementos_logotipo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['rediseño_logo'])
                    <tr>
                        <td><li><span>¿Cuál es la razón de la modificación o rediseño de su logo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['rediseño_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['años_logo'])
                    <tr>
                        <td><li><span>¿Cuántos años tiene su logo actual?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['años_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['mision'])
                    <tr>
                        <td><li><span>¿Cuál es el posicionamiento o la misión de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['mision']}}</td>
                    </tr>                    
                @endisset

                @isset($data['slogan'])
                    <tr>
                        <td><li><span>¿Su empresa tiene un lema o slogan que se debe incluir con el logo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['slogan']}}</td>
                    </tr>                    
                @endisset

                @isset($data['reconocimiento'])
                    <tr>
                        <td><li><span>¿Con qué espera que sea conocida tu empresa o marca?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['reconocimiento']}}</td>
                    </tr>                    
                @endisset

                @isset($data['reconocomiento_logotipo'])
                    <tr>
                        <td><li><span>¿Qué es lo que sus clientes reconocen primero cuando ven su logotipo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['reconocomiento_logotipo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['uso_colores'])
                    <tr>
                        <td><li><span>¿Por qué su empresa utiliza esos colores, fuentes, formas etc.? </span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['uso_colores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['paletas'])
                    <tr>
                        <td><li><span>¿Qué paletas / gama de colores prefiere? ¿Por qué?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['paletas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['uso_logotipo'])
                    <tr>
                        <td><li><span>¿Dónde se utilizará principalmente el logotipo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['uso_logotipo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['adicion_logo'])
                    <tr>
                        <td><li><span>¿Hay algún elemento que quiera que aparezca en el logo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['adicion_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['definicion_logotipo'])
                    <tr>
                        <td><li><span>En su opinión, ¿qué define un logotipo bien diseñado?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['definicion_logotipo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['preferencia_iconos'])
                    <tr>
                        <td><li><span>¿Cuál es su preferencia, en referencia a los iconos, tipografía, colores etc.?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['preferencia_iconos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['gustos_logo'])
                    <tr>
                        <td><li><span>¿Qué le gustaría que contenga su logo de forma mandatoria?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['gustos_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['restricciones_logo'])
                    <tr>
                        <td><li><span>¿Qué restricciones, en su caso, podría existir sobre el logo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['restricciones_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['aplicaciones_logo'])
                    <tr>
                        <td><li><span>¿Cuáles son las posibles aplicaciones en las que se utilizará este logo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['aplicaciones_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['referencias_logo'])
                    <tr>
                        <td><li><span>¿Qué referencias estéticas de logotipos tiene?  (Logotipos que son de su agrado)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['referencias_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['publico_objetivo'])
                    <tr>
                        <td><li><span>¿Quién es el público objetivo principal? (Describa brevemente el target de su marca?)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['publico_objetivo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['utilizacion_producto'])
                    <tr>
                        <td><li><span>¿Quién utiliza actualmente el producto / servicio más?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['utilizacion_producto']}}</td>
                    </tr>                    
                @endisset

                @isset($data['concentracion_publico'])
                    <tr>
                        <td><li><span>¿Cómo planea concentrarse en su público objetivo?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['concentracion_publico']}}</td>
                    </tr>                    
                @endisset

                @isset($data['formas_publicidad'])
                    <tr>
                        <td><li><span>¿Cuáles son sus principales formas de hacer publicidad?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['formas_publicidad']}}</td>
                    </tr>                    
                @endisset

                @isset($data['conocer_empresa'])
                    <tr>
                        <td><li><span>¿Cómo se enteran la mayoría de sus clientes acerca de su empresa / servicio o producto?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['conocer_empresa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['ingresos_promedio_publico'])
                    <tr>
                        <td><li><span>¿Cuál es el nivel de ingresos promedio de su público objetivo?</span></li></td>
                    </tr>
                    <tr>
                        <td>USD {{$data['ingresos_promedio_publico']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>