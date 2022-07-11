<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\CaracteristicaCan;
class Caracteristica extends Model{
    protected $table="caracteristica";
    public $timestamps=false;
    protected $fillable = ['ID','Detalle','FechaCreado','FechaActualizado','FechaEliminado'];
    public function canes(){
        return $this->hasMany(CaracteristicaCan::class,'Caracteristica','ID');
    }
}
?>