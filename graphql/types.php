<?php
use App\Models\Usuario;
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

$UsuarioType=new ObjectType([
    'name'=>'Objeto Usuario',
    'description'=>'Tabla Usuario',
    'fields'=>[
        'ID'=>Type::int(),
        'Usuario'=>Type::string(),
        'Pwd'=>Type::string(),
        'Policia'=>Type::int(),
        'Foto'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string()
    ]
]);

?>
