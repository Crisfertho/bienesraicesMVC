<?php 

namespace Model;

class ActiveRecord {
    //Base de Datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $table = '';
    
    //Errores
    protected static $errores = [];


     //Definir la conexión a la BD
     public static function setDB($database){
        self::$db = $database; //no es necesario static, self busca la conexión en la clase principal
    }


    public function guardar(){
        if(!is_null($this->id)) {
            //actualizar
            $this->actualizar();
        }else {
            //crea nuevo registro
            $this->crear();
        }
    }

    public function crear(){
        //Sanitizar los datos
        $datos = $this->sanitizarDatos(); //Manda a llamar la función sanitizarDatos
        //Insertar en BD
        $query = "INSERT INTO " . static::$table . " ( ";
        $query .= join(', ', array_keys($datos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($datos));
        $query .= " ') ";

        //forma más corta
        /*$columnas = join(', ', array_keys($datos));
        $filas = join("', '",array_values($datos));
        $query = "INSERT INTO propiedades($columnas) VALUES ('$filas')";*/

        $resultado = self::$db->query($query); //Instancia a la BD, la flecha es por la POO
        //MSJ de exito o error
        if($resultado) {
            header('Location: /admin?mensaje=1');
        }
        
    }

    public function actualizar(){
        //Sanitizar los datos
        $datos = $this->sanitizarDatos(); //Manda a llamar la función sanitizarDatos

        $valores = [];
        foreach($datos as $key => $value) {
            $valores[] = "{$key}='{$value}'"; //
        }

        /*$query = "UPDATE propiedades SET titulo = '$this->titulo', precio = '$this->precio', descripcion = '$this->descripcion', 
        habitaciones = '$this->habitaciones', wc = '$this->wc', estacionamiento = '$this->estacionamiento', vendedores_id = '$this->vendedores_id',
         imagen = '$this->imagen'  WHERE id = '$this->id' ";*/

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado) {
            //Redireccionar al usuario para que no dupliquen los datos.
            header('Location: /admin?mensaje=2');
        }
        //return $resultado;
    }

    //Eliminar un registro
    public function eliminar () {
          //Eliminar Propiedad
          $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
          $resultado = self::$db->query($query);
          if($resultado) {
            $this->borrarImagen();
            header('location: /admin?mensaje=3');
          }
          
    }

    //Identificar y unir los datos de la DB
    public function datos(){
        $datos = [];
        foreach(static::$columnasDB as $columna){
            if ($columna === 'id') continue; //Para evitar problemas con el id a la hora de sanitizar
            //continue = cuando se cumple el if deja de aplicar la condición
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }

   public function sanitizarDatos(){
        $datos = $this->datos();
        $sanitizar = [];

        foreach($datos as $key => $value){
            $sanitizar[$key] = self::$db->escape_string($value);
        }
        return $sanitizar;
   }

   public function setImagen($imagen){
    //Elimina imagen previa
    if(!is_null($this->id)) {
        $this->borrarImagen();
    }
    //Asignar al atributo de imagen el nombre de la imagen
    if($imagen){
        $this->imagen = $imagen;
    }
   }

   //Delete image
   public function borrarImagen() {
    //Elimina imagen
        $existearchivo = file_exists(CARPETA_IMAGENES . $this->imagen);//comprueba si existe el archivo
        if($existearchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
   }

   //Validación
   public static function getErrores() {
        return static::$errores;
   }

   public function validar() {
        static::$errores = [];
        return static::$errores;
    }

   //lista todas las priopiedades
   public static function all() {
        $query = "SELECT * FROM " . static::$table; //static hereda el metodo de la clase padre
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Obtiene un determinado # de registros
    public static function get($cantidad) {
        $query = "SELECT * FROM " . static::$table . " LIMIT " . $cantidad; //static hereda el metodo de la clase padre
        
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

   //Busca un registro por ID
   public static function find($id){
        $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

   public static function consultarSQL($query) {
        //consultar la BD
        $resultado = self::$db->query($query);  
        //iterar resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
   }

   protected static function crearObjeto($registro) {
        $objeto = new static; //crea nuevos objetos

        foreach($registro as $key => $value) {
            if (property_exists($objeto, $key )) { //Comprueba en cada iteracion y mapea los datos de arreglos a objetos
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar ($args = []) {
        foreach($args as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}