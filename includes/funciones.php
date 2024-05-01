<?php   


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false ) {
    include  TEMPLATES_URL ."/$nombre.php";
}

function Autenticado() {
    session_start();

    if(!$_SESSION['login']){
      //return true;
       header('Location: /');
    } 
}

function debug($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;

}

//Escapa / Sanitizar el HTML
function s($html) : string {  
    $s = htmlspecialchars($html);
    return $s;
} 

//Validar a eliminar
function validarEliminar($tipo) {
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}

//Muestra Mensajes
function mostrarMensaje($codigo) {
   $mensaje = '';

   switch($codigo) {
    case 1:
        $mensaje = 'Creado Correctamente';
    break;

    case 2:
        $mensaje = 'Actualizado Correctamente';
    break;

    case 3:
        $mensaje = 'Eliminado Correctamente';
    break;

    default:
        $mensaje = false;
    break; 
   }
    return $mensaje;
}

function Validar (string $url) {
     //Validar Id
     $id = $_GET['id']; //Para obtener el valo del id
     $id = filter_var($id, FILTER_VALIDATE_INT); //Valida que sea solo numeros.
  
     if(!$id){
          header("Location: $url");
     }
     return $id;
}