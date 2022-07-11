<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
use App\Models\Raza;
use App\Models\Tamanho;
use App\Models\CaracteristicaCan;
class Can extends Model{
    protected $table="Can";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Raza','Tamanho','Meses','Anho','Propietario','FechaCreado','FechaActualizado','FechaEliminado'];
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
}
?>