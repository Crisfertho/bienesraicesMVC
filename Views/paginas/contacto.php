<main class="contenedor seccion">
        
        <h1>Contacto</h1>

        <?php if($mensaje) {?>
            <p class='alerta exito'><?php echo $mensaje; ?></p>;
       <?php } ?>

        <picture>
            <source srcset="build/img/contacto.webp" type="image/webp">
            <source srcset="build/img/contacto.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/contacto.jpg" alt="Imagen Contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>
        <form class="formulario" action="/contacto" method="POST">
            <fieldset> <!--Cuadro del formulario-->
                <legend>Información Personal</legend>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <label for="opciones">Vende, Compra o Alquila:</label>
                <select id="opciones" name="contacto[tipo]" required>
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                    <option value="Vende">Alquila</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required> 
                        <!-- "name" Esto se hace para poder seleccionar solo 1 elemento de las opciones-->
                    <label for="contactar-email">E-mail</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
                </div>

                <div id="idContacto"></div>

            </fieldset>

            <div class="contactoB">
                <input type="submit" value="Enviar" class="boton_verde">
                
                <a href="/" class="boton_verde icono">VOLVER
                   <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="28" height="28" viewBox="0 -9 25 25" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M13 14l-4 -4l4 -4" />
                        <path d="M8 14l-4 -4l4 -4" />
                        <path d="M9 10h7a4 4 0 1 1 0 8h-1" />
                    </svg>
                </a>
            </div>

        </form>
    </main>