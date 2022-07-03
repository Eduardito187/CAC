<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Caracteristica extends Model{
    protected $table="caracteristica";
    public $timestamps=false;
    protected $fillable = ['ID','Detalle','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>