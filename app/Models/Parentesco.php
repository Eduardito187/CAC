<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Parenteco extends Model{
    protected $table="Parentesco";
    public $timestamps=false;
    protected $fillable = ['ID','Parentesco','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>