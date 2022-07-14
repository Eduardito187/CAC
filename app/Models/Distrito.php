<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Distrito extends Model{
    protected $table="distrito";
    public $timestamps=false;
    protected $fillable = ['ID','Distrito','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Distrito','ID');
    }
}
?>