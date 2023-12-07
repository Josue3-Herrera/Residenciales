<?php
class conexion{
    public $servidor='localhost';
    public $usuario='root';
    public $password='';
    public $database='privadas';

    public function conectar(){
        return mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->database
        );
    }
    
}
?>