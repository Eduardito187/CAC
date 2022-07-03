<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HistorialActividad extends Model{
    protected $table="historial_actividad";
    public $timestamps=false;
    protected $fillable = ['ID','Actividad','Usuario','Glosa','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>