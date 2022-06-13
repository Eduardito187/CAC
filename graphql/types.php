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

?>
