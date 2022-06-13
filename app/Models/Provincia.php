<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Provincia extends Model{
    protected $table="provincia";
    public $timestamps=false;
    protected $fillable = ['ID','Provincia','Ciudad','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>