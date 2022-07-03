<?php
use App\Models\Usuario;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

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
