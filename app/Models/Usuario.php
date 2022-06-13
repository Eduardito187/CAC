<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Documento extends Model{
    protected $table="documento";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Pwd','Persona','Rango','Perfil','Poli','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>