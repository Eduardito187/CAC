<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Ciudad extends Model{
    protected $table="ciudad";
    public $timestamps=false;
    protected $fillable = ['ID','Ciudad','Departamento','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>