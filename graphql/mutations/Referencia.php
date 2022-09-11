<?php
use App\Models\Referencia;
use App\Models\Propietario;
use App\Models\PropietarioReferencia;
use App\Models\Direccion;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;
use App\Models\Geolocalizacion;

$Referencia=[
    'CreateReferencia'=>[
        'type'=>$NumberType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Apellidos'=>Type::nonNull(Type::string()),
            'TipoDocumento'=>Type::nonNull(Type::int()),
            'Numero'=>Type::nonNull(Type::string()),
            'Complemento'=>Type::nonNull(Type::string()),
            'Direccion'=>Type::nonNull(Type::string()),
            'Zona'=>Type::nonNull(Type::int()),
            'Barrio'=>Type::nonNull(Type::int()),
            'Calle'=>Type::nonNull(Type::string()),
            'NumCasa'=>Type::nonNull(Type::string()),
            'Parentesco'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string()),
            'Departamento'=>Type::nonNull(Type::int()),
            'Provincia'=>Type::nonNull(Type::int()),
            'Municipio'=>Type::nonNull(Type::int()),
            'Uv'=>Type::nonNull(Type::int()),
            'Canton'=>Type::nonNull(Type::int()),
            'Latitud'=>Type::nonNull(Type::string()),
            'Longitud'=>Type::nonNull(Type::string()),
            'Distrito'=>Type::nonNull(Type::string()),
            'Propietario'=>Type::nonNull(Type::int())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("number"=>0);
            }


            $hora_DIR = date("Y-m-d h:i:s");
            $geo = new Geolocalizacion([
                'ID'=>NULL,
                'Latitud'=>$args["Latitud"],
                'Longitud'=>$args["Longitud"],
                'FechaCreado'=>$hora_DIR,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$geo->save();

            $Geo = Geolocalizacion::where("Latitud",$args["Latitud"])->where("Longitud",$args["Longitud"])->where("FechaCreado",$hora_DIR)->first();
            if ($Geo == null) {
                return array("number"=>0);
            }

            $dir=new Direccion([
                'ID'=>NULL,
                'Zona'=>$args["Zona"],
                'Barrio'=>$args["Barrio"],
                'Calle'=>$args["Calle"],
                'Casa'=>$args["NumCasa"],
                'Geo'=>$Geo->ID,
                'Municipio'=>$args["Municipio"],
                'Distrito'=>NULL,
                'Uv'=>$args["Uv"],
                'Canton'=>$args["Canton"],
                'FechaCreado'=>$hora_DIR,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$dir->save();

            $New_Direccion = Direccion::where("Zona",$args["Zona"])->where("Barrio",$args["Barrio"])->where("Calle",$args["Calle"])->
            where("Casa",$args["NumCasa"])->where("FechaCreado",$hora_DIR)->first();
            if ($New_Direccion==null) {
                return array("number"=>0);
            }

            $ref=new Referencia([
                'ID'=>NULL,
                'Nombre'=>$args["Nombre"],
                'Apellido'=>$args["Apellidos"],
                'CI'=>$args["Numero"],
                'Telefono'=>$args["Telefono"],
                'Direccion'=>$New_Direccion->ID,
                'TipoDocumento'=>$args["TipoDocumento"],
                'FechaCreado'=>date("Y-m-d h:i:s"),
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$ref->save();

            $New_Referencia = Referencia::where("CI",$args["Numero"])->first();
            if ($New_Referencia==null) {
                return array("number"=>0);
            }

            $PropietarioReferencia = new PropietarioReferencia([
                'ID'=>NULL,
                'Propietario'=>$args["Propietario"],
                'Referencia'=>$New_Referencia->ID,
                'FechaCreado'=>$hora_DIR,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$PropietarioReferencia->save();

            return array("number"=>$New_Referencia->ID);
        }
    ],
    'DeleteReferencia'=>[
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

            $Referencia=Referencia::find($args["ID"]);
            if ($Referencia==null) {
                return array("response"=>false);
            }
            Referencia::where('ID', $Referencia->ID)->update([
                'FechaEliminado'=>date("Y-m-d h:i:s")
            ]);
            return array("response"=>true);

        }
    ],
];
?>