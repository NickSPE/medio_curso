<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

class PropiedadesProductos
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function obtenerPropiedadesProductos()
    {
        $query = $this->conexion->query('SELECT
            NOREG,
            NUMERO,
            PARAMETRO,
            VALOR,
            ORDEN        FROM PROPIEDADESPRODUCTOS');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertarPropiedadesProductos(
        $NUMERO,
        $PARAMETRO,
        $VALOR,
        $ORDEN    )
    {
        $query = 'INSERT INTO PROPIEDADESPRODUCTOS (
            NUMERO,
            PARAMETRO,
            VALOR,
            ORDEN        ) VALUES (
            :NUMERO,
            :PARAMETRO,
            :VALOR,
            :ORDEN        )';
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':NUMERO', $NUMERO);
        $stmt->bindParam(':PARAMETRO', $PARAMETRO);
        $stmt->bindParam(':VALOR', $VALOR);
        $stmt->bindParam(':ORDEN', $ORDEN);
        return $stmt->execute();
    }

    public function editarPropiedadesProductos(
        $NOREG,
        $NUMERO,
        $PARAMETRO,
        $VALOR,
        $ORDEN    )
    {
        $query = "UPDATE PROPIEDADESPRODUCTOS SET
            NUMERO = :NUMERO,
            PARAMETRO = :PARAMETRO,
            VALOR = :VALOR,
            ORDEN = :ORDEN        WHERE NOREG = :NOREG";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':NOREG', $NOREG);
        $stmt->bindParam(':NUMERO', $NUMERO);
        $stmt->bindParam(':PARAMETRO', $PARAMETRO);
        $stmt->bindParam(':VALOR', $VALOR);
        $stmt->bindParam(':ORDEN', $ORDEN);
        return $stmt->execute();
    }

    public function eliminarPropiedadesProductos($NOREG)
    {
        $query = "DELETE FROM PROPIEDADESPRODUCTOS WHERE NOREG = :NOREG";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':NOREG', $NOREG, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
