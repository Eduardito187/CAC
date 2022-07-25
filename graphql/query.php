<?php

use App\Models\Barrio;
use App\Models\Can;
use App\Models\Canton;
use App\Models\Caracteristica;
use App\Models\CaracteristicaCan;
use App\Models\Departamento;
use App\Models\Direccion;
use App\Models\Distrito;
use App\Models\Foto;
use App\Models\FotoCan;
use App\Models\Geolocalizacion;
use App\Models\HistorialActividad;
use App\Models\HistorialLog;
use App\Models\Jerarquia;
use App\Models\Municipio;
use App\Models\Permiso;
use App\Models\Policia;
use App\Models\Propietario;
use App\Models\PropietarioReferencia;
use App\Models\Provincia;
use App\Models\Rango;
use App\Models\RangoPermiso;
use App\Models\RangoUsuario;
use App\Models\Raza;
use App\Models\Referencia;
use App\Models\Tamanho;
use App\Models\TipoActividad;
use App\Models\TipoDocumento;
use App\Models\Usuario;
use App\Models\Uv;
use App\Models\Zona;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
$rootQuery=new ObjectType([
    'name'=>'Query',
    'fields'=>[
        'Usuario'=>[
            'type'=>$UsuarioType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $Usuario=Usuario::find($args["ID"])->toArray();
                return $Usuario;
            }
        ],
        'Usuarios'=>[
            'type'=>Type::listOf($UsuarioType),
            'resolve'=>function($root,$args){
                $Usuario=Usuario::get()->toArray();
                return $Usuario;
            }
        ],
        'Rango'=>[
            'type'=>$RangoType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $Rango=Rango::find($args["ID"])->toArray();
                if ($Rango==null) {
                    return null;
                }
                return $Rango;
            }
        ],
        'Rangos'=>[
            'type'=>Type::listOf($RangoType),
            'resolve'=>function($root,$args){
                $Rango=Rango::get()->toArray();
                return $Rango;
            }
        ],
        'Permisos'=>[
            'type'=>Type::listOf($PermisoType),
            'resolve'=>function($root,$args){
                $Permiso=Permiso::get()->toArray();
                return $Permiso;
            }
        ],
    ]
]);
?>
