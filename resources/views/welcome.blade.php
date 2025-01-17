<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Briefing</title>

        {{-- Bootstrap 5 styles --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        {{-- Poppins Font --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        
    </head>
    <body class="container">
        <div class="contenedor-formulario mt-5 pt-5 pb-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-2 col-md-6 col-sm-12">
                    <h1 class="text-center title-brief" >Briefs</h1>
                </div>
            </div>
            
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="{{ url('briefcomunicacion') }}" id="btnComunicacion" class="btn btn-primary mt-5">Comunicación</a>
                <a href="{{ url('briefcreativo') }}" id="btnDiseño" class="btn btn-primary mt-2">Creativo y de campañas</a>
                <a href="{{ url('brief_campaña_online') }}" id="btnOnline" class="btn btn-primary mt-2">Campaña online</a>
                <a href="{{ url('briefdesarrollo') }}" id="btnDesarrollo" class="btn btn-primary mt-2">Desarrollo web</a>
                <a href="{{ url('briefbranding') }}" id="btnBranding" class="btn btn-primary mt-2">Creación de marca</a>
                <a href="{{ url('briefnaming') }}" id="btnNaming" class="btn btn-primary mt-2">Creación de nombre</a>
                <a href="{{ url('brief_fotografia') }}" id="btnFotografia" class="btn btn-primary mt-2">Producción fotográfica</a>
                <a href="{{ url('brief_audiovisual') }}" id="btnAudiovisual" class="btn btn-primary mt-2">Producción audiovisual</a>
                <a href="{{ url('brief_planning') }}" id="btnPlanning" class="btn btn-primary mt-2">Planning digital</a>
                <a href="{{ url('brief_planning_new') }}" id="btnPlanningNew" class="btn btn-primary mt-2">Planning digital nuevo cliente</a>
                <a href="{{ url('brief_pauta_objetivos') }}" id="btnPublicitario" class="btn btn-primary mt-2">Pauta por objetivos</a>
            </div>
        </div>

        <div class="d-flex justify-content-center desktop">
            <img src=" {{ asset('/storage/Logo.svg') }} " alt="fondo" width="30%">
        </div>

        <div class="d-flex justify-content-center mobile">
            <img src=" {{ asset('/storage/Logo.svg') }} " alt="fondo" width="100%">
        </div>

        {{-- Bootstrap 5 scripts --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>
