<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Can;
use App\Models\Caracteristica;
class CaracteristicaCan extends Model{
    protected $table="caracteristica_can";
    public $timestamps=false;
    protected $fillable = ['ID','Can','Caracteristica','Foto','FechaCreado','FechaActualizado','FechaEliminado'];
    public function can_r(){
        return $this->hasOne(Can::class,'ID','Can');
    }
    public function caracteristicas_r(){
        return $this->hasOne(Caracteristica::class,'ID','Caracteristica');
    }
}
?>