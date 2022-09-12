<?php
require('vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Helper\DB;
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => DB::DRIVER,
    'host' => DB::HOST,
    'database' => DB::DB,
    'username' => DB::USER,
    'password' => DB::PASSWORD,
    'charset' => DB::UTF,
    'collation' => DB::COLLATION,
    'prefix' => DB::PREFIX,
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();
require('graphql/boot.php');

?>
