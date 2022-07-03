<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Provincia extends Model{
    protected $table="provincia";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Departamento','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>