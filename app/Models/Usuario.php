<?php
namespace App\Models;
use App\Models\Persona;
use App\Models\Rango;
use App\Models\Foto;
use App\Models\InfoPoli;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model{
    protected $table="usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Pwd','Persona','Rango','Perfil','Poli','FechaCreado','FechaActualizado','FechaEliminado'];
    public function persona() {
        return $this->hasOne(Persona::class,'ID','Persona');
    }
    public function rango() {
        return $this->hasOne(Rango::class,'ID','Rango');
    }
    public function perfil() {
        return $this->hasOne(Foto::class,'ID','Perfil');
    }
    public function poli() {
        return $this->hasOne(InfoPoli::class,'ID','Poli');
    }
}
?>