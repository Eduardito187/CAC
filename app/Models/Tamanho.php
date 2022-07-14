<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Can;
class Tamanho extends Model{
    protected $table="tamanho";
    public $timestamps=false;
    protected $fillable = ['ID','Tamanho','FechaCreado','FechaActualizado','FechaEliminado'];
    public function tamanho_r(){
        return $this->hasOne(Can::class,'Tamanho','ID');
    }
    public function tamanhoS_r(){
        return $this->hasMany(Can::class,'Tamanho','ID');
    }
}
?>