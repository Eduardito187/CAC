<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;
use App\Models\Departamento;
class Provincia extends Model{
    protected $table="provincia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Departamento','FechaCreado','FechaActualizado','FechaEliminado'];

    public function municipios_r(){
        return $this->hasMany(Municipio::class,'Provincia','ID');
    }
    public function departamentos_r(){
        return $this->hasOne(Departamento::class,'ID','Departamento');
    }
}
?>