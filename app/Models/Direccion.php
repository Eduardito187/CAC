<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
use App\Models\Geolocalizacion;
use App\Models\Municipio;
use App\Models\Distrito;
use App\Models\Uv;
use App\Models\Canton;
use App\Models\Zona;
use App\Models\Barrio;
class Direccion extends Model{
    protected $table="direccion";
    public $timestamps=false;
    protected $fillable = ['ID','Zona','Barrio','Calle','Casa','Geo','Municipio','Distrito','Uv','Canton','FechaCreado','FechaActualizado','FechaEliminado'];

    public function propietario(){
        return $this->hasOne(Propietario::class,'Direccion','ID');
    }
    public function referencia(){
        return $this->hasOne(Referencia::class,'Direccion','ID');
    }

    public function zora_r(){
        return $this->hasOne(Zona::class,'ID','Zona');
    }
    public function barrio_r(){
        return $this->hasOne(Barrio::class,'ID','Barrio');
    }
    public function geo_r(){
        return $this->hasOne(Geolocalizacion::class,'ID','Geo');
    }
    public function municipio_r(){
        return $this->hasOne(Municipio::class,'ID','Municipio');
    }
    public function distrito_r(){
        return $this->hasOne(Distrito::class,'ID','Distrito');
    }
    public function uv_r(){
        return $this->hasOne(Uv::class,'ID','Uv');
    }
    public function canton_r(){
        return $this->hasOne(Canton::class,'ID','Canton');
    }
}
?>