<?php
use App\Models\Usuario;
use App\Models\Policia;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;

$Usuario=[
    'UpdateUsuario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Paterno'=>Type::nonNull(Type::string()),
            'Materno'=>Type::nonNull(Type::string()),
            'Correo'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string()),
            'CI'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $Usuario=Usuario::find($args["ID"]);
            if ($Usuario==null) {
                return array("response"=>false);
            }
            Policia::where('ID', $Usuario->Policia)->update([
                'Nombre'=>$args["Nombre"],
                'Paterno'=>$args["Paterno"],
                'Materno'=>$args["Materno"],
                'Correo'=>$args["Correo"],
                'Telefono'=>$args["Telefono"],
                'CI'=>$args["CI"],
                'FechaActualizado'=>date("Y-m-d h:i:s")
            ]);
        }
    ],
    'DisableUsuario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Estado'=>Type::nonNull(Type::boolean())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $Usuario=Usuario::find($args["ID"]);
            if ($Usuario==null) {
                return array("response"=>false);
            }
            Usuario::where('ID', $Usuario->ID)->update([
                'Estado'=>$args["Estado"],
                'FechaActualizado'=>date("Y-m-d h:i:s")
            ]);
        }
    ],
    'ChangePwdUsuario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Pwd'=>Type::nonNull(Type::boolean())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $Usuario=Usuario::find($args["ID"]);
            if ($Usuario==null) {
                return array("response"=>false);
            }
            Usuario::where('ID', $Usuario->ID)->update([
                'Pwd'=>$args["Pwd"],
                'FechaActualizado'=>date("Y-m-d h:i:s")
            ]);
        }
    ],
];
?>