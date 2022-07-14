<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Jerarquia extends Model{
    protected $table="jerarquia";
    public $timestamps=false;
    protected $fillable = ['ID','Grado','FechaCreado','FechaActualizado','FechaEliminado'];

    public function usuarios_r(){
        return $this->hasMany(Usuario::class,'Jerarquia','ID');
    }
}
?>