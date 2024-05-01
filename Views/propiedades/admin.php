<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php 
            if($mensaje) {
            $mensaje = mostrarMensaje( intval($mensaje));
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje) ?> </p>
            <?php } 
        } ?>

        <a href="/propiedades/crear" class="boton boton_verde">Nueva Propiedad</a>
        <a href="/vendedores/crear" class="boton boton_morado">Nuev@ Vendedor(a)</a>

        <h2>PROPIEDADES</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados-->
                <?php foreach( $propiedades as $propiedad ): ?>
                <tr>
                    <td><?php echo $propiedad->id; ?></td>
                    <td><?php echo $propiedad->titulo; ?></td>
                    <td> <img class="imagen_tabla" src="/imagenes/<?php echo $propiedad->imagen;?>"></td>
                    <td> $ <?php echo $propiedad->precio; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/propiedades/eliminar">
                            <!--Input que no es visible pero se le pasa los datos a eliminar-->
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton_rojo-block" value="Eliminar">
                        </form>

                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" 
                        class="boton_gold-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>

        <h2>VENDEDORES</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Cédula</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados-->
                <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td>#<?php echo $vendedor->telefono; ?></td>
                    <td><?php echo $vendedor->correo; ?></td>
                    <td><?php echo $vendedor->cedula; ?></td>
                    
                    <td>
                        <form method="POST" class="w-100" action="/vendedores/eliminar">
                            <!--Input que no es visible pero se le pasa los datos a eliminar-->
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton_rojo-block" value="Eliminar">
                        </form>

                        <a href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>" 
                        class="boton_gold-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>