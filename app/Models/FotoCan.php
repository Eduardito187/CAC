<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;
use App\Models\Can;
class FotoCan extends Model{
    protected $table="foto_can";
    public $timestamps=false;
    protected $fillable = ['ID','Foto','Can','FechaCreado','FechaActualizado','FechaEliminado'];
    public function foto_r(){
        return $this->hasOne(Foto::class,'ID','Foto');
    }
    public function can_r(){
        return $this->hasOne(Can::class,'ID','Can');
    }
}
?>