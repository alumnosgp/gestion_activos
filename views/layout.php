<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="build/js/app.js"></script>
    <link rel="shortcut icon" href="<?= asset('images/cit.png') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('build/styles.css') ?>">
    <title>LOGIN</title>
    <!-- <style>
        body {
            background-image: url('C:\docker\gestion_activos\CIBERDEFENSA.png'); /* Cambia 'background-image.jpg' a la imagen de fondo que desees */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container-fluid {
            background: rgba(255, 255, 255, 0.8); /* Fondo semi-transparente */
            padding: 20px;
            border-radius: 10px;
        }
    </style> -->
</head>
<body class="bg-image bg-opcity-50">
    <div class="bg-light bg-opacity-10 w-100" style="height: 100vh;">
    <div class="container-fluid pt-5 mb-4" style="min-height: 85vh">
        
        <?php echo $contenido; ?>
    </div>

    </div>



</body>
</html>