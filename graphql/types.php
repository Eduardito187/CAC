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
    'fields'=>[
        'ID'=>Type::int(),
        'Rango'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$RangoPermisoType=new ObjectType([
    'name'=>'RangoPermisoType',
    'description'=>'RangoPermisoType',
    'fields'=>[
        'ID'=>Type::int(),
        'Rango'=>Type::int(),
        'Permiso'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$RangoUsuarioType=new ObjectType([
    'name'=>'RangoUsuarioType',
    'description'=>'RangoUsuarioType',
    'fields'=>[
        'ID'=>Type::int(),
        'Rango'=>Type::int(),
        'Usuario'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
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
    'fields'=>[
        'ID'=>Type::int(),
        'Tipo'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);
$UsuarioType=new ObjectType([
    'name'=>'UsuarioType',
    'description'=>'UsuarioType',
    'fields'=>[
        'ID'=>Type::int(),
        'Usuario'=>Type::string(),
        'Pwd'=>Type::string(),
        'Policia'=>Type::int(),
        'Foto'=>Type::int(),
        'Escalafon'=>Type::string(),
        'Jerarquia'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
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
    'fields'=>[
        'ID'=>Type::int(),
        'Actividad'=>Type::int(),
        'Usuario'=>Type::int(),
        'Glosa'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
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
        'FechaEliminado'=>Type::string()
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
?>