<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Geolocalizacion extends Model{
    protected $table="geolocalizacion";
    public $timestamps=false;
    protected $fillable = ['ID','Latitud','Longitud','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>