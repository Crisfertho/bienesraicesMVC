<?php

function conectarBD() : mysqli {
    
    $db = new mysqli('localhost', 'root', 'CRGmysql', 'bienesraices_crud');
    //$db = new mysqli('localhost', 'id22110860_root', 'WebbienesraicesG24.', 'id22110860_bienesraicesguanacaste');

    if(!$db){
        echo "Error,no se pudo conectar";
        exit;
    }

    return $db;
}