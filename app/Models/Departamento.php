<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provincia;
class Departamento extends Model{
    protected $table="departamento";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','FechaCreado','FechaActualizado','FechaEliminado'];
    public function provincias_r(){
        return $this->hasOne(Provincia::class,'Departamento','ID');
    }
}
?>