<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require('mutations/Login.php');

$mutations=array();
$mutations+=$Login;
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields' => $mutations
]);
?>
