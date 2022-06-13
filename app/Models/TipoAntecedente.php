<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class TipoAntecedentes extends Model{
    protected $table="tipo_antecedente";
    public $timestamps=false;
    protected $fillable = ['ID','Tipo','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>