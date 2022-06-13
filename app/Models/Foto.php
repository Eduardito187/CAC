<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Foto extends Model{
    protected $table="foto";
    public $timestamps=false;
    protected $fillable = ['ID','URLPublica','Direccion','Peso','Formato','FechaCreado'];
}
?>      