<?php
class Ruta
{

    protected $db;

    public function __construct()
    {
        require_once('ConexionDB.php');

        $this->db = Conexion::realizarConexion();
    }

    public function registrarRuta($nRuta, $nPlaca, $trayectos)
    {

        $Registrar_Ruta = "INSERT INTO ruta (Numero,Placa) VALUES (?,?)";

        $result = $this->db->prepare($Registrar_Ruta);

        $result->bind_param("is", $nRuta, $nPlaca);
        $result->execute();

        $sql = "SELECT RutaId FROM Ruta ORDER BY RutaId DESC LIMIT 1";

        if ($exec_query = $this->db->query($sql)) {

            $arr = $exec_query->fetch_all(MYSQLI_ASSOC);

            $rutaId = $arr[0]['RutaId'];

            for ($i = 0; $i < count($trayectos); $i++) {
                $sql = "INSERT INTO Trayecto (Trayecto,Tipo, RutaId) VALUES (?,?,?)";

                $result = $this->db->prepare($sql);

                $result->bind_param("ssi", $trayectos[$i]['trayecto'], $trayectos[$i]['tipo'], $rutaId);
                $result->execute();
            }

            return 1;
        } else {
            return 0;
        }
    }

    public function getRutas()
    {
        $sql = 'SELECT RutaId, Numero FROM ruta';

        if ($exec_query = $this->db->query($sql)) {

            $arr = $exec_query->fetch_all(MYSQLI_ASSOC);

            return $arr;
        } else {
            return [];
        }
    }
}
