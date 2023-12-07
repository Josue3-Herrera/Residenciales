<?php
include 'conexion.php';

class auth extends conexion{
    public function registrar($usuario, $password, $nombre, $apellidos,$email,$telefono,$direccion){
        $conexion = parent::conectar();
        $sql = 'INSERT INTO t_usuarios (usuario, password, nombre, apellidos, rol, email,telefono,direccion) VALUES (?, ?, ?, ?, 1, ?, ?, ?)';
        $query = $conexion->prepare($sql);
        $query->bind_param('sssssss', $usuario, $password, $nombre, $apellidos,$email, $telefono, $direccion);
        
        if ($query->execute()) {
            return true; // Registro exitoso
        } else {
            if ($conexion->errno == 1062) {
                
                echo "Error";
            } else {
                // Otro error
                die("Error en la inserción: " . $conexion->error);
            }
        }
    }
    

    
    public function logear($usario, $password){
        $conexion = parent::conectar();
        $passwordExistente="";
        $sql = "SELECT * FROM t_usuarios WHERE BINARY usuario = '$usario'";
        $respuesta = mysqli_query($conexion, $sql);
        $passwordExistente = mysqli_fetch_array($respuesta)['password'];

        if (password_verify($password, $passwordExistente)){
            $_SESSION['usuario']=$usario;
            return true;
        }
        else{
            return false;
        }
    }

    public function obtenerRol($usuario) {
        $conexion = parent::conectar();
        $sql = "SELECT rol FROM t_usuarios WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexion, $sql);
        $rol = mysqli_fetch_array($resultado)['rol'];
        return $rol;
    }    

}
?>