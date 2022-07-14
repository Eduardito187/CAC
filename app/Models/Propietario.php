<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
use App\Models\Can;
use App\Models\TipoDocumento;
use App\Models\PropietarioReferencia;
class Propietario extends Model{
    protected $table="propietario";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Apellido','CI','Telefono','Direccion','TipoDocumento','FechaCreado','FechaActualizado','FechaEliminado'];

    public function direccion_p(){
        return $this->hasOne(Direccion::class,'ID','Direccion');
    }
    public function can_p(){
        return $this->hasMany(Can::class,'Propietario','ID');
    }
    public function tipo_documento_r(){
        return $this->hasOne(TipoDocumento::class,'ID','TipoDocumento');
    }
    public function propietario_referencia_r(){
        return $this->hasMany(PropietarioReferencia::class,'Propietario','ID');
    }
}
?>