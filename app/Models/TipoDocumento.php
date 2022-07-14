<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
class TipoDocumento extends Model{
    protected $table="tipo_documento";
    public $timestamps=false;
    protected $fillable = ['ID','Tipo','FechaCreado','FechaActualizado','FechaEliminado'];
    public function propietarios_r(){
        return $this->hasMany(Propietario::class,'TipoDocumento','ID');
    }
}
?>