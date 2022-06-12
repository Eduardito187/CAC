<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CaracteristicaMascota extends Model{
    protected $table="caracteristica_mascota";
    public $timestamps=false;
    protected $fillable = ['ID','Mascota','Caracteristica','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>