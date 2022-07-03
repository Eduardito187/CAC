<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class PropietarioReferencia extends Model{
    protected $table="propietario_referencia";
    public $timestamps=false;
    protected $fillable = ['ID','Propietario','Referencia','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>