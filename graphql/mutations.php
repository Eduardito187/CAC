<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

require('mutations/Login.php');
require('mutations/Permisos.php');
require('mutations/Usuario.php');

$mutations=array();
$mutations+=$Login;
$mutations+=$Permisos;
$mutations+=$Usuario;
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields' => $mutations
]);
?>
