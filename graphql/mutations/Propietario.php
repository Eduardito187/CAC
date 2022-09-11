<?php
use App\Models\Propietario;
use App\Models\PropietarioReferencia;
use App\Models\Direccion;
use GraphQL\Type\Definition\Type;
use App\Helper\Bitacora;
use App\Models\Can;
use App\Models\Caracteristica;
use App\Models\Geolocalizacion;
use App\Models\Tamanho;

$Propietario=[
    'CreatePropietario'=>[
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
            'Uv'=>Type::nonNull(Type::int()),
            'Parentesco'=>Type::nonNull(Type::string()),
            'Telefono'=>Type::nonNull(Type::string()),
            'Departamento'=>Type::nonNull(Type::int()),
            'Provincia'=>Type::nonNull(Type::int()),
            'Municipio'=>Type::nonNull(Type::int()),
            'Canton'=>Type::nonNull(Type::int()),
            'Latitud'=>Type::nonNull(Type::string()),
            'Longitud'=>Type::nonNull(Type::string()),
            'Distrito'=>Type::nonNull(Type::string())
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

            $prop=new Propietario([
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
            $x=$prop->save();

            $New_Propietario = Propietario::where("CI",$args["Numero"])->first();
            if ($New_Propietario==null) {
                return array("number"=>0);
            }
            return array("number"=>$New_Propietario->ID);
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
    'CreateCan'=>[
        'type'=>$NumberType,
        'args'=>[
            'ID_CUENTA'=>Type::nonNull(Type::int()),
            'ID'=>Type::nonNull(Type::int()),
            'Propietario'=>Type::nonNull(Type::int()),
            'Nombre'=>Type::nonNull(Type::string()),
            'Raza'=>Type::nonNull(Type::int()),
            'Tamanho'=>Type::nonNull(Type::string()),
            'Anho'=>Type::nonNull(Type::int()),
            'Sexo'=>Type::nonNull(Type::int()),
            'Color'=>Type::nonNull(Type::int()),
            'Chip'=>Type::nonNull(Type::int()),
            'Tatuaje'=>Type::nonNull(Type::int()),
            'Caracteristica'=>Type::nonNull(Type::string())
        ],
        'resolve'=>function($root,$args){
            $bitacora = new Bitacora();
            $bitacora->SetIdUser($args["ID_CUENTA"]);
            if ($bitacora->ValidarUserAPI()==false) {
                return array("number"=>0);
            }

            $fecha_actual = date("Y-m-d h:i:s");

            $tam=new Tamanho([
                'ID'=>NULL,
                'Tamanho'=>$args["Tamanho"],
                'FechaCreado'=>$fecha_actual,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$tam->save();

            $carac=new Caracteristica([
                'ID'=>NULL,
                'Detalle'=>$args["Caracteristica"],
                'FechaCreado'=>$fecha_actual,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL
            ]);
            $x=$carac->save();

            $New_Carac = Caracteristica::where('FechaCreado',$fecha_actual)->where("Detalle",$args["Caracteristica"])->first();
            if ($New_Carac==null) {
                return array("number"=>0);
            }

            $New_Tam = Tamanho::where("Tamanho",$args["Tamanho"])->first();
            if ($New_Tam==null) {
                return array("number"=>0);
            }

            $can=new Can([
                'ID'=>NULL,
                'Nombre'=>$args["Nombre"],
                'Raza'=>$args["Raza"],
                'Tamanho'=>$New_Tam->ID,
                'Meses'=>($args["Anho"] * 12),
                'Anho'=>$args["Anho"],
                'Propietario'=>$args["Propietario"],
                'FechaCreado'=>$fecha_actual,
                'FechaActualizado'=>NULL,
                'FechaEliminado'=>NULL,
                'Sexo'=>$args["Sexo"],
                'Color'=>$args["Color"],
                'Chip'=>$args["Chip"],
                'Tatuaje'=>$args["Tatuaje"]
            ]);
            $x=$can->save();

            $NEW_Can = Can::where('FechaCreado',$fecha_actual)->where("Propietario",$args["Propietario"])->first();
            if ($NEW_Can==null) {
                return array("number"=>0);
            }

            return array("number"=>$NEW_Can->ID);
        }
    ],
    'DeleteCan'=>[
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

            $Can=Can::find($args["ID"]);
            if ($Can==null) {
                return array("response"=>false);
            }
            Can::where('ID', $Can->ID)->update([
                'FechaEliminado'=>date("Y-m-d h:i:s")
            ]);

            return array("response"=>true);
        }
    ],
];
?>