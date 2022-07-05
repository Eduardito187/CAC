<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Policia;
use App\Models\Foto;
use App\Models\HistorialLog;
use App\Models\InfoJerarquia;
use App\Models\RangoUsuario;
use App\Models\HistorialActividad;
class Usuario extends Model{
    protected $table="usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Pwd','Policia','Foto','FechaCreado','FechaActualizado','FechaEliminado'];
    public function policia() {
        return $this->hasOne(Policia::class,'ID','Policia');
    }
    public function foto(){
        return $this->hasOne(Foto::class,'ID','Foto');
    }
    public function historial_log(){
        return $this->hasMany(HistorialLog::class,'Usuario','ID');
    }
    public function info_jerarquia(){
        return $this->hasOne(InfoJerarquia::class,'Usuario','ID');
    }
    public function rango_usuario(){
        return $this->hasMany(RangoUsuario::class,'Usuario','ID');
    }
    public function historial_actividades(){
        return $this->hasMany(HistorialActividad::class,'Usuario','ID');
    }
}
?>