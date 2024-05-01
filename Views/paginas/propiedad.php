<main class="contenedor seccion contenido-centrado">
      
        <h1><?php echo $propiedad->titulo; ?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen de la propiedad" class="roundimg">

        <div class="resumen-propiedad">
            <p class="precio">$ <?php echo $propiedad->precio; ?></p>

            <ul class="iconos_caracteristicas">
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad->wc; ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono Estacionamiento">
                    <p><?php echo $propiedad->estacionamiento; ?></p>
                </li>
                <li>
                    <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono Dormitorio">
                    <p><?php echo $propiedad->habitaciones; ?></p>
                </li>
            </ul>

            <p class="texto"><?php echo $propiedad->descripcion; ?></p>

        </div>

        <div class="alinear_derecha">
        <a href="/propiedades" class="boton boton_verde">VOLVER 
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="28" height="28" viewBox="0 -9 25 25" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M13 14l-4 -4l4 -4" />
        <path d="M8 14l-4 -4l4 -4" />
        <path d="M9 10h7a4 4 0 1 1 0 8h-1" />
        </svg>
        </a>
        </div>
          
    </main>