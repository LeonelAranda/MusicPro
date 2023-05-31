<?php
//Modelo productos admon

class AdmonProductosModelo
{
    private $db;

    function __construct()
    {

        $this->db = new MySQLdb();
    }

    public function insertarDatos($data)
    {
    }

    public function getProductos()
    {
        $sql = "SELECT * FROM productos WHERE baja=0";
        $data = $this->db->querySelect($sql);
        return $data;
    }
    public function getCatalogo()
    {
        $sql = "SELECT id, nombre, tipo FROM productos ";
        $sql .= "WHERE baja=0 AND status!=0 ";
        $sql .= " ORDER BY tipo, nombre";
        $data = $this->db->querySelect($sql);
        return $data;
    }

    public function getLlaves($tipo)
    {
        $sql = "SELECT * FROM llaves WHERE tipo='" . $tipo . "' ORDER BY indice DESC";
        $data = $this->db->querySelect($sql);
        return $data;
    }

    public function getProductosId($id)
    {
        $sql = "SELECT * FROM productos WHERE id=" . $id;
        $data = $this->db->querySelect($sql);
        return $data;
    }

    public function bajaLogica($id)
    {
        $errores = array();
        $sql = "UPDATE productos admon SET baja=1, baja_dt=(NOW()) WHERE id = " . $id;
        if (!$this->db->queryNoSelect($sql)) {
            array_push($errores, "Error al modificar el registro para baja.");
        }
        return $errores;
    }

    public function modificaProductos($data)
    {
        $errores = array();

        return $errores;
    }

    public function altaProducto($data)
    {
        $sql = "INSERT INTO productos VALUES(0,"; //id
        $sql .= "'" . $data['tipo'] . "',"; //tipo
        $sql .= "'" . $data['nombre'] . "',"; //nombre
        $sql .= "'" . $data['descripcion'] . "',"; //descripcion
        $sql .= "'" . $data['marca'] . "',"; //marca
        $sql .=  $data['precio'] . ","; //precio
        $sql .=  $data['descuento'] . ","; //descuento
        $sql .=  $data['envio'] . ","; //envio
        $sql .= "'" . $data['imagen'] . "',"; //imagen
        $sql .= "'" . $data['fecha'] . "',"; //fecha
        $sql .= "'" . $data['status'] . "',"; //status
        $sql .= "0, "; //baja
        $sql .= "(NOW()), "; //creado_dt
        $sql .= "'', "; //creado_dt
        $sql .= "'') "; //baja_dt

        print $sql;
        return $this->db->queryNoSelect($sql);
    }
}
