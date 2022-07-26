<?php
use App\Models\Usuario;
use App\Models\HistorialLog;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;

$Login=[
    'validacion_login'=>[
        'type'=>$validacionLoginType,
        'args'=>[
            'Usuario'=>Type::nonNull(Type::string()),
            'Contra'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $pwd=md5($args["Contra"]);
            $cuenta=Usuario::where('Usuario',$args["Usuario"])->first();
            $v=false;
            $id_cuenta=0;
            if ($cuenta!=null) {
                $id_cuenta=$cuenta->ID;
                if ($cuenta->Pwd==$pwd) {
                    $v=true;
                }
                $bitacora = new Bitacora();
                $bitacora->SetBitacora($id_cuenta,$v);
                if ($v==false) {
                    $id_cuenta=0;
                }
            }
            
            return array("estado"=>$v,"id_cuenta"=>$id_cuenta);
        }
    ],
];
?>