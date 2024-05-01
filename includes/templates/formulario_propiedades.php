
<fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de Propiedad" value="<?php echo s($propiedad->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de Propiedad" value="<?php echo s($propiedad->precio); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]"> 
                <!-- "accept"- solo acepta el tipo de archivo indicado  -->

                <?php if($propiedad->imagen) { ?>
                    <img src="/imagenes/<?php echo $propiedad->imagen ?>" class="imagen_small">
                <?php } ?>

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="propiedad[descripcion]"><?php echo s($propiedad->descripcion); ?></textarea>
            </fieldset>

            <fieldset>
                <legend>Información de Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ejm: 2" min="1" max="9" 
                value="<?php echo s($propiedad->habitaciones); ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="propiedad[wc]" placeholder="Ejm: 2" min="1" max="5" value="<?php echo s($propiedad->wc); ?>">

                <label for="estacionamiento">Estacionamientos:</label>
                <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="Ejm: 2" min="1" max="5" 
                value="<?php echo s($propiedad->estacionamiento); ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <label>Vendedor </label>
                <select name="propiedad[vendedores_id]" id="vendedores">
                    <option select value="">-- Seleccione --</option>
                    <?php foreach($vendedores as $vendedor) { ?>
                        <option <?php echo $propiedad->vendedores_id === $vendedor->id ? 'selected' : ';' ?> value="<?php echo s($vendedor->id); ?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?> </option>
                    <?php } ?>
                </select>
                
            </fieldset>