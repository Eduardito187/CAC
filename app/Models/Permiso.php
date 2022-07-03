<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Permiso extends Model{
    protected $table="permiso";
    public $timestamps=false;
    protected $fillable = ['ID','Permiso','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>