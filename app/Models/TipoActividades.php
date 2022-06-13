<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TipoActividades extends Model{
    protected $table="tipo_actividades";
    public $timestamps=false;
    protected $fillable = ['ID','Actividad','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>