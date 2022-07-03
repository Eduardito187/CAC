<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Policia extends Model{
    protected $table="policia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Paterno','Materno','Correo','Telefono','CI','Nacimiento','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>