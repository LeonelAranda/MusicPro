<?php
//Administrador Modelo

class AdmonModelo
{
    private $db;
    function __construct()
    {
        $this->db = new MySQLdb();
    }

    public function verificarClave($data)
    {
        //Declaramos arreglo
        $errores = array();

        //encriptar clave
        $clave = hash_hmac("sha512", $data['clave'], LLAVE);

        //Enviamos laquery

        $sql = "SELECT id, clave FROM admon WHERE correo='" . $data['usuario'] . "'";
        $data = $this->db->query($sql);

        //verificacion
        if (empty($data)) {
            array_push($errores, "no existe el usuario");
        } else if ($clave != $data['clave']) {
            array_push($errores, "La contraseña no es correcta");
        } elseif (count($data) > 2) {
            array_push($errores, "La contraseña no es correcta");
        } else {
            $sql = "UPDATE admon SET login_dt=NOW() WHERE id=" . $data['id'];
            if (!$this->db->queryNoSelect($sql)) {
                array_push($errores, "Error al modificar la ulitma fecha de acceso");
            }
        }

        //Regresamos los errores
        return $errores;
    }
}
