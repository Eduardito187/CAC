<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HistorialLog extends Model{
    protected $table="historial_log";
    public $timestamps=false;
    protected $fillable = ['ID','Usuario','Log','IP','FechaCreado','FechaActualizado','FechaEliminado'];
}
?>