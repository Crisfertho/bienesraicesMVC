<main class="contenedor seccion">
        <h1><b>Más sobre nosotros...</b></h1>

        <?php include 'iconos.php'?>
    </main>

    <section class="seccion contenedor">
        <h2><b>Lotes y Fincas en Ventas</b></h2>

        <?php

            $limite = 3;
            include 'listado.php';
        ?>

        <div class="alinear_derecha">
            <a href="/propiedades" class="boton_amarillo">Ver todas</a>
        </div>

    </section>

    <section class="imagen_contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario para ponernos en contacto contigo. Gracias</p>
        <a href="/contacto" class="boton_amarillo"> Contactános</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>
        
            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/ia1.webp" type="image/webp">
                        <source srcset="build/img/ia1.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/ia1.jpg" alt="Texto Entrada Blog" class="roundimg">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada">
                        <h4>Terraza en tu Casa de Lujo</h4>
                        <p class="informacion-meta">Escrito el: <span class="spandate">17/1/2024</span> por: <span>Admin</span></p>
                        <p>
                            Consejos para construir una terraza en tu casa conlos mejores materiales y ahorro de 
                            tiempo y dinero
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/ia2.webp" type="image/webp">
                        <source srcset="build/img/ia2.jpg" type="image/jpeg">
                        <img loading="lazy" src="build/img/ia2.jpg" alt="Texto Entrada Blog" class="roundimg">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="/entrada2">
                        <h4>Casa con piscina y vista increibles</h4>
                        <p class="informacion-meta">Escrito el: <span class="spandate">17/1/2024</span> por: <span>Admin</span></p>
                        <p>
                             Maximiza el espacio en tu hogar con las mejores tecnicas para que tu espacio sea comodo
                             y no haga falta diversión.
                        </p>
                    </a>
                </div>
            </article>            
        
        </section>

        <section class="testimonios">
            <h3>Testimonios</h3>
            <div class="testimonial">
                <blockquote>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                 </blockquote>
                <p>CRG</p>
            </div>

            <div class="testimonial">
                <blockquote>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                 </blockquote>
                <p>CRG</p>
            </div>
        </section>

    </div>