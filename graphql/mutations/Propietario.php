<?php
use App\Models\Propietario;
use App\Models\PropietarioReferencia;
use App\Models\Direccion;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;

$Propietario=[
    'CreatePropietario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Apellidos'=>Type::nonNull(Type::string()),
            'TipoDocumento'=>Type::nonNull(Type::int()),
            'Numero'=>Type::nonNull(Type::string()),
            'Complemento'=>Type::nonNull(Type::string()),
            'Direccion'=>Type::nonNull(Type::string()),
            'Zona'=>Type::nonNull(Type::string()),
            'Barrio'=>Type::nonNull(Type::string()),
            'Calle'=>Type::nonNull(Type::string()),
            'NumCasa'=>Type::nonNull(Type::string()),
            'Parentesco'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string()),
            'Departamento'=>Type::nonNull(Type::int()),
            'Provincia'=>Type::nonNull(Type::int()),
            'Municipio'=>Type::nonNull(Type::int()),
            'Uv'=>Type::nonNull(Type::int()),
            'Canton'=>Type::nonNull(Type::int())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $hora_DIR = date("Y-m-d h:i:s");
            $dir=new Direccion([
                'ID'=>NULL,
                'Zona'=>$args["Zona"],
                'Barrio'=>$args["Barrio"],
                'Calle'=>$args["Calle"],
                'Casa'=>$args["Casa"],
                'Geo'=>1,
                'Municipio'=>$args["Municipio"],
                'Distrito'=>$args["Distrito"],
                'Uv'=>$args["Uv"],
                'Canton'=>$args["Canton"],
                'FechaCreado'=>$hora_DIR,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$dir->save();

            $New_Direccion = Direccion::where("Zona",$args["Zona"])->where("Barrio",$args["Barrio"])->where("Calle",$args["Calle"])->
            where("Casa",$args["Casa"])->where("FechaCreado",$hora_DIR)->first();
            if ($New_Direccion==null) {
                return array("response"=>false);
            }

            $prop=new Propietario([
                'ID'=>NULL,
                'Nombre'=>$args["Nombre"],
                'Apellido'=>$args["Apellido"],
                'CI'=>$args["Numero"],
                'Telefono'=>$args["Telefono"],
                'Direccion'=>$New_Direccion->ID,
                'TipoDocumento'=>$args["TipoDocumento"],
                'FechaCreado'=>date("Y-m-d h:i:s"),
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$prop->save();

            $New_Propietario = Propietario::where("CI",$args["Numero"])->first();
            if ($New_Propietario==null) {
                return array("response"=>false);
            }

            return array("response"=>true);
        }
    ],
    'DeletePropietario'=>[
        'type'=>$ResponseType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("response"=>false);
            }

            $Propietario=Propietario::find($args["ID"]);
            if ($Propietario==null) {
                return array("response"=>false);
            }
            Propietario::where('ID', $Propietario->ID)->update([
                'FechaEliminado'=>date("Y-m-d h:i:s")
            ]);
            return array("response"=>true);

        }
    ],
];
?>