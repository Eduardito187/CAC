<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Jerarquia extends Model{
    protected $table="jerarquia";
    public $timestamps=false;
    protected $fillable = ['ID','Grado','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>