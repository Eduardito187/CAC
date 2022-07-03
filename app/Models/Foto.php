<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Foto extends Model{
    protected $table="foto";
    public $timestamps=false;
    protected $fillable = ['ID','URL','Direcicon','Formato','Peso','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>