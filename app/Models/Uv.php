<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Uv extends Model{
    protected $table="uv";
    public $timestamps=false;
    protected $fillable = ['ID','UV','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Uv','ID');
    }
}
?>