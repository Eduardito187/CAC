<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoDocumento;
use App\Models\PropietarioReferencia;
class Referencia extends Model{
    protected $table="referencia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Apellido','CI','Telefono','TipoDocumento','FechaCreado','FechaActualizado','FechaEliminado'];
    public function tipo_documento_r(){
        return $this->hasOne(TipoDocumento::class,'ID','TipoDocumento');
    }
    public function propietario_referencia_r(){
        return $this->hasMany(PropietarioReferencia::class,'Referencia','ID');
    }
}
?>