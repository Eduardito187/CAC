<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
use App\Models\Provincia;
class Municipio extends Model{
    protected $table="municipio";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Provincia','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Municipio','ID');
    }
    public function provincia_r(){
        return $this->hasOne(Provincia::class,'ID','Provincia');
    }
}
?>