<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class HistorialLog extends Model{
    protected $table="historial_log";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Log','IP','FechaCreado','FechaActualizado','FechaEliminado'];
    public function usuario_r(){
        return $this->hasOne(Usuario::class,'ID','Usuario');
    }
}
?>