<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta author="Carlos Guadalupe López Trejo">
    <link rel="shortcut icon" href="https://lerochelle.000webhostapp.com/app/static/images/image.ico">
    <title>Página no encontrada</title>
    <!-- Agrega enlaces a los estilos de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados */
        .error-container {
            background-color: #704214;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            text-align: center;
        }

        .error-heading {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 24px;
            color: #fff;
        }

        .error-message {
            font-size: 24px;
            color: #fff;
        }

        .brand-logo {
            font-size: 24px;
            color: #fff;
            margin-top: 40px;
        }
    </style>
</head>

<body class="bg-gradient-to-r from-yellow-700 via-yellow-600 to-red-700">
    <div class="flex justify-center items-center h-screen">
        <div class="error-container">
            <h1 class="error-heading">Página no encontrada</h1>
            <p class="error-message">La página que estás buscando no se pudo encontrar.</p>
            <p class="brand-logo">Le Rochelle Real State</p>
        </div>
    </div>

    <!-- Agrega el script de JavaScript -->
    <script>
        // Animación del mensaje de error
        var errorHeading = document.querySelector('.error-heading');
        var errorMessage = document.querySelector('.error-message');
        errorHeading.classList.add('animate-bounce');
        errorMessage.classList.add('animate-fadeInUp');

        // Animación de la marca de la empresa
        var brandLogo = document.querySelector('.brand-logo');
        brandLogo.style.animation = 'fadeInUp 0.8s ease-in-out';
    </script>
</body>

</html>
