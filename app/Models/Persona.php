<?php
namespace App\Models;
use App\Models\TipoDocumento;
use Illuminate\Database\Eloquent\Model;
class Persona extends Model{
    protected $table="persona";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Paterno','Materno','Correo','Telefono','CI','Nacimineto','TipoDocumento','Direccion','Referencia','FechaCreado','FechaActualizado','FechaEliminado'];
    public function tipodocumento() {
        return $this->hasOne(TipoDocumento::class,'ID','TipoDocumento');
    }
}
?>