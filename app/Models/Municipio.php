<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Municipio extends Model{
    protected $table="municipio";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Provincia','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>