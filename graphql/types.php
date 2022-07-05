<?php
use App\Models\Usuario;
use App\Models\RangoUsuario;
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

$POLICIA_Type=new ObjectType([
    'name' => 'POLICIA_Type',
    'description' => 'DATA POLICIA',
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

$FOTO_Type=new ObjectType([
    'name' => 'FOTO_Type',
    'description' => 'DATA FOTO',
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

$UsuarioType=new ObjectType([
    'name'=>'Objeto_Usuario',
    'description'=>'Tabla Usuario',
    'fields' => function () use(&$RangoUsuario_TYPE,&$FOTO_Type,&$POLICIA_Type){
        return [
            'ID'=>Type::int(),
            'Usuario'=>Type::string(),
            'Pwd'=>Type::string(),
            'Policia'=>[
                "type" => $POLICIA_Type,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Usuario::where('ID', $idPer)->with(['policia'])->first();
                    if ($data->policia==null) {
                        return null;
                    }
                    return $data->policia->toArray();
                }
            ],
            'Foto'=>[
                "type" => $FOTO_Type,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Usuario::where('ID', $idPer)->with(['foto'])->first();
                    if ($data->foto==null) {
                        return null;
                    }
                    return $data->foto->toArray();
                }
            ],
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'Rangos'=>[
                "type" => Type::listOf($RangoUsuario_TYPE),
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = Usuario::where('ID', $idPer)->with(['rango_usuario'])->first();
                    if ($data->rango_usuario==null) {
                        return null;
                    }
                    return $data->rango_usuario->toArray();
                }
            ],
        ];
    }
]);

$RangoUsuario_TYPE=new ObjectType([
    'name'=>'RangoUsuario_TYPE',
    'description'=>'Es la relacion de los roles con el usuario',
    'fields' => function () use(&$UsuarioType,&$RangoType){
        return [
            'ID'=>Type::int(),
            'Rango'=>[
                "type" => $RangoType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = RangoUsuario::where('ID', $idPer)->with(['rango'])->first();
                    if ($data->rango==null) {
                        return null;
                    }
                    return $data->rango->toArray();
                }
            ],
            'Usuario'=>[
                "type" => $UsuarioType,
                "resolve" => function ($root, $args) {
                    $idPer = $root['ID'];
                    $data = RangoUsuario::where('ID', $idPer)->with(['usuario'])->first();
                    if ($data->usuario==null) {
                        return null;
                    }
                    return $data->usuario->toArray();
                }
            ],
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string()
        ];
    }
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
?>
