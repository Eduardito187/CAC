<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Referencia extends Model{
    protected $table="referencia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Apellido','CI','Telefono','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>