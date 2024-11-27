<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';
//todo relacionado a la base de datos deve de estar en el modelo
class modelousuario
{
    private $conexion;

    public function __construct()
        {
            $this->conexion = Conexion::obtenerconexion();
        }
    public function obtenerUsuarios()
        {
            $query = $this->conexion->query('select id,username,password,perfil from usuarios');
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    public function insertarUsuarios($username, $password, $perfil)
        {

            $stmt = $this->conexion->prepare('INSERT INTO usuarios (username, password, perfil) VALUES (:username, :password, :perfil)');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':perfil', $perfil);
            return $stmt->execute();
        }
      
    public function eliminarUsuario($username)
        {
            $query="delete from usuarios where username=:username";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':username', $username);
            return $stmt->execute();
        }
    public function actualizarUsuario($id, $username, $password, $perfil)
        {
            $query = "update usuarios set username=:username, password=:password, perfil=:perfil where id=:id"; 
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':perfil', $perfil, PDO::PARAM_STR);
            return $stmt->execute();
        
        }
    public function obtenerUsuarioPorNombre($username)
        {
            $query="select id,username,password,perfil from usuarios where username=:username";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    public function existeUsuario($username)
        {
            $query="select id,username,password,perfil from usuarios where username=:username";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    public function validarCredenciales($username) {
            $query = "SELECT username, password FROM usuarios WHERE BINARY username = :username LIMIT 1";
            $stmt = $this->conexion->prepare($query);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        


}
