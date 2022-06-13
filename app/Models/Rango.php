<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Rango extends Model{
    protected $table="rango";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Permisos','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>