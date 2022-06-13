<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HistorialActividades extends Model{
    protected $table="historial_actividades";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Actividad','Glosa','Consulta','FechaCreado'];
}
?>