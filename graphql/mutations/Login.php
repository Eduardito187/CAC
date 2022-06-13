<?php
use App\Models\Usuario;
use App\Models\HistorialLog;
use GraphQL\Type\Definition\Type;

function getUserIp(){
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
$Login=[
    'validacion_login'=>[
        'type'=>$validacionLoginType,
        'args'=>[
            'Usuario'=>Type::nonNull(Type::string()),
            'Contra'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $pwd=md5($args["Contra"]);
            $cuenta=Usuario::where('Usuario',$args["Usuario"])->where('Pwd',$pwd)->first();
            $v=false;
            $id_cuenta=0;
            if ($cuenta!=null) {
                $v=true;
                $id_cuenta=$cuenta->ID;
                $History=new HistorialLog([
                    'ID'=>NULL,
                    'Usuario'=>$id_cuenta,
                    'Log'=>true,
                    'IP'=>getUserIp(),
                    'FechaCreado'=>date("Y-m-d h:i:s")
                ]);
                $x=$History->save();
            }
            return array("estado"=>$v,"id_cuenta"=>$id_cuenta);
        }
    ],
]
?>