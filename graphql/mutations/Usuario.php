<?php
use App\Models\Usuario;
use App\Models\Policia;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;

$Usuario=[
    'CreateUsuario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'Usuario'=>Type::nonNull(Type::string()),
            'Pwd'=>Type::nonNull(Type::string()),
            'Escalafon'=>Type::nonNull(Type::string()),
            'Jerarquia'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Paterno'=>Type::nonNull(Type::string()),
            'Materno'=>Type::nonNull(Type::string()),
            'Correo'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string()),
            'CI'=>Type::nonNull(Type::string()),
            'Nacimiento'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }
            
            $poli=new Policia([
                'ID'=>NULL,
                'Nombre'=>$args["Nombre"],
                'Paterno'=>$args["Paterno"],
                'Materno'=>$args["Materno"],
                'Correo'=>$args["Correo"],
                'Telefono'=>$args["Telefono"],
                'CI'=>$args["CI"],
                'Nacimiento'=>$args["Nacimiento"],
                'FechaCreado'=>date("Y-m-d h:i:s"),
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$poli->save();

            $New_Policia = Policia::where("CI",$args["CI"])->first();
            if ($New_Policia==null) {
                return array("response"=>false);
            }

            $user=new Usuario([
                'ID'=>NULL,
                'Usuario'=>$args["Usuario"],
                'Pwd'=>$args["Pwd"],
                'Policia'=>$New_Policia->ID,
                'Foto'=>1,
                'Escalafon'=>$args["Escalafon"],
                'Jerarquia'=>$args["Jerarquia"],
                'Estado'=>1,
                'FechaCreado'=>date("Y-m-d h:i:s"),
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$user->save();

            return array("response"=>true);
        }
    ],
    'UpdateUsuario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Paterno'=>Type::nonNull(Type::string()),
            'Materno'=>Type::nonNull(Type::string()),
            'Correo'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string())
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
                'FechaActualizado'=>date("Y-m-d h:i:s")
            ]);
            return array("response"=>true);
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
            return array("response"=>true);

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
            return array("response"=>true);
        }
    ],
    'ActualizarJerarquia'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Jerarquia'=>Type::nonNull(Type::int())
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
                'Jerarquia'=>$args["Jerarquia"],
                'FechaActualizado'=>date("Y-m-d h:i:s")
            ]);
            return array("response"=>true);
        }
    ],
    'DeleteUsuario'=>[
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
                'FechaEliminado'=>date("Y-m-d h:i:s")
            ]);
            return array("response"=>true);

        }
    ],
];
?>