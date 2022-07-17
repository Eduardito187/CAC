<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propietario;
use App\Models\Referencia;
class TipoDocumento extends Model{
    protected $table="tipo_documento";
    public $timestamps=false;
    protected $fillable = ['ID','Tipo','FechaCreado','FechaActualizado','FechaEliminado'];
    public function propietarios_r(){
        return $this->hasMany(Propietario::class,'TipoDocumento','ID');
    }
    public function referencias_r(){
        return $this->hasMany(Referencia::class,'TipoDocumento','ID');
    }
}
?>