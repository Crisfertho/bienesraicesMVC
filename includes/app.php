<?php 
use Model\ActiveRecord;

//Manda a llamar funciones, base de datos, clases...
require __DIR__ . '/../vendor/autoload.php';
require 'funciones.php';
require 'config/database.php'; //conexión Base de Datos

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad()>

//Conectar a la Base de Datos
$db = conectarBD();

ActiveRecord::setDB($db); //referencia a la base de datos

