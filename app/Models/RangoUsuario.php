<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RangoUsuario extends Model{
    protected $table="rango_usuario";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','Usuario','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>