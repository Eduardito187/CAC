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

$ResponseType=new ObjectType([
    'name' => 'ResponseType',
    'description' => 'ResponseType',
    'fields'=>[
        'response'=>Type::boolean()
    ]
]);

$NumberType=new ObjectType([
    'name' => 'NumberType',
    'description' => 'NumberType',
    'fields'=>[
        'number'=>Type::int()
    ]
]);

$validacionLoginType=new ObjectType([
    'name' => 'Validacion_de_Login',
    'description' => 'Se valida el inicio al sistema',
    'fields'=>[
        'estado'=>Type::boolean(),
        'id_cuenta'=>Type::int()
    ]
]);

$RangoType=new ObjectType([
    'name'=>'Objeto_Rango',
    'description'=>'Tabla Rango',
    'fields' => function () use(&$RangoPermisoType,&$RangoUsuarioType){
        return [
            'ID'=>Type::int(),
            'Rango'=>Type::string(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'RangoUsuario' => [
                "type" => Type::listOf($RangoUsuarioType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Rango::where('ID', $ID)->with(['rango_usuario'])->first();
                    if ($data->rango_usuario==null) {
                        return null;
                    }
                    return $data->rango_usuario->toArray();
                }
            ],
            'RangoPermiso' => [
                "type" => Type::listOf($RangoPermisoType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Rango::where('ID', $ID)->with(['rango_permiso'])->first();
                    if ($data->rango_permiso==null) {
                        return null;
                    }
                    return $data->rango_permiso->toArray();
                }
            ],
        ];
    }
]);
$RangoPermisoType=new ObjectType([
    'name'=>'RangoPermisoType',
    'description'=>'RangoPermisoType',
    'fields' => function () use(&$PermisoType,&$RangoType){
        return [
            'ID'=>Type::int(),
            'Rango'=>Type::int(),
            'Permiso'=>Type::int(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'RangoPermiso' => [
                "type" => $PermisoType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = RangoPermiso::where('ID', $ID)->with(['permiso_r'])->first();
                    if ($data->permiso_r==null) {
                        return null;
                    }
                    return $data->permiso_r->toArray();
                }
            ],
            'RangoRango' => [
                "type" => $RangoType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = RangoPermiso::where('ID', $ID)->with(['rango_r'])->first();
                    if ($data->rango_r==null) {
                        return null;
                    }
                    return $data->rango_r->toArray();
                }
            ]
            ];
        }
]);
$PermisoType=new ObjectType([
    'name'=>'PermisoType',
    'description'=>'PermisoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Permiso'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$RangoUsuarioType=new ObjectType([
    'name'=>'RangoUsuarioType',
    'description'=>'RangoUsuarioType',
    'fields' => function () use(&$RangoType,&$UsuarioType){
        return [
            'ID'=>Type::int(),
            'Rango' => [
                "type" => $RangoType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = RangoUsuario::where('ID', $ID)->with(['rango_r'])->first();
                    if ($data->rango_r==null) {
                        return null;
                    }
                    return $data->rango_r->toArray();
                }
            ],
            'Usuario' => [
                "type" => $UsuarioType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = RangoUsuario::where('ID', $ID)->with(['usuario_r'])->first();
                    if ($data->usuario_r==null) {
                        return null;
                    }
                    return $data->usuario_r->toArray();
                }
            ],
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string()
        ];
    }
]);
$RazaType=new ObjectType([
    'name'=>'RazaType',
    'description'=>'RazaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$TamanhoType=new ObjectType([
    'name'=>'TamanhoType',
    'description'=>'TamanhoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Tamanho'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$TipoActividadType=new ObjectType([
    'name'=>'TipoActividadType',
    'description'=>'TipoActividadType',
    'fields'=>[
        'ID'=>Type::int(),
        'Actividad'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$TipoDocumentoType=new ObjectType([
    'name'=>'TipoDocumentoType',
    'description'=>'TipoDocumentoType',
    'fields' => function () use(&$PropietarioType,&$ReferenciaType){
        return [
            'ID'=>Type::int(),
            'Tipo'=>Type::string(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'Propietarios' => [
                "type" => Type::listOf($PropietarioType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = TipoDocumento::where('ID', $ID)->with(['propietarios_r'])->first();
                    if ($data->propietarios_r==null) {
                        return null;
                    }
                    return $data->propietarios_r->toArray();
                }
            ],
            'Referencias' => [
                "type" => Type::listOf($ReferenciaType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = TipoDocumento::where('ID', $ID)->with(['referencias_r'])->first();
                    if ($data->referencias_r==null) {
                        return null;
                    }
                    return $data->referencias_r->toArray();
                }
            ],
        ];
    }
]);
$UsuarioType=new ObjectType([
    'name'=>'UsuarioType',
    'description'=>'UsuarioType',
    'fields' => function () use(&$PoliciaType,&$FotoType,&$HistorialLogType,&$RangoUsuarioType,&$HistorialActividadType,&$JerarquiaType){
        return [
            'ID'=>Type::int(),
            'Usuario'=>Type::string(),
            'Pwd'=>Type::string(),
            'Policia'=>Type::int(),
            'Foto'=>Type::int(),
            'Escalafon'=>Type::string(),
            'Jerarquia'=>Type::int(),
            'Estado'=>Type::boolean(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'PoliciaR' => [
                "type" => $PoliciaType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['policia_r'])->first();
                    if ($data->policia_r==null) {
                        return null;
                    }
                    return $data->policia_r->toArray();
                }
            ],
            'FotoR' => [
                "type" => $FotoType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['foto_r'])->first();
                    if ($data->foto_r==null) {
                        return null;
                    }
                    return $data->foto_r->toArray();
                }
            ],
            'HistorialLog' => [
                "type" => Type::listOf($HistorialLogType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['historial_log'])->first();
                    if ($data->historial_log==null) {
                        return null;
                    }
                    return $data->historial_log->toArray();
                }
            ],
            'RangoUsuario' => [
                "type" => Type::listOf($RangoUsuarioType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['rango_usuario'])->first();
                    if ($data->rango_usuario==null) {
                        return null;
                    }
                    return $data->rango_usuario->toArray();
                }
            ],
            'HistorialActividades' => [
                "type" => Type::listOf($HistorialActividadType),
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['historial_actividades'])->first();
                    if ($data->historial_actividades==null) {
                        return null;
                    }
                    return $data->historial_actividades->toArray();
                }
            ],
            'JerarquiaR' => [
                "type" => $JerarquiaType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = Usuario::where('ID', $ID)->with(['jerarquia_r'])->first();
                    if ($data->jerarquia_r==null) {
                        return null;
                    }
                    return $data->jerarquia_r->toArray();
                }
            ],
        ];
    }
]);
$UvType=new ObjectType([
    'name'=>'UvType',
    'description'=>'UvType',
    'fields'=>[
        'ID'=>Type::int(),
        'UV'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$ZonaType=new ObjectType([
    'name'=>'ZonaType',
    'description'=>'ZonaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Zona'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$ProvinciaType=new ObjectType([
    'name'=>'ProvinciaType',
    'description'=>'ProvinciaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Departamento'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$ReferenciaType=new ObjectType([
    'name'=>'ReferenciaType',
    'description'=>'ReferenciaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Apellido'=>Type::string(),
        'CI'=>Type::string(),
        'Telefono'=>Type::string(),
        'Direccion'=>Type::int(),
        'TipoDocumento'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$PropietarioReferenciaType=new ObjectType([
    'name'=>'PropietarioReferenciaType',
    'description'=>'PropietarioReferenciaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Propietario'=>Type::int(),
        'Referencia'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$PropietarioType=new ObjectType([
    'name'=>'PropietarioType',
    'description'=>'PropietarioType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Apellido'=>Type::string(),
        'CI'=>Type::string(),
        'Telefono'=>Type::string(),
        'Direccion'=>Type::int(),
        'TipoDocumento'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$PoliciaType=new ObjectType([
    'name' => 'PoliciaType',
    'description' => 'PoliciaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Paterno'=>Type::string(),
        'Materno'=>Type::string(),
        'Correo'=>Type::string(),
        'Telefono'=>Type::string(),
        'CI'=>Type::string(),
        'Nacimiento'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$MunicipioType=new ObjectType([
    'name'=>'MunicipioType',
    'description'=>'MunicipioType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Provincia'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$JerarquiaType=new ObjectType([
    'name'=>'JerarquiaType',
    'description'=>'JerarquiaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Grado'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$HistorialLogType=new ObjectType([
    'name'=>'HistorialLogType',
    'description'=>'HistorialLogType',
    'fields'=>[
        'ID'=>Type::int(),
        'Usuario'=>Type::int(),
        'Log'=>Type::boolean(),
        'IP'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$HistorialActividadType=new ObjectType([
    'name'=>'HistorialActividadType',
    'description'=>'HistorialActividadType',
    'fields' => function () use(&$UsuarioType,&$TipoActividadType){
        return [
            'ID'=>Type::int(),
            'Actividad' => [
                "type" => $TipoActividadType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = HistorialActividad::where('ID', $ID)->with(['tipo_actividad'])->first();
                    if ($data->tipo_actividad==null) {
                        return null;
                    }
                    return $data->tipo_actividad->toArray();
                }
            ],
            'Usuario' => [
                "type" => $UsuarioType,
                "resolve" => function ($root, $args) {
                    $ID = $root['ID'];
                    $data = HistorialActividad::where('ID', $ID)->with(['usuario_r'])->first();
                    if ($data->usuario_r==null) {
                        return null;
                    }
                    return $data->usuario_r->toArray();
                }
            ],
            'Glosa'=>Type::string(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string()
        ];
    }
]);
$GeolocalizacionType=new ObjectType([
    'name'=>'GeolocalizacionType',
    'description'=>'GeolocalizacionType',
    'fields'=>[
        'ID'=>Type::int(),
        'Latitud'=>Type::string(),
        'Longitud'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$FotoCanType=new ObjectType([
    'name'=>'FotoCanType',
    'description'=>'FotoCanType',
    'fields'=>[
        'ID'=>Type::int(),
        'Foto'=>Type::int(),
        'Can'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$FotoType=new ObjectType([
    'name' => 'FotoType',
    'description' => 'FotoType',
    'fields'=>[
        'ID'=>Type::int(),
        'URL'=>Type::string(),
        'Direcicon'=>Type::string(),
        'Formato'=>Type::string(),
        'Peso'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$DistritoType=new ObjectType([
    'name'=>'DistritoType',
    'description'=>'DistritoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Distrito'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$DireccionType=new ObjectType([
    'name'=>'DireccionType',
    'description'=>'DireccionType',
    'fields'=>[
        'ID'=>Type::int(),
        'Zona'=>Type::int(),
        'Barrio'=>Type::int(),
        'Calle'=>Type::string(),
        'Casa'=>Type::string(),
        'Geo'=>Type::int(),
        'Municipio'=>Type::int(),
        'Distrito'=>Type::int(),
        'Uv'=>Type::int(),
        'Canton'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$DepartamentoType=new ObjectType([
    'name'=>'DepartamentoType',
    'description'=>'DepartamentoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$CaracteristicaCanType=new ObjectType([
    'name'=>'CaracteristicaCanType',
    'description'=>'CaracteristicaCanType',
    'fields'=>[
        'ID'=>Type::int(),
        'Can'=>Type::int(),
        'Caracteristica'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$CaracteristicaType=new ObjectType([
    'name'=>'CaracteristicaType',
    'description'=>'CaracteristicaType',
    'fields'=>[
        'ID'=>Type::int(),
        'Detalle'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$CantonType=new ObjectType([
    'name'=>'CantonType',
    'description'=>'CantonType',
    'fields'=>[
        'ID'=>Type::int(),
        'Canton'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$CanType=new ObjectType([
    'name'=>'CanType',
    'description'=>'CanType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Raza'=>Type::int(),
        'Tamanho'=>Type::int(),
        'Meses'=>Type::string(),
        'Anho'=>Type::string(),
        'Propietario'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string(),
        'Sexo'=>Type::int(),
        'Color'=>Type::string(),
        'Chip'=>Type::int(),
        'Tatuaje'=>Type::int()
    ]
]);
$BarrioType=new ObjectType([
    'name'=>'BarrioType',
    'description'=>'BarrioType',
    'fields'=>[
        'ID'=>Type::int(),
        'Barrio'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$SexoType=new ObjectType([
    'name'=>'SexoType',
    'description'=>'SexoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Sexo'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$VacunasType=new ObjectType([
    'name'=>'VacunasType',
    'description'=>'VacunasType',
    'fields'=>[
        'ID'=>Type::int(),
        'Nombre'=>Type::string(),
        'Obligatorio'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$VacunasCanType=new ObjectType([
    'name'=>'VacunasCanType',
    'description'=>'VacunasCanType',
    'fields'=>[
        'ID'=>Type::int(),
        'Can'=>Type::int(),
        'Vacunas'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
?>