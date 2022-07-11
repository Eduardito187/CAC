<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Can;
class Raza extends Model{
    protected $table="raza";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','FechaCreado','FechaActualizado','FechaEliminado'];
    public function raza_r(){
        return $this->hasMany(Can::class,'Raza','ID');
    }
}
?>