<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TipoActividad extends Model{
    protected $table="tipo_actividad";
    public $timestamps=false;
    protected $fillable = ['ID','Actividad','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>