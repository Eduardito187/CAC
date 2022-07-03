<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Propietario extends Model{
    protected $table="propietario";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Apellido','CI','Telefono','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>