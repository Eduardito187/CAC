<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\TipoActividad;
class HistorialActividad extends Model{
    protected $table="historial_actividad";
    public $timestamps=false;
    protected $fillable = ['ID','Actividad','Usuario','Glosa','FechaCreado','FechaActualizado','FechaEliminado'];
    public function historial_actividades(){
        return $this->hasOne(Usuario::class,'ID','Usuario');
    }
    public function tipo_actividad(){
        return $this->hasOne(TipoActividad::class,'ID','Actividad');
    }
}
?>