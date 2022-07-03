<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class CaracteristicaCan extends Model{
    protected $table="caracteristica_can";
    public $timestamps=false;
    protected $fillable = ['ID','Can','Caracteristica','Foto','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>