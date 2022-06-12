<?php
use App\Models\Rango;
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
date_default_timezone_set('America/La_Paz');
require('types.php');
require('query.php');
require('mutations.php');

$schema = new Schema([
    'query' => $rootQuery,
    'mutation' => $rootMutation
]);

try {
    $rawinput=file_get_contents('php://input');
    $input=json_decode($rawinput,true);
    $query=isset($input['query']) ? $input['query'] : null;
    $variables = isset($input['variables']) ? $input['variables'] : null;
    $result=GraphQL::executeQuery($schema,$query,null,null,$variables);
    $output=$result->toArray();
} catch (\Exception $e) {
    $output=[
            'error'=>[
                'message'=>$e->getMessage(),
            ]
        ];
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: false");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('P3P: CP="CAO PSA OUR"');
header("Content-Type: application/json; charset=utf-8");




echo json_encode($output);
?>