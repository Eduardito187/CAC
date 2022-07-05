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

$UsuarioType=new ObjectType([
    'name'=>'Objeto_Usuario',
    'description'=>'Tabla Usuario',
    'fields' => function () use(&$RangoUsuario_TYPE){
        return [
            'ID'=>Type::int(),
            'Usuario'=>Type::string(),
            'Pwd'=>Type::string(),
            'Policia'=>Type::int(),
            'Foto'=>Type::int(),
            'FechaCreado'=>Type::string(),
            'FechaActualizado'=>Type::string(),
            'FechaEliminado'=>Type::string(),
            'Rango'=>[
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
