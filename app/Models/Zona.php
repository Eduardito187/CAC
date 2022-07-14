<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Zona extends Model{
    protected $table="zona";
    public $timestamps=false;
    protected $fillable = ['ID','Zona','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Zona','ID');
    }
}
?>