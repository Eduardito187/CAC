<?php
use App\Models\Usuario;
use App\Models\Persona;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$validacionLoginType=new ObjectType([
    'name' => 'Validacion de Login',
    'description' => 'Se valida el inicio al sistema',
    'fields'=>[
        'estado'=>Type::boolean(),
        'id_cuenta'=>Type::int()
    ]
]);

$FotoType=new ObjectType([
    'name'=>'Objeto Foto',
    'description'=>'Tabla Foto',
    'fields'=>[
        'ID'=>Type::int(),
        'URLPublica'=>Type::string(),
        'Direccion'=>Type::string(),
        'Peso'=>Type::string(),
        'Formato'=>Type::string(),
        'FechaCreado'=>Type::string()
    ]
]);

$TipoDocuementoType=new ObjectType([
    'name'=>'Objeto TipoDocuemento',
    'description'=>'Tabla TipoDocuemento',
    'fields'=>[
        'ID'=>Type::int(),
        'Tipo'=>Type::string(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);

$PersonaType=new ObjectType([
    'name'=>'Objeto Persona',
    'description'=>'Tabla Persona',
    'fields'=> function () use(&$TipoDocuementoType){
        return [
            'ID'=>Type::int(),
            'Nombre'=>Type::string(),
            'Paterno'=>Type::string(),
            'Materno'=>Type::string(),
            'Correo'=>Type::string(),
            'Telefono'=>Type::string(),
            'CI'=>Type::string(),
            'Nacimineto'=>Type::string(),
            'TipoDocumento'=>[
                "type" => $TipoDocuementoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $obj = Persona::where('ID', $idPer)->with(['tipodocumento'])->first();
                    if ($obj->tipodocumento==null) {
                        return null;
                    }
                    return $obj->tipodocumento->toArray();
                }
            ],
            'Direccion'=>Type::int(),
            'Referencia'=>Type::int(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
        ];
    }
]);

$InfoPoliType=new ObjectType([
    'name'=>'Objeto InfoPoli',
    'description'=>'Tabla InfoPoli',
    'fields'=>[
        'ID'=>Type::int(),
        'Rango'=>Type::string(),
        'Escalafon'=>Type::string(),
        'FechaCreado'=>Type::string()
    ]
]);

$RangoType=new ObjectType([
    'name'=>'Objeto Rango',
    'description'=>'Tabla Rango',
    'fields'=>[
        'ID'=>Type::int(),
        'Rango'=>Type::string(),
        'Permisos'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string(),
    ]
]);

$UsuarioType=new ObjectType([
    'name'=>'Objeto Usuario',
    'description'=>'Tabla Usuario',
    'fields'=> function () use(&$FotoType,&$PersonaType,&$InfoPoliType,&$RangoType){
        return [
            'ID'=>Type::int(),
            'Usuario'=>Type::string(),
            'Pwd'=>Type::string(),
            'Persona'=>[
                "type" => $PersonaType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $obj = Usuario::where('ID', $idPer)->with(['persona'])->first();
                    if ($obj->persona==null) {
                        return null;
                    }
                    return $obj->persona->toArray();
                }
            ],
            'Rango'=>[
                "type" => $RangoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $obj = Usuario::where('ID', $idPer)->with(['rango'])->first();
                    if ($obj->rango==null) {
                        return null;
                    }
                    return $obj->rango->toArray();
                }
            ],
            'Perfil'=>[
                "type" => $FotoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $obj = Usuario::where('ID', $idPer)->with(['perfil'])->first();
                    if ($obj->perfil==null) {
                        return null;
                    }
                    return $obj->perfil->toArray();
                }
            ],
            'Poli'=>[
                "type" => $InfoPoliType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $obj = Usuario::where('ID', $idPer)->with(['poli'])->first();
                    if ($obj->poli==null) {
                        return null;
                    }
                    return $obj->poli->toArray();
                }
            ],
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
        ];
    }
]);

?>
