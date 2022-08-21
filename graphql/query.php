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
use App\Models\Vacunas;
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
                    return null;
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
                    return null;
                }

                $Usuario=Usuario::get()->toArray();
                return $Usuario;
            }
        ],
        'Jerarquias'=>[
            'type'=>Type::listOf($JerarquiaType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Jerarquia=Jerarquia::get()->toArray();
                return $Jerarquia;
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
                    return null;
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
                    return null;
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
                    return null;
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
                    return null;
                }

                $Permiso=Permiso::get()->toArray();
                return $Permiso;
            }
        ],
        'HistorialActividades'=>[
            'type'=>Type::listOf($HistorialActividadType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $HistorialActividad=HistorialActividad::get()->toArray();
                return $HistorialActividad;
            }
        ],
        'HistorialActividad'=>[
            'type'=>$HistorialActividadType,
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int()),
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $HistorialActividad=HistorialActividad::find($args["ID"]);
                if ($HistorialActividad==null) {
                    return null;
                }
                return $HistorialActividad->toArray();
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
                    return null;
                }

                $Sexo=Sexo::get()->toArray();
                return $Sexo;
            }
        ],
        'Razas'=>[
            'type'=>Type::listOf($RazaType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Raza=Raza::get()->toArray();
                return $Raza;
            }
        ],
        'Raza'=>[
            'type'=>$RazaType,
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int()),
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Raza=Raza::find($args["ID"]);
                if ($Raza==null) {
                    return null;
                }
                return $Raza->toArray();
            }
        ],
        'Vacunas'=>[
            'type'=>Type::listOf($VacunasType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Vacunas=Vacunas::get()->toArray();
                return $Vacunas;
            }
        ],
        'Vacuna'=>[
            'type'=>$VacunasType,
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int()),
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Vacunas=Vacunas::find($args["ID"]);
                if ($Vacunas==null) {
                    return null;
                }
                return $Vacunas->toArray();
            }
        ],
        'TipoDocumento'=>[
            'type'=>Type::listOf($TipoDocumentoType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $TipoDocumento=TipoDocumento::get()->toArray();
                return $TipoDocumento;
            }
        ],
        'Departamentos'=>[
            'type'=>Type::listOf($DepartamentoType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Departamento=Departamento::get()->toArray();
                return $Departamento;
            }
        ],
        'Provincias'=>[
            'type'=>Type::listOf($ProvinciaType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Provincia=Provincia::get()->toArray();
                return $Provincia;
            }
        ],
        'Municipios'=>[
            'type'=>Type::listOf($MunicipioType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Municipio=Municipio::get()->toArray();
                return $Municipio;
            }
        ],
        'Cantones'=>[
            'type'=>Type::listOf($CantonType),
            'args'=>[
                'ID_CUENTA'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $bitacora = new Bitacora();
                $bitacora->SetIdUser($args["ID_CUENTA"]);
                if ($bitacora->ValidarUserAPI()==false) {
                    return null;
                }

                $Canton=Canton::get()->toArray();
                return $Canton;
            }
        ],
    ]
]);
?>
