<?php
use App\Helper\Bitacora;
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
use App\Models\Sexo;
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
                'ID_CUENTA'=>Type::nonNull(Type::int()),
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return array("response"=>false);
                }

                $Usuario=Usuario::find($args["ID"]);
                if ($Usuario==null) {
                    return null;
                }
                return $Usuario->toArray();
            }
        ],
        'Usuarios'=>[
            'type'=>Type::listOf($UsuarioType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return array("response"=>false);
                }

                $Usuario=Usuario::get()->toArray();
                return $Usuario;
            }
        ],
        'Rango'=>[
            'type'=>$RangoType,
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

                $Rango=Rango::find($args["ID"]);
                if ($Rango==null) {
                    return null;
                }
                return $Rango->toArray();
            }
        ],
        'Rangos'=>[
            'type'=>Type::listOf($RangoType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return array("response"=>false);
                }

                $Rango=Rango::get()->toArray();
                return $Rango;
            }
        ],
        'Permiso'=>[
            'type'=>$PermisoType,
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

                $Permiso=Rango::find($args["ID"]);
                if ($Permiso==null) {
                    return null;
                }
                return $Permiso->toArray();
            }
        ],
        'Permisos'=>[
            'type'=>Type::listOf($PermisoType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return array("response"=>false);
                }

                $Permiso=Permiso::get()->toArray();
                return $Permiso;
            }
        ],
        'Sexos'=>[
            'type'=>Type::listOf($SexoType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return array("response"=>false);
                }

                $Sexo=Sexo::get()->toArray();
                return $Sexo;
            }
        ],
    ]
]);
?>
