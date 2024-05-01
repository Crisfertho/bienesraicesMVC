document.addEventListener('DOMContentLoaded', function() { 
// Que el documento este cargado y que cargue html, js y css y ejecuta una funcion, 
//una vez ejecutado el evento se ejcuta la funcion, esto se llama callback

    eventListeners();

    darkMode();

});

function eventListeners() {

    const mobileMenu = document.querySelector('.menu-mobile');

    mobileMenu.addEventListener('click', navResponsive); 
    // cuando de click en el mobilemenu, manda a llamar la funcion

    //Muestra condicionales
    const methodcontact = document.querySelectorAll('input[name="contacto[contacto]"]');
    methodcontact.forEach(input => input.addEventListener('click', showMethodContact))

}

function navResponsive() {

    const nav = document.querySelector('.barra_navegacion');

    if(nav.classList.contains('mostrar')){
        nav.classList.remove('mostrar');
    } else {
        nav.classList.add('mostrar');
    }

    //Lo mismo que lo anterior pero menos codigo
    //nav.classList.toggle('mostrar'); //Si la tiene la agrega y si no la quita

    //console.log('desde navegacion responsive'); para revisar en consola si esta funcionando
}

function showMethodContact(e) {
    const idContactDiv = document.querySelector('#idContacto');

   if(e.target.value === 'telefono') {
        idContactDiv.innerHTML = `
        <label for="telefono">Teléfono</label>
        <input type="tel" placeholder="Tu Télefono" id="telefono" name="contacto[telefono]" >

        <p>Elija la fecha y hora para la llamada</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        idContactDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu Email" id="email" name="contacto[email]">
        `;
    }
}

function darkMode() {

    const prefiereDarkMode= window.matchMedia('(prefers-color-scheme: dark)');

    //console.log('prefieredarkMode.matches');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function() {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const bottondarkMode = document.querySelector('.darkbotton');

    bottondarkMode.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');

      //Para que el modo elegido se quede guardado en local-storage
      if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('modo-oscuro','true');
        } else {
        localStorage.setItem('modo-oscuro','false');
        }

    });

    //Obtenemos el modo del color actual
    if (localStorage.getItem('modo-oscuro') === 'true') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }
    

}

function toggleVisibility() {
    var passwordField = document.getElementById("password");
    var icon = document.querySelector(".togglePass");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.textContent = "👁️";
    } else {
      passwordField.type = "password";
      icon.textContent = "👁️";
    }
  }