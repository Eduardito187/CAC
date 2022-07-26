<?php
namespace App\Helper;
use App\Models\HistorialLog;
use App\Models\HistorialActividad;
class Bitacora{
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
    public function SetBitacora($id_cuenta,$bool){
        $History=new HistorialLog([
            'ID'=>NULL,
            'Usuario'=>$id_cuenta,
            'Log'=>$bool,
            'IP'=>$this->getUserIp(),
            'FechaCreado'=>date("Y-m-d h:i:s"),
            'FechaActualizado'=>NULL,
            'FechaEliminado'=>NULL
        ]);
        $x=$History->save();
    }
}
?>