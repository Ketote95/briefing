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
        <p style="text-align: center; margin-bottom: 40px;" class="titulos">BRIEF DESARROLLO WEB</p>

        {{-- Fila de nombre de la empresa, naming y categoría --}}
        <table style="border-bottom: 1px dotted #2F277A;" class="table">
            
        </table>
        
        <table style="border-bottom: 1px dotted #2F277A; margin-top: 5px" class="table">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Tamaño empresa</th>
                    <th>Presencia de la empresa</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{$data['empresa']}}</td>
                    <td>{{$data['tamaño']}}</td>
                    <td>{{$data['presencia']}}</td>
                </tr>
            </tbody>
        </table>

        {{-- Las preguntas de información general --}}
        <p class="titulos" style="margin-top: 30px; color: #2F277A">INFORMACIÓN GENERAL</p>
        
        <table style="font-size: 15px" class="table table-dark table-striped">
            <tbody>
                @isset($data['inicio_desarrollo'])
                    <tr>
                        <td><li><span>Fecha tentativa de inicio del desarrollo del sitio web</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['inicio_desarrollo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['tipo_desarrollo'])
                    <tr>
                        <td><li><span>Tipo de desarrollo</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['tipo_desarrollo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['año_diseño'])
                    <tr>
                        <td><li><span>¿En qué año se diseñó su sitio web actual?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['año_diseño']}}</td>
                    </tr>                    
                @endisset

                @isset($data['aspectos_positivos'])
                    <tr>
                        <td><li><span>¿Cuáles son los aspectos positivos de su sitio web actual?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['aspectos_positivos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['aspectos_negativos'])
                    <tr>
                        <td><li><span>¿Cuáles son los aspectos negativos de su sitio web actual?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['aspectos_negativos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['manual_identidad'])
                    <tr>
                        <td><li><span>¿Cuenta con un manual de identidad corporativa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['manual_identidad']}}</td>
                    </tr>                    
                @endisset

                @isset($data['competidores'])
                    <tr>
                        <td><li><span>Competidores</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['competidores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['sitios_inspiracion'])
                    <tr>
                        <td><li><span>Sitios web que consideren como inspiración para el diseño web</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['sitios_inspiracion']}}</td>
                    </tr>                    
                @endisset

                @isset($data['estilo_sitio_web'])
                    <tr>
                        <td><li><span>Estilo que desea para la nueva imagen de su sitio web</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['estilo_sitio_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['fotos'])
                    <tr>
                        <td><li><span>¿Poseen fotografías propias para incluir en su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['fotos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['plan_fotos'])
                    <tr>
                        <td><li><span>¿Desean adquirir fotografías de stock?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['plan_fotos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['sesion_fotos'])
                    <tr>
                        <td><li><span>¿Existe el plan de desarrollar una sesión fotográfica / shooting?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['sesion_fotos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['imagenes_referenciales'])
                    <tr>
                        <td><li><span>¿Poseen imágenes referenciales para representar sus productos o servicios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['imagenes_referenciales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['videos'])
                    <tr>
                        <td><li><span>¿Poseen vídeos propios para incluir en su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['videos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['videos_stock'])
                    <tr>
                        <td><li><span>¿Desean adquirir vídeos de stock?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['videos_stock']}}</td>
                    </tr>                    
                @endisset

                @isset($data['plan_videos'])
                    <tr>
                        <td><li><span>¿Existe el plan de desarrollar una producción audiovisual de su empresa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['plan_videos']}}</td>
                    </tr>                    
                @endisset

                @isset($data['cambios_logo'])
                    <tr>
                        <td><li><span>¿El logo sufrirá cambios durante el desarrollo del sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['cambios_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['archivo_logo'])
                    <tr>
                        <td><li><span>¿Poseen el logo en alta calidad o poseen el archivo editable?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['archivo_logo']}}</td>
                    </tr>                    
                @endisset

                @isset($data['tipografia'])
                    <tr>
                        <td><li><span>¿Poseen una o varias tipografías específicas asociadas al logotipo o imagen corporativa?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['tipografia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['archivos_tipografia'])
                    <tr>
                        <td><li><span>¿Poseen la fuente o archivos de las tipografías?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['archivos_tipografia']}}</td>
                    </tr>                    
                @endisset

                @isset($data['paleta_colores'])
                    <tr>
                        <td><li><span>¿Cuentan con la paleta exacta de colores corporativos?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['paleta_colores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['cambios_colores'])
                    <tr>
                        <td><li><span>¿Habrá cambios en los colores corporativos durante el desarrollo del sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['cambios_colores']}}</td>
                    </tr>                    
                @endisset

                @isset($data['contenido_web'])
                    <tr>
                        <td><li><span>¿Cuenta con el contenido que irá en el sitio web ya redactado en formato de texto (Word)?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['contenido_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['agencia_contenido'])
                    <tr>
                        <td><li><span>¿Requiere que la agencia desarrolle contenido?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['agencia_contenido']}}</td>
                    </tr>                    
                @endisset

                @isset($data['herramientas_web'])
                    <tr>
                        <td><li><span>¿Desea que su sitio web tenga alguna funcionalidad o herramienta en particular?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['herramientas_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['sistemas_terceros'])
                    <tr>
                        <td><li><span>¿Tiene aplicaciones o sistemas de terceros que desee implementar?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['sistemas_terceros']}}</td>
                    </tr>                    
                @endisset

                @isset($data['info_sistemas'])
                    <tr>
                        <td><li><span>En caso que la respuesta anterior sea afirmativa, requerimos que pueda brindarnos información acerca del nombre de la o las herramientas que desea integrar y una breve descripción de las mismas</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['info_sistemas']}}</td>
                    </tr>                    
                @endisset

                @isset($data['redes_sociales'])
                    <tr>
                        <td><li><span>Links de Redes Sociales y otras plataformas</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['redes_sociales']}}</td>
                    </tr>                    
                @endisset

                @isset($data['estructura_web'])
                    <tr>
                        <td><li><span>¿Cuál es la estructura, categorías y subcategorías deseadas para su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['estructura_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['campos_formulario'])
                    <tr>
                        <td><li><span>¿Qué campos requiere que tenga en caso de incluirse formularios en su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['campos_formulario']}}</td>
                    </tr>                    
                @endisset

                @isset($data['correo_formularios'])
                    <tr>
                        <td><li><span>¿A qué dirección de correo electrónico desea que lleguen estos formularios?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['correo_formularios']}}</td>
                    </tr>                    
                @endisset

                @isset($data['dominio_web'])
                    <tr>
                        <td><li><span>¿Cuenta con un dominio.com para su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['dominio_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['compra_dominio'])
                    <tr>
                        <td><li><span>En caso que la respuesta anterior sea negativa, ¿Desea que realicemos la compra de algún dominio?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['compra_dominio']}}</td>
                    </tr>                    
                @endisset

                @isset($data['credenciales_dominio'])
                    <tr>
                        <td><li><span>Si la respuesta es positiva, ¿Cuáles serían las credenciales de acceso a su dominio?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['credenciales_dominio']}}</td>
                    </tr>                    
                @endisset

                @isset($data['hosting_web'])
                    <tr>
                        <td><li><span>¿Cuenta ya con un servicio de web hosting contratado para  su sitio web?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['hosting_web']}}</td>
                    </tr>                    
                @endisset

                @isset($data['compra_hosting'])
                    <tr>
                        <td><li><span>En caso que la respuesta anterior sea negativa, ¿Desea que realicemos la suscripción de algún servicio de web hosting?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['compra_hosting']}}</td>
                    </tr>                    
                @endisset

                @isset($data['credenciales_hosting'])
                    <tr>
                        <td><li><span>Si la respuesta es positiva, ¿Cuáles serían las credenciales de acceso a su servidor?</span></li></td>
                    </tr>
                    <tr>
                        <td>{{$data['credenciales_hosting']}}</td>
                    </tr>                    
                @endisset
            </tbody>
        </table>
    </body>
</html>