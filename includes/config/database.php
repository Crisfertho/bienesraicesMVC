<?php

function conectarBD() : mysqli {
    
    $db = new mysqli('localhost', 'root', 'CRGmysql', 'bienesraices_crud');

    if(!$db){
        echo "Error,no se pudo conectar";
        exit;
    }

    return $db;
}