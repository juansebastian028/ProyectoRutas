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

    public function eliminarRuta($id)
    {
        $sql = "DELETE FROM Trayecto WHERE RutaId = '$id'";
        $sql2 = "DELETE FROM Ruta WHERE RutaId = '$id'";

        if ($this->db->query($sql) && $this->db->query($sql2)) {
            return true;
            } else {
            return false;
            }
    }

    public function getRutas()
    {
        $sql = 'SELECT R.RutaId, R.Numero, R.Placa FROM ruta R';

        if ($exec_query = $this->db->query($sql)) {

            $arr = $exec_query->fetch_all(MYSQLI_ASSOC);

            for($i = 0; $i < count($arr); $i++){
                $rutaId = $arr[$i]['RutaId'];
                $sql = "SELECT T.Trayecto, T.Tipo FROM Trayecto T WHERE T.RutaId = '$rutaId'";
                $exec_query = $this->db->query($sql);
                $arrTrayectos = $exec_query->fetch_all(MYSQLI_ASSOC);
                $ida = "";
                $vuelta = "";
                for($j = 0; $j < count($arrTrayectos); $j++){
                    if($arrTrayectos[$j]['Tipo'] == 'Ida'){
                        $ida .= $arrTrayectos[$j]['Trayecto'] . ', ';
                    }else{
                        $vuelta .= $arrTrayectos[$j]['Trayecto'] . ', ';
                    }
                }
                $arr[$i]['Ida'] = $ida;
                $arr[$i]['Vuelta'] = $vuelta;
            }

            return $arr;
        } else {
            return [];
        }
    }

    public function getTrayectos($rutaId)
    {
        $sql = "SELECT T.Trayecto, T.Tipo FROM Trayecto T WHERE T.RutaId = '$rutaId'";

        if ($exec_query = $this->db->query($sql)) {

            $arr = $exec_query->fetch_all(MYSQLI_ASSOC);

            return $arr;
        } else {
            return [];
        }
    }
}
