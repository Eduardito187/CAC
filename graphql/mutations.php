<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$mutations=array();
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields' => $mutations
]);
?>
