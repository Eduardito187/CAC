<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Policia extends Model{
    protected $table="policia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Paterno','Materno','Correo','Telefono','CI','Nacimiento','FechaCreado','FechaActualizado','FechaEliminado'];
    public function usuario() {
        return $this->hasOne(Usuario::class,'Policia','ID');
    }
}
?>