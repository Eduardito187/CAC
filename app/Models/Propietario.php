<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
use App\Models\Can;
class Propietario extends Model{
    protected $table="propietario";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Apellido','CI','Telefono','Direccion','FechaCreado','FechaActualizado','FechaEliminado'];

    public function direccion_p(){
        return $this->hasOne(Direccion::class,'ID','Direccion');
    }
    public function can_p(){
        return $this->hasMany(Can::class,'Propietario','ID');
    }
}
?>