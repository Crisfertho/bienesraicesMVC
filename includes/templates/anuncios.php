<?php

use App\Propiedades;


if($_SERVER['SCRIPT_NAME'] === '/anuncios.php') {
    $propiedades = Propiedades::all();
}else {
    $propiedades = Propiedades::get(3);
}
?>

<div class="contenedor_anuncios">
    <?php foreach($propiedades as $propiedad) { ?>

            <div class="anuncio">

                <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">
              
                <div class="contenido_anuncio">
                    <h3><?php echo $propiedad->titulo; ?></h3>
                    <p class="texto"><?php echo $propiedad->descripcion; ?></p>
                    <p class="precio"><?php echo $propiedad->precio; ?></p>

                    <ul class="iconos_caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad->wc; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono Estacionamiento">
                            <p><?php echo $propiedad->estacionamiento; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono Dormitorio">
                            <p><?php echo $propiedad->habitaciones; ?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad->id?>" class="boton_verde-block">
                        Ver Propiedad
                    </a>
                </div> <!--Contenido anuncio-->
            </div><!--anuncio-->

    <?php } ?>    

</div><!--Contenedor_anuncios-->

<?php

//Cerrar la conexión
mysqli_close($db);

?>