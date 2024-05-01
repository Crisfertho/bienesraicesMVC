<?php

    //Revisa si la session ya esta iniciada, si no hay que iniciarla
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices Guanacaste</title>
    <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> <!--si la variable de inicio es true que la agregue si no, no agregue nada-->
        <div class="contenedor contenedor-header">
            <div class="barra">
                <a href="index.php"> <!--"/"Siempre me lleva a la pagina principal -->
                   <!-- <img src="/build/img/logo.svg" alt="Logotipo"> -->
                </a>

                <div class="menu-mobile">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="darkbotton" src="/build/img/dark-mode.svg">
                    <nav class="barra_navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="blog.php">Blog</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login.php">Login</a>
                        <?php endif; ?>
                        <?php if($auth): ?>
                            <a href="/admin">Administrar</a>
                            <a href="/cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?> 
                    </nav>
                </div>
               
                
            </div> <!--Cierre de barra-->

            <?php if($inicio) { ?>
                <h1>Venta de Casas, Departamentos, Lotes y Fincas</h1>
            <?php } ?>    
        </div>

    </header>