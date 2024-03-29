<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
use App\Models\Raza;
use App\Models\Tamanho;
use App\Models\CaracteristicaCan;
use App\Models\FotoCan;
use App\Models\Sexo;
use App\Models\VacunasCan;
class Can extends Model{
    protected $table="can";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Raza','Tamanho','Meses','Anho','Propietario','FechaCreado','FechaActualizado','FechaEliminado','Sexo','Color','Chip','Tatuaje'];
    public function can_p(){
        return $this->hasOne(Propietario::class,'ID','Propietario');
    }
    public function raza_r(){
        return $this->hasOne(Raza::class,'ID','Raza');
    }
    public function tamanho_r(){
        return $this->hasOne(Tamanho::class,'ID','Tamanho');
    }
    public function caracteristicas(){
        return $this->hasMany(CaracteristicaCan::class,'Can','ID');
    }
    public function fotos_r(){
        return $this->hasMany(FotoCan::class,'Can','ID');
    }
    public function Sexo_r(){
        return $this->hasOne(Sexo::class,'ID','Sexo');
    }
    public function VacunasCan(){
        return $this->hasMany(VacunasCan::class,'Can','ID');
    }
    
}
?>