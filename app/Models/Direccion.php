<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
class Direccion extends Model{
    protected $table="direccion";
    public $timestamps=false;
    protected $fillable = ['ID','Zona','Barrio','Calle','Casa','Geo','Municipio','Distrito','Uv','Canton','FechaCreado','FechaActualizado','FechaEliminado'];

    public function propietario(){
        return $this->hasOne(Propietario::class,'Direccion','ID');
    }
}
?>