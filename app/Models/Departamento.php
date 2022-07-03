<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Departamento extends Model{
    protected $table="departamento";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>