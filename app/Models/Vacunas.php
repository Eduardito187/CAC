<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\VacunasCan;
class Vacunas extends Model{
    protected $table="vacunas";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Obligatorio','FechaCreado','FechaActualizado','FechaEliminado'];
    public function VacunasCan(){
        return $this->hasMany(VacunasCan::class,'Vacuna','ID');
    }
}
?>