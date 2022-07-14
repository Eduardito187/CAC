<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\RangoPermiso;
class Permiso extends Model{
    protected $table="permiso";
    public $timestamps=false;
    protected $fillable = ['ID','Permiso','FechaCreado','FechaActualizado','FechaEliminado'];

    public function rango_permiso(){
        return $this->hasMany(RangoPermiso::class,'Permiso','ID');
    }
}
?>