<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require('mutations/Login.php');
require('mutations/Permisos.php');

$mutations=array();
$mutations+=$Login;
$mutations+=$Permisos;
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields' => $mutations
]);
?>
