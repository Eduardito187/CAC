<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\RangoUsuario;
use App\Models\RangoPermiso;
class Rango extends Model{
    protected $table="rango";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','FechaCreado','FechaActualizado','FechaEliminado'];
    public function rango_usuario(){
        return $this->hasMany(RangoUsuario::class,'Rango','ID');
    }
    public function rango_permiso(){
        return $this->hasMany(RangoPermiso::class,'Rango','ID');
    }
}
?>