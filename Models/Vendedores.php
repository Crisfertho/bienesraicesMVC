<?php

namespace Model;

class Vendedores extends ActiveRecord {
    protected static $table = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'correo', 'cedula' ]; 

    public $id;
    public $nombre;
    public $apellido;
    public $telefono; 
    public $correo;
    public $cedula;


    public function __construct($args = []){

        
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->cedula = $args['cedula'] ?? '';
        
    }

    public function validar() {
    
        if(!$this->nombre) { // ! = si no hay nombre.... 
            self::$errores[] = "Debes añadir un nombre"; 
        }
        if(!$this->apellido) { 
            self::$errores[] = "Debes añadir un apellido"; 
        }
        if(!$this->cedula) { 
            self::$errores[] = "Debes añadir una cedula"; 
        }
        if(!$this->telefono) { 
            self::$errores[] = "Debes añadir un telefono"; 
        }
        if(!$this->correo) { 
            self::$errores[] = "Debes añadir un correo"; 
        }

        if(!preg_match('/[0-9]{8}/', $this->telefono)) {//   Buscar un patron dentro de un texto
            self::$errores[] = "Formato no Válido";
        }
        
        return self::$errores;
    }
}