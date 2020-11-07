<?php
class Ruta
{

    protected $db;

    public function __construct()
    {
        require_once('../db/Conexion.php');

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

    public function actualizarRuta($id, $nRuta, $nPlaca, $trayectos)
    {

        $delete = "DELETE FROM Trayecto WHERE RutaId = ?";
        $resp = $this->db->prepare($delete);

        $resp->bind_param("i", $id);
        $resp->execute();

        $Registrar_Ruta = "UPDATE ruta SET Numero = ?, Placa = ? WHERE RutaId = ?";

        $result = $this->db->prepare($Registrar_Ruta);

        $result->bind_param("isi", $nRuta, $nPlaca, $id);

        $result->execute();
            $rutaId = $id;

            for ($i = 0; $i < count($trayectos); $i++) {
                $sql = "INSERT INTO Trayecto (Trayecto,Tipo, RutaId) VALUES (?,?,?)";

                $result = $this->db->prepare($sql);

                $result->bind_param("ssi", $trayectos[$i]['trayecto'], $trayectos[$i]['tipo'], $rutaId);
                $result->execute();
            }

            return 1;
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

            for ($i = 0; $i < count($arr); $i++) {
                $rutaId = $arr[$i]['RutaId'];
                $sql = "SELECT T.Trayecto, T.Tipo FROM Trayecto T WHERE T.RutaId = '$rutaId'";
                $exec_query = $this->db->query($sql);
                $arrTrayectos = $exec_query->fetch_all(MYSQLI_ASSOC);
                $ida = "";
                $vuelta = "";

                for ($j = 0; $j < count($arrTrayectos); $j++) {

                    if ($arrTrayectos[$j]['Tipo'] == 'Ida') {

                        $ida .= $arrTrayectos[$j]['Trayecto'] . ', ';
                    } else {

                        $vuelta .= $arrTrayectos[$j]['Trayecto'] . ', ';
                    }
                }
                $arr[$i]['Ida'] = ($ida != "") ? substr($ida, 0, -2) : "";
                $arr[$i]['Vuelta'] = ($vuelta != "") ? substr($vuelta, 0, -2) : "";
            }

            return $arr;
        } else {
            return [];
        }
    }

    public function getListRutas()
    {

        $sql = "SELECT RutaId, Numero FROM ruta";

        if ($exec_query = $this->db->query($sql)) {

            $arr = $exec_query->fetch_all(MYSQLI_ASSOC);

            return $arr;
        } else {
            return [];
        }
    }

    public function getNumeroDeRegistros()
    {

        $result = $this->db->query('SELECT * FROM ruta');
        $filasAfectadas = $result->num_rows;

        return $filasAfectadas;
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
