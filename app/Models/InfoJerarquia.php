<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class InfoJerarquia extends Model{
    protected $table="info_jerarquia";
    public $timestamps=false;
    protected $fillable = ['ID','Rango','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>