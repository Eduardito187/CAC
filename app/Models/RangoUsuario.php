<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Rango;
class RangoUsuario extends Model{
    protected $table="rango_usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Usuario','FechaCreado','FechaActualizado','FechaEliminado'];
    public function usuario(){
        return $this->hasOne(Usuario::class,'ID','Usuario');
    }
    public function rango(){
        return $this->hasOne(Rango::class,'ID','Rango');
    }
}
?>