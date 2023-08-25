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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF DE COMUNICACIÓN</p>

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
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            <thead>
                <tr>
                    <th>Sitio Web</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['sitio_web']}}</td>
                    <td>{{$data['facebook']}}</td>
                    <td>{{$data['instagram']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Fila de tiktok y linkedin --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            <thead>
                <tr>
                    <th>TikTok</th>
                    <th>LinkedIn</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['tiktok']}}</td>
                    <td>{{$data['linkedin']}}</td>
                </tr>
            </tbody>
        </table>
        
        {{-- Datos de contacto --}}
        <table style="border-bottom: 2px solid #35DE92;" class="table" >
            <thead>
                <tr>
                    <th style="color: #1c1b1b">Datos de contacto</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['contacto']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A"> INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['descripcion_empresa'])
                    <tr>
                        <td><li><span>Describa detalladamente su empresa</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['descripcion_empresa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['valores_marca'])
                    <tr>
                        <td><li><span>¿Qué valores definen su marca?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['valores_marca']}}</td>
                    </tr>                    
                @endisset

                @isset($data['situacion_empresa'])
                    <tr>
                        <td><li><span>¿Cuál es la situación actual de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['situacion_empresa']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivos_marketing'])
                    <tr>
                        <td><li><span>5 palabras que definan cómo le gustaría que su empresa sea reconocida en el mercado</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivos_marketing']}}</td>
                    </tr>                    
                @endisset

                @isset($data['objetivos_comerciales'])
                    <tr>
                        <td><li><span>¿Qué quiere lograr en términos de ventas, penetración y posicionamiento?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['objetivos_comerciales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['barreras_comerciales'])
                    <tr>
                        <td><li><span>¿Cuáles son sus mayores barreras comerciales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['barreras_comerciales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['barreras_marketing'])
                    <tr>
                        <td><li><span>¿Cuáles son sus mayores barreras de marketing y comunicación?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['barreras_marketing']}}</td>
                    </tr>                    
                @endisset

                @isset($data['comunicar_servicios'])
                    <tr>
                        <td><li><span>¿Cómo comunica actualmente sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['comunicar_servicios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['comercializar_servicios'])
                    <tr>
                        <td><li><span>¿Cómo comercializa actualmente sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['comercializar_servicios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['presencia_online'])
                    <tr>
                        <td><li><span>¿Cuál es su presencia online actual? ¿Tiene sitio web? ¿Presencia en redes sociales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['presencia_online']}}</td>
                    </tr>                    
                @endisset

                @isset($data['retos_digitalizacion'])
                    <tr>
                        <td><li><span>¿Cuáles han sido sus mayores retos en el proceso de digitalización de su empresa? Tanto desde la perspectiva comercial, como de marketing y comunicación</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['retos_digitalizacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['servicios_principales'])
                    <tr>
                        <td><li><span>¿Cuáles son sus productos o servicios principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['servicios_principales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['publico_objetivo'])
                    <tr>
                        <td><li><span>Público Objetivo (Defina lo más exacto posible a que clases de clientes se dirige, cuanto más preciso mejor. Pueden ser varios tipos de segmentos según los tipos de productos o servicios que ofrece)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['publico_objetivo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['necesidades_servicios'])
                    <tr>
                        <td><li><span>¿Qué necesidades satisfacen sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['necesidades_servicios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['perfil_cliente'])
                    <tr>
                        <td><li><span>Describa lo más detallado posible como sería el perfil de su cliente ideal. (Nivel Socioeconómico, Profesión, Ciclo de Vida Familiar, Ingresos Mensuales, etc) (Puede especificar varios perfiles)</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['perfil_cliente']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores_princpiales'])
                    <tr>
                        <td><li><span>¿Quiénes son sus competidores principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores_princpiales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['aspectos_competidores'])
                    <tr>
                        <td><li><span>¿Qué considera que hacen bien y mal sus competidores principales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['aspectos_competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores_indirectos'])
                    <tr>
                        <td><li><span>¿Quiénes son sus competidores indirectos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores_indirectos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['aspectos_competidores_indirectos'])
                    <tr>
                        <td><li><span>¿Qué considera que hacen bien y mal sus competidores indirectos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['aspectos_competidores_indirectos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['contra_competidores'])
                    <tr>
                        <td><li><span>¿Qué le gustaría hacer que sus competidores no estén haciendo actualmente?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['contra_competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['ventajas_competitivas'])
                    <tr>
                        <td><li><span>¿Cuáles son sus principales ventajas competitivas?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['ventajas_competitivas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['desventajas_competitivas'])
                    <tr>
                        <td><li><span>¿Cuáles son sus principales desventajas competitivas?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['desventajas_competitivas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['principales_diferenciadores'])
                    <tr>
                        <td><li><span>¿Cuáles son sus principales diferenciadores?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['principales_diferenciadores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['estrategias_comunicacion'])
                    <tr>
                        <td><li><span>¿Ha desarrollado alguna estrategia de comunicación digital previa? En caso que su respuesta sea afirmativa, ¿Qué aspectos considera que han sido positivos y negativos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['estrategias_comunicacion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['trabajo_con_agencia'])
                    <tr>
                        <td><li><span>¿Ha trabajado anteriormente con una agencia de comunicación digital? En caso que su respuesta sea afirmativa, ¿Qué aspectos considera que han sido positivos y negativos en el servicio?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['trabajo_con_agencia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['nueva_agencia'])
                    <tr>
                        <td><li><span>¿Qué factores lo están motivando a buscar una nueva agencia de comunicación digital?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['nueva_agencia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['personalidad_marca'])
                    <tr>
                        <td><li><span>¿Qué personalidad desea darle a su marca?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['personalidad_marca']}}</td>
                    </tr>                    
                @endisset

                @isset($data['lenguaje_marca'])
                    <tr>
                        <td><li><span>¿Cómo le gustaría que sea el lenguaje con el que se expresa su marca en redes sociales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['lenguaje_marca']}}</td>
                    </tr>                    
                @endisset

                @isset($data['presupuesto_anuncios'])
                    <tr>
                        <td><li><span>¿Cuánto es el presupuesto publicitario que tiene destinado para anuncios digitales? Especifique por plataforma</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['presupuesto_anuncios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['incrementar_presupuesto'])
                    <tr>
                        <td><li><span>¿Existe la posibilidad de incrementar su presupuesto de publicidad digital?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['incrementar_presupuesto']}}</td>
                    </tr>                    
                @endisset

                @isset($data['google_ads'])
                    <tr>
                        <td><li><span>¿Utiliza GOOGLE ADS dentro de su estrategia de campañas digitales?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['google_ads']}}</td>
                    </tr>                    
                @endisset

                @isset($data['conformidad_sitio'])
                    <tr>
                        <td><li><span>¿Cuenta su empresa con un sitio web actualizado que sea de su conformidad?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['conformidad_sitio']}}</td>
                    </tr>                    
                @endisset

                @isset($data['database'])
                    <tr>
                        <td><li><span>¿Cuenta con una base de datos de clientes?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['database']}}</td>
                    </tr>                    
                @endisset

                @isset($data['info_importante'])
                    <tr>
                        <td><li><span>Agregar toda la información que considere importante resaltar</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['info_importante']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>