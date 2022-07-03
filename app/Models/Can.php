<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Can extends Model{
    protected $table="Can";
    public $timestamps=false;
    protected $fillable = ['ID','Nombre','Raza','Tamanho','Meses','Anho','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>