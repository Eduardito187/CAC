<?php
require('vendor/autoload.php');
use Illuminate\Database\Capsule\Manager as Capsule;

use App\Models\Rango;
use App\Models\Cuenta;
$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => '',
    'username' => '',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())

$capsule->bootEloquent();
require('graphql/boot.php');

//$a=Rango::find(1);
//var_dump($a->cuenta->toArray());
?>
