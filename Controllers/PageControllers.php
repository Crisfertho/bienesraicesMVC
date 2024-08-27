<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedades;
use PHPMailer\PHPMailer\PHPMailer;

class PageControllers  {
    public static function index(Router $router) {

        $propiedades = Propiedades::get(3);
        $inicio = true;

        $router->view('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    public static function nosotros(Router $router) {
        $router->view('paginas/nosotros');
    }
    public static function propiedades(Router $router) {
        $propiedades = Propiedades::all();
        $router->view('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router) {
        $id = Validar('/propiedades');
        $propiedad = Propiedades::find($id);
        $router->view('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router) {

        $router->view('paginas/blog');//Recomienda hacerlo dinamico(Para aprender)
    }
    public static function entrada(Router $router) {

        $router->view('paginas/entrada');
    }
    public static function entrada2(Router $router) {

        $router->view('paginas/entrada2');
    }
    public static function entrada3(Router $router) {

        $router->view('paginas/entrada3');
    }
    public static function entrada4(Router $router) {

        $router->view('paginas/entrada4');
    }
    public static function contacto(Router $router) {

        $mensaje=null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuesta = $_POST['contacto'];

            //debug($_POST);


             //Crear nuevo objeto
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'eebaad7be8a32b';
            $mail->Password = 'd22dbf373dca9a';
    
            //configurar contenido del mail
            $mail->setFrom('admin@bienesraicescrg.com');//Quien envia el email
            $mail->addAddress('admin@bienesraincescrg.com', 'BienesRaicesCRG.com');//a que email va a llebgar ese correo
            $mail->Subject = 'Tiene un nuevo mensaje';
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html> <p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuesta['nombre'] . ' </p>';
            if($respuesta['contacto'] === 'telefono') {
                $contenido .= '<p>Elegió ser contactado por teléfono.</p>';
                $contenido .= '<p>Telefono: ' . $respuesta['telefono'] . ' </p>';
                $contenido .= '<p>Fecha: ' . $respuesta['fecha'] . ' </p>';
                $contenido .= '<p>Hora: ' . $respuesta['hora'] . ' </p>';
            } else {
                $contenido .= '<p>Elegió ser contactado por email.</p>';
                $contenido .= '<p>Email: ' . $respuesta['email'] . '</p>';
            }
            $contenido .= '<p>Mensaje: ' . $respuesta['mensaje'] . ' </p>';
            $contenido .= '<p>Vende, Compra o Alquila: ' . $respuesta['tipo'] . ' </p>';
            $contenido .= '<p>Precio o Presupuesto: $' . $respuesta['precio'] . ' </p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin HTML';

            if($mail->send()) {
                $mensaje = "Enviado Correctamente";
            }else {
                $mensaje = "No se ha podido enviar. Intente de nuevo..";
            }

            
        }
        $router->view('paginas/contacto', [
            'mensaje' => $mensaje
        ]);        
        
    }
}