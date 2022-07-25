<?php
use App\Models\Rango;
use App\Models\RangoUsuario;
use App\Models\RangoPermiso;
use App\Models\Permiso;
use GraphQL\Type\Definition\Type;

$Permisos=[
    'SetRangos'=>[
        'type'=>$ResponseType,
        'args'=>[
            'Nombre'=>Type::nonNull(Type::string()),
            'Permisos'=>Type::nonNull(Type::listOf(Type::int()))
        ],
        'resolve'=>function($root,$args){
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
];
?>