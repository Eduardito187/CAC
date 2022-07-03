<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RangoPermiso extends Model{
    protected $table="rango_permiso";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Permiso','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>