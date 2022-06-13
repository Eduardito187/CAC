<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model{
    protected $table="usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Pwd','Persona','Rango','Perfil','Poli','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>