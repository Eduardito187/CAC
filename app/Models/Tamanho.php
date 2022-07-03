<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Tamanho extends Model{
    protected $table="tamanho";
    public $timestamps=false;
    protected $fillable = ['ID','Tamanho','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>