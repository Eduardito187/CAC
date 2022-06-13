<?php
use App\Models\Usuario;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
$rootQuery=new ObjectType([
    'name'=>'Query',
    'fields'=>[
        'Usuario'=>[
            'type'=>$UsuarioType,
            'args'=>[
                'ID'=>Type::nonNull(Type::int())
            ],
            'resolve'=>function($root,$args){
                $Usuario=Usuario::find($args["ID"])->toArray();
                return $Usuario;
            }
        ],
    ]
]);
?>
