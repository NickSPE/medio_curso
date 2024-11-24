<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/conexion.php';
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
        // $stmt = $this->conexion->prepare($query);
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
    //deve hacer hacer un metodo para hacer un select


}
