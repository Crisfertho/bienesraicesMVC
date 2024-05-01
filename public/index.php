<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\Controller;
use Controllers\ControllerV;
use Controllers\PageControllers;

$router = new Router();

//Zona Privada
$router->get('/admin', [Controller::class, 'index']);
$router->get('/propiedades/crear', [Controller::class, 'crear']);
$router->post('/propiedades/crear', [Controller::class, 'crear']);
$router->get('/propiedades/actualizar', [Controller::class, 'actualizar']);
$router->post('/propiedades/actualizar', [Controller::class, 'actualizar']);
$router->post('/propiedades/eliminar', [Controller::class, 'eliminar']);

$router->get('/vendedores/crear', [ControllerV::class, 'crear']);
$router->post('/vendedores/crear', [ControllerV::class, 'crear']);
$router->get('/vendedores/actualizar', [ControllerV::class, 'actualizar']);
$router->post('/vendedores/actualizar', [ControllerV::class, 'actualizar']);
$router->post('/vendedores/eliminar', [ControllerV::class, 'eliminar']);

//Zona Publica
$router->get('/', [PageControllers::class, 'index']);
$router->get('/nosotros', [PageControllers::class, 'nosotros']);
$router->get('/propiedades', [PageControllers::class, 'propiedades']);
$router->get('/propiedad', [PageControllers::class, 'propiedad']);
$router->get('/blog', [PageControllers::class, 'blog']);
$router->get('/entrada', [PageControllers::class, 'entrada']);
$router->get('/contacto', [PageControllers::class, 'contacto']);
$router->post('/contacto', [PageControllers::class, 'contacto']);

//Login y Autenticación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


$router->comprobarRutas();