<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\HistorialActividad;
class TipoActividad extends Model{
    protected $table="tipo_actividad";
    public $timestamps=false;
    protected $fillable = ['ID','Actividad','FechaCreado','FechaActualizado','FechaEliminado'];
    public function historial_r(){
        return $this->hasMany(HistorialActividad::class,'Actividad','ID');
    }
}
?>