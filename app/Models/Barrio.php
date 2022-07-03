<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Barrio extends Model{
    protected $table="barrio";
    public $timestamps=false;
    protected $fillable = ['ID','Barrio','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>