<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedades;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class Controller {
    public static function index(Router $router) {

        $propiedades = Propiedades::all();
        $vendedores = Vendedores::all(); 


        //Muestra mensaje condicional
        $mensaje = $_GET['mensaje'] ?? null; 

        $router->view('propiedades/admin', [
            'propiedades' => $propiedades,
            'mensaje' => $mensaje,
            'vendedores' =>$vendedores
        ] );
    }
    public static function crear(Router $router) {

        $propiedad = new Propiedades;
        $vendedores = Vendedores::all();

        //Arreglo con msj de errorres
        $errores = Propiedades::getErrores();
        
        //Método POST para actualizar
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        //Crea una nueva instancia
        $propiedad = new Propiedades($_POST['propiedad']); //Objeto que vamos a mapeaar
       
       //Generar nombre único para imagen
       $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

       //Setear la imagen
       //Realiza un resize a la imagen con Intervention
       if($_FILES['propiedad']['tmp_name']['imagen']){
           $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
           $propiedad->setImagen($nombreImagen);
       }  

       //VALIDAR   
       $errores = $propiedad->validar();
       
       //Revisar que arreglo de errores este vacío
       if(empty($errores)) {

           //Crear carpeta para subir imagenes
           if(!is_dir(CARPETA_IMAGENES)){
               mkdir(CARPETA_IMAGENES);
           }

           //Guarda la imagen en el servidor
           $image->save(CARPETA_IMAGENES . $nombreImagen);

           //Guarda en la BD
           $propiedad->guardar();

       }

        }

        $router->view('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router) {
        
    $id = Validar('/admin');
    $propiedad = Propiedades::find($id);
    $vendedores = Vendedores::all();

    $errores = Propiedades::getErrores();

    //método POST para actualizar
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //asiganar atributos
        $args = $_POST['propiedad'];
        $propiedad->sincronizar($args);

        //Validación
        $errores = $propiedad->validar();
        // Subida de archivos
         //Revisar que arreglo de errores este vacío
          if(empty($errores)) {
           
            //Generar nombre único para imagen
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            if($_FILES['propiedad']['tmp_name']['imagen']){
                //Realiza un resize a la imagen con Intervention
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                //setear la imagen
                $propiedad->setImagen($nombreImagen);
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
            }
            $propiedad->guardar();
        }
    }

    $router->view('/propiedades/actualizar', [
        'propiedad' => $propiedad,
        'errores' => $errores,
        'vendedores' => $vendedores
    ]);

    }

    public static function eliminar() {
         if ($_SERVER['REQUEST_METHOD'] === 'POST'){ 
           
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
 
             $tipo = $_POST['tipo'];

             if(validarEliminar($tipo)) {
                $propiedad = Propiedades::find($id);
                $propiedad->eliminar();
             }
            }
        } 
    }
}