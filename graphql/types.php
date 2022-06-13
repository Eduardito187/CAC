<?php
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
        'Persona'=>Type::int(),
        'Rango'=>Type::int(),
        'Perfil'=>Type::int(),
        'Poli'=>Type::int(),
        'FechaCreado'=>Type::string(),
        'FechaActualizado'=>Type::string(),
        'FechaEliminado'=>Type::string(),
    ]
]);

?>
