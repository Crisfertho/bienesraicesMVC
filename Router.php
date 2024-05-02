<?php

namespace MVC;

class Router{

    public $rutasGET = [];  
    public $rutasPOST = []; 

    public function get($url, $fnc) {
        $this->rutasGET[$url] = $fnc;
    }

    public function post($url, $fnc) {
        $this->rutasPOST[$url] = $fnc;
    }
    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login'] ?? null;

        //Arreglo
        $rutasprotegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',
        '/vendedores/crear', 'vendedores/actualizar', '/vendedores/eliminar' ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        //$urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET') {
            //$urlActual = explode('?', $urlActual)[0];
            $fnc = $this->rutasGET[$urlActual] ?? null;
        }else {
            $fnc = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas
        if(in_array($urlActual, $rutasprotegidas) && !$auth){
            header('Location: /');
        }

        if($fnc) {
            call_user_func($fnc, $this);
        }else {
            echo "Página no Encontrada";
        }
    }

    //Muestra de Vista
    public function view($view, $datos = []) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); //Inicia el almacenamiento en memoria
        include_once __DIR__ . "/Views/$view.php";

        $contenido = ob_get_clean(); //Limpiamos la memoria

        include_once __DIR__ . "/Views/layout.php";
    }
}