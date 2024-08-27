<?php

    //Revisa si la session ya esta iniciada, si no hay que iniciarla
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BienesRaices Guanacaste</title>
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>"> <!--si la variable de inicio es true que la agregue si no, no agregue nada-->
        <div class="contenedor-header contenedor">
            <div class="barra">
                <a href="/"> <!--"/"Siempre me lleva a la pagina principal -->
                  <p> <span>BienesRaices </span> Guanacaste</p> 
                  <!--  <img src="/build/img/logo.svg" alt="Logotipo"> -->
                </a>

                <div class="menu-mobile">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="darkbotton" src="/build/img/dark-mode.svg">
                    <nav class="barra_navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/blog">Blog</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/contacto">Contacto</a>
                        <?php if (!$auth) : ?>
                            <a href="/login">Login</a>
                        <?php endif; ?>
                        <?php if($auth): ?>
                            <a href="/admin">Administrar</a>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?> 
                    </nav>
                </div>
               
                
            </div> <!--Cierre de barra-->

            <?php if($inicio) { ?>
                <h1 class="">Venta y Alquiler de Casas y Departamentos</h1>
            <?php } ?>    
        </div>

    </header>

    <?php echo $contenido; ?>

    <footer class="footer ">
        <div class="contenedor contenedor-footer">
            <nav class="barra_navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/blog">Blog</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Proyecto Bienes Raices(CRG) <?php echo date('Y'); ?> &copy;</p>

    </footer>
    
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>