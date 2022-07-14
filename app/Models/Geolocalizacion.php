<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Geolocalizacion extends Model{
    protected $table="geolocalizacion";
    public $timestamps=false;
    protected $fillable = ['ID','Latitud','Longitud','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Geo','ID');
    }
}
?>