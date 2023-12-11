<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo brief registrado</title>

    {{-- Fuente de Google Poppins --}}
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/storage/images/Header_briefs.jpeg';?>" width="100%" alt="Membrete top dosis">
    <p style="font-family: 'Poppins'; color: #31297B;"><strong>Nombre de la Empresa: </strong><span style="color: #4D4D4D">{{$nombre}}</span></p>
    <p style="font-family: 'Poppins'; color: #31297B;"><strong>Tipo de Brief: </strong><span style="color: #4D4D4D">{{$tipo}}</span></p>
    <p style="font-family: 'Poppins'; color: #4D4D4D;">Ya está disponible su visualización en sistema</p>
</body>
</html>