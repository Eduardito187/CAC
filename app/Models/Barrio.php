<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Barrio extends Model{
    protected $table="barrio";
    public $timestamps=false;
    protected $fillable = ['ID','Barrio','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Barrio','ID');
    }
}
?>