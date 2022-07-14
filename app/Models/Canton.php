<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Direccion;
class Canton extends Model{
    protected $table="canton";
    public $timestamps=false;
    protected $fillable = ['ID','Canton','FechaCreado','FechaActualizado','FechaEliminado'];
    public function direcciones(){
        return $this->hasMany(Direccion::class,'Canton','ID');
    }
}
?>