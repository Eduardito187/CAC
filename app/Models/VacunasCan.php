<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Can;
use App\Models\Vacunas;
class VacunasCan extends Model{
    protected $table="vacunas_can";
    public $timestamps=false;
    protected $fillable = ['ID','Can','Vacuna','FechaCreado','FechaActualizado','FechaEliminado'];
    public function can_r(){
        return $this->hasOne(Can::class,'ID','Can');
    }
    public function Vacunas_r(){
        return $this->hasOne(Vacunas::class,'ID','Vacuna');
    }
}
?>