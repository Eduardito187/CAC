<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Policia;
use App\Models\Foto;
use App\Models\HistorialLog;
use App\Models\RangoUsuario;
use App\Models\Jerarquia;
use App\Models\HistorialActividad;
class Usuario extends Model{
    protected $table="usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Pwd','Policia','Foto','Escalafon','Jerarquia','Estado','FechaCreado','FechaActualizado','FechaEliminado'];
    public function policia_r() {
        return $this->hasOne(Policia::class,'ID','Policia');
    }
    public function foto_r(){
        return $this->hasOne(Foto::class,'ID','Foto');
    }
    public function historial_log(){
        return $this->hasMany(HistorialLog::class,'Usuario','ID');
    }
    public function rango_usuario(){
        return $this->hasMany(RangoUsuario::class,'Usuario','ID');
    }
    public function historial_actividades(){
        return $this->hasMany(HistorialActividad::class,'Usuario','ID');
    }
    public function jerarquia_r(){
        return $this->hasOne(Jerarquia::class,'ID','Jerarquia');
    }
}
?>