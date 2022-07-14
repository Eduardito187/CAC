<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
use App\Models\Referencia;
class PropietarioReferencia extends Model{
    protected $table="propietario_referencia";
    public $timestamps=false;
    protected $fillable = ['ID','Propietario','Referencia','FechaCreado','FechaActualizado','FechaEliminado'];
    public function propietario_r(){
        return $this->hasOne(Propietario::class,'ID','Propietario');
    }
    public function referencia_r(){
        return $this->hasOne(Referencia::class,'ID','Referencia');
    }
}
?>