<?php
//Modelo usuarios admon

class AdmonUsuariosModelo
{
    private $db;

    function __construct()
    {

        $this->db = new MySQLdb();
    }

    public function insertarDatos($data)
    {
        $clave = hash_hmac("sha512", $data["clave1"], "mimamamemima");
        $sql = "INSERT INTO admon VALUES(0,";
        $sql .= "'" . $data['nombre'] . "',";
        $sql .= "'" . $data['usuario'] . "',";
        $sql .= "'" . $clave . "',";
        $sql .= "1, "; //clave
        $sql .= "0, "; //baja
        $sql .= "'', "; //fecha del ultimo login
        $sql .= "'', "; //decha de baja
        $sql .= "'', "; //fecha de modificacion
        $sql .= "(NOW()))"; // fecha ultimo login
        return $this->db->queryNoSelect($sql);
    }
}
