<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Raza extends Model{
    protected $table="raza";
    public $timestamps=false;
    protected $fillable = ['ID','Raza','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>