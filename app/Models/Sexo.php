<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Can;
class Sexo extends Model{
    protected $table="sexo";
    public $timestamps=false;
    protected $fillable = ['ID','Sexo','FechaCreado','FechaActualizado','FechaEliminado'];
    public function Canes_r(){
        return $this->hasMany(Can::class,'Sexo','ID');
    }
}
?>