<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Rango;
use App\Models\Permiso;
class RangoPermiso extends Model{
    protected $table="rango_permiso";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Permiso','FechaCreado','FechaActualizado','FechaEliminado'];
    public function permiso_r(){
        return $this->hasOne(Permiso::class,'ID','Permiso');
    }
    public function rango_r(){
        return $this->hasOne(Rango::class,'ID','Rango');
    }
}
?>