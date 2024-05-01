<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedades;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class ControllerV {
    public static function crear (Router $router) {

        $errores = Vendedores::getErrores();

        $vendedor = new Vendedores;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear nueva instancia
            $vendedor = new Vendedores($_POST['vendedores']);
        
            //validar que no haya campos vacios
            $errores = $vendedor->validar();
         
            //Si no hay errores
           if(empty($errores)) {
              $vendedor->guardar();
            } 
        }

        $router->view('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor

        ]);
    }
    public static function actualizar (Router $router) {

        $errores = Vendedores::getErrores();
        $id = Validar('/admin');
        //Datos de vendedor a actualizar
        $vendedor= Vendedores::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //AsignarValores
            $args = $_POST['vendedores'];
        
            $vendedor->sincronizar($args);
           
            //validación
            $errores = $vendedor->validar();
            if(empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->view('/vendedores/actualizar', [
            'errores' => $errores,
            'vendedor'=> $vendedor
        
        ]);
    }
    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
         
            //valida el id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id) {
                //velidar el ripo a eliminar
                  $tipo = $_POST['tipo'];

                  
                  if(validarEliminar($tipo)) {
                    $vendedor = Vendedores::find($id);
                    $vendedor->eliminar();
                  }
            }
        }
    }
}