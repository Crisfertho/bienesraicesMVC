<main class="contenedor seccion">
    <h1>Actualizar</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data"> 
        <?php include __DIR__ . '/formulario.php'; ?>

        <div class="contactoB">
        <input type="submit" value="Actualizar Propiedad" class="boton boton_verde" >
        <a href="/admin" class="boton boton_verde">VOLVER
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="28" height="28" viewBox="0 -7 25 25" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M13 14l-4 -4l4 -4" />
                        <path d="M8 14l-4 -4l4 -4" />
                        <path d="M9 10h7a4 4 0 1 1 0 8h-1" />
                </svg>
        </a>
        </div>
    </form>
</main>