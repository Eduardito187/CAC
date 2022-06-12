<?php
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
require('FCH/json.php');
require('FCH/mysql.php');
$rootQuery=new ObjectType([
    'name'=>'Query',
    'fields'=>[
    ]
]);
?>
