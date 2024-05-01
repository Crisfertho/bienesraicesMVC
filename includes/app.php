<?php 

//Manda a llamar funciones, base de datos, clases...
require 'funciones.php';
require 'config/database.php'; //conexión Base de Datos
require __DIR__ . '/../vendor/autoload.php';

//Conectar a la Base de Datos
$db = conectarBD();

use Model\ActiveRecord;

ActiveRecord::setDB($db); //referencia a la base de datos

