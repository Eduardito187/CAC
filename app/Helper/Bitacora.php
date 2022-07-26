<?php
namespace App\Helper;
use App\Models\HistorialLog;
use App\Models\HistorialActividad;
use App\Models\Usuario;
class Bitacora{
    public $Usuario_ID = 0;
    public function SetIdUser($id_cuenta){
        $this->Usuario_ID = $id_cuenta;
    }
    public function GetIdUser(){
        return $this->Usuario_ID;
    }
    public function getUserIp(){
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
    }
    public function SetHistorial($bool){
        $History=new HistorialLog([
            'ID'=>NULL,
            'Usuario'=>$this->GetIdUser(),
            'Log'=>$bool,
            'IP'=>$this->getUserIp(),
            'FechaCreado'=>date("Y-m-d h:i:s"),
            'FechaActualizado'=>NULL,
            'FechaEliminado'=>NULL
        ]);
        $x=$History->save();
    }
    public function SetBitacora($actividad_id,$glosa){
        $History=new HistorialActividad([
            'ID'=>NULL,
            'Actividad'=>$actividad_id,
            'Usuario'=>$this->GetIdUser(),
            'Glosa'=>$glosa,
            'FechaCreado'=>date("Y-m-d h:i:s"),
            'FechaActualizado'=>NULL,
            'FechaEliminado'=>NULL
        ]);
        $x=$History->save();
    }
    public function ValidarUserAPI(){
        $Usuario=Usuario::find($this->GetIdUser());
        if ($Usuario==null) {
            return false;
        }
        return true;
    }
    public function QuitarFiltros($api,$ID){
        foreach ($api as $item) {
            if ($item==$ID) {
                return true;
            }
        }
        return false;
    }
}
?>