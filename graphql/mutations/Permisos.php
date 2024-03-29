<?php
use App\Models\Rango;
use App\Models\Usuario;
use App\Models\RangoUsuario;
use App\Models\RangoPermiso;
use App\Models\Permiso;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;

$Permisos=[
    'SetRangos'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Permisos'=>Type::nonNull(Type::listOf(Type::int()))
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $fecha=date("Y-m-d h:i:s");
            $Rango=new Rango([
                'ID'=>NULL,
                'Rango'=>$args["Nombre"],
                'FechaCreado'=>$fecha,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$Rango->save();
            $INFO_Rango = Rango::where('Rango', $args["Nombre"])->where('FechaCreado',$fecha)->first();
            if ($INFO_Rango==null) {
                return array("response"=>false);
            }
            foreach ($args["Permisos"] as $permiso) {
                $RangoPermiso=new RangoPermiso([
                    'ID'=>NULL,
                    'Rango'=>$INFO_Rango->ID,
                    'Permiso'=>$permiso,
                    'FechaCreado'=>date("Y-m-d h:i:s"),
                    'FechaActualizado'=>NULL,
                    'FechaEliminado'=>NULL
                ]);
                $x=$RangoPermiso->save();
            }
            return array("response"=>true);
        }
    ],
    'EditRangos'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Permisos'=>Type::nonNull(Type::listOf(Type::int()))
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }
            $bitacora->SetBitacora(9,"Se actualizaron los rangos");
            $Rango=Rango::find($args["ID"]);
            //No existe
            if ($Rango==null) {
                return array("response"=>false);
            }
            Rango::where('ID', $args['ID'])->update([
                'Rango' => isset($args["Nombre"])?$args["Nombre"]:$Rango->Rango
            ]);
            //Todos los permisos
            $Rango_Permisos = RangoPermiso::where("Rango",$Rango->ID)->get();
            //Quitado de permisos
            foreach ($Rango_Permisos as $item) {
                if ($bitacora->QuitarFiltros($args["Permisos"], $item->Permiso)==false) {
                    RangoPermiso::where("Rango",$Rango->ID)->where("Permiso",$item->Permiso)->delete();
                }
            }
            //Agregado de Permisos
            foreach ($args["Permisos"] as $r_p) {
                $Rango_Permiso = RangoPermiso::where("Rango",$Rango->ID)->where("Permiso",$r_p)->first();
                if ($Rango_Permiso==null) {
                    $Rango_P=new RangoPermiso([
                        'ID'=>NULL,
                        'Rango'=>$Rango->ID,
                        'Permiso'=>$r_p,
                        'FechaCreado'=>date("Y-m-d h:i:s"),
                        'FechaActualizado'=>NULL,
                        'FechaEliminado'=>NULL
                    ]);
                    $x=$Rango_P->save();
                }
            }
            //Operacion Exitosa
            return array("response"=>true);
        }
    ],
    'SetPermiso'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'Permiso'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }
            
            $fecha=date("Y-m-d h:i:s");
            $Permiso=new Permiso([
                'ID'=>NULL,
                'Permiso'=>$args["Permiso"],
                'FechaCreado'=>$fecha,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$Permiso->save();
            return array("response"=>true);
        }
    ],
    'EditRolesUsers'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Roles'=>Type::nonNull(Type::listOf(Type::int()))
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $Usuario=Usuario::find($args["ID"]);
            //No existe
            if ($Usuario==null) {
                return array("response"=>false);
            }
            //Todos los permisos
            $Usuario_Roles = RangoUsuario::where("Usuario",$Usuario->ID)->get();
            //Quitado de permisos
            foreach ($Usuario_Roles as $item) {
                if ($bitacora->QuitarFiltros($args["Roles"], $item->Permiso)==false) {
                    RangoUsuario::where("Usuario",$Usuario->ID)->where("Rango",$item->Rango)->delete();
                }
            }
            //Agregado de Permisos
            foreach ($args["Roles"] as $r_p) {
                $Rango_Permiso = RangoUsuario::where("Usuario",$Usuario->ID)->where("Rango",$r_p)->first();
                if ($Rango_Permiso==null) {
                    $Rango_P=new RangoUsuario([
                        'ID'=>NULL,
                        'Rango'=>$r_p,
                        'Usuario'=>$Usuario->ID,
                        'FechaCreado'=>date("Y-m-d h:i:s"),
                        'FechaActualizado'=>NULL,
                        'FechaEliminado'=>NULL
                    ]);
                    $x=$Rango_P->save();
                }
            }
            //Operacion Exitosa
            return array("response"=>true);
        }
    ],
];
?>