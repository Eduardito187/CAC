<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Direccion extends Model{
    protected $table="direccion";
    public $timestamps=false;
    protected $fillable = ['ID','Zona','Barrio','Calle','Casa','Geo','Municipio','Distrito','UV','Canton','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>